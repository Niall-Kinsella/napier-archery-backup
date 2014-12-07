<?php
/**
 * This file creates a tile-style layout of posts, useful in a magazine blog.
 * This file is not to be loaded directly, but is instead loaded from different templates.
 *
 * @package Suffusion
 * @subpackage Templates
 */

global $query_string, $wp_query, $suffusion_current_post_index, $suffusion_full_post_count_for_view, $suffusion_tile_layout, $suffusion_duplicate_posts;
$suffusion_tile_layout = true;
global $suffusion_unified_options;
foreach ($suffusion_unified_options as $id => $value) {
	$$id = $value;
}
if (!isset($suffusion_duplicate_posts)) $suffusion_duplicate_posts = array();

if (have_posts()) {
	$suffusion_current_post_index = 0;
	$suffusion_full_post_count_for_view = suffusion_get_full_content_count();

	$number_of_cols = count($wp_query->posts) - $suffusion_full_post_count_for_view;
	$total = count($wp_query->posts) - $suffusion_full_post_count_for_view;

	while (have_posts()) {
		$suffusion_current_post_index++;
		if ($suffusion_current_post_index > $suffusion_full_post_count_for_view) {
			break;
		}
		the_post();
		if (in_array($post->ID, $suffusion_duplicate_posts)) {
			$suffusion_current_post_index--;
			continue;
		}
?>
	<div <?php post_class();?> id="post-<?php the_ID(); ?>">
<?php
		suffusion_after_begin_post();
?>
		<div class="entry-container fix">
			<div class="entry fix">
<?php
		suffusion_content();
?>
			</div><!--entry -->
<?php
		suffusion_after_content();
?>
		</div><!-- .entry-container -->
<?php
		suffusion_before_end_post();
?>
	</div><!--post -->
<?php
	}

	if ($number_of_cols > (int)$suf_tile_excerpts_per_row) {
		$number_of_cols = (int)$suf_tile_excerpts_per_row;
	}

	if ($number_of_cols > 0) {
?>
<table class='suf-tiles'>
<?php
		for ($i = 0; $i < $number_of_cols - 1; $i++) {
			echo "\t<col class='suf-tile'/>\n";
		}
		echo "\t<col/>\n";
		$ctr = 0;
		while (have_posts()) {
			the_post();
			if (in_array($post->ID, $suffusion_duplicate_posts)) {
				continue;
			}
			if ($ctr%$number_of_cols == 0) {
				echo "<tr>\n";
			}

			echo "<td>\n";
			echo "\t<div class='suf-tile'>\n";
			$image_size = $suf_tile_image_settings == 'inherit' ? 'mag-excerpt' : 'tile-thumb';
			$image_link = suffusion_get_image(array($image_size => true));

			if (($suf_tile_images_enabled == 'show') || ($suf_tile_images_enabled == 'hide-empty' && $image_link != '')) {
				echo "\t\t<div class='suf-tile-image'>".$image_link."</div>\n";
			}
			echo "\t\t<h2 class='suf-tile-title'><a class='entry-title' rel='bookmark' href='".get_permalink($post->ID)."'>".get_the_title($post->ID)."</a></h2>\n";

			global $suffusion_byline_type;
			$suffusion_byline_type = 'tile_layout';
			get_template_part('custom/byline', 'tile');

			echo "\t\t<div class='suf-tile-text entry-content'>\n";
			suffusion_excerpt();
			echo "\t\t</div>\n";
			if (trim($suf_mag_excerpt_full_story_text)) {
				echo "\t\t<a href='".get_permalink($post->ID)."' class='suf-mag-excerpt-full-story'>$suf_mag_excerpt_full_story_text</a>";
			}

			echo "\t</div>\n";
			echo "</td>\n";

			if ($ctr == $total - 1 || $ctr%$number_of_cols == $number_of_cols - 1) {
				echo "</tr>\n";
			}
			$ctr++;
		}
?>
</table>
<?php
	}
	suffusion_before_end_content();
}
else {
	get_template_part('layouts/template-missing');
}
?>