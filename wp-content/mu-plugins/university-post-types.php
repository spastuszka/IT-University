<?php

function university_post_types(){
  register_post_type('event',
    array(
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
}

add_action('init', 'university_post_types');