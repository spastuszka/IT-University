<?php

function it_university_files(){
  //Added function which loaded main style.css file
  wp_enqueue_style('font_awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('it_university_main_styles',get_theme_file_uri('./build/style-index.css'));
  wp_enqueue_style('it_university_extra_styles',get_theme_file_uri('./build/index.css'));
}

//calling an action about loaded script
add_action( 'wp_enqueue_scripts', 'it_university_files' );