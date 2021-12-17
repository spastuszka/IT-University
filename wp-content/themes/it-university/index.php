<?php

//nagłówek domyślny
  get_header(); 

  //content danej strony

  while(have_posts()){
    the_post(); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p><?php the_content(); ?></p>
    <?php
  } 

  get_footer();
?>
