<?php get_header();
//Wczytanie blog postow i ich opublikowanie na stronie

while (have_posts()) {
  the_post();

  pageBanner();

?>


  <div class="container container--narrow page-section">
    Custom code goes here.

  </div>

<?php
}

//domyślna stopka
get_footer();
?>