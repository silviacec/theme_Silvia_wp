<aside class="sidebar" <?php if(get_theme_mod('widget-sidebar')) : echo 'hidden'; endif; ?> id="widgets-sidebar">
  <div class="widget">

  <?php
    if(is_active_sidebar('widgets-sidebar')) :
      dynamic_sidebar('widgets-sidebar');
    endif;
   ?>

   </div>
</aside>
