<?php get_header(); ?>

    <div class="wrapper">
        
      

      <main class="right">
        <h2 class="right__title">
                        
          <?php foreach( get_the_category() as $category ) :  ?>
            <a href="<?= get_category_link( $category->term_id ) ?>" class="post__category post__category--color-team">
                
            </a>
          <?php endforeach; ?>
        </h2>
        <div style="padding: 2em;">
            <?php 
                if( have_posts() ) : 
                    while( have_posts() ) : 
                        the_post();
                        the_content();
                    endwhile; 
                endif;
            ?>
        </div>
        <div class="article-author">
          
        </div>
      </main>
    </div>

<?php get_footer();