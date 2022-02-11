<?php

function univerisityLikeRoute()
{
  register_rest_route('university/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike',
  ));

  register_rest_route('university/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike',
  ));
}

function createLike($data)
{
  if (is_user_logged_in()) {
    $professor = sanitize_text_field($data['professordId']);

    $existQuery = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => 'liked_professor_id',
          'compare' => '=',
          'value' => $professor
        )
      ),
    ));

    if ($existQuery->found_posts == 0 and get_post_type($professor) == 'professor') {
      //create new like post
      return wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => '2ns PHP test',
        'meta_input' => array(
          'liked_professor_id' => $professor,
        ),
      ));
    } else {
      die('Invalid professord id');
    }
  } else {
    die("Only logged in user can create a like.");
  }
}

function deleteLike()
{
  return 'delete like';
}

add_action('rest_api_init', 'univerisityLikeRoute');
