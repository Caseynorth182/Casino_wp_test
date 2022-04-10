<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Casino_testing_theme
 */

get_header();



?>

<section id="particles-js" class="hero_small" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/img/amit-lahav-HffApi3okak-unsplash.webp);">
	<div class="container">

		<h1 class="page_title">
			<? echo get_the_archive_title() ?>
		</h1>
		<!-- <h2 class="page_subtitle">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, tempore.
        </h2> -->
	</div>

</section>

<section class="blog_content">
	<div class="container">
		<!-- <h2 class="section__title">
            Blog
        </h2>
        <span class="section__subtitle">
            Some text
        </span> -->
		<div class="row">
			<?php
			$blog_items = new WP_Query([
				'posts_per_page' => -1,
				'cat' => 3,
				'orderby' => 'date'
			]);
			if ($blog_items->have_posts()) :
				while ($blog_items->have_posts()) :
					$blog_items->the_post();
			?>
					<div class="col-lg-4  p-2">
						<div class="card">
							<?php
							the_post_thumbnail('medium', [
								'class' => 'card-img-top img-fluid intro__card__img',
							]);
							?>
							<div class="card-body">
								<h5 class="card-title"><?php the_title() ?></h5>
								<p class="card-text"><?php echo excerpt(20) ?></p>
								<a class="card__permalink" href="<?php the_permalink() ?>">
									read more
								</a>
							</div>
						</div>
					</div>

			<?php
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>

	</div>

</section>



<?php

get_footer();
