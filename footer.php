<?php
//Пременная для даты(просили)
$footer_date = date('Y')
?>

</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="footer__logo">
                    <span class="divider-left"></span>
                    <img class="footer__logo-img" width="100"
                        src="<?php echo get_template_directory_uri() ?>/assets/img/logo_white.svg" alt="">
                    <span class="divider-right"></span>
                </span>
            </div>
            <div class="col-lg-4">
                <div class="footer__text">
                    <span class="footer__title">
                        About
                    </span>
                    <p>
                        © 2022 mFortune. mFortune is operated by In Touch Games Limited of Fountain House, Great
                        Cornbow, Halesowen, West Midlands, B63 3BL - 01384 884468. In Touch Games Limited is licensed
                        and regulated in Great Britain by the Gambling Commission under account
                        number 2091.</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <span class="footer__title">
                    Menu
                </span>
                <?php
				wp_nav_menu([
					'theme_location'  => 'menu-1',
					'menu'            => 'Primary',
					'container'       => 'nav',
					'container_class' => 'footer__menu',
					'menu_class'      => 'footer__menu-list',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				]);

				?>
                <!-- <nav class="footer__menu">
                    <ul class="footer__menu-list">
                        <li class="footer__menu-item">
                            <a href="#" class="footer__menu-link">
                                Home
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a href="#" class="footer__menu-link">
                                Blog
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a href="#" class="footer__menu-link">
                                About
                            </a>
                        </li>
                    </ul>
                </nav> -->
            </div>

            <div class="col-lg-4 text-center">
                <span class="footer__title">
                    Contacts
                </span>
                <span class="footer__contact_city">London</span>
                <span class="footer__contact_city">Baker st</span>
                <span class="footer__contact_city"><a href="tel:5555555">(045)005-55-55</a></span>
                <span class="footer__contact_city"><a
                        href="mailto:caseynorth182@gmail.com">caseynorth182@gmail.com</a></span>
            </div>
        </div>



        <div class="footer__brands">
            <?php
			$brands = get_field('footer_logo', 'option');
			if ($brands) :
				foreach ($brands as $brand) :
			?>
            <div class="brand">
                <!-- //ANCHOR заглушки потому что лень -->
                <a href="#">
                    <img src="<?php echo $brand ?>" alt="">
                </a>
            </div>

            <?php
				endforeach;
			endif;
			?>

        </div>



        <div class="footer__bottom">
            <div class="footer__brand">
                Made with <strong>LOVE</strong> |
                <? echo $footer_date ?> - Casino Testing ©
            </div>
            <div class="footer__terms_list">
                <ul>
                    <li>
                        <a href="#">
                            Privacy
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Terms
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>