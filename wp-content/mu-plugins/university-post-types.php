<?php

function university_post_types()
{

  //Campus Post Type
  register_post_type(
    'campus',
    array(
      'capability_type' => 'campus',
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'excerpt'),
      'rewrite' => array(
        'slug' => 'campuses',
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => __('Campuses'),
        'singular_name' => __('Campus'),
        'add_new_item' => __('Add New Campus'),
        'edit_item' => __('Edit Campus'),
        'all_items' => __('All Campuses'),
      ),
      'menu_icon' => 'dashicons-location-alt',
    )
  );

  //Event Post Type
  register_post_type(
    'event',
    array(
      'capability_type' => 'event',
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'excerpt'),
      'rewrite' => array(
        'slug' => 'events',
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'add_new_item' => __('Add New Event'),
        'edit_item' => __('Edit Event'),
        'all_items' => __('All Events'),
      ),
      'menu_icon' => 'dashicons-calendar',
    )
  );

  //Program Post Type
  register_post_type(
    'program',
    array(
      'supports' => array('title'),
      'rewrite' => array(
        'slug' => 'programs',
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => __('Programs'),
        'singular_name' => __('Program'),
        'add_new_item' => __('Add New Program'),
        'edit_item' => __('Edit Program'),
        'all_items' => __('All Programs'),
      ),
      'menu_icon' => 'dashicons-awards',
    )
  );

  //Professor Post Type
  register_post_type(
    'professor',
    array(
      'supports' => array('title', 'editor', 'thumbnail'),
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => __('Professors'),
        'singular_name' => __('Professor'),
        'add_new_item' => __('Add New Professor'),
        'edit_item' => __('Edit Professor'),
        'all_items' => __('All Professors'),
      ),
      'menu_icon' => 'dashicons-welcome-learn-more',
    )
  );

  //Note Post Type
  register_post_type(
    'note',
    array(
      'capability_type' => 'note',
      'map_meta_cap' => true,
      'supports' => array('title', 'editor'),
      'public' => false,
      'show_ui' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => __('Notes'),
        'singular_name' => __('Note'),
        'add_new_item' => __('Add New Note'),
        'edit_item' => __('Edit Note'),
        'all_items' => __('All Notes'),
      ),
      'menu_icon' => 'dashicons-welcome-write-blog',
    )
  );
}

add_action('init', 'university_post_types');
