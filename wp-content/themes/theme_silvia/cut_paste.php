<section class="page-header" style="background-image: url('<?php echo get_theme_mod('banner_image'); ?>');">
   <h1 class="page-title">Blog</h1>
   <!-- TODO Volontaire - Déclarer une zone de menu "Menu des catégories" et
   l'insérer dynamiquement ci-après -->
   <nav class="navigation navigation-blog" id="navigation-blog">
     <?php
     wp_nav_menu(
       array(
         'theme_location'  => 'secondary'
       )
     );
      ?>
   </nav>
 </section>
