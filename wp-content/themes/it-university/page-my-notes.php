<?php

if (!is_user_logged_in()) {
  wp_redirect(esc_url(site_url('/')));
  exit;
}

get_header();
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