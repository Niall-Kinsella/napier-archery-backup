<?php
/**
 * Template Name: Magazine
 *
 * Creates a page with a magazine-style layout. If you have a magazine-themed
 * blog you should can use this to define your front page.
 *
 * @package Suffusion
 * @subpackage Templates
 */

get_header();

global $suffusion_unified_options, $post;
foreach ($suffusion_unified_options as $id => $value) {
	$$id = $value;
}
?>

    <div id="main-col">
<?php suffusion_before_begin_content(); ?>
      <div id="content" class="hfeed">
	<?php suffusion_after_begin_content(); ?>
	<?php if (have_posts() && $suf_mag_content_enabled == "show") : ?>

		<?php while (have_posts()) : the_post(); ?>

        <div class="post fix" id="post-<?php the_ID(); ?>">
<?php suffusion_after_begin_post(); ?>

          <div class="entry fix">
			<?php suffusion_content(); ?>
          </div><!--entry -->
		<?php suffusion_before_end_post(); ?>
		</div><!--post -->
		<?php endwhile; ?>
		<?php suffusion_before_end_content(); ?>
	<?php endif; ?>

<?php
if (is_array($suf_mag_entity_order)) {
	$sequence = array();
	foreach ($suf_mag_entity_order as $key => $value) {
		$sequence[] = $value['key'];
	}
}
else {
	$sequence = explode(',', $suf_mag_entity_order);
}

foreach ($sequence as $entity) {
	if ($suf_mag_headlines_enabled == 'show' && $entity == 'headlines') {
		global $suf_mag_headline_title;
		if (trim($suf_mag_headline_title)) {
		?>
			<h2 class='suf-mag-headlines-title fix'><?php echo stripslashes($suf_mag_headline_title); ?></h2>
		<?php
		}
		?>
		<div class='suf-mag-headlines fix'>
			<div class='suf-mag-headline-block'>
		<?php
			$headlines = suffusion_get_headlines();
			$headline_ctr = 0;
			if (count($headlines) > 0) {
		?>
				<ul class='mag-headlines'>
		<?php
				$headline_ctr = 0;
				foreach ($headlines as $post) {
					$headline_ctr++;
					if ($headline_ctr == 1) {
						$first_class = 'suf-mag-headline-first';
					}
					else {
						$first_class = '';
					}
		?>
					<li class='suf-mag-headline-<?php echo $post->ID?> suf-mag-headline <?php echo $first_class; ?>'>
						<a href="<?php echo get_permalink($post->ID); ?>" class='suf-mag-headline-<?php echo $post->ID?> suf-mag-headline'><?php echo get_the_title($post->ID); ?></a>
					</li>
		<?php
				}
		?>
				</ul>
		<?php
			}
		?>
			</div>
			<div class='suf-mag-headline-photo-box'>
		<?php
			$headline_ctr = 0;
			foreach ($headlines as $post) {
				$headline_ctr++;
				if ($headline_ctr == 1) {
					$first_class = 'suf-mag-headline-photo-first';
				}
				else {
					$first_class = '';
				}
		?>
				<div class='suf-mag-headline-photo-<?php echo $post->ID?> suf-mag-headline-photo <?php echo $first_class;?>'>
		<?php
				echo suffusion_get_image(array('mag-headline' => true));
		?>
				</div>
		<?php
			}
		?>
			</div>
		</div><!-- /.suf-mag-headlines -->
		<?php
	}
	else if ($suf_mag_excerpts_enabled == 'show' && $entity == 'excerpts') {
		$queries = suffusion_get_mag_section_queries(array('meta_check_field' => 'suf_magazine_excerpt', 'category_prefix' => 'suf_mag_excerpt_categories'));
		$total = 0;
		foreach ($queries as $query) {
			if (isset($query->posts) && is_array($query->posts)) {
				$total += count($query->posts);
			}
		}
		if ($total > 0) {
		//	echo suffusion_show_mag_excerpts_table($queries, $total);
			global $suf_mag_excerpts_per_row, $suf_mag_excerpts_title, $suf_mag_total_excerpts;
			echo "<table class='suf-mag-excerpts'>\n";
			for ($i = 0; $i < (int)$suf_mag_excerpts_per_row - 1; $i++) {
				echo "\t<col class='suf-mag-excerpt'/>\n";
			}
			echo "\t<col/>\n";
			if (trim($suf_mag_excerpts_title) != '') {
				echo "\t<tr>\n";
				echo "\t\t<th colspan='$suf_mag_excerpts_per_row'>".stripslashes($suf_mag_excerpts_title)."</th>\n";
				echo "\t</tr>\n";
			}
		//	echo suffusion_show_mag_excerpts($queries, $total);

			$ctr = 0;
			foreach ($queries as $query) {
				if (isset($query->posts) && is_array($query->posts)) {
					while ($query->have_posts()) {
						if ($ctr >= $suf_mag_total_excerpts) {
							break;
						}
						$query->the_post();
						if ($ctr%$suf_mag_excerpts_per_row == 0) {
							echo "<tr>\n";
						}
		//				echo suffusion_show_mag_single_excerpt();

						global $post, $suf_mag_excerpt_full_story_text, $suf_mag_excerpts_images_enabled;
						echo "<td>\n";
						echo "\t<div class='suf-mag-excerpt entry-content'>\n";

						$image_link = suffusion_get_image(array('mag-excerpt' => true));
						if (($suf_mag_excerpts_images_enabled == 'show') || ($suf_mag_excerpts_images_enabled == 'hide-empty' && $image_link != '')) {
							echo "\t\t<div class='suf-mag-excerpt-image'>".$image_link."</div>\n";
						}
						echo "\t\t<h2  class='suf-mag-excerpt-title'><a class='entry-title' rel='bookmark' href='".get_permalink($post->ID)."'>".get_the_title($post->ID)."</a></h2>\n";

						global $suffusion_byline_type;
						$suffusion_byline_type = 'mag_excerpt';
						get_template_part('custom/byline', 'tile');

						echo "\t\t<div class='suf-mag-excerpt-text entry-content'>\n";
						suffusion_excerpt();
						echo "\t\t</div>\n";
						if (trim($suf_mag_excerpt_full_story_text)) {
							echo "\t\t<a href='".get_permalink($post->ID)."' class='suf-mag-excerpt-full-story'>$suf_mag_excerpt_full_story_text</a>";
						}

						echo "\t</div>\n";
						echo "</td>\n";

						if ($ctr == $total - 1 || $ctr%$suf_mag_excerpts_per_row == $suf_mag_excerpts_per_row - 1) {
							echo "</tr>\n";
						}
						$ctr++;
					}
				}
			}

			echo "</table>\n";
		}
	}
	else if ($suf_mag_categories_enabled == 'show' && $entity == 'categories') {
		$categories = suffusion_get_allowed_categories('suf_mag_catblock_categories');
		if ($categories != null && is_array($categories) && count($categories) > 0) {
			$total = count($categories);
			global $suf_mag_catblocks_per_row, $suf_mag_catblocks_title;
			echo "<table class='suf-mag-categories'>\n";
			for ($i = 0; $i < (int)$suf_mag_catblocks_per_row - 1; $i++) {
				echo "\t<col class='suf-mag-category'/>\n";
			}
			echo "\t<col/>\n";
			if (trim($suf_mag_catblocks_title) != '') {
				echo "\t<tr>\n";
				echo "\t\t<th colspan='$suf_mag_catblocks_per_row'>".stripslashes($suf_mag_catblocks_title)."</th>\n";
				echo "\t</tr>\n";
			}

			$ctr = 0;
			if (is_array($categories)) {
				foreach ($categories as $category) {
					if ($ctr%$suf_mag_catblocks_per_row == 0) {
						echo "<tr>\n";
					}

					global $suf_mag_catblocks_images_enabled, $suf_mag_catblocks_desc_enabled, $suf_mag_catblocks_posts_enabled, $suf_mag_catblocks_num_posts;
					global $suf_mag_catblocks_see_all_text, $suf_mag_catblocks_post_style, $suf_mag_catblocks_thumbnail_size;
					echo "";
					echo "<td>\n";
					echo "\t<h2 class='suf-mag-category-title'>".$category->cat_name;
					echo "</h2>";

					echo "\t<div class='suf-mag-category'>\n";
					if ($suf_mag_catblocks_images_enabled != 'hide') {
						if (function_exists('get_cat_icon')) {
							$cat_icon = get_cat_icon('echo=false&cat='.$category->cat_ID);
							if (($suf_mag_catblocks_images_enabled == 'hide-empty' && trim($cat_icon) != '') || $suf_mag_catblocks_images_enabled == 'show') {
								echo "\t\t<div class='suf-mag-category-image'>";
								echo $cat_icon;
								echo "</div>\n";
							}
						}
					}
					if ($suf_mag_catblocks_desc_enabled == 'show') {
						echo $category->category_description;
					}
					if ($suf_mag_catblocks_posts_enabled == 'show') {
						$cat_args = array('cat' => $category->cat_ID, 'posts_per_page' => $suf_mag_catblocks_num_posts);
						if (function_exists('mycategoryorder')) {
							$cat_args['orderby'] = 'order';
						}

						$query = new WP_query($cat_args);
						if (isset($query->posts) && is_array($query->posts) && count($query->posts) > 0) {
							if ($suf_mag_catblocks_post_style == 'magazine') {
								$ul_class = " class='suf-mag-catblock-posts' ";
								$li_class = " class='suf-mag-catblock-post' ";
							}
							else if ($suf_mag_catblocks_post_style == 'thumbnail' || $suf_mag_catblocks_post_style == 'thumbnail-excerpt') {
								$ul_class = " class='suf-posts-thumbnail' ";
								$li_class = " class='fix' ";
							}
							echo "<ul $ul_class>\n";
							while ($query->have_posts())  {
								$query->the_post();
								if ($suf_mag_catblocks_post_style == 'thumbnail') {
									$image = suffusion_get_image(array('widget-thumb' => 'widget-' . $suf_mag_catblocks_thumbnail_size));
									echo "<li class='fix'><div class='suf-widget-thumb'>" . $image . "</div><a href='" . get_permalink() . "' class='suf-widget-thumb-title'>" . get_the_title() . "</a></li>\n";
								}
								else if ($suf_mag_catblocks_post_style == 'thumbnail-excerpt') {
									$image = suffusion_get_image(array('widget-thumb' => 'widget-' . $suf_mag_catblocks_thumbnail_size));
									echo "<li class='fix'><div class='suf-widget-thumb'>" . $image . "</div><a href='" . get_permalink() . "' class='suf-widget-thumb-title'>" . get_the_title() . "</a>" . suffusion_excerpt(false, false, true, 'suffusion_excerpt_length_cat_block') . "</li>\n";
								}
								else {
									echo "<li $li_class><a href='" . get_permalink() . "' class='suf-mag-catblock-post'>" . get_the_title() . "</a></li>\n";
								}
							}
							echo "</ul>";
						}
					}
					if (trim($suf_mag_catblocks_see_all_text)) {
						echo "\t<div class='suf-mag-category-footer'>\n";
						echo "\t\t<a href='".get_category_link($category->cat_ID)."' class='suf-mag-category-all-posts'>$suf_mag_catblocks_see_all_text</a>";
						echo "\t</div>\n";
					}

					echo "\t</div>\n";
					echo "</td>\n";

					if ($ctr == $total - 1 || $ctr%$suf_mag_catblocks_per_row == $suf_mag_catblocks_per_row - 1) {
						echo "</tr>\n";
					}
					$ctr++;
				}
			}

			echo "</table>\n";
		}
	}
}
?>
      </div><!-- content -->
    </div><!-- main col -->
	<?php get_footer(); ?>