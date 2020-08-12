<article class="card">
          <div class="card-body">
            <h2 class="card-title"><a href="article.html">Ivre, il refait tous les challenges en un week-end sans dormir.</a></h2>
            <p class="card-text">Ou comment j'ai appris plein de choses en faisant une nouvelle fois tous les
              challenges que j'avais loupé.</p>
            <p class="infos">
              Posté par <a href="#" class="card-link">Anthony</a> le <time>13/07/2017</time> dans <a href="<?php get_header(); ?>

<div class="wrapper">
    
  <?php 
    require "inc/left.php"; 
  ?>

  <main class="right">
    <h2 class="right__title">
      <?php if( is_home() ) : ?>
        Latest News  
      <?php 
        else : 
          $queried_obj = get_queried_object();       
          
          // On vérifie le type de l'objet dans $queried_obj
          // pour ça, on utilise l'opérateur instanceof
          // il renverra true si l'objet est une instance de la classe donnée
          if( $queried_obj instanceof WP_Term ) :
            echo "News from ".$queried_obj->name;
          elseif( $queried_obj instanceof WP_User ) :
            echo "News by ".$queried_obj->display_name;
          endif; 
        endif; 
      ?>
    </h2>

    <div class="posts">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        
          <?php $categories = get_the_category(); ?>

          <article class="post">
              <?php foreach( $categories as $category ) : ?>
                  <a 
                    href="<?= get_category_link( $category->term_id ) ?>" 
                    class="post__category post__category--color-team"
                  >
                      <?= $category->name ?>
                  </a>
              <?php endforeach; ?>
              <h3>
                  <?php the_title(); ?>
              </h3>
              <div class="post__meta">
                  <img class="post__author-icon" src="<?= get_theme_file_uri( 'assets/images/icon-dar.png' ) ?>" alt="">
                  <strong class="post__author">
                      <a href="<?= get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
                        <?php the_author(); ?>
                      </a>
                  </strong>
                  <time datetime="2018-03-27">
                      <?php the_time(); ?>
                  </time>
              </div>
              <p>
                  <?php the_excerpt(); ?>
              </p>
              <a href="<?php the_permalink() ?>" class="post__link">
                  Continue reading
              </a>
          </article>

        <?php endwhile; endif; ?>
    </div>
  </main>
</div>

<?php get_footer();