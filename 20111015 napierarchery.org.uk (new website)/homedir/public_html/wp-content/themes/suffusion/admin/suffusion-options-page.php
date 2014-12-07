<?php
/**
 * Contains the layout functions for Suffusion's options.
 * This file is included in functions.php
 *
 * @package Suffusion
 * @subpackage Admin
 */

global $suffusion_options_file, $suffusion_options, $suffusion_unified_options, $suffusion_options_intro_page, $suffusion_options_theme_skinning_page, $suffusion_options_visual_effects_page, $suffusion_options_sidebars_and_widgets_page, $suffusion_options_blog_features_page, $suffusion_options_templates_page, $wp_version;
$suffusion_options_file = basename(__FILE__);

/**
 * Create the HTML markup for the options.
 *
 * @return void
 */
function suffusion_render_options() {
	global $suffusion_options_intro_page, $suffusion_options_theme_skinning_page, $suffusion_options_visual_effects_page, $suffusion_options_sidebars_and_widgets_page, $suffusion_options_blog_features_page, $suffusion_options_templates_page, $suffusion_options_custom_types_page;
	global $suffusion_intro_options, $suffusion_theme_skinning_options, $suffusion_visual_effects_options, $suffusion_sidebars_and_widgets_options, $suffusion_blog_features_options, $suffusion_templates_options, $suffusion_custom_types_options;
	$suffusion_template_path = get_template_directory();

	$option_page_options = $suffusion_intro_options;
	$options_page = 'theme-options-intro.php';
	if (isset($_REQUEST['tab'])) {
		$options_page = $_REQUEST['tab'];
		if ($options_page == $suffusion_options_theme_skinning_page) {
			include_once($suffusion_template_path . "/admin/theme-options-theme-skinning.php");
			$option_page_options = $suffusion_theme_skinning_options;
		}
		else if ($options_page == $suffusion_options_visual_effects_page) {
			include_once($suffusion_template_path . "/admin/theme-options-visual-effects.php");
			$option_page_options = $suffusion_visual_effects_options;
		}
		else if ($options_page == $suffusion_options_blog_features_page) {
			include_once($suffusion_template_path . "/admin/theme-options-blog-features.php");
			$option_page_options = $suffusion_blog_features_options;
		}
		else if ($options_page == $suffusion_options_sidebars_and_widgets_page) {
			include_once($suffusion_template_path . "/admin/theme-options-sidebars-and-widgets.php");
			$option_page_options = $suffusion_sidebars_and_widgets_options;
		}
		else if ($options_page == $suffusion_options_templates_page) {
			include_once($suffusion_template_path . "/admin/theme-options-templates.php");
			$option_page_options = $suffusion_templates_options;
		}
		else if ($options_page == $suffusion_options_custom_types_page) {
			include_once($suffusion_template_path . "/admin/theme-options-custom-types.php");
			$option_page_options = $suffusion_custom_types_options;
		}
		else {
			include_once($suffusion_template_path . "/admin/theme-options-intro.php");
			$option_page_options = $suffusion_intro_options;
		}
	}
?>
	<div class="wrapper">
		<div class="suf-tabbed-options">
<?php
	//Disabling the version checker because it causes memory issues for some people.
	//echo suffusion_version_checker();
	echo suffusion_translation_checker();
	echo suffusion_bp_checker();
	if ((isset($_GET['updated']) && $_GET['updated'] == true) || (isset($_GET['settings-updated']) && $_GET['settings-updated'] == true)) {
		echo "<div class='updated fade fix'>Your settings have been updated.</div>";
	}

	if (isset($_GET['now-active']) && $_GET['now-active'] == true) {
		echo "<div class='updated fade fix'>Congratulations! Suffusion has been activated.</div>";
	}
		?>
			<div class="suf-header-nav">
				<div class="suf-header-nav-top fix">
					<h2 class='suf-header-1'>Suffusion &ndash; <?php echo SUFFUSION_THEME_VERSION; ?></h2>
					<div class='donate fix'>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal-submit" >
							<input type="hidden" name="cmd" value="_s-xclick"/>
							<input type="hidden" name="hosted_button_id" value="9018267"/>
							<ul>
								<li class='announcements'><a href='http://www.aquoid.com/news'>Announcements</a></li>
								<li class='support'><a href='http://www.aquoid.com/forum'>Support Forum</a></li>
								<li class='showcase'><a href='http://www.aquoid.com/news/showcase/'>Showcase</a></li>
								<li class='coffee'><input type='submit' name='submit' value='Like Suffusion? Buy me a coffee!' /></li>
							</ul>
							<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"/>
						</form>
					</div><!-- donate -->
				</div>
				<div class="suf-options-header-bar fix">
					<ul class='suf-options-header-bar'>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_intro_page) echo 'current-tab'; ?>' id='theme-options-intro' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_intro_page; ?>'>Introduction</a></li>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_theme_skinning_page) echo 'current-tab'; ?>' id='theme-options-theme-skinning' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_theme_skinning_page; ?>'>Theme Skinning</a></li>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_visual_effects_page) echo 'current-tab'; ?>' id='theme-options-visual-effects' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_visual_effects_page; ?>'>Other Graphical Elements</a></li>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_sidebars_and_widgets_page) echo 'current-tab'; ?>' id='theme-options-sidebars-and-widgets' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_sidebars_and_widgets_page; ?>'>Sidebar Configuration</a></li>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_blog_features_page) echo 'current-tab'; ?>' id='theme-options-blog-features' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_blog_features_page; ?>'>Back-end Settings</a></li>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_templates_page) echo 'current-tab'; ?>' id='theme-options-templates' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_templates_page; ?>'>Templates</a></li>
						<li><a class='suf-load-page <?php if ($options_page == $suffusion_options_custom_types_page) echo 'current-tab'; ?>' id='theme-options-custom-types' href='?page=suffusion-options-manager&amp;tab=<?php echo $suffusion_options_custom_types_page; ?>'>Custom Types</a></li>
					</ul>
				</div>
			</div>
<?php
	$renderer = new Suffusion_Options_Renderer($option_page_options, __FILE__);
	$option_structure = $renderer->get_option_structure();
	$renderer->get_options_html($option_structure);
	?>
		</div><!-- suf-tabbed-options -->
	</div><!-- wrapper -->
<?php
}

/**
 * Set up the renderer and initialize the settings.
 *
 * @return void
 */
function suffusion_options_init_fn() {
	global $suffusion_options_intro_page, $suffusion_options_theme_skinning_page, $suffusion_options_visual_effects_page, $suffusion_options_sidebars_and_widgets_page, $suffusion_options_blog_features_page, $suffusion_options_templates_page, $suffusion_options_custom_types_page;
	global $suffusion_intro_options, $suffusion_theme_skinning_options, $suffusion_visual_effects_options, $suffusion_sidebars_and_widgets_options, $suffusion_blog_features_options, $suffusion_templates_options, $suffusion_custom_types_options;
	global $suffusion_options_renderer;
	$options_page = $suffusion_options_intro_page;
	if (isset($_REQUEST['tab'])) {
		$options_page = $_REQUEST['tab'];
	}

	$suffusion_template_path = get_template_directory();
	if ($options_page == $suffusion_options_theme_skinning_page) {
		include_once($suffusion_template_path . "/admin/theme-options-theme-skinning.php");
		$option_page_options = $suffusion_theme_skinning_options;
	}
	else if ($options_page == $suffusion_options_visual_effects_page) {
		include_once($suffusion_template_path . "/admin/theme-options-visual-effects.php");
		$option_page_options = $suffusion_visual_effects_options;
	}
	else if ($options_page == $suffusion_options_blog_features_page) {
		include_once($suffusion_template_path . "/admin/theme-options-blog-features.php");
		$option_page_options = $suffusion_blog_features_options;
	}
	else if ($options_page == $suffusion_options_sidebars_and_widgets_page) {
		include_once($suffusion_template_path . "/admin/theme-options-sidebars-and-widgets.php");
		$option_page_options = $suffusion_sidebars_and_widgets_options;
	}
	else if ($options_page == $suffusion_options_templates_page) {
		include_once($suffusion_template_path . "/admin/theme-options-templates.php");
		$option_page_options = $suffusion_templates_options;
	}
	else if ($options_page == $suffusion_options_custom_types_page) {
		include_once($suffusion_template_path . "/admin/theme-options-custom-types.php");
		$option_page_options = $suffusion_custom_types_options;
	}
	else {
		include_once($suffusion_template_path . "/admin/theme-options-intro.php");
		$option_page_options = $suffusion_intro_options;
	}

	$suffusion_options_renderer = new Suffusion_Options_Renderer($option_page_options, __FILE__);
	$option_structure = $suffusion_options_renderer->get_option_structure();
	$suffusion_options_renderer->initialize_settings($option_structure);
	if (count($option_structure) > 1) {
		$base = array_slice($option_structure, 1, 1);
		$key = key($base);
		if (isset($base[$key]['help'])) {
			add_contextual_help('appearance_page_suffusion-options-manager', "<h3>{$base[$key]['name']}</h3>".$base[$key]['help']);
		}
	}
}

/**
 * Loads JavaScript relevant only to Suffusion's admin panels.
 *
 * @return void
 */
function suffusion_admin_script_loader() {
	global $wp_version;
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('suggest');
	wp_enqueue_script('suffusion-jquery-jscolor', get_template_directory_uri().'/admin/js/jscolor/jscolor.js', array('jquery'));

	if ($wp_version < 3.1) {
		wp_enqueue_script('suffusion-jquery-ui-custom', get_template_directory_uri().'/admin/js/jquery-ui/jquery-ui-1.7.3.custom.js', array('jquery-ui-core'), SUFFUSION_THEME_VERSION);
	}
	else if ($wp_version >= 3.1 && $wp_version < 3.2) {
		wp_enqueue_script('suffusion-jquery-ui-custom', get_template_directory_uri().'/admin/js/jquery-ui/jquery-ui-1.8.7.custom.js', array('jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-position'), SUFFUSION_THEME_VERSION);
	}
	else {
		wp_enqueue_script('suffusion-jquery-ui-custom', get_template_directory_uri().'/admin/js/jquery-ui/jquery-ui-1.8.12.custom.js', array('jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-position'), SUFFUSION_THEME_VERSION);
	}

	wp_enqueue_script('suffusion-admin', get_template_directory_uri().'/admin/js/admin.js', array('suffusion-jquery-ui-custom'), SUFFUSION_THEME_VERSION);

	$stored_options = get_option('suffusion_options');
	if (isset($stored_options) && is_array($stored_options) && isset($stored_options['last-set-section'])) {
		$category = $stored_options['last-set-section'];
	}
	else {
		$category = 'welcome';
	}
	$js_array = array(
		'category' => $category,
	);
	wp_localize_script('suffusion-admin', 'Suffusion_Admin_JS', $js_array);
}

function suffusion_admin_style_loader() {
	wp_enqueue_style('suffusion-admin-jq', get_template_directory_uri().'/admin/js/jquery-ui/css/jquery-ui-1.7.3.custom.css', array(), SUFFUSION_THEME_VERSION);
	wp_enqueue_style('suffusion-admin', get_template_directory_uri().'/admin/admin.css', array('suffusion-admin-jq'), SUFFUSION_THEME_VERSION);
}

function suffusion_admin_init() {
	register_setting('suffusion_post_type_options', 'suffusion_post_types');
	register_setting('suffusion_taxonomy_options', 'suffusion_taxonomies');
}

add_action('wp_ajax_suffusion_save_custom_post_type', 'suffusion_save_custom_post_type');
function suffusion_save_custom_post_type() {
	global $suffusion_post_type_options, $suffusion_post_type_labels, $suffusion_post_type_args, $suffusion_post_type_supports;
	$post_type_index = $_POST['post_type_index'];
	$suffusion_post_type = $_POST['suffusion_post_type'];

	check_ajax_referer('add-edit-post-type-suffusion', 'add-edit-post-type-wpnonce');
	$suffusion_post_types = get_option('suffusion_post_types');
	$valid = suffusion_validate_custom_type_form($suffusion_post_type, array('options' => $suffusion_post_type_options, 'labels' => $suffusion_post_type_labels, 'args' => $suffusion_post_type_args, 'supports' => $suffusion_post_type_supports));
	if ($valid) {
		if ($suffusion_post_types == null || !is_array($suffusion_post_types)) {
				$suffusion_post_types = array();
		}
		if (isset($post_type_index) && $post_type_index != '' && $post_type_index != -5) {
			$suffusion_post_types[$post_type_index] = $suffusion_post_type;
			$index = $post_type_index;
		}
		else {
			$suffusion_post_types[] = $suffusion_post_type;
			$index = max(array_keys($suffusion_post_types));
		}

		update_option('suffusion_post_types', $suffusion_post_types);
		suffusion_display_custom_post_type($index, "Post Type saved successfully");
	}
	else {
		suffusion_display_custom_post_type(-1, "NOT SAVED: Please populate all required fields");
	}
	suffusion_display_all_custom_post_types();
}

add_action('wp_ajax_suffusion_display_all_custom_post_types', 'suffusion_display_all_custom_post_types');
function suffusion_display_all_custom_post_types() {
	$delete = "";
	if (isset($_POST['processing_function'])) {
		$processing_function = $_POST['processing_function'];
	}
	else {
		$processing_function = "";
	}
	if ($processing_function == 'delete') {
		$delete = suffusion_delete_post_type();
		$delete = $delete == "" ? null : "<div id='message' class='updated fade'><p><strong>$delete</strong></p></div>";
	}
	else if ($processing_function == 'delete_all') {
		$delete = suffusion_delete_all_custom_post_types();
		$delete = $delete == "" ? null : "<div id='message' class='updated fade'><p><strong>$delete</strong></p></div>";
	}
	$suffusion_post_types = get_option('suffusion_post_types');
?>
	<div class='suf-custom-post-types-section suf-section'>
		<table class="form-table">
			<tr>
				<td>
		<?php
		echo $delete;
		echo wp_nonce_field('custom_post_types_suffusion', 'custom_post_types_wpnonce', true, false);
		?>
		<p>The following post types exist. You can edit / delete any of these. Note that if you edit / delete the name of any of these, it will not delete associated posts. You can recreate these post types again and everything will be back to normal:</p>
		<input type="hidden" name="post_type_index" value="" />
		<input type="hidden" name="formaction" value="default" />

		<table class='custom-type-list'>
			<tr>
				<th>Post Type</th>
				<th>Name</th>
				<th>Singular Name</th>
				<th>Action</th>
			</tr>
<?php
	if (is_array($suffusion_post_types)) {
		foreach ($suffusion_post_types as $id => $custom_post_type) {
?>
			<tr>
				<td><?php echo $custom_post_type['post_type']; ?></td>
				<td><?php echo $custom_post_type['labels']['name']; ?></td>
				<td><?php echo $custom_post_type['labels']['singular_name']; ?></td>
				<td><a class='edit-post-type' id='edit-post-type-<?php echo $id; ?>' href='<?php echo site_url(); ?>/wp-admin/admin-ajax.php'>Edit</a> | <a class='delete-post-type' id='delete-post-type-<?php echo $id; ?>' href='<?php echo site_url(); ?>/wp-admin/admin-ajax.php'>Delete</a></td>
			</tr>
<?php
		}
	}
?>
		</table>

		<div class="suf-button-toggler fix">
			<a href='#' class='suf-button-toggler-custom-post-types'><span class='suf-button-toggler-custom-post-types'>Save / Reset</span></a>
		</div>
		<div class="suf-button-bar suf-button-bar-custom-post-types">
			<h2 class="fix"><a href='#'><img src='<?php echo get_template_directory_uri(); ?>/admin/images/remove.png' alt='Close' /></a>Custom Type Actions</h2>
			<label><input name="delete-all-custom-post-types" type="button" value="Delete All Custom Post Types" class="button delete-all-custom-post-types" /></label>
		</div><!-- suf-button-bar -->
				</td>
			</tr>
		</table>
	</div><!-- .suf-custom-post-types-section -->
<?php
	if ($processing_function == 'delete' || $processing_function == 'delete_all') {
		suffusion_display_custom_post_type(-1);
	}
}

add_action('wp_ajax_suffusion_modify_post_type_layout', 'suffusion_modify_post_type_layout');
function suffusion_modify_post_type_layout() {
	$layout_positions = array('hide' => 'Do not show', 'tleft' => 'Below title, left', 'tright' => 'Below title, right',
		'bleft' => 'Below content, left', 'bright' => 'Below content, right');
	$delete = "";
	$processing_function = $_POST['processing_function'];
	if (isset($processing_function) && $processing_function == 'delete') {
		$delete = suffusion_delete_post_type();
		$delete = $delete == "" ? null : "<div id='message' class='updated fade'><p><strong>$delete</strong></p></div>";
	}
	else if (isset($processing_function) && $processing_function == 'delete_all') {
		$delete = suffusion_delete_all_custom_post_types();
		$delete = $delete == "" ? null : "<div id='message' class='updated fade'><p><strong>$delete</strong></p></div>";
	}
	$suffusion_post_types = get_option('suffusion_post_types');
?>
	<div class='suf-modify-post-type-layout-section suf-section'>
		<table class="form-table">
			<tr>
				<td>
		<?php echo $delete; ?>
		<p>The following post types exist. You can edit / delete any of these. Note that if you edit / delete the name of any of these, it will not delete associated posts. You can recreate these post types again and everything will be back to normal:</p>
		<input type="hidden" name="post_type_index" value="" />
		<input type="hidden" name="formaction" value="default" />

		<table class='custom-type-list'>
			<tr>
				<th>Post Type</th>
				<th>Position of Elements</th>
			</tr>
<?php
	if (is_array($suffusion_post_types)) {
		foreach ($suffusion_post_types as $id => $custom_post_type) {
?>
			<tr>
				<td><?php echo $custom_post_type['post_type']; ?></td>
				<td>
					<?php
						$custom_post_type_supports = $custom_post_type['options'];
						if (in_array('author', $custom_post_type_supports)) {
							echo "Author Position: ";
						}
					?>
				</td>
				<td><?php echo $custom_post_type['labels']['singular_name']; ?></td> -->
			</tr>
<?php
		}
	}
?>
		</table>

		<div class="suf-button-toggler fix">
			<a href='#' class='suf-button-toggler-modify-post-type'><span class='suf-button-toggler-modify-post-type'>Save / Reset</span></a>
		</div>
		<div class="suf-button-bar suf-button-bar-modify-post-type">
			<h2 class="fix"><a href='#'><img src='<?php echo get_template_directory_uri(); ?>/admin/images/remove.png' alt='Close' /></a>Custom Type Actions</h2>
			<label><input name="save-post-type-layouts" type="button" value="Save Post Type Layouts" class="button delete-all-custom-post-types" /></label>
		</div><!-- suf-button-bar -->
				</td>
			</tr>
		</table>
	</div><!-- .suf-modify-post-type-layout-section -->
<?php
	if ($processing_function == 'delete' || $processing_function == 'delete_all') {
		suffusion_display_custom_post_type(-1);
	}
}

function suffusion_delete_post_type() {
	// For some reason a blank nonce is being fetched here even if I do $_POST['custom_post_types_wpnonce']. Weird
	check_ajax_referer('custom_post_types_suffusion', 'custom_post_types_wpnonce');
	$post_type_index = $_POST['post_type_index'];
	$ret = "";
	if (isset($post_type_index)) {
		$suffusion_post_types = get_option('suffusion_post_types');
		if (is_array($suffusion_post_types)) {
			unset($suffusion_post_types[$post_type_index]);
			update_option('suffusion_post_types', $suffusion_post_types);
			$ret = "Post type deleted.";
		}
		else {
			$ret = "Failed to delete post type. Post types are not stored as an array in the database.";
		}
	}
	return $ret;
}

function suffusion_delete_all_custom_post_types() {
	check_ajax_referer('custom_post_types_suffusion', 'custom_post_types_wpnonce');
	$option = get_option('suffusion_post_types');
	if (isset($option) && is_array($option)) {
		$ret = delete_option('suffusion_post_types');
		if ($ret) {
			$ret = "All post types deleted.";
		}
		else {
			$ret = "Failed to delete post types.";
		}
	}
	else {
		$ret = "No post types exist!";
	}
	return $ret;
}

add_action('wp_ajax_suffusion_display_custom_post_type', 'suffusion_display_custom_post_type');
function suffusion_display_custom_post_type($index = null, $msg = null) {
	global $suffusion_post_type_labels, $suffusion_post_type_args, $suffusion_post_type_supports, $suffusion_post_type_options;
	if (isset($_POST['post_type_index'])) {
		$post_type_index = $_POST['post_type_index'];
	}
	else {
		$post_type_index = -5;
	}
	$suffusion_post_types = get_option('suffusion_post_types');
	if (is_array($suffusion_post_types) && $post_type_index != '' && $post_type_index != -5) {
		$suffusion_post_type = $suffusion_post_types[$post_type_index];
	}
	else if (is_array($suffusion_post_types) && ($post_type_index =='' || $post_type_index == -5) && ($index > -1)) {
		$suffusion_post_type = $suffusion_post_types[$index];
	}
	else if (isset($_POST['suffusion_post_type']) && ($post_type_index =='' || $post_type_index == -5) && $index == -1) {
		$suffusion_post_type = $_POST['suffusion_post_type'];
	}
	else {
		$suffusion_post_type = array('labels' => $suffusion_post_type_labels, 'args' => $suffusion_post_type_args, 'supports' => $suffusion_post_type_supports);
		foreach ($suffusion_post_type as $parameter_type => $parameters) {
			foreach ($parameters as $parameter => $parameter_value) {
				$suffusion_post_type[$parameter_type][$parameter] = FALSE;
			}
		}
	}

	$msg = $msg == null ? null : "<div id='message' class='updated fade'><p><strong>$msg</strong></p></div>";
?>
<div class='suf-post-type-edit-section suf-section'>
	<table class="form-table">
		<tr>
			<td>
	<?php
	echo $msg;
	echo wp_nonce_field('add-edit-post-type-suffusion', 'add-edit-post-type-wpnonce', true, false);
	?>
	<input type='hidden' name='post_type_index' id='post_type_index' value="<?php echo $post_type_index; ?>"/>
	<table>
		<?php
			foreach ($suffusion_post_type_options as $option) {
		?>
		<tr>
			<?php suffusion_options_process_custom_type_option($option, null, $suffusion_post_type, 'suffusion_post_type'); ?>
		</tr>
		<?php
			}
		?>
	</table>

	<table class="custom-type-table">
		<tr>
			<col class='half-width' />
			<col/>
		</tr>
		<tr valign='top'>
			<th scope='row'>Display information</th>
			<th scope='row'>Arguments</th>
		</tr>
		<tr>
			<td rowspan='2'>
				<table>
					<?php foreach ($suffusion_post_type_labels as $label) { ?>
					<tr>
						<?php suffusion_options_process_custom_type_option($label, 'labels', $suffusion_post_type, 'suffusion_post_type'); ?>
					</tr>
					<?php } ?>
				</table>
			</td>

			<td>
				<table>
					<?php foreach ($suffusion_post_type_args as $arg) { ?>
					<tr>
						<?php suffusion_options_process_custom_type_option($arg, 'args', $suffusion_post_type, 'suffusion_post_type'); ?>
					</tr>
					<?php } ?>
				</table>
			</td>
		</tr>

		<tr>
			<td>
				<table width='100%'>
					<tr>
						<th>Supports</th>
					</tr>

					<tr>
						<td>
							<table>
								<?php foreach ($suffusion_post_type_supports as $support) { ?>
								<tr>
									<?php suffusion_options_process_custom_type_option($support, 'supports', $suffusion_post_type, 'suffusion_post_type'); ?>
								</tr>
								<?php } ?>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<div class="suf-button-toggler fix">
		<a href='#' class='suf-button-toggler-save-edit-post-type'><span class='suf-button-toggler-save-edit-post-type'>Save / Reset</span></a>
	</div>
	<div class="suf-button-bar suf-button-bar-save-edit-post-type">
		<h2 class="fix"><a href='#'><img src='<?php echo get_template_directory_uri(); ?>/admin/images/remove.png' alt='Close' /></a>Custom Type Actions</h2>
		<label><input name="save-post-type-edit" type="button" value="Save changes" class="button save-post-type-edit" /></label>
		<label><input name="reset-post-type-edit" type="button" value="Clear all fields" class="button reset-post-type-edit" /></label>
		<input type="hidden" name="formaction" value="default" />
		<input type="hidden" name="formcategory" value="add-edit-post-type" />
	</div><!-- suf-button-bar -->
			</td>
		</tr>
		</table>
</div><!-- suf-post-type-edit-section -->
<?php
}

add_action('wp_ajax_suffusion_save_custom_taxonomy', 'suffusion_save_custom_taxonomy');
function suffusion_save_custom_taxonomy() {
	global $suffusion_taxonomy_options, $suffusion_taxonomy_labels, $suffusion_taxonomy_args;
	$taxonomy_index = $_POST['taxonomy_index'];
	$suffusion_taxonomy = $_POST['suffusion_taxonomy'];
	$valid = suffusion_validate_custom_type_form($suffusion_taxonomy, array('options' => $suffusion_taxonomy_options, 'labels' => $suffusion_taxonomy_labels, 'args' => $suffusion_taxonomy_args));
	if ($valid) {
		$suffusion_taxonomies = get_option('suffusion_taxonomies');
		if ($suffusion_taxonomies == null || !is_array($suffusion_taxonomies)) {
			$suffusion_taxonomies = array();
		}
		if (isset($taxonomy_index) && $taxonomy_index != '' && $taxonomy_index != -5) {
			$suffusion_taxonomies[$taxonomy_index] = $suffusion_taxonomy;
			$index = $taxonomy_index;
		}
		else {
			$suffusion_taxonomies[] = $suffusion_taxonomy;
			$index = max(array_keys($suffusion_taxonomies));
		}

		update_option('suffusion_taxonomies', $suffusion_taxonomies);
		suffusion_display_custom_taxonomy($index, "Taxonomy saved successfully");
	}
	else {
		suffusion_display_custom_taxonomy(-1, "NOT SAVED: Please populate all required fields");
	}
	suffusion_display_all_custom_taxonomies();
}

add_action('wp_ajax_suffusion_display_all_custom_taxonomies', 'suffusion_display_all_custom_taxonomies');
function suffusion_display_all_custom_taxonomies() {
	$delete = "";
	if (isset($_POST['processing_function'])) {
		$processing_function = $_POST['processing_function'];
	}
	else {
		$processing_function = "";
	}
	if ($processing_function == 'delete') {
		$delete = suffusion_delete_taxonomy();
		$delete = $delete == "" ? null : "<div id='message' class='updated fade'><p><strong>$delete</strong></p></div>";
	}
	else if ($processing_function == 'delete_all') {
		$delete = suffusion_delete_all_custom_taxonomies();
		$delete = $delete == "" ? null : "<div id='message' class='updated fade'><p><strong>$delete</strong></p></div>";
	}
	$suffusion_taxonomies = get_option('suffusion_taxonomies');
?>
	<div class='suf-custom-taxonomies-section suf-section'>
		<table class="form-table">
			<tr>
				<td>
		<?php
		echo $delete;
		echo wp_nonce_field('custom-taxonomies-suffusion', 'custom-taxonomies-wpnonce', true, false);
		?>
		<p>The following taxonomies exist. You can edit / delete any of these. Note that if you edit / delete the name of any of these, it will not delete associated posts. You can recreate these taxonomies again and everything will be back to normal:</p>
		<input type="hidden" name="taxonomy_index" value="" />
		<input type="hidden" name="formaction" value="default" />

		<table class='custom-type-list'>
			<tr>
				<th>Taxonomy</th>
				<th>Object Type</th>
				<th>Name</th>
				<th>Singular Name</th>
				<th>Action</th>
			</tr>
<?php
	if (is_array($suffusion_taxonomies)) {
		foreach ($suffusion_taxonomies as $id => $custom_taxonomy) {
?>
			<tr>
				<td><?php echo $custom_taxonomy['taxonomy']; ?></td>
				<td><?php echo $custom_taxonomy['object_type']; ?></td>
				<td><?php echo $custom_taxonomy['labels']['name']; ?></td>
				<td><?php echo $custom_taxonomy['labels']['singular_name']; ?></td>
				<td><a class='edit-taxonomy' id='edit-taxonomy-<?php echo $id; ?>' href='<?php echo site_url(); ?>/wp-admin/admin-ajax.php'>Edit</a> | <a class='delete-taxonomy' id='delete-taxonomy-<?php echo $id; ?>' href='<?php echo site_url(); ?>/wp-admin/admin-ajax.php'>Delete</a></td>
			</tr>
<?php
		}
	}
?>
		</table>

		<div class="suf-button-toggler fix">
			<a href='#' class='suf-button-toggler-view-taxonomies'><span class='suf-button-toggler-view-taxonomies'>Save / Reset</span></a>
		</div>
		<div class="suf-button-bar suf-button-bar-view-taxonomies">
			<h2 class='fix'><a href='#'><img src='<?php echo get_template_directory_uri(); ?>/admin/images/remove.png' alt='Close' /></a>Custom Type Actions</h2>
			<label><input name="delete-all-custom-taxonomies" type="button" value="Delete All Custom Taxonomies" class="button delete-all-custom-taxonomies" /></label>
		</div><!-- suf-button-bar -->
				</td>
			</tr>
			</table>
	</div><!-- .suf-custom-taxonomies-section -->
<?php
	if ($processing_function == 'delete' || $processing_function == 'delete_all') {
		suffusion_display_custom_taxonomy(-1);
	}
}

add_action('wp_ajax_suffusion_display_custom_taxonomy', 'suffusion_display_custom_taxonomy');
function suffusion_display_custom_taxonomy($index = null, $msg = null) {
	global $suffusion_taxonomy_labels, $suffusion_taxonomy_args, $suffusion_taxonomy_options;
	if (isset($_POST['taxonomy_index'])) {
		$taxonomy_index = $_POST['taxonomy_index'];
	}
	else {
		$taxonomy_index = -5;
	}
	$suffusion_taxonomies = get_option('suffusion_taxonomies');
	if (is_array($suffusion_taxonomies) && $taxonomy_index != '' && $taxonomy_index != -5) {
		$suffusion_taxonomy = $suffusion_taxonomies[$taxonomy_index];
	}
	else if (is_array($suffusion_taxonomies) && ($taxonomy_index =='' || $taxonomy_index == -5) && ($index > -1)) {
		$suffusion_taxonomy = $suffusion_taxonomies[$index];
	}
	else if (isset($_POST['suffusion_taxonomy']) && ($taxonomy_index =='' || $taxonomy_index == -5) && $index == -1) {
		$suffusion_taxonomy = $_POST['suffusion_taxonomy'];
	}
	else {
		$suffusion_taxonomy = array('labels' => $suffusion_taxonomy_labels, 'args' => $suffusion_taxonomy_args);
		foreach ($suffusion_taxonomy as $parameter_type => $parameters) {
			foreach ($parameters as $parameter => $parameter_value) {
				$suffusion_taxonomy[$parameter_type][$parameter] = FALSE;
			}
		}
	}

	$msg = $msg == null ? null : "<div id='message' class='updated fade'><p><strong>$msg</strong></p></div>";
?>
<div class='suf-taxonomy-edit-section suf-section'>
	<table class="form-table">
		<tr>
			<td>
	<?php
	echo $msg;
	echo wp_nonce_field('add-edit-taxonomy-suffusion', 'add-edit-taxonomy-wpnonce', true, false);
	?>
	<input type='hidden' name='taxonomy_index' id='taxonomy_index' value="<?php echo $taxonomy_index; ?>"/>
	<table>
	<?php
		foreach ($suffusion_taxonomy_options as $option) {
	?>
	<tr>
		<?php suffusion_options_process_custom_type_option($option, null, $suffusion_taxonomy, 'suffusion_taxonomy'); ?>
	</tr>
	<?php
		}
	?>
	</table>

	<table class="custom-type-table">
		<tr>
			<col class='half-width' />
			<col/>
		</tr>
		<tr valign='top'>
			<th scope='row'>Display information</th>
			<th scope='row'>Arguments</th>
		</tr>
		<tr>
			<td>
				<table>
					<?php foreach ($suffusion_taxonomy_labels as $label) { ?>
					<tr>
						<?php suffusion_options_process_custom_type_option($label, 'labels', $suffusion_taxonomy, 'suffusion_taxonomy'); ?>
					</tr>
					<?php } ?>
				</table>
			</td>

			<td>
				<table>
					<?php foreach ($suffusion_taxonomy_args as $arg) { ?>
					<tr>
						<?php suffusion_options_process_custom_type_option($arg, 'args', $suffusion_taxonomy, 'suffusion_taxonomy'); ?>
					</tr>
					<?php } ?>
				</table>
			</td>
		</tr>
	</table>

	<div class="suf-button-toggler fix">
		<a href='#' class='suf-button-toggler-view-edit-taxonomies'><span class='suf-button-toggler-view-edit-taxonomies'>Save / Reset</span></a>
	</div>
	<div class="suf-button-bar suf-button-bar-view-edit-taxonomies">
		<h2>Custom Type Actions</h2>
		<label><input name="save-taxonomy-edit" type="button" value="Save changes" class="button save-taxonomy-edit" /></label>
		<label><input name="reset-taxonomy-edit" type="button" value="Clear all fields" class="button reset-taxonomy-edit" /></label>
		<input type="hidden" name="formaction" value="default" />
		<input type="hidden" name="formcategory" value="add-edit-taxonomy" />
	</div><!-- suf-button-bar -->
			</td>
		</tr>
		</table>
</div><!-- suf-taxonomy-edit-section -->
<?php
}

function suffusion_delete_taxonomy() {
	$taxonomy_index = $_POST['taxonomy_index'];
	$ret = "";
	if (isset($taxonomy_index)) {
		$suffusion_taxonomies = get_option('suffusion_taxonomies');
		if (is_array($suffusion_taxonomies)) {
			unset($suffusion_taxonomies[$taxonomy_index]);
			update_option('suffusion_taxonomies', $suffusion_taxonomies);
			$ret = "Taxonomy deleted.";
		}
		else {
			$ret = "Failed to delete taxonomy. Taxonomies are not stored as an array in the database.";
		}
	}
	return $ret;
}

function suffusion_delete_all_custom_taxonomies() {
	$option = get_option('suffusion_taxonomies');
	if (isset($option) && is_array($option)) {
		$ret = delete_option('suffusion_taxonomies');
		if ($ret) {
			$ret = "All taxonomies deleted.";
		}
		else {
			$ret = "Failed to delete taxonomies.";
		}
	}
	else {
		$ret = "No taxonomies exist!";
	}
	return $ret;
}

function suffusion_validate_custom_type_form($custom_type, $validation_options) {
	foreach ($validation_options as $option_type => $option_set) {
		if ($option_type == 'options') {
			$to_validate = $custom_type;
		}
		else {
			if (isset($custom_type[$option_type])) {
				$to_validate = $custom_type[$option_type];
			}
		}
		foreach ($option_set as $option) {
			if (isset($option['reqd'])) {
				if (isset($to_validate[$option['name']]) && trim($to_validate[$option['name']]) == '') {
					return false;
				}
			}
		}
	}
	return true;
}

/**
 * Checks if a new version of the theme is available. If so, a notification is displayed on the top of the Suffusion admin screens,
 * with a link to the release notes of the latest version.
 *
 * @return string
 */
function suffusion_version_checker() {
	$local_version = SUFFUSION_THEME_VERSION;

	$feed_url = "";
	if (is_child_theme()) {
		$local_theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
		if (isset($local_theme_data['Announcements Feed'])) {
			$feed_url = $local_theme_data['Announcements Feed'];
		}
	}
	if ($feed_url == "") {
		$local_theme_data = get_theme_data(trailingslashit(get_template_directory()).'style.css');
		if (isset($local_theme_data['Announcements Feed'])) {
			$feed_url = $local_theme_data['Announcements Feed'];
		}
	}

	$rss = fetch_feed($feed_url);
	if (is_wp_error($rss)) {
		// The notifier, upon failure doesn't serve any useful purpose, so we will just suppress the message instead of showing a failure.
		return "";
	}

	// Fetch the last published item from this feed.
	$rss_items = $rss->get_items(0, 1);
	if (count($rss_items) == 0) {
		$update_message = "";
	}
	else {
		$item = $rss_items[0];
		$latest_version_via_rss = $item->get_title();

		//Determine the latest released version from the feed. A version has a structure #.#.#.a (accounting for beta releases)
		$version_regex = "/[0-9\.]+[a-z]*/";
		preg_match($version_regex, $latest_version_via_rss, $latest_version_via_rss);
		$latest_version_via_rss = $latest_version_via_rss[0];

		if (strcmp($latest_version_via_rss, $local_version) > 0) {
			$update_message = "<div class='updated'>A new version of Suffusion is available! Click to read the release notes and determine if you want to update: <a href='".$item->get_link()."'>".$item->get_title()."</a>.</div>";
		}
		else {
			$update_message = "";
		}
	}

	return $update_message;
}

/**
 * Checks if you are using a non-American-English version of the theme. If so, it checks where your translations are.
 * If you are using the core Suffusion theme:
 *  1. This prompts you to move your translations if found to a child theme
 *  2. Otherwise it provides a link to the page where translations can be got.
 * If you are using a child theme of Suffusion:
 *  1. If your translation file is in the core theme folder it suggests to move it to the child theme
 *  2. If there are no translation files in the core theme folder or the child theme folder, it points you to the translation page.
 *
 * @return string
 */
function suffusion_translation_checker() {
	if (!defined('WPLANG') || WPLANG == 'en' || WPLANG == '') {
		$lang = 'en_US';
	}
	else {
		$lang = WPLANG;
	}

	$message = "";
	if ($lang != 'en_US') {
		if (!is_child_theme()) {
			if (file_exists(get_template_directory()."/translation/$lang.mo")) {
				$message = "<div class='updated'>You are using a version of WordPress that is not in American English, and your translation files are in the theme's main folder.
					You will lose these files if you upgrade the theme. <a href='http://www.aquoid.com/news/themes/suffusion/translating-suffusion/#use-basic'>Move your translations to a child theme</a> instead.</div>";
			}
			else {
				$message = "<div class='updated'>You are using a version of WordPress that is not in American English.
					Translations for your language <a href='http://www.aquoid.com/news/themes/suffusion/translating-suffusion/'>might be available</a>.</div>";
			}
		}
		else {
			if (file_exists(get_template_directory()."/translation/$lang.mo") && !file_exists(get_stylesheet_directory()."/translation/$lang.mo")) {
				$message = "<div class='updated'>Your translation files are in Suffusion's folder. You will lose these files if you upgrade the theme.
					<a href='http://www.aquoid.com/news/themes/suffusion/translating-suffusion/#use-basic'>Move your translations to a child theme</a> instead.</div>";
			}
			else if (!file_exists(get_stylesheet_directory()."/translation/$lang.mo")) {
				$message = "<div class='updated'>You are using a version of WordPress that is not in American English.
					Translations for your language <a href='http://www.aquoid.com/news/themes/suffusion/translating-suffusion/'>might be available</a>.</div>";
			}
		}
	}
	return $message;
}

/**
 * Determines if you are running BP. If so, and if you don't have the Suffusion BuddyPress Pack installed, it directs you to install the same.
 * If the plugin is installed and you are not running it on a child theme, it recommends you to switch to a child theme.
 *
 * @return string
 */
function suffusion_bp_checker() {
	global $bp;
	$message = "";
	if (isset($bp)) {// Using BP
		if (!class_exists('Suffusion_BP_Pack')) {
			$message = "<div class='updated'>You are using BuddyPress. Please install the <a href='http://wordpress.org/extend/plugins/suffusion-buddypress-pack'>Suffusion BuddyPress Pack</a> for best results.
				See the <a href='http://www.aquoid.com/news/plugins/suffusion-buddypress-pack/'>plugin's home page</a> for further instructions.</div>";
		}
		else if (!is_child_theme()) {
			$message = "<div class='updated'>The <a href='http://wordpress.org/extend/plugins/suffusion-buddypress-pack'>Suffusion BuddyPress Pack</a> works best in a child theme.
				See the <a href='http://www.aquoid.com/news/plugins/suffusion-buddypress-pack/'>plugin's home page</a> for further instructions.</div>";
		}
	}
	return $message;
}

function suffusion_options_process_custom_type_option($option, $section, $suffusion_custom_type, $custom_type_name) {
	if (is_array($option)) {
		$required = "";
		if (isset($option['reqd'])) {
			$required = " <span class='note'>[Required *]</span> ";
		}
		switch ($option['type']) {
			case 'text':
				echo "<td>".$option['desc'].$required."</td>";
				if ($section != null) {
					if (isset($option['name']) && isset($suffusion_custom_type[$section][$option['name']])) {
						echo "<td><input name='{$custom_type_name}[$section][".$option['name']."]' type='text' value=\"".$suffusion_custom_type[$section][$option['name']]."\"/></td>";
					}
					else {
						echo "<td><input name='{$custom_type_name}[$section][".$option['name']."]' type='text' value=\"\"/></td>";
					}
				}
				else {
					if (isset($option['name']) && isset($suffusion_custom_type[$option['name']])) {
						echo "<td><input name='{$custom_type_name}[".$option['name']."]' type='text' value=\"".$suffusion_custom_type[$option['name']]."\"/></td>";
					}
					else {
						echo "<td><input name='{$custom_type_name}[".$option['name']."]' type='text' value=\"\"/></td>";
					}
				}
				break;

			case 'checkbox':
?>
		<td colspan='2'>
		<?php
				if ($section != null) {
		?>
			<input name='<?php echo $custom_type_name; ?>[<?php echo $section; ?>][<?php echo $option['name'];?>]' type='checkbox' value='1' <?php if (isset($suffusion_custom_type[$section][$option['name']])) checked('1', $suffusion_custom_type[$section][$option['name']]); ?> />
		<?php
				}
				else {
		?>
			<input name='<?php echo $custom_type_name; ?>[<?php echo $option['name'];?>]' type='checkbox' value='1' <?php if (isset($suffusion_custom_type[$option['name']])) checked('1', $suffusion_custom_type[$option['name']]); ?> />
		<?php
				}
		?>
			&nbsp;&nbsp;<?php echo $option['desc'].$required;?>
		</td>
<?php
		        break;

			case 'select':
?>
		<td><?php echo $option['desc'].$required;?></td>
		<td>
		<?php
				if ($section != null) {
					if (!isset($suffusion_custom_type[$section][$option['name']]) || $suffusion_custom_type[$section][$option['name']] == null) {
						$value = $option['std'];
					}
					else {
						$value = $suffusion_custom_type[$section][$option['name']];
					}
		?>
			<select name='<?php echo $custom_type_name; ?>[<?php echo $section; ?>][<?php echo $option['name'];?>]' >
		<?php
					foreach ($option['options'] as $dd_value => $dd_display) {
		?>
				<option value='<?php echo $dd_value;?>' <?php selected($value, $dd_value); ?> ><?php echo $dd_display; ?></option>
		<?php
					}
		?>

			</select>
		<?php
				}
				else {
					if (!isset($suffusion_custom_type[$option['name']]) || $suffusion_custom_type[$option['name']] == null) {
						$value = $option['std'];
					}
					else {
						$value = $suffusion_custom_type[$option['name']];
					}
		?>
			<select name='<?php echo $custom_type_name; ?>[<?php echo $option['name'];?>]' >
		<?php
					foreach ($option['options'] as $dd_value => $dd_display) {
		?>
				<option value='<?php echo $dd_value;?>' <?php selected($value, $dd_value); ?>><?php echo $dd_display; ?></option>
		<?php
					}
		?>

			</select>
		<?php
				}
		?>
		</td>
<?php
		        break;
		}
	}
}

if ($wp_version >= 3.1) {
	add_action('wp_ajax_suffusion_quick_search', 'suffusion_quick_search');
}

/**
 * Helps search for options from the admin panel. This lazy-loads the options files to avoid burdening the server.
 *
 * @return void
 */
function suffusion_quick_search() {
	global $suffusion_intro_options, $suffusion_theme_skinning_options, $suffusion_visual_effects_options, $suffusion_sidebars_and_widgets_options, $suffusion_blog_features_options, $suffusion_templates_options;
	$q = $_REQUEST['term'];

	include_once(get_template_directory().'/admin/theme-options.php');
	$inbuilt_options = array('intro' => $suffusion_intro_options, 'theme-skinning' => $suffusion_theme_skinning_options, 'visual-effects' => $suffusion_visual_effects_options,
		'sidebars-and-widgets' => $suffusion_sidebars_and_widgets_options, 'blog-features' => $suffusion_blog_features_options, 'templates' => $suffusion_templates_options
	);

	$result = array();
	foreach ($inbuilt_options as $file => $options) {
		$qualifier_root = "";
		$qualifier_branch = "";
		foreach ($options as $option) {
			if (isset($option['type']) && $option['type'] == 'sub-section-2') {
				$qualifier_root = $option['name'];
			}
			if (isset($option['type']) && $option['type'] == 'sub-section-3') {
				$qualifier_branch = $option['name'];
			}
			$qualifier = " ($qualifier_root > $qualifier_branch)";
			if (isset($option['name']) && isset($option['id'])) {
				$key = $option['name'];
				$id = $option['id'];
				$parent = $option['parent'];
				$desc = isset($option['desc']) ? $option['desc'] : '';
				$desc = str_replace(array("\r\n", "\r", "\n", "\t"), '', $desc);
				$desc = str_replace(array('  ', '   ', '    ', '     '), ' ', $desc);
				$url = "?page=suffusion-options-manager&amp;tab=theme-options-$file.php#$parent";
				if (strpos(strtolower($key), $q) !== false || strpos(strtolower($desc), $q) !== false) {
					$desc = strip_tags($desc);
					$desc_arr = explode(' ', $desc);
					if (count($desc_arr) > 10) {
						$desc_arr = array_slice($desc_arr, 0, 10);
					}
					$desc = implode(' ', $desc_arr);
					array_push($result, array("id" => $id, "label" => $key.$qualifier, "value" => strip_tags($key.$qualifier), "url" => $url, "description" => strip_tags($desc)));
				}
			}
			if (count($result) > 11)
				break;
		}
	}
	echo suffusion_search_array_to_json($result);
	die();
}

function suffusion_search_array_to_json($array) {
	if (!is_array($array)) {
		return false;
	}

	$associative = count(array_diff(array_keys($array), array_keys(array_keys($array))));
	if ($associative) {
		$construct = array();
		foreach ($array as $key => $value) {
			// We first copy each key/value pair into a staging array,
			// formatting each key and value properly as we go.

			// Format the key:
			if (is_numeric($key)) {
				$key = "key_$key";
			}
			$key = "\"" . addslashes($key) . "\"";

			// Format the value:
			if (is_array($value)) {
				$value = json_encode($value);
			} else if (!is_numeric($value) || is_string($value)) {
				$value = "\"" . addslashes($value) . "\"";
			}

			// Add to staging array:
			$construct[] = "$key: $value";
		}

		// Then we collapse the staging array into the JSON form:
		$result = "{ " . implode(", ", $construct) . " }";
	}
	else { // If the array is a vector (not associative):
		$construct = array();
		foreach ($array as $value) {
			// Format the value:
			if (is_array($value)) {
				$value = suffusion_search_array_to_json($value);
			} else if (!is_numeric($value) || is_string($value)) {
				$value = "'" . addslashes($value) . "'";
			}

			// Add to staging array:
			$construct[] = $value;
		}

		// Then we collapse the staging array into the JSON form:
		$result = "[ " . implode(", ", $construct) . " ]";
	}

	return $result;
}
?>
