<?php

//Wczytanie blog postow i ich opublikowanie na stronie

  while(have_posts()){
    the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <p><?php the_content(); ?></p>
    <?php
  }

?>
