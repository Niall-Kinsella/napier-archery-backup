<?php
/**
 * Core functions file for the theme. Includes other key files.
 *
 * @package Suffusion
 * @subpackage Functions
 */

add_action("after_setup_theme", "suffusion_theme_setup");
if (!defined('SUFFUSION_THEME_VERSION')) {
	define('SUFFUSION_THEME_VERSION', '3.9.0');
}

/**
 * Initializing action. If you are creating a child theme and you want to override some of Suffusion's actions/filters etc you
 * can add your own action to the hook "after_setup_theme", with a priority > 10 if you want your actions to be executed after
 * Suffusion and with priority < 10 if you want your actions executed before.
 *
 * @return void
 */
function suffusion_theme_setup() {
	global $pagenow, $suffusion_unified_options, $suffusion;
	suffusion_add_theme_supports();
	suffusion_initialize_globals();
	suffusion_include_files();
	suffusion_query_post_meta();
	suffusion_setup_standard_actions_and_filters();
	suffusion_setup_custom_actions_and_filters();
	foreach ($suffusion_unified_options as $option => $value) {
		global $$option;
		$$option = $value;
	}

	$suffusion = new Suffusion();
	$suffusion->init();

	if(is_admin() && isset($_GET['activated']) && $pagenow = 'themes.php') {
		header('Location: '.admin_url().'themes.php?page=suffusion-options-manager&now-active=true' );
	}
}

/**
 * Initializes all global variables required by Suffusion. This is the first call executed because the variables are used by
 * all other functions.
 *
 * @return void
 */
function suffusion_initialize_globals() {
	global $content_width, $suffusion_locale, $suffusion_reevaluate_styles, $suffusion_safe_font_faces, $suffusion_options, $suffusion_theme_name, $suffusion_theme_hierarchy;
	global $suffusion_default_theme_name, $suffusion_pages_array, $suffusion_categories_array, $suffusion_comment_types, $suffusion_sidebar_tabs;
	global $suffusion_404_title, $suffusion_404_content, $suffusion_comment_label_name, $suffusion_comment_label_req, $suffusion_comment_label_email;
	global $suffusion_comment_label_uri, $suffusion_comment_label_your_comment, $suffusion_social_networks, $suffusion_sidebar_context_presets;
	global $suffusion_options_intro_page, $suffusion_options_theme_skinning_page, $suffusion_options_visual_effects_page, $suffusion_options_sidebars_and_widgets_page, $suffusion_options_blog_features_page, $suffusion_options_templates_page, $suffusion_options_custom_types_page;
	global $suffusion_all_page_ids, $suffusion_all_category_ids, $suffusion_sitemap_entities, $suffusion_all_sitemap_entities;
	global $suffusion_is_ie6, $suffusion_skin_dependence;

	$suffusion_locale = get_locale();
	load_textdomain('suffusion', locate_template(array("translation/{$suffusion_locale}.mo", "{$suffusion_locale}.mo")));

	if (!isset($content_width)) $content_width = 695; // 725 - 30px padding
	$suffusion_reevaluate_styles = false;

	$suffusion_safe_font_faces = array (
		"Arial, Helvetica, sans-serif" => "<span style=\"font-family: Arial, Helvetica, sans-serif\">Arial, <span class='mac'>Arial, Helvetica,</span> <i>sans-serif</i></span>",
		"'Arial Black', Gadget, sans-serif" => "<span style=\"font-family: 'Arial Black', Gadget, sans-serif\">Arial Black, <span class='mac'>Arial Black, Gadget,</span> <i>sans-serif</i></span>",
		"'Comic Sans MS', cursive" => "<span style=\"font-family: 'Comic Sans MS', cursive\">Comic Sans MS, <span class='mac'>Comic Sans MS,</span> <i>cursive</i></span>",
		"'Courier New', Courier, monospace " => "<span style=\"font-family: 'Courier New', Courier, monospace\">Courier New, <span class='mac'>Courier New, Courier,</span> <i>monospace</i></span>",
		"Georgia, serif" => "<span style=\"font-family: Georgia, serif\">Georgia, <span class='mac'>Georgia,</span> <i>serif</i></span>",
		"Impact, Charcoal, sans-serif" => "<span style=\"font-family: Impact, Charcoal, sans-serif\">Impact, <span class='mac'>Impact, Charcoal,</span> <i>sans-serif</i></span>",
		"'Lucida Console', Monaco, monospace" => "<span style=\"font-family: 'Lucida Console', Monaco, monospace\">Lucida Console, <span class='mac'>Monaco,</span> <i>monospace</i></span>",
		"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "<span style=\"font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif\">Lucida Sans Unicode, <span class='mac'>Lucida Grande,</span> <i>sans-serif</i></span>",
		"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "<span style=\"font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif\">Palatino Linotype, Book Antiqua, <span class='mac'>Palatino,</span> <i>serif</i></span>",
		"Tahoma, Geneva, sans-serif" => "<span style=\"font-family: Tahoma, Geneva, sans-serif\">Tahoma, <span class='mac'>Geneva,</span> <i>sans-serif</i></span>",
		"'Times New Roman', Times, serif" => "<span style=\"font-family: 'Times New Roman', Times, serif\">Times New Roman, <span class='mac'>Times,</span> <i>serif</i></span>",
		"'Trebuchet MS', Helvetica, sans-serif" => "<span style=\"font-family: 'Trebuchet MS', Helvetica, sans-serif\">Trebuchet MS, <span class='mac'>Helvetica,</span> <i>sans-serif</i></span>",
		"Verdana, Geneva, sans-serif" => "<span style=\"font-family: Verdana, Geneva, sans-serif\">Verdana, <span class='mac'>Verdana, Geneva,</span> <i>sans-serif</i></span>",
		"Symbol" => "<span style=\"font-family: Symbol\">Symbol, <span class='mac'>Symbol</span></span> (\"Symbol\" works in IE and Chrome on Windows and in Safari on Mac)",
		"Webdings" => "<span style=\"font-family: Webdings\">Webdings, <span class='mac'>Webdings</span></span> (\"Webdings\" works in IE and Chrome on Windows and in Safari on Mac)",
		"Wingdings, 'Zapf Dingbats'" => "<span style=\"font-family: Wingdings, 'Zapf Dingbats'\">Wingdings, <span class='mac'>Zapf Dingbats</span></span> (\"Wingdings\" works in IE and Chrome on Windows and in Safari on Mac)",
		"'MS Sans Serif', Geneva, sans-serif" => "<span style=\"font-family: 'MS Sans Serif', Geneva, sans-serif\">MS Sans Serif, <span class='mac'>Geneva,</span> <i>sans-serif</i></span>",
		"'MS Serif', 'New York', serif" => "<span style=\"font-family: 'MS Serif', 'New York', serif\">MS Serif, <span class='mac'>New York,</span> <i>serif</i></span>",
	);

	$suffusion_options = get_option('suffusion_options');
	$suffusion_theme_name = suffusion_get_theme_name();
	$suffusion_default_theme_name = "dark-theme-green";

	if (is_admin()) {
		$suffusion_all_page_ids = get_all_page_ids();
		$suffusion_all_page_ids = implode(',',$suffusion_all_page_ids);
		$suffusion_all_category_ids = get_all_category_ids();
		$suffusion_all_category_ids = implode(',',$suffusion_all_category_ids);
	}
	$suffusion_pages_array = null;
	$suffusion_categories_array = null;

	$suffusion_comment_types = array('comment' => __('Comments', 'suffusion'), 'trackback' => __('Trackbacks', 'suffusion'), 'pingback' => __('Pingbacks', 'suffusion'));

	$suffusion_sidebar_tabs = array(
		'archives' => array('title' => __('Archives', 'suffusion')),
		'categories' => array('title' => __('Categories', 'suffusion')),
		'Links' => array('title' => __('Links', 'suffusion')),
		'meta' => array('title' => __('Meta', 'suffusion')),
		'pages' => array('title' => __('Pages', 'suffusion')),
		'recent_comments' => array('title' => __('Recent Comments', 'suffusion')),
		'recent_posts' => array('title' => __('Recent Posts', 'suffusion')),
		'search' => array('title' => __('Search', 'suffusion')),
		'tag_cloud' => array('title' => __('Tag Cloud', 'suffusion')),
		'custom_tab_1' => array('title' => __('Custom Tab 1', 'suffusion')),
		'custom_tab_2' => array('title' => __('Custom Tab 2', 'suffusion')),
		'custom_tab_3' => array('title' => __('Custom Tab 3', 'suffusion')),
		'custom_tab_4' => array('title' => __('Custom Tab 4', 'suffusion')),
		'custom_tab_5' => array('title' => __('Custom Tab 5', 'suffusion')),
		'custom_tab_6' => array('title' => __('Custom Tab 6', 'suffusion')),
		'custom_tab_7' => array('title' => __('Custom Tab 7', 'suffusion')),
		'custom_tab_8' => array('title' => __('Custom Tab 8', 'suffusion')),
		'custom_tab_9' => array('title' => __('Custom Tab 9', 'suffusion')),
		'custom_tab_10' => array('title' => __('Custom Tab 10', 'suffusion')),
	);

	$suffusion_404_title =  __("Error 404 - Not Found", "suffusion");
	$suffusion_404_content = __("Sorry, the page that you are looking for does not exist.", "suffusion");

	$suffusion_comment_label_name = __('Name', "suffusion");
	$suffusion_comment_label_req = __('(required)', "suffusion");
	$suffusion_comment_label_email = __('E-mail', "suffusion");
	$suffusion_comment_label_uri = __('URI', "suffusion");
	$suffusion_comment_label_your_comment = __('Your Comment', "suffusion");

	$suffusion_sidebar_context_presets = array('search', 'date', 'author', 'tag', 'category', 'blog', 'magazine');

	$suffusion_social_networks = array('twitter' => 'Twitter',
	                'facebook' => 'Facebook',
	                'technorati' => 'Technorati',
	                'linkedin' => "LinkedIn",
	                'flickr' => 'Flickr',
	                'delicious' => 'Delicious',
	                'digg' => 'Digg',
	                'stumbleupon' => 'StumbleUpon',
	                'reddit' => "Reddit");

	$suffusion_sitemap_entities = array(
		'pages' => array('title' => 'Pages', 'opt' => '_pages'),
		'categories' => array('title' => 'Categories', 'opt' => '_categories'),
		'authors' => array('title' => 'Authors', 'opt' => '_authors'),
		'years' => array('title' => 'Yearly Archives', 'opt' => '_yarchives'),
		'months' => array('title' => 'Monthly Archives', 'opt' => '_marchives'),
		'weeks' => array('title' => 'Weekly Archives', 'opt' => '_warchives'),
		'days' => array('title' => 'Daily Archives', 'opt' => '_darchives'),
		'tag-cloud' => array('title' => 'Tags', 'opt' => '_tags'),
		'posts' => array('title' => 'Blog Posts', 'opt' => '_posts'),
	);

	$suffusion_all_sitemap_entities = array_keys($suffusion_sitemap_entities);
	$suffusion_all_sitemap_entities = implode(',', $suffusion_all_sitemap_entities);

	suffusion_set_custom_post_type_globals();
	suffusion_set_custom_taxonomy_globals();

	$suffusion_theme_hierarchy = array(
		'light-theme-gray-1' => array('style.css', 'skins/light-theme-gray-1/skin.css'),
		'light-theme-gray-2' => array('style.css', 'skins/light-theme-gray-2/skin.css'),
		'light-theme-green' => array('style.css', 'skins/light-theme-green/skin.css'),
		'light-theme-orange' => array('style.css', 'skins/light-theme-orange/skin.css'),
		'light-theme-pale-blue' => array('style.css', 'skins/light-theme-pale-blue/skin.css'),
		'light-theme-purple' => array('style.css', 'skins/light-theme-purple/skin.css'),
		'light-theme-red' => array('style.css', 'skins/light-theme-red/skin.css'),
		'light-theme-royal-blue' => array('style.css', 'skins/light-theme-royal-blue/skin.css'),
		'dark-theme-gray-1' => array('style.css', 'skins/light-theme-gray-1/skin.css', 'dark-style.css', 'skins/dark-theme-gray-1/skin.css'),
		'dark-theme-gray-2' => array('style.css', 'skins/light-theme-gray-2/skin.css', 'dark-style.css', 'skins/dark-theme-gray-2/skin.css'),
		'dark-theme-green' => array('style.css', 'skins/light-theme-green/skin.css', 'dark-style.css', 'skins/dark-theme-green/skin.css'),
		'dark-theme-orange' => array('style.css', 'skins/light-theme-orange/skin.css', 'dark-style.css', 'skins/dark-theme-orange/skin.css'),
		'dark-theme-pale-blue' => array('style.css', 'skins/light-theme-pale-blue/skin.css', 'dark-style.css', 'skins/dark-theme-pale-blue/skin.css'),
		'dark-theme-purple' => array('style.css', 'skins/light-theme-purple/skin.css', 'dark-style.css', 'skins/dark-theme-purple/skin.css'),
		'dark-theme-red' => array('style.css', 'skins/light-theme-red/skin.css', 'dark-style.css', 'skins/dark-theme-red/skin.css'),
		'dark-theme-royal-blue' => array('style.css', 'skins/light-theme-royal-blue/skin.css', 'dark-style.css', 'skins/dark-theme-royal-blue/skin.css'),
		'minima' => array('style.css', 'skins/minima/skin.css'),
		'wood-leather' => array('style.css', 'skins/wood-leather/skin.css'),
	);

	$suffusion_skin_dependence = array(
		'light-theme-gray-1' => array(),
		'light-theme-gray-2' => array(),
		'light-theme-green' => array(),
		'light-theme-orange' => array(),
		'light-theme-pale-blue' => array(),
		'light-theme-purple' => array(),
		'light-theme-red' => array(),
		'light-theme-royal-blue' => array(),
		'dark-theme-gray-1' => array('light-theme-gray-1', 'dark-style'),
		'dark-theme-gray-2' => array('light-theme-gray-2', 'dark-style'),
		'dark-theme-green' => array('light-theme-green', 'dark-style'),
		'dark-theme-orange' => array('light-theme-orange', 'dark-style'),
		'dark-theme-pale-blue' => array('light-theme-pale-blue', 'dark-style'),
		'dark-theme-purple' => array('light-theme-purple', 'dark-style'),
		'dark-theme-red' => array('light-theme-red', 'dark-style'),
		'dark-theme-royal-blue' => array('light-theme-royal-blue', 'dark-style'),
		'minima' => array(),
		'wood-leather' => array(),
	);

	$suffusion_options_intro_page = 'theme-options-intro.php';
	$suffusion_options_theme_skinning_page = 'theme-options-theme-skinning.php';
	$suffusion_options_visual_effects_page = 'theme-options-visual-effects.php';
	$suffusion_options_sidebars_and_widgets_page = 'theme-options-sidebars-and-widgets.php';
	$suffusion_options_blog_features_page = 'theme-options-blog-features.php';
	$suffusion_options_templates_page = 'theme-options-templates.php';
	$suffusion_options_custom_types_page = 'theme-options-custom-types.php';

	//WP provides a global $is_IE, but we specifically need to find IE6x (or, heaven forbid, IE5x). Note that older versions of Opera used to identify themselves as IE6, so we exclude Opera.
	$suffusion_is_ie6 = preg_match('/\bmsie [56]/i', $_SERVER['HTTP_USER_AGENT']) && !preg_match('/\bopera/i', $_SERVER['HTTP_USER_AGENT']);
}

/**
 * Define global variables for custom post types.
 *
 * @return void
 */
function suffusion_set_custom_post_type_globals() {
	global $suffusion_post_type_options, $suffusion_post_type_labels, $suffusion_post_type_args, $suffusion_post_type_supports;
	$suffusion_post_type_options = array(
		array('name' => 'post_type', 'type' => 'text', 'desc' => 'Post Type (e.g. book)', 'std' => '', 'reqd' => true),
		array('name' => 'style_inherit', 'type' => 'select', 'desc' => 'Inherit styles from:', 'std' => 'post',
			'options' => array('post' => 'Post - will get styles for Posts', 'page' => 'Page - will get styles for Pages', 'custom' => 'Custom - define your own styles')),
	);

	$suffusion_post_type_labels = array(
		array('name' => 'name', 'type' => 'text', 'desc' => 'Name (e.g. Books)', 'std' => '', 'reqd' => true),
		array('name' => 'singular_name', 'type' => 'text', 'desc' => 'Singular Name (e.g. Book)', 'std' => '', 'reqd' => true),
		array('name' => 'add_new', 'type' => 'text', 'desc' => 'Text for "Add New" (e.g. Add New)', 'std' => ''),
		array('name' => 'add_new_item', 'type' => 'text', 'desc' => 'Text for "Add New Item" (e.g. Add New Book)', 'std' => ''),
		array('name' => 'edit_item', 'type' => 'text', 'desc' => 'Text for "Edit Item" (e.g. Edit Book)', 'std' => ''),
		array('name' => 'new_item', 'type' => 'text', 'desc' => 'Text for "New Item" (e.g. New Book)', 'std' => ''),
		array('name' => 'view_item', 'type' => 'text', 'desc' => 'Text for "View Item" (e.g. View Book)', 'std' => ''),
		array('name' => 'search_items', 'type' => 'text', 'desc' => 'Text for "Search Items" (e.g. Search Books)', 'std' => ''),
		array('name' => 'not_found', 'type' => 'text', 'desc' => 'Text for "Not found" (e.g. No Books Found)', 'std' => ''),
		array('name' => 'not_found_in_trash', 'type' => 'text', 'desc' => 'Text for "Not found in Trash" (e.g. No Books Found in Trash)', 'std' => ''),
		array('name' => 'parent_item_colon', 'type' => 'text', 'desc' => 'Parent Text with a colon (e.g. Book Series:)', 'std' => ''),
	);

	$suffusion_post_type_args = array(
		array('name' => 'public', 'desc' => 'Public', 'type' => 'checkbox', 'default' => true),
		array('name' => 'publicly_queryable', 'desc' => 'Publicly Queriable', 'type' => 'checkbox', 'default' => true),
		array('name' => 'show_ui', 'desc' => 'Show UI', 'type' => 'checkbox', 'default' => true),
		array('name' => 'query_var', 'desc' => 'Query Variable', 'type' => 'checkbox', 'default' => true),
		array('name' => 'rewrite', 'desc' => 'Rewrite', 'type' => 'checkbox', 'default' => true),
		array('name' => 'hierarchical', 'desc' => 'Hierarchical', 'type' => 'checkbox', 'default' => true),
		array('name' => 'exclude_from_search', 'desc' => 'Exclude from Search', 'type' => 'checkbox', 'default' => true),
		array('name' => 'show_in_nav_menus', 'desc' => 'Show in Navigation menus', 'type' => 'checkbox', 'default' => true),
		array('name' => 'menu_position', 'desc' => 'Menu Position', 'type' => 'text', 'default' => null),
	);

	$suffusion_post_type_supports = array(
		array('name' => 'title', 'desc' => 'Title', 'type' => 'checkbox', 'default' => false),
		array('name' => 'editor', 'desc' => 'Editor', 'type' => 'checkbox', 'default' => false),
		array('name' => 'author', 'desc' => 'Author', 'type' => 'checkbox', 'default' => false),
		array('name' => 'thumbnail', 'desc' => 'Thumbnail', 'type' => 'checkbox', 'default' => false),
		array('name' => 'excerpt', 'desc' => 'Excerpt', 'type' => 'checkbox', 'default' => false),
		array('name' => 'trackbacks', 'desc' => 'Trackbacks', 'type' => 'checkbox', 'default' => false),
		array('name' => 'custom-fields', 'desc' => 'Custom Fields', 'type' => 'checkbox', 'default' => false),
		array('name' => 'comments', 'desc' => 'Comments', 'type' => 'checkbox', 'default' => false),
		array('name' => 'revisions', 'desc' => 'Revisions', 'type' => 'checkbox', 'default' => false),
		array('name' => 'page-attributes', 'desc' => 'Page Attributes', 'type' => 'checkbox', 'default' => false),
	);
}

/**
 * Define global variables for custom taxonomy setup.
 * 
 * @return void
 */
function suffusion_set_custom_taxonomy_globals() {
	global $suffusion_taxonomy_options, $suffusion_taxonomy_labels, $suffusion_taxonomy_args;
	$suffusion_taxonomy_options = array(
		array('name' => 'taxonomy', 'type' => 'text', 'desc' => 'Taxonomy (e.g. genres)', 'std' => '', 'reqd' => true),
		array('name' => 'object_type', 'type' => 'text', 'desc' => 'Applicable to post types (comma-separated list e.g. book, movie)', 'std' => '', 'reqd' => true),
	);

	$suffusion_taxonomy_labels = array(
		array('name' => 'name', 'type' => 'text', 'desc' => 'Name (e.g. Genres)', 'std' => '', 'reqd' => true),
		array('name' => 'singular_name', 'type' => 'text', 'desc' => 'Singular Name (e.g. Genre)', 'std' => '', 'reqd' => true),
		array('name' => 'search_items', 'type' => 'text', 'desc' => 'Text for "Search Items" (e.g. Search Genres)', 'std' => ''),
		array('name' => 'popular_items', 'type' => 'text', 'desc' => 'Text for "Popular Items" (e.g. Popular Genres)', 'std' => ''),
		array('name' => 'all_items', 'type' => 'text', 'desc' => 'Text for "All Items" (e.g. All Genres)', 'std' => ''),
		array('name' => 'parent_item', 'type' => 'text', 'desc' => 'Parent Item (e.g. Parent Genre)', 'std' => ''),
		array('name' => 'parent_item_colon', 'type' => 'text', 'desc' => 'Parent Item Colon (e.g. Parent Genre:)', 'std' => ''),
		array('name' => 'edit_item', 'type' => 'text', 'desc' => 'Text for "Edit Item" (e.g. Edit Genre)', 'std' => ''),
		array('name' => 'update_item', 'type' => 'text', 'desc' => 'Text for "Update Item" (e.g. Update Genre)', 'std' => ''),
		array('name' => 'add_new_item', 'type' => 'text', 'desc' => 'Text for "Add New Item" (e.g. Add New Genre)', 'std' => ''),
		array('name' => 'new_item_name', 'type' => 'text', 'desc' => 'Text for "New Item Name" (e.g. New Genre Name)', 'std' => ''),
	);

	$suffusion_taxonomy_args = array(
		array('name' => 'public', 'desc' => 'Public', 'type' => 'checkbox', 'default' => true),
		array('name' => 'show_ui', 'desc' => 'Show UI', 'type' => 'checkbox', 'default' => true),
		array('name' => 'show_tagcloud', 'desc' => 'Show in Tagcloud widget', 'type' => 'checkbox', 'default' => true),
		array('name' => 'hierarchical', 'desc' => 'Hierarchical', 'type' => 'checkbox', 'default' => true),
		array('name' => 'rewrite', 'desc' => 'Rewrite', 'type' => 'checkbox', 'default' => true),
	);
}

/**
 * Add support for various theme functions
 * @return void
 */
function suffusion_add_theme_supports() {
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('automatic-feed-links');
	// Adding post formats, so that users can assign formats to posts. They will be styled in a later release.
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

	// Support for page excerpts
	add_post_type_support('page', 'excerpt');

	// Support for native custom headers and backgrounds
	add_custom_background();
}

/**
 * Include other core files. Some files like theme-options.php are included only on demand, because they are too
 * heavy for every load.
 *
 * @return void
 */
function suffusion_include_files() {
	global $suffusion_unified_options, $suffusion_options, $suffusion_interactive_text_fields;
	$template_path = get_template_directory();

	include_once ($template_path . "/admin/theme-definitions.php");
	if (is_admin()) { // The following don't need to be loaded for non-admin screens
		include_once ($template_path . "/admin/suffusion-options-page.php");
		require_once($template_path.'/admin/theme-options-renderer.php');
	}

	$suffusion_unified_options = suffusion_get_unified_options(true);
	if (function_exists('icl_t')) {
		$suffusion_interactive_text_fields = suffusion_get_interactive_text_fields();
	}

	// This is not a BP child theme, but in case it is used with the Suffusion BP support pack, this inclusion is needed.
	if (!is_admin() && function_exists('bp_is_group')) {
		include_once ($template_path . '/functions/bp-integration.php');
	}

	include_once ($template_path . '/widgets/suffusion-widgets.php');
	$widgets = new Suffusion_Widgets();
	$widgets->init();

	include_once ($template_path . '/suffusion-css-helper.php');
	include_once ($template_path . '/suffusion-css-generator.php');
	require_once ($template_path . "/suffusion.php");
	require_once ($template_path . "/functions/actions.php");
	require_once ($template_path . "/functions/filters.php");
	if (!is_admin()) {
		include_once ($template_path . "/functions/media.php");
		include_once ($template_path . "/functions/shortcodes.php");
	}
	include_once ($template_path . "/functions/wpml-integration.php");

	if (isset($suffusion_options['suf_custom_php_file'])) {
		$custom_php_file = $suffusion_options['suf_custom_php_file'];
		$custom_php_file = stripslashes($custom_php_file);
		if (substr($custom_php_file, 0, 1) == "/") {
			$custom_php_file = substr($custom_php_file, 1);
		}
		if (trim($custom_php_file) != "" && file_exists(WP_CONTENT_DIR."/".$custom_php_file)) {
			include_once(WP_CONTENT_DIR."/".$custom_php_file);
		}
	}
}

/**
 * Returns an indented array of pages, based on parent and child pages. This is used in the admin menus.
 *
 * @param  $prefix
 * @return array
 */
function suffusion_get_formatted_page_array($prefix) {
	global $suffusion_pages_array;
	if (isset($suffusion_pages_array) && $suffusion_pages_array != null) {
		return $suffusion_pages_array;
	}
	$ret = array();
	$pages = get_pages('sort_column=menu_order');
    if ($pages != null) {
        foreach ($pages as $page) {
            if (is_null($suffusion_pages_array)) {
	            //Added a call to delete from cache because of a bug in get_pages, which doesn't return ancestors.
	            wp_cache_delete($page->ID, 'posts');
	            $ret[$page->ID] = array ("title" => $page->post_title, "depth" => count(get_post_ancestors($page)));
            }
        }
    }
	if ($suffusion_pages_array == null) {
		$suffusion_pages_array = $ret;
		return $ret;
	}
	else {
		return $suffusion_pages_array;
	}
}

function suffusion_get_formatted_category_array($prefix) {
	global $suffusion_categories_array;
	$ret = array();
	$args = array("type" => "post",
		"orderby" => "name",
		"hide_empty" => false,
	);
	$categories = get_categories($args);
	if ($categories == null) { $categories = array(); }
	foreach ($categories as $category) {
		if ($suffusion_categories_array == null) {
			$ret[$category->cat_ID] = array("title" => $category->cat_name);
		}
	}
	if ($suffusion_categories_array == null) {
		$suffusion_categories_array = $ret;
		return $suffusion_categories_array;
	}
	else {
		return $suffusion_categories_array;
	}
}

function suffusion_get_allowed_categories($prefix) {
	global $suffusion_options;
	$allowed = array();
	if (isset($suffusion_options[$prefix])) {
		$selected = $suffusion_options[$prefix];
		if ($selected && trim($selected) != '') { $selected_categories = explode(',', $selected); } else { $selected_categories = array(); }
		if ($selected_categories && is_array($selected_categories)) {
			foreach ($selected_categories as $category) {
				$allowed[count($allowed)] = get_category($category);
			}
		}
	}
	return $allowed;
}

function suffusion_get_formatted_link_array($prefix) {
	global $link_array;
	$ret = array();
	$args = array(
		"order" => "ASC",
		"orderby" => 'name',
	);
	$links = get_bookmarks($args);
	if ($links == null) {
		$links = array();
	}
	foreach ($links as $link) {
		if ($link_array == null) {
			$ret[$link->link_id] = array("title" => $link->link_name);
		}
	}
	if ($link_array == null) {
		$link_array = $ret;
		return $link_array;
	}
	else {
		return $link_array;
	}
}

function suffusion_get_formatted_wp_menu_array($prefix) {
	global $menu_array;
	$ret = array();

	$menus = wp_get_nav_menus();
	if ($menus == null) {
		$menus = array();
	}

	foreach ($menus as $menu) {
		if ($menu_array == null) {
			$ret[$menu->term_id] = array("title" => $menu->name);
		}
	}

	if ($menu_array == null) {
		$menu_array = $ret;
		return $menu_array;
	}
	else {
		return $menu_array;
	}
}

/**
 * Adds actions and filters to standard action hooks and filter hooks.
 * 
 * @return void
 */
function suffusion_setup_standard_actions_and_filters() {
	////// ACTIONS - The callbacks are in actions.php
	add_action('admin_init', 'suffusion_options_init_fn' );
	add_action('admin_init', 'suffusion_admin_init');

	add_action('admin_menu', 'suffusion_add_admin_menus');
	add_action('admin_menu', 'suffusion_add_post_meta_boxes');

	add_action("save_post", "suffusion_save_post_fields");
	add_action("publish_post", "suffusion_save_post_fields");

	add_action('template_redirect', 'suffusion_custom_css_display');

	add_action('init', 'suffusion_register_jquery');
	add_action('init', 'suffusion_register_custom_types');
	add_action('init', 'suffusion_register_menus');

	add_action('wp_enqueue_scripts', 'suffusion_enqueue_styles');
	add_action('wp_enqueue_scripts', 'suffusion_disable_plugin_styles');

	add_action('wp_enqueue_scripts', 'suffusion_enqueue_scripts');

	add_action('wp_head', 'suffusion_add_header_contents');
	add_action('wp_head', 'suffusion_print_direct_styles', 11);
	add_action('wp_head', 'suffusion_print_direct_scripts', 11);
	remove_action('wp_head', 'wp_generator');

	add_action('wp_footer', 'suffusion_add_footer_contents');

	// We want to ensure that whenever someone updates options, the unified options array gets updated too, along with the generated CSS.
	add_action("updated_option", 'suffusion_update_unified_options', 10, 3);
	add_action('updated_option', 'suffusion_update_generated_css', 11, 3); // We want to generate the CSS after the options have been updated.

	// Required for WP-MS, 3.0+
	add_action('before_signup_form', 'suffusion_pad_signup_form_start');
	add_action('after_signup_form', 'suffusion_pad_signup_form_end');

	// Custom Header
	add_action('custom_header_options', 'suffusion_custom_header_options');

	////// FILTERS - The callbacks are in filters.php
	add_filter('query_vars', 'suffusion_new_vars');
	add_filter('get_pages', 'suffusion_replace_page_with_alt_title');
	add_filter('page_link', 'suffusion_unlink_page', 10, 2);
	add_filter('wp_list_pages', 'suffusion_js_for_unlinked_pages');
	add_filter('wp_list_pages', 'suffusion_remove_a_title_attribute');
	add_filter('wp_list_categories', 'suffusion_remove_a_title_attribute');
	add_filter('wp_list_bookmarks', 'suffusion_remove_a_title_attribute');

	add_filter('extra_theme_headers', 'suffusion_extra_theme_headers');

	add_filter('the_content_more_link', 'suffusion_set_more_link');
	add_filter('the_content', 'suffusion_pages_link', 8);

	add_filter('comment_reply_link', 'suffusion_hide_reply_link_for_pings', 10, 4);
	add_filter('get_comments_number', 'suffusion_filter_trk_ping_from_count');
	add_filter('get_comments_pagenum_link', 'suffusion_append_comment_type');

	add_filter('user_contactmethods', 'suffusion_add_user_contact_methods');

	add_filter('excerpt_more', 'suffusion_excerpt_more');

	add_filter('widget_text', 'do_shortcode');

	add_filter('style_loader_tag', 'suffusion_filter_rounded_corners_css', 10, 2);
	add_filter('style_loader_tag', 'suffusion_filter_ie_css', 10, 2);

	add_filter('post_class', 'suffusion_extra_post_classes');

	// Some filters to make sure the theme works with BP without hiccups
	add_filter('bp_field_css_classes', 'suffusion_add_bp_specific_classes');
}

/**
 * Adds actions and filters to custom action hooks and filter hooks.
 * 
 * @return void
 */
function suffusion_setup_custom_actions_and_filters() {
	///// ACTIONS
	add_action('suffusion_document_header', 'suffusion_include_ie7_compatibility_mode');
	add_action('suffusion_document_header', 'suffusion_set_title');
	add_action('suffusion_document_header', 'suffusion_include_meta');
	add_action('suffusion_document_header', 'suffusion_include_favicon');
	add_action('suffusion_document_header', 'suffusion_include_default_feed');

	add_action('suffusion_before_begin_wrapper', 'suffusion_display_open_header');

	add_action('suffusion_after_begin_wrapper', 'suffusion_display_closed_header');
	add_action('suffusion_after_begin_wrapper', 'suffusion_print_widget_area_below_header');

	add_action('suffusion_page_header', 'suffusion_display_header');
	add_action('suffusion_page_header', 'suffusion_display_main_navigation');

	add_action('suffusion_before_begin_content', 'suffusion_build_breadcrumb');
	add_action('suffusion_before_begin_content', 'suffusion_featured_posts');
	add_action('suffusion_after_begin_content', 'suffusion_template_specific_header');

	add_action('suffusion_content', 'suffusion_excerpt_or_content');

	add_action('suffusion_after_begin_post', 'suffusion_print_post_page_title');
	add_action('suffusion_after_begin_post', 'suffusion_print_post_format_icon');

	add_action('suffusion_after_content', 'suffusion_meta_pullout');

	add_action('suffusion_before_end_post', 'suffusion_author_information');
	add_action('suffusion_before_end_post', 'suffusion_post_footer');

	add_action('suffusion_before_end_content', 'suffusion_pagination');

	// Print sidebars
	add_action('suffusion_before_end_container', 'suffusion_print_left_sidebars');
	add_action('suffusion_before_end_container', 'suffusion_print_right_sidebars');

	add_action('suffusion_after_end_container', 'suffusion_print_widget_area_above_footer');

	add_action('suffusion_page_footer', 'suffusion_display_footer');

	add_action('suffusion_document_footer', 'suffusion_include_custom_footer_js');

	///// FILTERS
	add_filter('suffusion_can_display_attachment', 'suffusion_filter_attachment_display', 10, 4);
	add_filter('suffusion_left_sidebar_count', 'suffusion_get_sidebar_count_for_view', 10, 3);
	add_filter('suffusion_right_sidebar_count', 'suffusion_get_sidebar_count_for_view', 10, 3);

	add_filter('suffusion_after_comment_form', 'suffusion_allowed_html_tags');
}

function suffusion_add_post_meta_boxes() {
	add_meta_box('suffusion-page-box', 'Additional Options for Suffusion', 'suffusion_meta_fields', 'page', 'normal', 'high', array('type' => 'page'));
	add_meta_box('suffusion-post-box', 'Additional Options for Suffusion', 'suffusion_meta_fields', 'post', 'normal', 'high', array('type' => 'post'));
}

/**
 * Builds the meta box in the Edit Page / Edit Post screens.
 *
 * @param $post
 * @param array $args
 * @return void
 */
function suffusion_meta_fields($post, $args = array()) {
	$additional_args = $args['args'];
	if (isset($additional_args['type'])) {
		$type = $additional_args['type'];
	}
	else {
		$type = 'post';
	}
	if ($type == 'page') {
?>
	<p>
		<label for="suf_alt_page_title"><?php _e("Page Title in Dropdown Menu", "suffusion"); ?></label><br />
		<input type="text" id="suf_alt_page_title" name="suf_alt_page_title"
		value="<?php echo get_post_meta($post->ID, "suf_alt_page_title", true); ?>" /> <?php _e("This text will be shown in the drop-down menus in the navigation bar. If left blank, the title of the page is used.", 'suffusion'); ?>
	</p>
	<p>
		<label for="suf_nav_unlinked"><?php _e("Do not link to this page in the navigation bars", "suffusion"); ?></label><br />
		<input type="checkbox" id="suf_nav_unlinked" name="suf_nav_unlinked" <?php checked(get_post_meta($post->ID, 'suf_nav_unlinked', true), 'on'); ?> />
			<?php _e('If this box is checked, clicking on this page in the navigation bar will not take you anywhere.', 'suffusion'); ?>
	</p>
	<p>
		<input type="checkbox" id="suf_hide_page_title" name="suf_hide_page_title" <?php checked(get_post_meta($post->ID, 'suf_hide_page_title', true), 'on'); ?> />
		<label for="suf_hide_page_title"><?php _e("Do not display the page title", "suffusion"); ?></label>
	</p>
<?php
	}
	if ($type == 'post') {
?>
	<p>
		<label for="suf_magazine_headline"><?php _e("Make this post a headline", "suffusion"); ?></label><br />
		<input type="checkbox" id="suf_magazine_headline" name="suf_magazine_headline" <?php checked(get_post_meta($post->ID, 'suf_magazine_headline', true), 'on'); ?> />
			<?php _e('If this box is checked, this post will show up as a headline in the magazine template.', 'suffusion'); ?>
	</p>
	<p>
		<label for="suf_magazine_excerpt"><?php _e("Make this post an excerpt in the magazine layout", "suffusion"); ?></label><br />
		<input type="checkbox" id="suf_magazine_excerpt" name="suf_magazine_excerpt" <?php checked(get_post_meta($post->ID, 'suf_magazine_excerpt', true), 'on'); ?> />
			<?php _e('If this box is checked, this post will show up as an excerpt in the magazine template.', 'suffusion'); ?>
	</p>
	<p>
		<label for="suf_pseudo_template"><?php _e("Select the sidebar layout to apply to this post", "suffusion"); ?></label><br />
		<select id="suf_pseudo_template" name="suf_pseudo_template">
<?php
	$post_layouts = array(
			"" => __("Default - Inherit default sidebar layout for your blog", "suffusion"),
			"no" => __("0 (Zero) - Will inherit settings of the \"No Sidebars\" template", "suffusion"),
			"1l" => __("Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "suffusion"),
			"1r" => __("Single Right - Will inherit settings of the \"Single Right Sidebar\" template", "suffusion"),
			"1l1r" => __("Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template", "suffusion"),
			"2l" => __("Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "suffusion"),
			"2r" => __("Double Right - Will inherit settings of the \"Double Right Sidebars\" template", "suffusion"),
		);
	$current_layout = get_post_meta($post->ID, "suf_pseudo_template", true);
	$current_layout = $current_layout == '' ? 'default' : $current_layout;

	foreach ($post_layouts as $layout => $layout_description) {
?>
			<option <?php selected($current_layout, $layout); ?> value='<?php echo $layout;?>'><?php echo $layout_description; ?></option>
<?php
	}
?>
		</select>
		<?php _e("Leave the selection to \"Default\" if you are not sure what this is. You can control individual sidebar widths from <em>Suffusion Options &rarr; Other Graphical Elements &rarr; Sizes and Margins</em> if you have selected \"Default\" and <em>Suffusion Options &rarr; Templates</em> otherwise", "suffusion"); ?>
	</p>
<?php
	}
?>
	<p>
		<label for="thumbnail"><?php _e("Thumbnail", "suffusion"); ?></label><br />
		<input type="text" id="thumbnail" name="thumbnail"
			value="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" /> <?php _e("Enter the full URL of the thumbnail image that you would like to use, including http://", "suffusion"); ?>
	</p>
	<p>
		<label for="featured_image"><?php _e("Featured Image", "suffusion"); ?></label><br />
		<input type="text" id="featured_image" name="featured_image"
			value="<?php echo get_post_meta($post->ID, "featured_image", true); ?>" /> <?php _e("Enter the full URL of the featured image that you would like to use, including http://", "suffusion"); ?>
	</p>
	<p>
		<label for="meta_description"><?php _e("Meta Description", "suffusion"); ?></label><br />
		<textarea id="meta_description" name="meta_description" cols='80' rows='5'><?php echo get_post_meta($post->ID, "meta_description", true); ?></textarea>
	</p>
	<p>
		<label for="meta_keywords"><?php _e("Meta Keywords", "suffusion"); ?></label><br />
		<input type="text" id="meta_keywords" name="meta_keywords" style='width: 500px;'
			value="<?php echo get_post_meta($post->ID, "meta_keywords", true); ?>" /> <?php _e("Enter a comma-separated list of keywords for this post. This list will be included in the meta tags for this post.", "suffusion"); ?>
	</p>
	<input type='hidden' id='suffusion_post_meta' name='suffusion_post_meta' value='suffusion_post_meta'/>
<?php
}

function suffusion_save_post_fields($post_id) {
	$suffusion_post_fields = array('thumbnail', 'featured_image', 'suf_magazine_headline', 'suf_magazine_excerpt', 'suf_alt_page_title', 'meta_description', 'meta_keywords', 'suf_nav_unlinked', 'suf_pseudo_template', 'suf_hide_page_title');
    if (isset($_POST['suffusion_post_meta'])) {
        foreach ($suffusion_post_fields as $post_field) {
	        if (isset($_POST[$post_field])) {
		        $data = stripslashes($_POST[$post_field]);
	        }
	        else {
		        $data = '';
	        }
            if (get_post_meta($post_id, $post_field) == '') {
                add_post_meta($post_id, $post_field, $data, true);
            }
            else if ($data != get_post_meta($post_id, $post_field, true)) {
                update_post_meta($post_id, $post_field, $data);
            }
            else if ($data == '') {
                delete_post_meta($post_id, $post_field, get_post_meta($post_id, $post_field, true));
            }
        }
    }
}

function suffusion_add_header_contents() {
	suffusion_create_openid_links();
	suffusion_create_additional_feeds();
}

function suffusion_add_footer_contents() {
	suffusion_create_analytics_contents();
}

// OpenID stuff...
function suffusion_create_openid_links() {
	global $suf_openid_enabled, $suf_openid_server, $suf_openid_delegate;
	if ($suf_openid_enabled == "enabled") {
		echo "<!-- Start OpenID settings -->\n";
		echo "<link rel=\"openid.server\" href=\"".$suf_openid_server."\" />\n";
		echo "<link rel=\"openid.delegate\" href=\"".$suf_openid_delegate."\" />\n";
		echo "<!-- End OpenID settings -->\n";
	}
}
// ... End OpenID stuff

// Analytics ...
function suffusion_create_analytics_contents() {
	global $suf_analytics_enabled, $suf_custom_analytics_code;
	if ($suf_analytics_enabled == "enabled") {
		if (trim($suf_custom_analytics_code) != "") {
			echo "<!-- Start Google Analytics -->\n";
			$strip = stripslashes($suf_custom_analytics_code);
			$strip = wp_specialchars_decode($strip, ENT_QUOTES);
			echo $strip."\n";
			echo "<!-- End Google Analytics -->\n";
		}
	}
}
// ... End Analytics

// Additional Feeds ...
function suffusion_create_additional_feeds() {
	global $suffusion_options;
	echo "<!-- Start Additional Feeds -->\n";
	if (isset($suffusion_options['suf_custom_rss_feed_1']) && trim($suffusion_options['suf_custom_rss_feed_1']) != "") {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".esc_attr($suffusion_options['suf_custom_rss_title_1'])."\" href=\"".$suffusion_options['suf_custom_rss_feed_1']."\" />\n";
	}
	if (isset($suffusion_options['suf_custom_rss_feed_2']) && trim($suffusion_options['suf_custom_rss_feed_2']) != "") {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".esc_attr($suffusion_options['suf_custom_rss_title_2'])."\" href=\"".$suffusion_options['suf_custom_rss_feed_2']."\" />\n";
	}
	if (isset($suffusion_options['suf_custom_rss_feed_3']) && trim($suffusion_options['suf_custom_rss_feed_3']) != "") {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".esc_attr($suffusion_options['suf_custom_rss_title_3'])."\" href=\"".$suffusion_options['suf_custom_rss_feed_3']."\" />\n";
	}
	if (isset($suffusion_options['suf_custom_atom_feed_1']) && trim($suffusion_options['suf_custom_atom_feed_1']) != "") {
		echo "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"".esc_attr($suffusion_options['suf_custom_atom_title_1'])."\" href=\"".$suffusion_options['suf_custom_atom_feed_1']."\" />\n";
	}
	if (isset($suffusion_options['suf_custom_atom_feed_2']) && trim($suffusion_options['suf_custom_atom_feed_2']) != "") {
		echo "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"".esc_attr($suffusion_options['suf_custom_atom_title_2'])."\" href=\"".$suffusion_options['suf_custom_atom_feed_2']."\" />\n";
	}
	if (isset($suffusion_options['suf_custom_atom_feed_3']) && trim($suffusion_options['suf_custom_atom_feed_3']) != "") {
		echo "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"".esc_attr($suffusion_options['suf_custom_atom_title_3'])."\" href=\"".$suffusion_options['suf_custom_atom_feed_3']."\" />\n";
	}
	echo "<!-- End Additional Feeds -->\n";
}
// ... End Additional Feeds

function suffusion_get_excluded_pages($prefix) {
	global $$prefix;
	$inclusions = $$prefix;

	$all_pages = get_all_page_ids();//get_pages('sort_column=menu_order');
	if ($all_pages == null) {
		$all_pages = array();
	}

    if ($inclusions && trim($inclusions) != '') {
        $include = explode(',', $inclusions);
        $translations = suffusion_get_wpml_lang_object_ids($include, 'post');
        foreach ($translations as $translation) {
            $include[count($include)] = $translation;
        }
    }
    else {
        $include = array();
    }

	// First we figure out which pages have to be excluded
	$exclude = array();
	foreach ($all_pages as $page) {
		if (!in_array($page, $include)) {
            $exclude[count($exclude)] = $page;
        }
	}
	// Now we need to figure out if these excluded pages are ancestors of any pages on the list. If so, we remove the descendants
	foreach ($all_pages as $page) {
		$ancestors = get_post_ancestors($page);
		foreach ($ancestors as $ancestor) {
			if (in_array($ancestor, $exclude)) {
				$exclude[count($exclude)] = $page;
			}
		}
	}

	$exclusion_list = implode(",", $exclude);
	return $exclusion_list;
}

/**
 * Gets the link to the Home Page. This is compatible with WPML.
 *
 * @param  $position
 * @return string
 */
function suffusion_get_home_link_html($position) {
	global $suffusion_options, $suffusion_interactive_text_fields;
	$retStr = "";
	$option_name = $position == 'top' ? 'suf_navt_show_home' : 'suf_show_home';
	if (!isset($suffusion_options[$option_name])) {
		$suf_show_home = "none";
	}
	else {
		$suf_show_home = $suffusion_options[$option_name];
	}

	$show_on_front = get_option('show_on_front');
	$class = "";
	if (is_front_page()) {
		$class = " class='current_page_item' ";
	}
	else if (is_home() && $show_on_front == 'posts') {
		$class = " class='current_page_item' ";
	}

	$option_name = $position == 'top' ? 'suf_navt_home_text' : 'suf_home_text';
	$home_link = home_url();
	if (function_exists('icl_get_home_url')) {
		$home_link = icl_get_home_url();
	}
	if ($suf_show_home == "text") {
		if ($suffusion_options[$option_name] === FALSE || $suffusion_options[$option_name] == null) {
			$suf_home_text = "Home";
		}
		else if (trim($suffusion_options[$option_name]) == "") {
			$suf_home_text = "Home";
		}
		else if (function_exists('icl_t')) {
//			$suf_home_text = trim($suffusion_options[$option_name]);
			$suf_home_text = wpml_t('suffusion-interactive', $suffusion_interactive_text_fields[$option_name]."|$option_name", trim($suffusion_options[$option_name]));
		}
		else {
			$suf_home_text = trim($suffusion_options[$option_name]);
		}
		$retStr .= "\n\t\t\t\t\t"."<li $class><a href='".$home_link."'>".$suf_home_text."</a></li>";
	}
	else if ($suf_show_home == "icon") {
		$retStr .= "\n\t\t\t\t\t"."<li $class><a href='".$home_link."'><img src='".get_template_directory_uri()."/images/home-light.png' alt='Home' class='home-icon'/></a></li>";
	}
	return $retStr;
}

function suffusion_create_navigation_html($echo = true, $position = 'main', $page_option = 'suf_nav_pages', $cats_option = 'suf_nav_cats', $links_option = 'suf_nav_links', $menus_option = 'suf_nav_menus') {
	global $suffusion_menu_location, $suffusion_page_option, $suffusion_cats_option, $suffusion_links_option, $suffusion_menus_option, $suffusion_echo_menu;
	$suffusion_menu_location = $position;
	$suffusion_page_option = $page_option;
	$suffusion_cats_option = $cats_option;
	$suffusion_links_option = $links_option;
	$suffusion_menus_option = $menus_option;
	$suffusion_echo_menu = $echo;

	get_template_part('custom/navigation-menu', $suffusion_menu_location);
}

/**
 * If more than one page exists, return TRUE.
 * @return bool
 */
function suffusion_show_page_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/**
 * If more than one post exists, return TRUE.
 */
function suffusion_post_count() {
	$post_type = get_query_var('post_type');
	if (!isset($post_type) || $post_type == null || $post_type == '') {
		$post_type = 'post';
	}
	$post_count = wp_count_posts($post_type);
	return $post_count->publish;
}

function suffusion_admin_check_integer($val) {
	if (substr($val, 0, 1) == '-') {
		$val = substr($val, 1);
	}
	return (preg_match('/^\d*$/', $val) == 1);
}

function suffusion_admin_get_size_from_field($val, $default, $allow_blank = true, $offset = 0) {
	$ret = $default;
	if (substr(trim($val), -2) == "px") {
		$test_str = trim(substr(trim($val), 0, strlen(trim($val)) - 2));
		if (suffusion_admin_check_integer($test_str)) {
			$test_str = (int)$test_str;
			$test_str = $test_str + $offset;
			$ret = $test_str."px";
		}
	}
	else if (suffusion_admin_check_integer(trim($val))) {
		if (!$allow_blank) {
			if (trim($val) != '') {
				$test_str = (int)trim($val);
				$test_str = $test_str + $offset;
				$ret = $test_str."px";
			}
		}
		else {
			$test_str = (int)trim($val);
			$test_str = $test_str + $offset;
			$ret = $test_str."px";
		}
	}
	return $ret;
}

function suffusion_get_numeric_size_from_field($val, $default) {
	$ret = $default;
	if (substr(trim($val), -2) == "px") {
		$test_str = trim(substr(trim($val), 0, strlen(trim($val)) - 2));
		if (suffusion_admin_check_integer($test_str)) {
			$ret = (int)$test_str;
		}
	}
	else if (suffusion_admin_check_integer(trim($val))) {
		$ret = (int)(trim($val));
	}
	return $ret;
}

function suffusion_get_allowed_pages($prefix) {
	global $suffusion_options;
	$allowed = array();
	if (isset($suffusion_options[$prefix])) {
		$selected = $suffusion_options[$prefix];
		if (!empty($selected)) {
			$selected_pages = explode(',', $selected);
			if (is_array($selected_pages) && count($selected_pages) > 0) {
				foreach ($selected_pages as $page_id) {
					$page = get_page($page_id);
					$allowed[count($allowed)] = $page;
				}
			}
		}
	}
	return $allowed;
}

/* Functions for WPML compatibility */
function suffusion_get_wpml_lang_object_ids($ids_array, $type) {
	if (function_exists('icl_object_id')) {
		$res = array();
		foreach ($ids_array as $id) {
			$trans = wpml_get_object_id($id, $type, false);
			if (!is_null($trans) && !in_array($trans, $res)) {
			    $res[] = $trans;
			}
		}
		return $res;
	}
	return $ids_array;
}
/* End functions for WPML compatibility */

function suffusion_tab_array_prepositions() {
    global $suffusion_sidebar_tabs;
    $ret = array();
    foreach ($suffusion_sidebar_tabs as $key => $value) {
        $ret[$key] = $value['title'];
    }
    return $ret;
}

function suffusion_get_formatted_options_array($prefix, $options_array) {
	$ret = array();
    foreach ($options_array as $option_key => $option_value) {
        $ret[$option_key] = array('title' => $option_value, 'depth' => 1);
    }
    return $ret;
}

function suffusion_get_entity_order($entity_order, $entity_type='nav') {
    $ret = array();
    if (is_array($entity_order)) {
        foreach ($entity_order as $element => $element_value) {
            $ret[] = $element;
        }
        $ret = implode(',',$ret);
    }
    else {
        $defaults = suffusion_entity_prepositions($entity_type);
        $ret = explode(',', $entity_order);
        $default_array = array();
        foreach ($defaults as $default_key => $default_value) {
            $default_array[] = $default_key;
            if (!in_array($default_key, $ret)) {
                $ret[] = $default_key;
            }
        }
        $ret_array = array();
        foreach ($ret as $ret_entry) {
            if (in_array($ret_entry, $default_array)) {
                $ret_array[] = $ret_entry;
            }
        }
        $ret = implode(',', $ret_array);
    }
    return $ret;
}

function suffusion_get_full_content_count() {
	global $suffusion, $suf_category_fc_number, $suf_author_fc_number, $suf_tag_fc_number, $suf_search_fc_number, $suf_archive_fc_number, $suf_index_fc_number, $suf_pop_fc_number, $suf_fc_view_first_only;

	if ($suf_fc_view_first_only == 'first' && is_paged()) {
		return 0;
	}
	
	if (!isset($suffusion) || is_null($suffusion)) {
		$suffusion = new Suffusion();
	}
	$context = $suffusion->get_context();
	$full_post_count = 0;
	if (in_array('category', $context)) {
		$full_post_count = (int)$suf_category_fc_number;
	}
	else if (in_array('author', $context)) {
		$full_post_count = (int)$suf_author_fc_number;
	}
	else if (in_array('tag', $context)) {
		$full_post_count = (int)$suf_tag_fc_number;
	}
	else if (in_array('search', $context)) {
		$full_post_count = (int)$suf_search_fc_number;
	}
	else if (in_array('date', $context)) {
		$full_post_count = (int)$suf_archive_fc_number;
	}
	else if (in_array('home', $context) || in_array('blog', $context)) {
		$full_post_count = (int)$suf_index_fc_number;
	}
	else if (in_array('page', $context)) {
		if (in_array('posts.php', $context)) {
			$full_post_count = (int)$suf_pop_fc_number;
		}
	}
	return $full_post_count;
}


function suffusion_entity_prepositions($entity_type = 'nav') {
	if ($entity_type == 'nav') {
		$ret = array('pages' => 'Pages', 'categories' => 'Categories', 'links' => 'Links');
		$menus = wp_get_nav_menus();
		if ($menus == null) {
			$menus = array();
		}

		foreach ($menus as $menu) {
			$ret["menu-".$menu->term_id] = $menu->name;
		}
	}
	else if ($entity_type == 'nr') {
		$ret = array('current' => 'Currently Reading', 'unread' => 'Not Yet Read', 'completed' => 'Completed');
	}
	else if ($entity_type == 'mag-layout') {
		$ret = array('headlines' => 'Headlines', 'excerpts' => 'Excerpts', 'categories' => 'Categories');
	}
	else if ($entity_type == 'thumb-mag-excerpt' || $entity_type == 'thumb-excerpt' || $entity_type == 'thumb-mag-headline' || $entity_type == 'thumb-tiles') {
		$ret = array('native' => 'Native WP 3.0 featured image', 'custom-thumb' => 'Image specified through custom thumbnail field',
			'attachment' => 'Image attached to the post', 'embedded' => 'Embedded URL in post', 'custom-featured' => 'Image specified through custom Featured Image field');
	}
	else if ($entity_type == 'thumb-featured') {
		$ret = array('custom-featured' => 'Image specified through custom Featured Image field', 'native' => 'Native WP 3.0 featured image', 'custom-thumb' => 'Image specified through custom thumbnail field',
			'attachment' => 'Image attached to the post', 'embedded' => 'Embedded URL in post');
	}
	else if ($entity_type == 'sitemap') {
		global $suffusion_sitemap_entities;
		$ret = array();
		foreach ($suffusion_sitemap_entities as $entity => $entity_options) {
			$ret[$entity] = $entity_options['title'];
		}
	}
    return $ret;
}

function suffusion_get_unified_options($update = false, $fetch_from_cache = true) {
	global $suf_cache_unified, $suffusion_unified_options;
	if (!isset($suf_cache_unified) || $suf_cache_unified == 'cache') {
		$unified_options_from_db = get_option('suffusion_unified_options');
		if (isset($unified_options_from_db) && isset($unified_options_from_db['suffusion_options_version']) && $fetch_from_cache) {
			$options_version = $unified_options_from_db['suffusion_options_version'];
			if ($options_version == SUFFUSION_THEME_VERSION) {
				return $unified_options_from_db;
			}
		}
	}

	$suffusion_unified_options = suffusion_update_unified_options(false, false, false);
	return $suffusion_unified_options;
}

/**
 * The unified options array combines values from 3 sources:
 *  1. The suffusion_options setting in the DB. If a field is here, it is written to the suffusion_unified_options array
 *  2. The settings.php file for individual skins. If a field is missing from suffusion_options, its value in the individual skins' settings.php file is picked
 *  3. The $suffusion_inbuilt_options array constructed for different options pages. This is the catch-all block, with standard
 *     values in this array being picked if no other value is available for a particular option.
 *
 * @param  $option_name
 * @param  $oldvalue
 * @param  $newvalue
 * @return array
 */
function suffusion_update_unified_options($option_name, $oldvalue, $newvalue) {
	global $suffusion_inbuilt_options, $suffusion_options, $skin_settings, $suffusion_theme_name, $suffusion_default_theme_name, $suffusion_unified_options;
	$template_path = get_template_directory();
	$stylesheet_path = get_stylesheet_directory();
	if (!@file_exists($template_path . "/admin/theme-options.php")) {
		return array();
	}

	include_once ($template_path . "/admin/theme-options.php");
	if (!isset($suffusion_inbuilt_options)) {
		return array();
	}
	$suffusion_theme_name = suffusion_get_theme_name();
	$suffusion_options = get_option('suffusion_options');
	if ($suffusion_theme_name == 'root') {
		$skin = $suffusion_default_theme_name;
	}
	else {
		$skin = $suffusion_theme_name;
	}

	if (file_exists($stylesheet_path . "/skins/$skin/settings.php")) {
		include_once($stylesheet_path . "/skins/$skin/settings.php");
	}
	else if (file_exists($template_path . "/skins/$skin/settings.php")) {
		include_once($template_path . "/skins/$skin/settings.php");
	}

	$unified_options_array = array();
	foreach ($suffusion_inbuilt_options as $value) {
		if (isset($value['id']) && isset($value['type']) && $value['type'] != 'button') {
			if (!isset($suffusion_options[$value['id']])) {
				if (is_array($skin_settings) && isset($skin_settings[$value['id']])) {
					$unified_options_array[$value['id']] = $skin_settings[$value['id']];
				}
				else if (isset($value['std'])) {
					$unified_options_array[$value['id']] = $value['std'];
				}
			}
			else if (isset($value['std']) && $suffusion_options[$value['id']] == $value['std']) {
				if (is_array($skin_settings) && isset($skin_settings[$value['id']])) {
					$unified_options_array[$value['id']] = $skin_settings[$value['id']];
				}
				else {
					$unified_options_array[$value['id']] = $suffusion_options[$value['id']];
				}
			}
			else {
				$unified_options_array[$value['id']] = $suffusion_options[$value['id']];
			}
		}
	}

	suffusion_set_options_version($unified_options_array);
	if (current_user_can('edit_theme_options')) {
		update_option('suffusion_unified_options', $unified_options_array);
		$suffusion_unified_options = get_option('suffusion_unified_options');
		//Not explicitly resetting all global options causes the CSS to be generated with old values, because suffusion_generate_all_custom_styles is executed right after this.
		foreach ($suffusion_unified_options as $op_id => $op_value) {
			global $$op_id;
			$$op_id = $op_value;
		}
	}
	return $unified_options_array;
}

if (!function_exists('suffusion_get_memory_usage')) {
	/**
	 * Returns the total memory usage for the script at any point.
	 *
	 * @param bool $echo Echoes the value if set to true
	 * @return string
	 */
	function suffusion_get_memory_usage($echo = true) {
		$ret = "";
		if (function_exists('memory_get_usage')) {
			$mem = memory_get_usage();
			$unit = "B";
			if ($mem > 1024) {
				$mem = round($mem / 1024);
				$unit = "KB";
				if ($mem > 1024) {
					$mem = round($mem / 1024);
					$unit = "MB";
				}
			}
			$ret = $mem . $unit;
			if ($echo) {
				echo $ret;
			}
		}
		return $ret;
	}
}

/**
 * Returns the name of the skin being used.
 *
 * @return string
 */
function suffusion_get_theme_name() {
    $suffusion_options = get_option('suffusion_options');
    if (!isset($suffusion_options['suf_color_scheme']) || $suffusion_options['suf_color_scheme'] === FALSE || $suffusion_options['suf_color_scheme'] == null || !isset($suffusion_options['suf_color_scheme'])) {
        $theme_name = 'root';
    }
    else {
        $theme_name = $suffusion_options['suf_color_scheme'];
    }
    return $theme_name;
}

/**
 * Sets the version of the theme in the suffusion_unified_options option. Starting from version 3.6.4 of the theme the unified options are stored
 * as a separate option in the database to avoid loading the huge $suffusion_inbuilt_options array into memory. However, to account for cases where some default values
 * of options are changed or some new options with new default values are introduced, this workaround is required.
 * It stores the version number as a part of the options, so that if the current version is newer than the options version, the options are recalculated
 *
 * @param  $suffusion_unified_options
 * @return void
 * @since 3.6.4
 */
function suffusion_set_options_version(&$suffusion_unified_options) {
	if (is_array($suffusion_unified_options)) {
		$suffusion_unified_options['suffusion_options_version'] = SUFFUSION_THEME_VERSION;
	}
}

function suffusion_get_template_prefixes() {
	$template_prefixes = array('1l-sidebar.php' => '_1l', '1r-sidebar.php' => '_1r', '1l1r-sidebar.php' => '_1l1r', '2l-sidebars.php' => '_2l', '2r-sidebars.php' => '_2r');
	$template_prefixes = apply_filters('suffusion_filter_template_prefixes', $template_prefixes);
	return $template_prefixes;
}

function suffusion_get_template_sidebars() {
	$template_sb = array('1l-sidebar.php' => 1, '1r-sidebar.php' => 1, '1l1r-sidebar.php' => 2, '2l-sidebars.php' => 2, '2r-sidebars.php' => 2);
	$template_sb = apply_filters('suffusion_filter_template_sidebars', $template_sb);
	return $template_sb;
}

function suffusion_new_vars($public_query_vars) {
	$public_query_vars[] = 'suffusion-css';
	return $public_query_vars;
}

/**
 * Makes a call to include custom-styles.php if a query variable is passed. This is the best alternative to avoiding file open calls in the theme OR dumping CSS in the HTML.
 *
 * @return void
 */
function suffusion_custom_css_display(){
	$css = get_query_var('suffusion-css');
	if ($css == 'css') {
		include_once (get_template_directory() . '/custom-styles.php');
		exit; //This stops WP from loading any further, otherwise wp-load will continue to load the rest of WP in the CSS page
	}
}

/**
 * Adds all stylesheets used by Suffusion. Even conditional stylesheets are loaded, by using the "style_loader_tag" filter hook.
 * The theme version is added as a URL parameter so that when you upgrade the latest version is picked up.
 *
 * @return void
 * @since 3.7.4
 */
function suffusion_enqueue_styles() {
	// We don't want to enqueue any styles if this is not an admin page
	if (is_admin()) {
		return;
	}

	global $suf_style_inheritance, $suffusion_theme_hierarchy, $suf_color_scheme, $suf_show_rounded_corners, $suf_autogen_css;
	$sheets = $suffusion_theme_hierarchy[$suf_color_scheme];

	$template_path = get_template_directory();
	$stylesheet_path = get_stylesheet_directory();

	// Core styles - either from Suffusion or from its child themes
	if ($suf_style_inheritance == 'nothing' && $stylesheet_path != $template_path) {
		wp_enqueue_style('suffusion-theme', get_stylesheet_directory_uri().'/style.css', array(), SUFFUSION_THEME_VERSION);
	}
	else {
		wp_enqueue_style("suffusion-theme", get_template_directory_uri().'/style.css', array(), SUFFUSION_THEME_VERSION);

		$skin_count = 0;
		foreach ($sheets as $sheet) {
			if ($sheet == 'style.css') {
				continue;
			}
			if (file_exists($template_path."/$sheet")) {
				$skin_count++;
				wp_enqueue_style("suffusion-theme-skin-{$skin_count}", get_template_directory_uri()."/$sheet", array('suffusion-theme'), SUFFUSION_THEME_VERSION);
			}
		}
		if ($stylesheet_path != $template_path) {
			wp_enqueue_style('suffusion-child', get_stylesheet_directory_uri().'/style.css', array('suffusion-theme'), SUFFUSION_THEME_VERSION);
		}
	}

	// Attachment styles. Loaded conditionally, because it uses a rather heavy image, which we don't want to load always.
	if (is_attachment()) {
		wp_enqueue_style('suffusion-attachment', get_template_directory_uri().'/attachment-styles.css', array('suffusion-theme'), SUFFUSION_THEME_VERSION);
	}

	// Rounded corners, loaded if the browser is not IE <= 8
	if ($suf_show_rounded_corners == 'show') {
		wp_register_style('suffusion-rounded', get_template_directory_uri().'/rounded-corners.css', array('suffusion-theme'), SUFFUSION_THEME_VERSION);
//		$GLOBALS['wp_styles']->add_data('suffusion_rounded', 'conditional', '!IE'); // Doesn't work (yet). See http://core.trac.wordpress.org/ticket/16118. Instead we will filter style_loader_tag
		wp_enqueue_style('suffusion-rounded');
	}

	// BP admin-bar, loaded only if this is a BP installation
	if (function_exists('bp_is_group')) {
		wp_enqueue_style('bp-admin-bar', apply_filters('bp_core_admin_bar_css', WP_PLUGIN_URL.'/buddypress/bp-themes/bp-default/_inc/css/adminbar.css'));
	}

	// IE-specific CSS, loaded if the browser is IE < 8
	wp_enqueue_style('suffusion-ie', get_template_directory_uri().'/ie-fix.css', array('suffusion-theme'), SUFFUSION_THEME_VERSION);

	if ($suf_autogen_css == 'autogen' || $suf_autogen_css == 'nogen-link') {
		// Custom styles, built based on selected options.
		wp_enqueue_style('suffusion-generated?suffusion-css=css', home_url(), array('suffusion-theme', 'suffusion-ie'), SUFFUSION_THEME_VERSION);
	}

	// Custom styles, from included CSS files
	for ($i = 1; $i <= 3; $i++) {
		$var = "suf_custom_css_link_{$i}";
		global $$var;
		if (isset($$var) && trim($$var) != "") {
			wp_enqueue_style('suffusion-included-'.$i, $$var, array('suffusion-theme'), null);
		}
	}
}

/**
 * Prints CSS directly into the source code. This is hooked via wp_head and not via wp_print_styles.
 *
 * @return void
 */
function suffusion_print_direct_styles() {
	global $suf_autogen_css, $suf_custom_css_code, $suf_header_style_setting, $suf_header_image_type, $suf_header_background_rot_folder;
	if ($suf_autogen_css == 'nogen' || $suf_autogen_css == 'autogen-inline') {
?>
	<!-- CSS styles constructed using option definitions -->
	<style type="text/css">
	<!--/*--><![CDATA[/*><!--*/
	<?php
		$suffusion_custom_css_string = suffusion_generate_all_custom_styles();
		echo $suffusion_custom_css_string;

		// Ensure that if your header background image is a rotating image, it is printed dynamically...
		if ($suf_header_style_setting == "custom") {
			if ($suf_header_image_type == "rot-image" && isset($suf_header_background_rot_folder) && trim($suf_header_background_rot_folder) != '') {
				$header_bg_url = " url(".suffusion_get_rotating_image($suf_header_background_rot_folder).") ";
				echo "#header-container { background-image: $header_bg_url; }\n";
			}
		}

		if (!suffusion_is_sidebar_empty(12)) {
			echo "#nav {float: left;}\n";
		}
	?>
	/*]]>*/-->
	</style>
<?php
	}
	else if (!suffusion_is_sidebar_empty(12)) {
		?>
<!-- CSS styles constructed using option definitions -->
<style type="text/css">
<!--/*--><![CDATA[/*><!--*/
#nav {float: left;}
/*]]>*/-->
</style>
		<?php
	}
	if (isset($suf_custom_css_code) && trim($suf_custom_css_code) != "") { ?>
		<!-- Custom CSS styles defined in options -->
		<style type="text/css">
			<!--/*--><![CDATA[/*><!--*/
<?php
	$strip = stripslashes($suf_custom_css_code);
	$strip = wp_specialchars_decode($strip, ENT_QUOTES);
	echo $strip;
?>
			/*]]>*/-->
		</style>
		<!-- /Custom CSS styles defined in options -->
<?php
	}
}

/**
 * Adds all non-conditional JS files used by Suffusion. Unlike styles, conditional JS files are not loaded because there is no
 * "script_loader_tag" filter hook analogous to the "style_loader_tag" filter hook.
 *
 * @return void
 */
function suffusion_enqueue_scripts() {
	if (is_admin()) {
		return;
	}

	suffusion_include_featured_js();
	suffusion_include_jqfix_js();
	suffusion_include_google_translate_js();
	suffusion_include_bp_js();
	suffusion_include_custom_js_files();
	if (suffusion_should_include_dbx()) {
		wp_enqueue_script('suffusion-dbx', get_template_directory_uri() . '/dbx.js', array(), null);
	}
}

/**
 * Prints JS directly in the source code. This is hooked using wp_head instead of wp_print_scripts
 * @return void
 */
function suffusion_print_direct_scripts() {
	suffusion_include_dbx();
	suffusion_include_custom_header_js();
}

/**
 * Core function to generate the custom CSS. This is used by custom-styles.php to print out the stylesheet, if CSS auto-generation
 * is switched off.
 *
 * @param bool $echo
 * @return string
 * @since 3.7.4
 */
function suffusion_generate_all_custom_styles($echo = false) {
	global $suf_size_options, $suf_sidebar_count, $suf_minify_css;
	$suffusion_custom_css_string = "";
	$suffusion_css_generator = new Suffusion_CSS_Generator(date(get_option('date_format').' '.get_option('time_format')));

	$suffusion_custom_css_string .= "/* ".$suffusion_css_generator->get_creation_date()." */";
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_body_settings();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_wrapper_settings();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_post_bg_settings();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_body_font_settings();

	$suffusion_template_prefixes = suffusion_get_template_prefixes();
	$suffusion_template_sidebars = suffusion_get_template_sidebars();
	foreach ($suffusion_template_prefixes as $template => $prefix) {
		$sb_count = $suffusion_template_sidebars[$template];
		$suffusion_template_widths = $suffusion_css_generator->get_widths_for_template($prefix, $sb_count, $template);
		$template_class = '.page-template-'.str_replace('.', '-', $template);
		$suffusion_custom_css_string .= $suffusion_css_generator->get_template_specific_classes($template_class, $suffusion_template_widths);
	}

	if ($suf_size_options == "custom") {
		$suffusion_template_widths = $suffusion_css_generator->get_widths_for_template(false, $suf_sidebar_count);
	}
	else {
		// We still need to get the array of widths for the sidebars.
		$suffusion_template_widths = $suffusion_css_generator->get_automatic_widths(1000, $suf_sidebar_count, false);
	}

	// The default settings:
	$suffusion_custom_css_string .= $suffusion_css_generator->get_template_specific_classes('', $suffusion_template_widths);

	// For the no-sidebars.php template (uses the same widths as computed for the default settings):
	$suffusion_custom_css_string .= $suffusion_css_generator->get_zero_sidebars_template_widths();

	$suffusion_custom_css_string .= $suffusion_css_generator->get_mag_template_widths($suffusion_template_widths);

	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_date_box_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_byline_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_header_settings();

	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_tbrh_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_wabh_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_waaf_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_featured_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_emphasis_css();

	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_adhoc_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_tiled_layout_css($suffusion_template_widths);
	$suffusion_custom_css_string .= $suffusion_css_generator->get_finalized_header_footer_nav_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_nr_css($suffusion_template_widths);

	$suffusion_custom_css_string .= $suffusion_css_generator->get_navigation_bar_custom_css('nav');
	$suffusion_custom_css_string .= $suffusion_css_generator->get_navigation_bar_custom_css('nav-top');

	$post_formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$suffusion_custom_css_string .= $suffusion_css_generator->get_pullout_css('post');
	foreach ($post_formats as $format) {
		$suffusion_custom_css_string .= $suffusion_css_generator->get_pullout_css('post', $format);
	}
	$suffusion_custom_css_string .= $suffusion_css_generator->get_pullout_css('page');

	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_miscellaneous_css();
	$suffusion_custom_css_string .= $suffusion_css_generator->get_custom_sidebar_settings_css();

	if ($suf_minify_css == 'minify') {
		$suffusion_custom_css_string = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $suffusion_custom_css_string);
		/* remove tabs, spaces, newlines, etc. */
		$suffusion_custom_css_string = str_replace(array("\r\n", "\r", "\n", "\t"), '', $suffusion_custom_css_string);
		$suffusion_custom_css_string = str_replace(array('  ', '   ', '    ', '     '), ' ', $suffusion_custom_css_string);
		$suffusion_custom_css_string = str_replace(array(": ", " :"), ':', $suffusion_custom_css_string);
		$suffusion_custom_css_string = str_replace(array(" {", "{ "), '{', $suffusion_custom_css_string);
		$suffusion_custom_css_string = str_replace(';}','}', $suffusion_custom_css_string);
		$suffusion_custom_css_string = str_replace(', ', ',', $suffusion_custom_css_string);
		$suffusion_custom_css_string = str_replace('; ', ';', $suffusion_custom_css_string);
	}

	if ($echo) {
		echo $suffusion_custom_css_string;
	}

	return $suffusion_custom_css_string;
}

function suffusion_get_interactive_text_fields() {
	global $suffusion_inbuilt_options;
	$field_titles = get_option('suffusion_options_field_titles');
	if (isset($field_titles) && is_array($field_titles)) {
		$theme_version = $field_titles['theme-version'];
	}

	if ((isset($theme_version) && $theme_version != SUFFUSION_THEME_VERSION) || (!isset($theme_version))) {
		$field_titles = array();
		include_once (get_template_directory() . "/admin/theme-options.php");
		foreach ($suffusion_inbuilt_options as $option) {
			if (isset($option['id'])) {
				$field_titles[$option['id']] = isset($option['name']) ? $option['name'] : '';
			}
		}
		$field_titles['theme-version'] = SUFFUSION_THEME_VERSION;
		if (current_user_can('edit_theme_options')) {
			update_option('suffusion_options_field_titles', $field_titles);
		}
	}
	return $field_titles;
}

/**
 * Updates the generated CSS upon saving.
 *
 * @param  $option_name
 * @param  $old_value
 * @param  $new_value
 * @return mixed|string|void
 */
function suffusion_update_generated_css($option_name = null, $old_value = null, $new_value = null) {
	//We will check for existence of the CSS Generator because in case of version changes the first load fails with a fatal error.
	if (class_exists('Suffusion_CSS_Generator')) {
		if (current_user_can('edit_theme_options')) {
			$custom_css = suffusion_generate_all_custom_styles();
			update_option('suffusion_generated_css', $custom_css);
		}
		$custom_css = get_option('suffusion_generated_css');
		return $custom_css;
	}
	return false;
}

/**
 * Create the options menu.
 * @return void
 */
function suffusion_add_admin_menus() {
	$suffusion_options_manager = add_theme_page('Suffusion Options', 'Suffusion Options', 'edit_theme_options', 'suffusion-options-manager', 'suffusion_render_options');
	add_action("admin_print_scripts-$suffusion_options_manager", 'suffusion_admin_script_loader');
	add_action("admin_print_styles-$suffusion_options_manager", 'suffusion_admin_style_loader');
}

/**
 * Returns the post format for the post. For WP < 3.1 it returns 'standard', and for WP >= 3.1 it returns 'standard' for the default
 * format and the actual format otherwise.
 *
 * @return mixed|string
 */
function suffusion_get_post_format() {
	if (!function_exists('get_post_format')) {
		return 'standard';
	}
	$format = get_post_format();
	if (false === $format) {
		return 'standard';
	}
	return $format;
}

/**
 * Returns the page template associated with a page. If there is no template associated, 'page' is returned. If there is a template,
 * the returned value is page-template-name. E.g. For the Single Left Sidebar the returned value is page-1l-sidebar.
 *
 * @return string
 */
function suffusion_get_page_template() {
	$template = get_page_template();
	$template_directory = get_template_directory();
	if (strlen($template) > strlen($template_directory) && substr($template, 0, strlen($template_directory)) == $template_directory) {
		$stripped_template = substr($template, strlen($template_directory) + 1);
		$stripped_template = str_replace('/', '-', $stripped_template);
		$stripped_template = str_replace('.php', '', $stripped_template);
		if ($stripped_template != 'page') {
			$stripped_template = 'page-'.$stripped_template;
		}
		return $stripped_template;
	}
	else {
		return 'page';
	}
}

/**
 * Magazine template function to get headlines
 *
 * @return array
 */
function suffusion_get_headlines() {
	global $post, $wpdb, $suf_mag_headline_limit;
	$headlines = array();
	$solos = array();
	$suf_mag_headline_limit = (int)$suf_mag_headline_limit;
	$quota_full = false;

	// Previously the script was loading all posts into memory using get_posts and checking the meta field. This causes the code to crash if the # posts is high.
	$querystr = "SELECT wposts.*
		FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
		WHERE wposts.ID = wpostmeta.post_id
	    AND wpostmeta.meta_key = 'suf_magazine_headline'
	    AND wpostmeta.meta_value = 'on'
	    AND wposts.post_status = 'publish'
	    AND wposts.post_type = 'post'
	    ORDER BY wposts.post_date DESC
	 ";

	$head_posts = $wpdb->get_results($querystr, OBJECT);
	foreach ($head_posts as $post) {
		setup_postdata($post);
		$headlines[] = $post;
		$solos[] = $post->ID;
		if (count($headlines) == $suf_mag_headline_limit) {
			$quota_full = true;
			break;
		}
	}

	if ($quota_full) {
		return $headlines;
	}

	$headline_categories = suffusion_get_allowed_categories('suf_mag_headline_categories');
	if (is_array($headline_categories) && count($headline_categories) > 0) {
		$query_cats = array();
		foreach ($headline_categories as $headline_category) {
			$query_cats[] = $headline_category->cat_ID;
		}
		$query_posts = implode(",", array_values($query_cats));
		$cat_query = new WP_query(array('cat' => $query_posts, 'post__not_in' => $solos));
	}

	if (isset($cat_query->posts) && is_array($cat_query->posts)) {
		while ($cat_query->have_posts()) {
			$cat_query->the_post();
			$headlines[] = $post;
			if (count($headlines) == $suf_mag_headline_limit) {
				$quota_full = true;
				break;
			}
		}
	}
	return $headlines;
}

/**
 * Magazine template function to build queries for individual magazine sections.
 *
 * @param array $args
 * @return array
 */
function suffusion_get_mag_section_queries($args = array()) {
	global $post, $wpdb, $suf_mag_total_excerpts;
	$meta_check_field = $args['meta_check_field'];
	$solos = array();
	$queries = array();

	if ($meta_check_field) {
		// Previously the script was loading all posts into memory using get_posts and checking the meta field. This causes the code to crash if the # posts is high.
		$querystr = "SELECT wposts.*
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id
		    AND wpostmeta.meta_key = '$meta_check_field'
		    AND wpostmeta.meta_value = 'on'
		    AND wposts.post_status = 'publish'
		    AND wposts.post_type = 'post'
		    ORDER BY wposts.post_date DESC
		 ";

		$post_results = $wpdb->get_results($querystr, OBJECT);
		foreach ($post_results as $post) {
			setup_postdata($post);
			$solos[] = $post->ID;
		}
	}
	if (count($solos) > 0) {
		$solo_query = new WP_query(array('post__in' => $solos, 'caller_get_posts' => 1));
		$queries[] = $solo_query;
	}

	$category_prefix = $args['category_prefix'];
	if ($category_prefix) {
		$categories = suffusion_get_allowed_categories($category_prefix);
		if (is_array($categories) && count($categories) > 0) {
			$query_cats = array();
			foreach ($categories as $category) {
				$query_cats[] = $category->cat_ID;
			}
			$query_posts = implode(",", array_values($query_cats));
			$cat_query = new WP_query(array('cat' => $query_posts, 'post__not_in' => $solos, 'posts_per_page' => (int)$suf_mag_total_excerpts));
			$queries[] = $cat_query;
		}
	}
	return $queries;
}

/**
 * Caches the postmeta information specific to Suffusion upfront. This eases up the number of queries involving get_post_meta.
 * This is particularly useful for the navigation bar.
 *
 * @return void
 * @since 3.8.3
 */
function suffusion_query_post_meta() {
	global $wpdb;
	$query = "SELECT wposts.ID, wpostmeta.meta_key, wpostmeta.meta_value
		FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
		WHERE wposts.ID = wpostmeta.post_id
	    AND wpostmeta.meta_key LIKE 'suf_%'
	    AND wposts.post_status = 'publish'";

	$meta_by_id = array();
	$meta_by_key = array();

	$meta_results = $wpdb->get_results($query, ARRAY_A);
	foreach ($meta_results as $result) {
		if (isset($meta_by_id[$result['ID']])) {
			$metas_by_id = $meta_by_id[$result['ID']];
		}
		else {
			$metas_by_id = array();
		}

		if (isset($meta_by_key[$result['meta_key']])) {
			$metas_by_key = $meta_by_key[$result['meta_key']];
		}
		else {
			$metas_by_key = array();
		}

		$metas_by_id[$result['meta_key']] = $result['meta_value'];
		$meta_by_id[$result['ID']] = $metas_by_id;

		$metas_by_key[$result['ID']] = $result['meta_value'];
		$meta_by_key[$result['meta_key']] = $metas_by_key;
	}

	global $suffusion_meta_fields_by_id, $suffusion_meta_fields_by_key;
	$suffusion_meta_fields_by_id = $meta_by_id;
	$suffusion_meta_fields_by_key = $meta_by_key;
}

/**
 * Fetches a specific meta field for a post.
 *
 * @param $id
 * @param $meta_key
 * @param bool $single
 * @return bool|mixed
 * @since 3.8.3
 */
function suffusion_get_post_meta($id, $meta_key, $single = false) {
	global $suffusion_meta_fields_by_id;
	if (!isset($suffusion_meta_fields_by_id)) {
		suffusion_query_post_meta();
	}
	if (isset($suffusion_meta_fields_by_id) && isset($suffusion_meta_fields_by_id[$id])) {
		if (isset($suffusion_meta_fields_by_id[$id][$meta_key])) {
			return $suffusion_meta_fields_by_id[$id][$meta_key];
		}
		else {
			return false;
		}
	}
	else {
		return get_post_meta($id, $meta_key, $single);
	}
}

function suffusion_is_sidebar_empty($index) {
	$sidebars = wp_get_sidebars_widgets();
	if (!isset($sidebars['sidebar-'.$index]) || $sidebars['sidebar-'.$index] == null || (is_array($sidebars['sidebar-'.$index]) && count($sidebars['sidebar-'.$index]) == 0)) {
		return true;
	}
	return false;
}

function suffusion_sidebar_widget_count($index) {
	$sidebars = wp_get_sidebars_widgets();
	if (!isset($sidebars['sidebar-'.$index]) || $sidebars['sidebar-'.$index] == null || (is_array($sidebars['sidebar-'.$index]) && count($sidebars['sidebar-'.$index]) == 0)) {
		return 0;
	}
	return count($sidebars['sidebar-'.$index]);
}

?>
