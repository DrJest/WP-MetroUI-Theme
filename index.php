<?php get_header(); ?>

<?php get_sidebar(); ?>

        <div class="page-region">
            <div class="page-region-content" id="content">
				

    <?php if (have_posts()) : ?>
    <!-- inizio elenco post -->
    <?php while (have_posts()) : the_post(); // se sono presenti post mostrali ?>
    <div class="item entry" id="post-<?php the_ID(); ?>">
      <div class="itemhead">
        <h3> <a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></h3>
        <div class="chronodata">
          <?php the_time('F jS, Y') ?>
          by <?php the_author() ?>
        </div>
      </div>
      <div class="storycontent">
        <?php the_content('Read more &raquo;'); ?>
      </div>
      <small class="metadata">
        <span class="category">Filed under:
          <?php the_category(', ') ?>
          <?php edit_post_link('Edit', ' | ', ' | '); ?>
        </span>
        <?php if ( function_exists('wp_tag_cloud') ) : ?>
        <?php the_tags('<span class="tags">Article tags: ', ', ' , '</span>'); ?>
        <?php endif; ?>						  </small>

	    <ul class="accordion <?php if(get_option('metroui_theme_comment_cs')=='dark') echo 'dark'; ?>" data-role="accordion">
        <li <?php if(is_single()) echo 'class="active"'; ?>>
          <?php $wpcommentsjavascript=false; comments_popup_link('Comment (0)', ' Comment (1)', 'Comments (%)', '', '" onclick="return false"'); ?>
            <div class="commentlist">
			 <?php  
		$comments = get_comments(array(
			'post_id' => get_the_ID(),
			'status' => 'approve' //Change this to the type of comments to be displayed
		));

		//Display the list of comments
		wp_list_comments(array('style' => 'div'), $comments);
		include("comments.php"); 
?>
			</div>
        </li>
		</ul>
    </div>

    <?php endwhile; ?>
    <!-- fine elenco post --> 
    
    <div class="navigation"> 
      <div class="alignleft">
        <?php next_posts_link('&laquo; Previous Entries') ?>
      </div>
      <div class="alignright">
        <?php previous_posts_link('Next Entries &raquo;') ?>
      </div>
    </div>
    
    <?php else : // se non sono presenti i post mostra questo codice  ?> 
    
    <h2 class="center">Not Found</h2>
    <p class="center">Sorry, but you are looking for something that isn't here.
    </p>
    <?php endif; ?>
    

				
            </div>
        </div>


<?php get_footer(); ?>
