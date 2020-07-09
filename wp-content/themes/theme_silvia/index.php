
<?php get_header(); ?>

  <main class="container site-content">
    <section class="main-content">
      <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
      <article class="entry post">
        <header class="entry-header">
          <?php if(has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('full', ['class' => 'featured-image', 'title' => 'Vignette']); ?>
          <?php endif; ?>

          <section class="entry-metadata">
            <section class="entry-data">
              <h6 class="publish-date"><?php the_time('F j, Y'); ?></h6>
              <?php $categories = get_the_category();
                    $separator = " ";
                    $output = '';

              // on teste si le tableau est défini (= non vide).
              // Les bonnes pratiques de programmation recommandent d'utiliser isset() ou empty()
              if($categories) {

                forEach($categories as $category) {

                  $output .= '<h5 class="entry-category"><a href="'.get_category_link($category
                  ->term_id).'">'.$category->cat_name .'</a></h5>' . $separator;
                } ?>

                 <h4 class="comments-number"><?php comments_number('Aucun commentaire', '1 commentaire', '% commentaires'); ?></h4>
              <?php  }

              echo trim($output, $separator); ?>

            </section>

            <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
          </section>
        </header>
        <!-- REMPLACER the_exerpt et lire la suite par article entier -->
        <section class="entry-content">
          <?php the_excerpt(); ?>
        </section>

        <footer class="entry-footer">
          <div class="read-more">
            <a href="<?php the_permalink(); ?>">Lire la suite</a>
          </div>
        </footer>
      </article>
      <!-- On pense à bien fermer if() et while() -->
    <?php endwhile; ?>
    <?php endif; ?>

  <!-- pagination -->
    <nav class="navigation pagination">
      <?php
      // Structure du tableau d'arguments : https://developer.wordpress.org/reference/functions/paginate_links/
      the_posts_pagination(
        array(
          'prev_text'          => '<i class="fas fa-arrow-left"></i> Précédent',
          'next_text'          => 'Suivant <i class="fas fa-arrow-right"></i>'
        )
      );
      ?>
    </nav>
  </section>

<?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
