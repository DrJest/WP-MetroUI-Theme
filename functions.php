<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' =>  'Main Sidebar',
		'description' => 'Appears on the left of the page (if ShowSidebar is enabled)',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

register_sidebar( array(
		'name' =>  __( 'Footer Bar', 'footer-bar' ),
		'description' => 'Appears after the footer area',
		'before_widget' => '<div class="tile">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	) );
}

function metroui_theme_set_defaults() {
	add_option("metroui_theme_show_navbar",true);  
	add_option("metroui_theme_show_sidebar", true);  
	add_option("metroui_theme_show_search", true);  
	add_option("metroui_theme_show_credits", true);  
	add_option("metroui_theme_show_social", true);  
	add_option("metroui_theme_comment_cs", "light");  
	add_option("metroui_theme_first_run", true);
}

if(!get_option("metroui_theme_first_run")) add_action('init',"metroui_theme_set_defaults");

function metroui_theme_register_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'left-menu' => __( 'Left Menu' ),
	  'footer-menu' => __('Footer Menu')
    )
  );
}
add_action( 'init', 'metroui_theme_register_menus' );

function nav_pages_menu() {
 echo '<ul class="menu" id="menu">';
 echo '<li><a href=';
 echo bloginfo('url');
 echo '>Home</a></li>';
 wp_list_pages('depth=1&title_li=');
 echo "</ul>";
}
function setup_theme_admin_menus() {  
    add_submenu_page('themes.php',   
        'MetroUI Theme Options', 'MetroUI Options', 'manage_options',   
        'metro-ui-options', 'theme_front_page_settings');   
}  
add_action( 'admin_menu', 'setup_theme_admin_menus' );
/*create the options page*/
function theme_front_page_settings() {  
// Check that the user is allowed to update options  
if (!current_user_can('manage_options')) {  
    wp_die('You do not have sufficient permissions to access this page.');  
} 


if (isset($_POST["update_settings"])) {  
	update_option("metroui_theme_show_navbar", (isset($_POST['nav-bar']) ? true : false));  
	update_option("metroui_theme_show_sidebar", (isset($_POST['sidebar']) ? true : false));  
	update_option("metroui_theme_show_search", (isset($_POST['search']) ? true : false));  
	update_option("metroui_theme_show_credits", (isset($_POST['show-credits']) ? true : false));  
	update_option("metroui_theme_show_social", (isset($_POST['social']) ? true : false));  
	update_option("metroui_theme_comment_cs", $_POST['comment-cs']);
}  
 
?>
<style>
form {
	padding:20px;
	font-size:16px;
}
label {
	line-height:30px;
}
input[type=checkbox], input[type=radio]
{
	height:25px;
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */

}
</style>
        <?php screen_icon('themes'); ?> <h2>MetroUI Theme Options</h2>  
    <div class="major-publishing-actions">  
		<form action="" method="post">
			 <input id="nav-bar" name="nav-bar" type="checkbox" <?php echo get_option("metroui_theme_show_navbar")? 'checked="checked"': ""; ?> > <label for="nav-bar">Show Top Navigation Bar</label>
			<br><br>
			<input id="search" name="search" type="checkbox" <?php echo get_option("metroui_theme_show_search")? 'checked="checked"': ""; ?> > <label for="search">Show Search Form</label> 
			<br><br>
			<input id="sidebar" name="sidebar" type="checkbox" <?php echo get_option("metroui_theme_show_sidebar")? 'checked="checked"': ""; ?> > <label for="sidebar">Show Sidebar</label> 
			<br><br>
			<input id="show-credits" name="show-credits" type="checkbox" <?php echo get_option("metroui_theme_show_credits")? 'checked="checked"': ""; ?> > <label for="show-credits">Show Credits</label> 
			<br><br>
			<input id="social" name="social" type="checkbox" <?php echo get_option("metroui_theme_show_social")? 'checked="checked"': ""; ?> > <label for="social">Show Social Buttons</label> 
			<br><br>
			Comment Bar Color Scheme<br>
	<input id="light" value="light" name="comment-cs" type="radio" <?php if(get_option("metroui_theme_comment_cs")=="light") echo 'checked="checked"'; ?> > <label for="light">Light</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input id="dark" value="dark" name="comment-cs" type="radio" <?php if(get_option("metroui_theme_comment_cs")=="dark") echo 'checked="checked"'; ?>> <label for="dark">Dark</label> 
			<br><br>
			<?php if (isset($_POST["update_settings"])) echo "Setting Updated<br><br>"; ?>
			<input type="hidden" name="update_settings" value="Y" />  
			<input type="submit" value="Save Settings" class="button button-primary">
		</form>
	</div>
<?php
}  
?>
