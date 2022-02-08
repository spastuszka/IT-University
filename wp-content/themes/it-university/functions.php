<?php

require get_theme_file_path('/includes/search-route.php');

function it_university_custom_rest()
{
  register_rest_field('post', 'authorName', array(
    'get_callback' => function () {
      return get_the_author();
    },
  ));
}

add_action('rest_api_init', 'it_university_custom_rest');

function pageBanner($args = NULL)
{
  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!$args['photo']) {
    if (get_field('page_banner_background_image') and !is_archive() and !is_home()) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }

?>

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>
  </div>

<?php }

function it_university_files()
{
  //Added function which loaded main style.css file
  wp_enqueue_script('main-university-js', get_theme_file_uri('./build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('it_university_main_styles', get_theme_file_uri('./build/style-index.css'));
  wp_enqueue_style('it_university_extra_styles', get_theme_file_uri('./build/index.css'));

  wp_localize_script('main-university-js', 'universityData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

//calling an action about loaded script
add_action('wp_enqueue_scripts', 'it_university_files');


function it_university_title()
{
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerLocationOne', 'Footer Location One');
  register_nav_menu('footerLocationTwo', 'Footer Location Two');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'it_university_title');


function it_university_adjust_queries($query)
{

  if (!is_admin() and is_post_type_archive('program') and is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() and is_post_type_archive('event') and is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric',
      ),
    ));
  }
}

add_action('pre_get_posts', 'it_university_adjust_queries');

function it_map_api_key($api)
{
  $api['key'] = 'AIzaSyDw3ErzxadnyAAXPx-udAZTD_rylZYdPfY';
  return $api;
}

add_filter('acf/fields/google_map/api', 'it_map_api_key');


//Redirect subscriber accounts out of admin and onto homepage
function redirectSubsToFrontend()
{
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}
add_action('admin_init', 'redirectSubsToFrontend');

//Hide admin bar when subcriber is login
function noSubsAdminBar()
{
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}
add_action('wp_loaded', 'noSubsAdminBar');


//Customize Login Screen
function outHeaderUrl()
{
  return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'outHeaderUrl');


//Changed login default logo - turn on loaded css

function ourLoginCSS()
{
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('it_university_main_styles', get_theme_file_uri('./build/style-index.css'));
  wp_enqueue_style('it_university_extra_styles', get_theme_file_uri('./build/index.css'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginTitle()
{
  return get_bloginfo('name');
}

add_filter('login_headertitle', 'ourLoginTitle');


//Force note posts to be private

function makeNotePrivate($data, $postarr)
{
  if ($data['post_type'] == 'note') {

    if (count_user_posts(get_current_user_id(), 'note') > 5 and $postarr['id']) {
      die('Youe have reached your note limit.');
    }

    $data['post_title'] = sanitize_text_field($data['post_title']);
    $data['post_content'] = sanitize_textarea_field($data['post_content']);
  }
  if ($data['post_type'] == 'note' and $data['post_status'] != 'trash') {
    $data['post_status'] = 'private';
  }

  return $data;
}

//Tutaj ustawione jest więcej parametrów po przeciku ponieważ dodatkowo ustawiony jest priorytet danej funkcji - 10
//oraz ile paramaterów ma dana funkcja brać pod uwagę
add_filter('wp_insert_post_data', 'makeNotePrivate', 10, 2);
