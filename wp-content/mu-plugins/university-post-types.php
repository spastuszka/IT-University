<?php

function university_post_types(){
  //Event Post Type
  register_post_type('event',
    array(
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
    ));
  
  //Program Post Type
  register_post_type('program',
    array(
      'supports' => array('title', 'editor'),
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
    ));

    //Professor Post Type
  register_post_type('professor',
  array(
    'supports' => array('title', 'editor'),
    'rewrite' => array(
      'slug' => 'professors',
    ),
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
  ));
}

add_action('init', 'university_post_types');