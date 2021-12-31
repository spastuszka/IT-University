<?php get_header();
//Wczytanie blog postow i ich opublikowanie na stronie

  while(have_posts()){
    the_post();
    
    pageBanner(array(
      'title' => 'There is a title',
      'subtitle' => 'Some subtitle',
      'photo' => 'https://images.unsplash.com/photo-1640919570975-420db180f038?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80',
    ));

    ?>
    

    <div class="container container--narrow page-section">

    <?php

    $theParent = wp_get_post_parent_id(get_the_ID());

    if($theParent){ ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a><span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>
    <?php
    }
    ?>

    <?php
    
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));

    if($theParent or $testArray) { ?>

      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
        <ul class="min-list">
          <?php

            if($theParent){
              $findChildrenOf = $theParent;
            } else {
              $findChildrenOf = get_the_ID();
            }

            echo wp_list_pages(array(
              'title_li' => NULL,
              'child_of' => $findChildrenOf,
              'sort_column' => 'menu_order',
            ));
          ?>
        </ul>
      </div>

      <?php } ?>

      <div class="generic-content">
        <?php the_content(); ?>
      </div>
    </div>

    <?php
  }

  //domyślna stopka
  get_footer(); 
?>
