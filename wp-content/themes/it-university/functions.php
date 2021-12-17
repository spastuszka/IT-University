<?php

function it_university_files(){
  //Added function which loaded main style.css file
  wp_enqueue_style('it_university_main_styles',get_stylesheet_uri());
}

//calling an action about loaded script
add_action( 'wp_enqueue_scripts', 'it_university_files' );