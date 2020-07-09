<?php get_header(); ?>

  <section class="page-header front-page-header <?php if(get_theme_mod('fp_container_boxy')) : echo 'boxy-header'; endif; ?>"
    style="background-image: url('<?php echo get_theme_mod('fp_container_image'); ?>');">

    <h1 class="page-title" style="font-size: <?php echo get_theme_mod('fp_texts_title_size'); ?>px;">
      <?php echo get_theme_mod('fp_texts_title'); ?>
    </h1>

    <a href="<?php echo get_theme_mod('fp_button_url'); ?>">
      <button type="button" class="call-to-action <?php echo get_theme_mod('fp_button_style'); ?>">
        <?php echo get_theme_mod('fp_button_text'); ?>
      </button>
  </a>
</section>

<!-- J'ajoute la partie modifiable par le customizer du bas de page -->
<main class="container front-content">
  <section class="custom-presentation">
    <img src="<?php echo get_theme_mod('fp_container2_image'); ?>" alt="">
    <div class="custom-presentation-infos">
      <h2 class="custom-title" style="font-size: <?php echo get_theme_mod('fp_texts2_title_size'); ?>px;">
        <?php echo get_theme_mod('fp_texts2_title'); ?>
      </h2>
      <p class="custom-content">
        <?php echo get_theme_mod('fp_texts2_description'); ?>
      </p>
      <a href="<?php echo get_theme_mod('fp_button_url'); ?>">
        <button type="button" class="call-to-action <?php echo get_theme_mod('fp_button_style'); ?>">
          <?php echo get_theme_mod('fp_button_text'); ?>
        </button>
    </a>

    </div>
  </section>

<!-- J'ajoute en dynamique les trois blocks -->
  <section class="custom-blocks">
    <div class="custom-block">
      <i class="fas fa-birthday-cake fa-3x"></i>
      <h3 class="custom-title"><?php echo get_theme_mod('fp_texts_title_accr1'); ?></h3>
      <p class="custom-content">
          <?php echo get_theme_mod('fp_texts_descr_accr1'); ?>
      </p>
    </div>
    <div class="custom-block">
      <i class="fas fa-music fa-3x"></i>
      <h3 class="custom-title"><?php echo get_theme_mod('fp_texts_title_accr2'); ?></h3>
      <p class="custom-content">
        <?php echo get_theme_mod('fp_texts_descr_accr2'); ?>
      </p>
    </div>
    <div class="custom-block">
      <i class="fas fa-ticket-alt fa-3x"></i>
      <h3 class="custom-title"><?php echo get_theme_mod('fp_texts_title_accr3'); ?></h3>
      <p class="custom-content">
        <?php echo get_theme_mod('fp_texts_descr_accr3'); ?>
      </p>
    </div>
  </section>

  <section class="custom-section">
    <blockquote class="star-quote">
      <p class="quote-content">
        <?php echo get_theme_mod('fp_quote_text'); ?>
      </p>
      <cite class="quote-footer">
        <?php echo get_theme_mod('fp_quote_source'); ?>
      </cite>
    </blockquote>
    </section>
</main>



<?php get_footer(); ?>
