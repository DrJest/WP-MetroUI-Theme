<?php get_header(); // includi l'header ?>

     <?php get_sidebar(); ?>

      <div class="page-region">
           <div class="page-region-content" id="content">


    <?php if (have_posts()) : // se la ricerca ha portato ha risultati ?>
    <div class="item entry">
      <h2 class="pagetitle">Search results for &#8216;
        <?php the_search_query(); // visualizza la stringa che si è cercata ?> &#8217;</h2>
    </div>
    <?php while (have_posts()) : the_post(); ?>
    <!-- item -->
    <div class="item entry" id="post-<?php the_ID(); ?>">
      <div class="itemhead">                                            <h3>
          <a href="<?php the_permalink() // link ai post ?>" rel="bookmark">
            <?php the_title(); // titoli dei post ?></a></h3>
        <div class="chronodata">
          <?php the_time('F jS, Y') ?>
          <!-- by <?php the_author() // autore dei post ?> -->
        </div>
      </div>
      <div class="storycontent">
        <?php the_excerpt(); // sommario del post ?>
      </div>
      <small class="metadata">
        <span class="category">Filed under:
          <?php the_category(', ') // categoria del post ?>
        </span> |
        <?php edit_post_link('Edit', '', ' | '); // modifica per chi ha il permesso per farlo ?>
        <?php comments_popup_link('Comment (0)', ' Comment (1)', 'Comments (%)'); // link e numero di commenti ?>                                                   </small>
    </div>
    <!-- end item -->
    <?php comments_template(); // inclusione del template dei commenti ?>
    <?php endwhile; ?>
    <div class="navigation">
      <div class="alignleft">
        <?php next_posts_link('&laquo; Previous Entries') // risultati precedenti ?>
      </div>
      <div class="alignright">
        <?php previous_posts_link('Next Entries &raquo;') // risultati successivi ?>
      </div>
      <p>
      </p>
    </div>
    <?php else : // se la ricerca non ha prodotto risultati visualizza il contenuto sottostante ?>
    <div class="item entry">
      <h2 class="pagetitle">No search results</h2>
      <p class="center">We did not find any posts containing the string &#8216;
        <?php the_search_query(); ?>&#8217;.
      </p>
    </div>
    <?php endif; ?>

				
            </div>
        </div>


<?php get_footer(); ?>
