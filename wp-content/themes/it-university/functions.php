<?php

function it_university_files(){
  wp_enqueue_style('it_university_main_styles',get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'it_university_files' );