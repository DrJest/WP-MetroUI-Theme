<div id="footer">
<hr>
<?php
$args = array(
	'theme_location'  => 'footer-menu',
	'container'       => 'div',
	'container_class' => 'nav-bar-inner padding10',
	'echo'            => false,
	'fallback_cb'     => '',
	'depth'           => 0,
);
$bmenu = wp_nav_menu( $args );
if ($bmenu!="") echo '<div class="nav-bar">'.$bmenu."</div>";
 ?>
<?php
if(get_option("metroui_theme_show_credits")) echo '<p id="credits">brought to you by <a href="http://jest.pw">Dr.Jest</a> - Github</p>'; 
dynamic_sidebar('footer-bar'); 
?>

</div>

</div>

<?php if(get_option("metroui_theme_show_social")) : ?>

<script type="text/javascript">stLight.options({publisher: "ur-fcf8ddc9-f579-a4a1-c0c7-62edc17eda08", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>
<script>
var options={ "publisher": "ur-fcf8ddc9-f579-a4a1-c0c7-62edc17eda08", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "googleplus", "linkedin", "pinterest", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>

<?php endif; ?>

</body>
</html>
