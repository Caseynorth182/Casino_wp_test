<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Casino_testing_theme
 */

get_header();
the_post();

define('ASSETS_PATH', get_template_directory_uri());
$post_thumb_url = get_the_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full')  : ASSETS_PATH . '/assets/img/amit-lahav-HffApi3okak-unsplash.webp';
/* echo "<pre>";
var_dump($post_thumb_url);
echo "</pre>"; */
?>

<section id="particles-js" class="hero_small particles-js"
    style="background-image: url(<?php echo $post_thumb_url ?>);">
    <div class="container">
        <h1 class="page_title">
            <?php the_title() ?>
        </h1>
        <h2 class="page_subtitle">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, tempore.
        </h2>
    </div>

</section>

<section class="single_content single">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php the_content() ?>
            </div>
            <div class="col-lg-6">
                <div class="single__bg-image">
                    <?php the_post_thumbnail('large', [
                        'class' => 'single__bg-image__img img-fluid'
                    ]) ?>
                </div>
            </div>
        </div>


    </div>

</section>

<?php
get_footer();