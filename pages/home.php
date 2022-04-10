<?php
/*
    Template name: Главная;
*/

get_header();

?>
<section class="hero">
    <?php
    $hero_title = get_field('hero_title');
    $hero_subtitle = get_field('hero_subtitle');
    $hero_slider = get_field('hero_slider');

    ?>
    <div class="hero_wwrapper">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php
                if ($hero_slider) :
                    foreach ($hero_slider as $slider) :
                ?>

                <div class="swiper-slide">
                    <picture>
                        <source srcset="<?php echo $slider ?>" type="image/webp">
                        <source srcset="<?php echo $slider ?>" type="image/jpeg">
                        <img class="swiper-slide__img" src="<?php echo $slider ?>" alt="">
                    </picture>
                </div>

                <?php
                    endforeach;
                else :;
                    ?>

                <div class="swiper-slide">
                    <picture>
                        <source
                            srcset="<?php echo get_template_directory_uri() ?>/assets/img/john-schnobrich-VnHzobjGra4-unsplash.webp"
                            type="image/webp">
                        <source
                            srcset="<?php echo get_template_directory_uri() ?>/assets/img/john-schnobrich-VnHzobjGra4-unsplash.webp"
                            type="image/jpeg">
                        <img class="swiper-slide__img"
                            src="<?php echo get_template_directory_uri() ?>/assets/img/john-schnobrich-VnHzobjGra4-unsplash.webp"
                            alt="">
                    </picture>
                </div>

                <?php
                endif;
                ?>
            </div>

            <?php if ($hero_title || $hero_subtitl) : ?>
            <div class="hero__main-text">

                <h1 class="hero__title">
                    <?php echo  $hero_title ?>
                </h1>
                <p class="hero__descr">
                    <?php echo $hero_subtitle ?>
                </p>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- //ANCHOR Intro -->
<section class="intro">
    <?php
    $intro_title = get_field('about_title', get_the_id());
    $intro_subtitle = get_field('about_subtitle', get_the_id());
    ?>
    <div class="container">
        <h2 class="section__title">
            <?php echo   $intro_title ?>
        </h2>
        <span class="section__subtitle">
            <?php echo   $intro_subtitle ?>
        </span>

        <div class="row">
            <?php
            $blog_items = new WP_Query([
                'posts_per_page' => 2,
                'cat' => 3,
                'orderby' => 'date'
            ]);
            if ($blog_items->have_posts()) :
                while ($blog_items->have_posts()) :
                    $blog_items->the_post();
            ?>
            <div class="col-lg-6 p-2">
                <div class="card">
                    <?php
                            the_post_thumbnail('large', [
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
            else :
                ?>

            No posts

            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>


<section class="games">
    <?php
    $games_title = get_field('games_title', get_the_id());
    $games_subtitle = get_field('games_subtitle', get_the_id());
    $games = get_field('games', get_the_id());

    ?>
    <div class="container">
        <h2 class="section__title">
            <?php echo $games_title ?>
        </h2>
        <span class="section__subtitle">
            <?php echo $games_subtitle ?>
        </span>
        <div class="games_top">
            <div class="row">
                <div class="col-lg-6 games_top__block">
                    <p class="game_top_text text-center">
                        Baccarat or baccara is a card game played at casinos.
                        It is a comparing card game played between two hands, the "player" and the "banker"
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid__top games__top_bg-image"
                        src="https://cdn2.softswiss.net/masonslots/i/s3/isoftbet/Baccarat.webp" />
                </div>
            </div>

            <span class="games_top__read">Click to read about game</span>

            <div class="games_line">
                <div class="row">
                    <?php
                    if ($games) :
                        foreach ($games as $game) :
                    ?>
                    <div class="col-lg-2 p-2 games__items">
                        <img class="game_image img-fluid" src="<?php echo $game['games_img']['url'] ?>" alt="">
                        <p class="game_text_single">
                            <?php echo $game['games_info'] ?>
                        </p>
                    </div>

                    <?php
                        endforeach;
                    else :
                        ?>
                    No games yet
                    <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
</section>

<!-- //ANCHOR MAIN VIDEO -->
<section class="main_video">
    <?php
    $parallax = get_field('parallax_img', get_the_id());
    if ($parallax) :
    ?>
    <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10"
        data-image-src="<?php echo $parallax ?>" data-natural-width="1400" data-natural-height="900"
        style="height: 400px;">
    </div>
    <?php else : ?>
    <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10"
        data-image-src="<?php echo get_template_directory_uri() ?>/assets/img/dear-_68ATDXuBLo-unsplash.webp"
        data-natural-width="1400" data-natural-height="900" style="height: 400px;">
    </div>
    <?php endif; ?>
</section>

<!-- //ANCHOR JACKPOT -->
<section class="account">
    <?php
    $acc_title = get_field('acc_title', get_the_id());
    $acc_subtle = get_field('acc_subtle', get_the_id());
    $acc__icons = get_field('acc__icons', get_the_id());
    ?>
    <div class="container">
        <h2 class="section__title">
            <?php echo $acc_title ?>
        </h2>
        <span class="section__subtitle">
            <?php echo $acc_subtle ?>
        </span>

        <div class="account__inner">
            <?php
            if ($acc__icons) :
                foreach ($acc__icons as $acc__icon) :
            ?>
            <div class="account__item">
                <img class="account__item-icon" src="<?php echo $acc__icon['icon']['url'] ?>">
                <span class="account__item-text">
                    <?php echo $acc__icon['text'] ?>
                </span>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<section class="counter">
    <div class="container">
        <h2 class="section__title">
            <?php the_field('j_title', get_the_ID()) ?>
        </h2>
        <span class="section__subtitle">
            <?php the_field('j_subtitle', get_the_ID()) ?>
        </span>
        <div class="counter__inner">
            <span> JACKPOT</span>
            <div id="out-1" class="out-num gradient-text">0</div>
            <span> $</span>
        </div>
    </div>
</section>


<?php get_footer() ?>