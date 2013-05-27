<?php if(get_option("metroui_theme_show_sidebar")) : ?>
<div class="page-sidebar" id="sidebar">
 <ul>
<?php
$args = array(
	'theme_location'  => 'left-menu',
	'echo'            => false,
	'fallback_cb'     => '',
	'depth'           => 0,
);
$menu = wp_nav_menu( $args );
if($menu!="") echo '<li><h3>Menu</h3>'.$menu.'</li>';
?>

  <?php if (!dynamic_sidebar('Main Sidebar') ) : // fa il check se è settata la sidebar dinamica su functions.php ?>

	<?php
        $today = current_time('mysql', 1);
        if ( $recentposts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_date_gmt < '$today' ORDER BY post_date DESC LIMIT 10")):
    
            // estrapola i post recenti?>
      <li class="sideblock">		<h3>
          <?php _e("Recent Posts"); // titolo del post recenti ?>		</h3>
        <ul>
    <?php

			foreach ($recentposts as $post) {

			if ($post->post_title == '')

			$post->post_title = sprintf(__('Post #%s'), $post->ID);

			echo "<li><a href='".get_permalink($post->ID)."'>";

			the_title();

			echo '</a></li>';

			}
              // visualizza i post recenti ?>
    </ul>
  </li>
  <?php endif; ?>

  <?php if (function_exists('wp_theme_switcher')) { // fa il check se è settato il cambio automatico di thema ?>
  <li class="sideblock">    <h3>Themes</h3>
    <?php wp_theme_switcher('dropdown'); ?>
  </li>
  <?php } ?>
  <li class="sideblock">    <h3>Categories</h3>
    <ul>
      <?php wp_list_cats('sort_column=name&hierarchical=0'); // visualizza le categorie ?>
    </ul>
  </li>

  <li class="sideblock">    <h3>Archives</h3>
    <ul>
      <?php wp_get_archives('type=monthly'); // visualizza l'archivio dei post ?>
    </ul>
  </li>

</ul>
  <?php endif; ?>
</div>
<?php endif; ?>
