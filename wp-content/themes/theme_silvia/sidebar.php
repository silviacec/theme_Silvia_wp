<aside class="sidebar" id="widgets-sidebar">
  <div class="widget">

  <?php
    if(is_active_sidebar('widgets-sidebar')) :
      dynamic_sidebar('widgets-sidebar');
    endif;
   ?>
   
   </div>
</aside>
