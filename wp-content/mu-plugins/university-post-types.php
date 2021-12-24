<?php

function university_post_types(){
  register_post_type('event',
    array(
      'public' => true,
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