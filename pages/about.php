<?
/*
    Template name: About
*/

get_header();
$page_subtitle = get_field('about_page_subtitle');
$about_city = get_field('about_city');
$about_street = get_field('about_street');
$phone = get_field('phone');
$mail = get_field('mail');
$about_page_image = get_field('about_page_image');
?>
<section id="particles-js" class="hero_small" style="background-image: url(<?= get_template_directory_uri() ?>/assets//img/amit-lahav-HffApi3okak-unsplash.webp);">
    <div class="container">
        <h1 class="page_title">
            <?php the_title() ?>
        </h1>
        <h2 class="page_subtitle">
            <?php echo $page_subtitle ?>
        </h2>
    </div>

</section>

<section class="single_content about__page">
    <div class="row">
        <div class="col-6">
            <img src="<?= $about_page_image ?>" alt="" class="about__page-img img-fluid">
        </div>
        <div class="col-6">
            <div class="about__page-content">
                <div class="about__page-title"><?= $about_city ?></div>
                <div class="about__page-subtitle"><?= $about_street  ?></div>
                <div class="about__page-address"><?= $mail ?></div>
                <div class="about__page-phone">
                    <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                </div>
            </div>
        </div>


    </div>
    <div class="container">
        <div class="form-block">
            <span class=" form_line mt-2 mb-2 text-center" style=""><strong>send you questions</strong></span>

            <?php echo do_shortcode('[contact-form-7 id="106" title="Контактная форма 1"]') ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>