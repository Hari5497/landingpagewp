<?php
/**
 * site functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mysite
 */

if ( ! function_exists( 'site_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function site_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mysite, use a find and replace
	 * to change 'mysite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'landingtheme', get_template_directory() . '/languages' );

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
	add_image_size( 'logo-size', 0, 180, false );
	add_image_size( 'menu-thumb', 200, 145, true );
	add_image_size( 'publication-size', 115, 154, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'landingtheme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mysite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'site_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function site_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'site_content_width', 640 );
}
add_action( 'after_setup_theme', 'site_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function site_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mysite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Menu', 'mysite' ),
		'id'            => 'top-menu-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'mysite' ),
		'id'            => 'footer-sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'mysite' ),
		'id'            => 'footer-sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'mysite' ),
		'id'            => 'footer-sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 4', 'mysite' ),
		'id'            => 'footer-sidebar-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 5', 'mysite' ),
		'id'            => 'footer-sidebar-5',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 6', 'mysite' ),
		'id'            => 'footer-sidebar-6',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-main %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'site_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function site_scripts() {
	wp_enqueue_style( 'bootstrap', 'http://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' );
	//wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');	
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/css/slick.css' );
	//wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/css/font-awesome.css' );
	wp_enqueue_style( 'allmin', 'http://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' );
	wp_enqueue_style( 'firafans', 'http://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/css/slick-theme.css' );

	wp_enqueue_style( 'main', get_template_directory_uri() .'/css/main.css' );
	wp_enqueue_style( 'custom', get_template_directory_uri() .'/css/custom.css' );
	wp_enqueue_style( 'style_v8', get_template_directory_uri() .'/css/style_v8.css' );

	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery','http://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0'  );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', 'http://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', array(), '5.3.0');
	wp_enqueue_script( 'lottie', 'http://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.3/lottie_svg.min.js', array(), '5.3.3');
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '3.3.7' );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), '1.1.0');
	wp_enqueue_script( 'jqueryui', '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array(), '1.11.4');

	
	//wp_enqueue_script( 'ga', 'https://www.googletagmanager.com/gtag/js?id=UA-131430073-1', array(), '1.12.1' );
	//wp_enqueue_script( 'ga_sc', get_template_directory_uri() . '/js/ga.js', array(), '');

	if(is_page( 576 )){
		//wp_enqueue_script("jquery-ui-core"); 
		//wp_enqueue_script( 'jquery-ui-sortable' );
	}

	wp_localize_script( 'custom', 'mysite', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => _el('Sending user info, please wait...'),
        'site_nonce' 	=> 	wp_create_nonce( "site_xss" ),
        'deleteconfirm' =>  _el('Are you sure you want to delete?'),
        'cookiepath'            =>  COOKIEPATH,
    ));
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

add_filter('tiny_mce_before_init','tinymce_allow_unsafe_link_target');
function tinymce_allow_unsafe_link_target( $mceInit ) {
	$mceInit['allow_unsafe_link_target']=true;
	return $mceInit;
}
function sharewidgetblog(){
    global $post;
    if(!$post->ID){
    	return "";
    }
    $url = get_permalink( $post->ID );
    //$sl = (WPGlobus::Config()->language=='en')?'ar':'en';
    //$link = esc_url( WPGlobus_Utils::localize_url($url,$sl) );
    $superSocial = ''; 
    $superSocial.=  '';
    // $superSocial.=  '<a href="https://www.facebook.com/sharer/sharer.php?s=100&p[title]='.$post->post_title.'&p[url]='.$url.'" class="social-icons"  title="Facebook"><img src="'.get_template_directory_uri().'/images/fb-icon.svg" alt="fb"></a>';
	$superSocial.=  '<a href="https://www.facebook.com/sharer/sharer.php?s=100&p[title]='.$post->post_title.'&p[url]='.$url.'" class="social-icons"  title="Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none">
	<path d="M9.68762 6.43753H6.72094V4.49182C6.72094 3.76112 7.20523 3.59076 7.54633 3.59076C7.88666 3.59076 9.63989 3.59076 9.63989 3.59076V0.378441L6.75664 0.367188C3.55596 0.367188 2.82758 2.76304 2.82758 4.29624V6.43753H0.976562V9.74764H2.82758C2.82758 13.9957 2.82758 19.1141 2.82758 19.1141H6.72094C6.72094 19.1141 6.72094 13.9452 6.72094 9.74764H9.34807L9.68762 6.43753Z" fill="#193933"/>
	</svg></a>';
    $superSocial.=  '<a href="http://twitter.com/share?text='.$post->post_title.'&url='.$url.'"  class="social-icons" title="Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
	<path d="M19.5035 1.8468C18.8007 2.15919 18.0444 2.3699 17.2508 2.4642C18.0611 1.97913 18.6823 1.21078 18.9753 0.294197C18.2175 0.743953 17.3785 1.07031 16.4848 1.24648C15.7696 0.484344 14.7502 0.0078125 13.6221 0.0078125C11.4564 0.0078125 9.70043 1.76376 9.70043 3.92988C9.70043 4.23684 9.73496 4.53603 9.8021 4.82357C6.54244 4.65981 3.6522 3.09867 1.71775 0.725714C1.38014 1.30469 1.18689 1.97836 1.18689 2.69781C1.18689 4.05833 1.87918 5.25897 2.93158 5.96213C2.28896 5.94156 1.68399 5.765 1.15507 5.47124C1.15468 5.48754 1.15468 5.50422 1.15468 5.52091C1.15468 7.42083 2.50666 9.00564 4.30103 9.36653C3.97196 9.45579 3.62543 9.50391 3.26764 9.50391C3.01463 9.50391 2.76899 9.47946 2.52956 9.43328C3.02899 10.9913 4.47721 12.1256 6.19319 12.157C4.8509 13.2091 3.16015 13.8361 1.32232 13.8361C1.00605 13.8361 0.69367 13.8175 0.386719 13.781C2.12288 14.8944 4.18422 15.5432 6.39885 15.5432C13.6132 15.5432 17.5578 9.56716 17.5578 4.3843C17.5578 4.21433 17.5543 4.04475 17.5469 3.87633C18.3129 3.32452 18.978 2.63339 19.5035 1.8468Z" fill="#193933"/>
	</svg></a>';
	$superSocial.=  '<a href="https://www.linkedin.com/sharing/share-offsite/?url='.$url.'"  class="social-icons" title="Linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
	<path d="M4 14.2083H1V4.625H4V14.2083ZM15 14.2083H12V9.08892C12 7.75492 11.504 7.09079 10.521 7.09079C9.742 7.09079 9.248 7.46262 9 8.20725C9 9.41667 9 14.2083 9 14.2083H6C6 14.2083 6.04 5.58333 6 4.625H8.368L8.551 6.54167H8.613C9.228 5.58333 10.211 4.93358 11.559 4.93358C12.584 4.93358 13.413 5.20671 14.046 5.89287C14.683 6.58 15 7.50192 15 8.79662V14.2083Z" fill="#193933"/>
	<path d="M2.49922 3.66797C3.35526 3.66797 4.04922 3.02438 4.04922 2.23047C4.04922 1.43656 3.35526 0.792969 2.49922 0.792969C1.64318 0.792969 0.949219 1.43656 0.949219 2.23047C0.949219 3.02438 1.64318 3.66797 2.49922 3.66797Z" fill="#193933"/>
	</svg></a>';
	$superSocial.=  '<a id="copy" href="" class="social-icons" title="Hyperlink"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
	<path d="M13.8589 10.2393C13.6184 10.2382 13.388 10.1428 13.2172 9.97342C13.0465 9.80167 12.9507 9.56934 12.9507 9.32717C12.9507 9.085 13.0465 8.85267 13.2172 8.68092L15.1605 6.73759C15.331 6.56732 15.4662 6.36512 15.5585 6.14256C15.6508 5.92 15.6982 5.68143 15.6982 5.4405C15.6982 5.19958 15.6508 4.96101 15.5585 4.73845C15.4662 4.51588 15.331 4.31369 15.1605 4.14342L13.8589 2.84176C13.5083 2.5104 13.0442 2.32578 12.5618 2.32578C12.0794 2.32578 11.6153 2.5104 11.2647 2.84176L9.32138 4.78509C9.14567 4.92568 8.92438 4.99672 8.69966 4.98468C8.47495 4.97264 8.26252 4.87837 8.10283 4.71981C7.94314 4.56125 7.84735 4.3495 7.83372 4.12488C7.82008 3.90025 7.88954 3.67847 8.02888 3.50175L9.97221 1.55842C10.6713 0.891571 11.6003 0.519531 12.5664 0.519531C13.5325 0.519531 14.4615 0.891571 15.1605 1.55842L16.453 2.85092C16.794 3.19146 17.0644 3.59585 17.2489 4.04097C17.4335 4.4861 17.5284 4.96323 17.5284 5.44509C17.5284 5.92694 17.4335 6.40408 17.2489 6.8492C17.0644 7.29433 16.794 7.69872 16.453 8.03925L14.5005 9.97342C14.3298 10.1428 14.0994 10.2382 13.8589 10.2393Z" fill="#193933"/>
	<path d="M5.43471 17.5255C4.95305 17.5259 4.47604 17.4314 4.03093 17.2474C3.58581 17.0634 3.18131 16.7934 2.84054 16.453L1.54804 15.1605C1.20713 14.82 0.936677 14.4156 0.752155 13.9705C0.567633 13.5254 0.472656 13.0482 0.472656 12.5664C0.472656 12.0845 0.567633 11.6074 0.752155 11.1623C0.936677 10.7171 1.20713 10.3127 1.54804 9.97221L3.50054 8.02888C3.67725 7.88954 3.89904 7.82008 4.12366 7.83372C4.34828 7.84735 4.56004 7.94314 4.7186 8.10283C4.87715 8.26252 4.97143 8.47495 4.98347 8.69966C4.9955 8.92438 4.92446 9.14567 4.78387 9.32138L2.84054 11.2647C2.67008 11.435 2.53486 11.6372 2.4426 11.8597C2.35034 12.0823 2.30285 12.3209 2.30285 12.5618C2.30285 12.8027 2.35034 13.0413 2.4426 13.2639C2.53486 13.4864 2.67008 13.6886 2.84054 13.8589L4.14221 15.1605C4.49279 15.4919 4.9569 15.6765 5.43929 15.6765C5.92169 15.6765 6.38579 15.4919 6.73637 15.1605L8.67971 13.2172C8.7597 13.1158 8.86023 13.0324 8.97471 12.9725C9.08918 12.9126 9.21503 12.8776 9.34398 12.8698C9.47293 12.862 9.60208 12.8815 9.72296 12.9271C9.84384 12.9727 9.95372 13.0433 10.0454 13.1343C10.1371 13.2253 10.2085 13.3347 10.2549 13.4553C10.3014 13.5758 10.3218 13.7048 10.3149 13.8338C10.308 13.9628 10.2739 14.0889 10.2148 14.2038C10.1558 14.3187 10.0731 14.4198 9.97221 14.5005L8.02887 16.4439C7.68886 16.7859 7.2847 17.0575 6.83955 17.2431C6.3944 17.4288 5.917 17.5247 5.43471 17.5255Z" fill="#193933"/>
	<path d="M6.08604 12.832C5.9654 12.8327 5.84581 12.8096 5.73413 12.764C5.62245 12.7184 5.52086 12.6512 5.43521 12.5662C5.34929 12.481 5.2811 12.3796 5.23456 12.2679C5.18802 12.1562 5.16406 12.0364 5.16406 11.9154C5.16406 11.7944 5.18802 11.6745 5.23456 11.5628C5.2811 11.4511 5.34929 11.3497 5.43521 11.2645L11.2744 5.43453C11.4461 5.2638 11.6785 5.16797 11.9206 5.16797C12.1628 5.16797 12.3951 5.2638 12.5669 5.43453C12.6528 5.51974 12.721 5.62113 12.7675 5.73283C12.8141 5.84454 12.838 5.96435 12.838 6.08536C12.838 6.20637 12.8141 6.32619 12.7675 6.43789C12.721 6.54959 12.6528 6.65098 12.5669 6.7362L6.72771 12.5662C6.55697 12.7355 6.32652 12.831 6.08604 12.832Z" fill="#193933"/>
	</svg></a>';
    //$superSocial.=  '<a href="https://plus.google.com/share?url='.$url.'" class="social-icons" title="Google Plus"></a>';
    $superSocial.=  '';
    echo  $superSocial;
}

//Lp book now validation

add_filter('wpcf7_validate_text*', 'custom_name_validation', 10, 2);
function custom_name_validation($result, $tag) {
	$value = $_POST[$tag->name];
	if (!preg_match('/^[A-Za-z]+$/', $value)) {
            $result->invalidate($tag, 'Please enter a valid name.');
        }

    return $result;
}



add_filter('wpcf7_validate_tel*', 'custom_phone_number_validation', 10, 2);

function custom_phone_number_validation($result, $tag) {
	 $value = $_POST[$tag->name];

	 $pattern = '/^\d{9,12}$/';

    if (!preg_match($pattern, $value)) {
        $result->invalidate($tag, 'Please enter a valid phone number.');
    }

    return $result;
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Almadina Custom Functions
 */
require get_template_directory() . '/inc/custom-function.php';

/**
 * Custom Post types
 */
require get_template_directory() . '/inc/custom-posttype.php';

