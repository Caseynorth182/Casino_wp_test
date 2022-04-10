<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php if (is_front_page()) : ?>
        Online Casino WeTrust | Play Online Casino Slots & Table Games | Online Casino WeTrust
        <?php
		else :
			the_title();
		endif;
		?>

    </title>
    <meta name="description"
        content=" Online Casino WeTrust mFortune offers exclusive online casino games in UK including slots, roulette, blackjack & bingo games. ✅Get up to £10 free welcome bonus. Join today!">
    <?php wp_head() ?>

</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="logo">
                    <!-- logo -->
                    <?php the_custom_logo($blog_id); ?>
                </div>
                <!-- nav -->
                <?php
				wp_nav_menu([
					'theme_location'  => 'menu-1',
					'menu'            => 'Primary',
					'container'       => 'nav',
					'container_class' => 'nav',
					'menu_class'      => 'nav__list',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				]);

				?>



            </div>
        </div>

    </header>
    <div class="main-content">