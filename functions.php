<?php
/**
 * rada-exam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rada-exam
 */

if ( ! function_exists( 'rada_exam_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rada_exam_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rada-exam, use a find and replace
		 * to change 'rada-exam' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rada-exam', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rada-exam' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rada_exam_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'rada_exam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rada_exam_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rada_exam_content_width', 640 );
}
add_action( 'after_setup_theme', 'rada_exam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rada_exam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rada-exam' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rada-exam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rada_exam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function rada_exam_scripts() {
    wp_enqueue_style( 'rada-exam-style', get_stylesheet_uri() );

    wp_enqueue_style( 'theme-main-style', get_template_directory_uri() . '/assets/dist/main.css' );

    //wp_enqueue_style( 'normalize-main-style', get_template_directory_uri() . '/assets/css/normalize.css' );

    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'), false, true );
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/scripts/load-scripts.js', array('jquery'), false, true);
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/scripts/theme-customizer.js', array('jquery'), false, true);

    wp_enqueue_script( 'rada-exam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'rada-exam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rada_exam_scripts' );

function font_awesome() {
    if (!is_admin()) {
        wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css');
        wp_enqueue_style('font-awesome');
    }
}
add_action('wp_enqueue_scripts', 'font_awesome');


//function theme_scripts() {
    // Styles
    //wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    //wp_enqueue_style( 'theme-main-style', get_template_directory_uri() . '/assets/dist/main.css' );
    // Scripts
    //wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'), false, true );
//}
//add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//if ( defined( 'JETPACK__VERSION' ) ) {
	//require get_template_directory() . '/inc/jetpack.php';
//}

add_action('init', 'create_post_type');

function create_post_type()
{
    register_post_type('posts',
        array(
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'labels' => array(
                'name' => __('Posts'),
                'singular_name' => __('Posts')
            ),
            'public' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-format-quote',
            'rewrite' => array('slug' => 'posts'),
            'has_archive' => true,
        )
    );


    register_post_type('logo',
        array(
            'supports' => array('title', 'editor'),
            'labels' => array(
                'name' => __('Logo'),
                'singular_name' => __('Logo')
            ),
            'public' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-images-alt2',
            'rewrite' => array('slug' => 'logo'),
        )
    );
}


