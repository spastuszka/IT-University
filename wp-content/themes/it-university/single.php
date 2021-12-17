<?php

//default header
get_header();

//Upload blog posts and publish them on the site

  while(have_posts()){
    the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <p><?php the_content(); ?></p>
    <?php
  }

  //default footer

?>
