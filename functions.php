<?php

/**
 * Casino_testing_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Casino_testing_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function casino_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Casino_testing_theme, use a find and replace
		* to change 'casino' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('casino', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'casino'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'casino_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'casino_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function casino_content_width()
{
	$GLOBALS['content_width'] = apply_filters('casino_content_width', 640);
}
add_action('after_setup_theme', 'casino_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function casino_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'casino'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'casino'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'casino_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function casino_scripts()
{
	wp_enqueue_style('bootstrap-cdn', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', [], _S_VERSION);
	wp_enqueue_style('swiper-cdn', '//unpkg.com/swiper@7/swiper-bundle.min.css', [], _S_VERSION);
	wp_enqueue_style('googleFonts-cdn', '//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap', [], _S_VERSION);
	wp_enqueue_style('casino-coreStyle', get_template_directory_uri() . '/assets/css/style.css', [], _S_VERSION);
	wp_enqueue_style('casino-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_style_add_data('casino-style', 'rtl', 'replace');

	//LINK Удаляем стоковый  JQUERY так как в новой версии WP есть проблеммы с некоторыми плагинами платежных систем
	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script('jquery');

	wp_enqueue_script('bootstrapJS-cdn', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ['jquery'], _S_VERSION, true);
	wp_enqueue_script('swiperJS-cdn', '//unpkg.com/swiper@7/swiper-bundle.min.js', [], _S_VERSION, true);
	wp_enqueue_script('casino-parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', ['jquery'], _S_VERSION, true);
	wp_enqueue_script('casino-particles_part2', 'https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js', [], _S_VERSION, true);
	wp_enqueue_script('casino-particles_part1', get_template_directory_uri() . '/assets/js/app.js', [], _S_VERSION, true);
	wp_enqueue_script('casino-core', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], _S_VERSION, true);

	wp_localize_script(
		'casino-core',
		'WP',
		[
			'home' => is_front_page(),
			'url' => get_template_directory_uri() . '/assets/'
		]
	);
}
add_action('wp_enqueue_scripts', 'casino_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* ----------------------- //SECTION КАСТОМНЫЕ ФУНКЦИИ ---------------------- */

/* -------------------- //LINK ПОЛУЧЕНИЕ ЗАГОЛОВКА АРХИВА ------------------- */
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});

/* ---------------- //LINK ФИЛЬТР ВЫВОДА КОНТЕНТА В КАРТОЧКАХ --------------- */
/* -------------------------------------------------------------------------- */
/*                  //LINK ФОРМАТИРОВАНИЕ (ОБРЕЗКА) КОНТЕНТА                  */
/* -------------------------------------------------------------------------- */
function content($limit)
{
	$content = explode(' ', get_the_content(), $limit);
	if (count($content) >= $limit) {
		array_pop($content);
		$content = implode(" ", $content) . '...';
	} else {
		$content = implode(" ", $content);
	}
	$content = preg_replace('/\[.+\]/', '', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/* -------------------------------------------------------------------------- */
/*                            //LINK Excerpt limit                            */
/* -------------------------------------------------------------------------- */
// Excertp

function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
	return $excerpt;
}

/* ---------------------------- //LINK SVG маймы ---------------------------- */
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* ---------------------------- //LINK ACF Опции ---------------------------- */
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Опции футера',
		'menu_title'	=> 'Опции футера',
		'menu_slug' 	=> 'footer_options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}