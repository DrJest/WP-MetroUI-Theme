<?php get_header(); // includi l'header ?>

     <?php get_sidebar(); ?>

      <div class="page-region">
           <div class="page-region-content" id="content">
    <!-- item -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); // se esiste la pagina visualizzala ?>
    <div class="item entry" id="post-<?php the_ID(); ?>">
      <div class="itemhead">
		<h3> <?php the_title(); // titolo pagina ?></h3>
      </div>
      <div class="storycontent">
        <?php the_content(); // contenuto pagina ?>
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); // link alle altre pagine ?>
      </div>
    </div>
    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); // modifica la pagina - per chi ha i permessi necessari ?>
    <!-- end item -->
    <?php endwhile; ?>
    <?php endif; ?>
   </div>

            </div>
        </div>


<?php get_footer(); // includi il footer ?>
