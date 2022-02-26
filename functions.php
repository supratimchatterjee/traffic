<?php
if ( ! isset( $content_width ) )
	$content_width = 604;

//add_filter('show_admin_bar', '__return_false');
//remove_filter( 'the_content', 'wpautop' );
function traffic_builder_setup() {
	
	register_nav_menu( 'primary', __( 'Navigation Menu', 'traffic_builder' ) );
	register_nav_menu( 'primary_mobile', __( 'Mobile Menu', 'traffic_builder' ) );


 	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'gal', 101, 93, true );



	set_post_thumbnail_size( 604, 270, true );
}
add_action( 'after_setup_theme', 'traffic_builder_setup' );



function traffic_builder_scripts_styles() {
    wp_enqueue_style( 'traffic_builder-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'traffic_builder-style', get_stylesheet_uri(), array(), '2021-01-11' );
    wp_enqueue_style( 'traffic_builder-style-addition', get_template_directory_uri() . '/custom-style.css' );
	
}
add_action( 'wp_enqueue_scripts', 'traffic_builder_scripts_styles' );



function traffic_builder_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Widget', 'traffic_builder' ),
        'id'            => 'main-1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );



}


function traffic_builder_wp_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() )
        return $title;
    $title .= get_bloginfo( 'name', 'display' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'traffic_builder_wp_title' ), max( $paged, $page ) );
    return $title;
}
add_filter( 'wp_title', 'traffic_builder_wp_title', 10, 2 );

add_action( 'widgets_init', 'traffic_builder_widgets_init' );



function traffic_builder_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

function traffic_builder_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';
	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';
	return $classes;
}
add_filter( 'body_class', 'traffic_builder_body_class' );

include("inc-function/theme-setting.php");


function custom_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length');





function gutenberg_setup() {
// Support Featured Images
add_theme_support( 'post-thumbnails' );

//Gutenberg
add_theme_support( 'align-wide' );
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support( 'dark-editor-style');
add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'gutenberg_setup' );


//addidng widget for footer


register_sidebar( array(
    'name' => 'address-column',
    'id' => 'address-column',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div id="%1$s" class="inrfootbx %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ) );

register_sidebar( array(
    'name' => 'form-column',
    'id' => 'form-column',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div class="left-miidle-foot">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ) );

register_sidebar( array(
    'name' => 'footer-last-menu',
    'id' => 'footer-last-menu',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div id="%1$s" class="col-lg-7 text-lg-right order-lg-2 %2$s">',
    'after_widget' => '</div>',
    ) );


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
  echo '<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">';  
  echo '<link rel="stylesheet" href="'.get_template_directory_uri() . '/assets/css/bootstrap.min.css" type="text/css" media="all" />';
  echo '<link rel="stylesheet" href="'.get_template_directory_uri() . '/admin-style.css" type="text/css" media="all" />';
}


//gutenberg block start here

//home banner block
add_action('acf/init', 'acf_banner_block');
function acf_banner_block() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a banner block.
        acf_register_block_type(array(
            'name'              => 'home-banner',
            'title'             => __('Home Banner'),
            'description'       => __('A custom Banner block.'),
            'render_template'   => 'template-parts/blocks/banner/home-banner.php',
            'category'          =>  'widgets',
			'mode'              => 'edit',
			'icon'				=> 'format-gallery',
			'supports'			=> array('mode'=>true),
			//'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}


//Inner banner block
add_action('acf/init', 'acf_inner_banner_block');
function acf_inner_banner_block() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register inner banner block.
        acf_register_block_type(array(
            'name'              => 'inner-banner',
            'title'             => __('Inner Page Banner'),
            'description'       => __('A custom Banner block.'),
            'render_template'   => 'template-parts/blocks/banner/inner-banner.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Inner box block and Logos
add_action('acf/init', 'acf_white_boxes_block');
function acf_white_boxes_block() {

    // Check function exists.
    if( function_exists('acf_white_boxes_block') ) {

        // Register a banner block.
        acf_register_block_type(array(
            'name'              => 'white-boxes',
            'title'             => __('White Boxes and Organization logos'),
            'description'       => __('A custom Box block.'),
            'render_template'   => 'template-parts/blocks/banner/first-section.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}



//Content Image
add_action('acf/init', 'acf_content_image_block');
function acf_content_image_block() {

    // Check function exists.
    if( function_exists('acf_content_image_block') ) {

        //Content Image
        acf_register_block_type(array(
            'name'              => 'content-image',
            'title'             => __('Image and Content'),
            'description'       => __('Image on left and content on right.'),
            'render_template'   => 'template-parts/blocks/content-image/content-image.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Case Slider
add_action('acf/init', 'acf_case_slider_block');
function acf_case_slider_block() {
    wp_register_script( 'gutenberg-ccard', get_template_directory_uri().'/assets/js/custom.js', array( 'wp-blocks', 'wp-element', 'wp-editor' ) );
    // Check function exists.
    if( function_exists('acf_case_slider_block') ) {

        //Case Slider
        acf_register_block_type(array(
            'name'              => 'case-slider-block',
            'title'             => __('Case Slider Section'),
            'description'       => __('Heading, button on right and Slider'),
            'render_template'   => 'template-parts/blocks/case-slider/case-slider.php',
            'category'          => 'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'font-awsome','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
				wp_enqueue_style( 'owl-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
				wp_enqueue_style( 'owl-thm', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
                //wp_enqueue_style( 'slider_css', get_template_directory_uri() . '/style.css' );
                wp_enqueue_script( 'case-slider-main',get_template_directory_uri() . '/assets/js/owl.carousel.min.js' , array(), '1.0.0', true  );
                wp_enqueue_script( 'case-slider', get_template_directory_uri() . '/template-parts/blocks/case-slider/case-slider.js', array(), '1.0.0', true );
			}
        ));

        
    }

}




//Blog Slider
add_action('acf/init', 'acf_blog_slider_block');
function acf_blog_slider_block() {

    // Check function exists.
    if( function_exists('acf_blog_slider_block') ) {

        //Blog Slider
        acf_register_block_type(array(
            'name'              => 'blog-slider-block',
            'title'             => __('Blog Slider Section'),
            'description'       => __('Heading, button on right and Slider'),
            'render_template'   => 'template-parts/blocks/blog-slider/blog-slider.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
			'enqueue_assets'    => function(){
                 wp_enqueue_style( 'font-awsome-blog','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
				wp_enqueue_style( 'owl-min-blog', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
				wp_enqueue_style( 'owl-thm-blog', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
                //wp_enqueue_style( 'slider_css-blog', get_template_directory_uri() . '/style.css' );
                wp_enqueue_script( 'case-slider-main-blog',get_template_directory_uri() . '/assets/js/owl.carousel.min.js' , array(), '1.0.0', true  );
                wp_enqueue_script( 'case-slider-blog', get_template_directory_uri() . '/template-parts/blocks/blog-slider/blog-slider.js', array(), '1.0.0', true );
			}
            //'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/blog-slider/blog-slider.css',
            //'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/blog-slider/blog-slider.js'
        ));
    }

}

//Black background Section
add_action('acf/init', 'acf_form_content_block');
function acf_form_content_block() {

    // Check function exists.
    if( function_exists('acf_form_content_block') ) {

        //Black background Section.
        acf_register_block_type(array(
            'name'              => 'form-content-section',
            'title'             => __('Form And Content Section'),
            'description'       => __('Content on left and form on right'),
            'render_template'   => 'template-parts/blocks/content-form/content-form.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Our Partner Section
add_action('acf/init', 'acf_our_partner_block');
function acf_our_partner_block() {

    // Check function exists.
    if( function_exists('acf_our_partner_block') ) {

        // Register Our Partner Section block.
        acf_register_block_type(array(
            'name'              => 'our-partner-section',
            'title'             => __('Partner Logo Section'),
            'description'       => __('Partner Logos'),
            'render_template'   => 'template-parts/blocks/our-partner/our-partner.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}



//Content With Sidebar
add_action('acf/init', 'acf_content_with_sidebar');
function acf_content_with_sidebar() {

    // Check function exists.
    if( function_exists('acf_content_with_sidebar') ) {

        // Register Content With Sidebar block.
        acf_register_block_type(array(
            'name'              => 'content-with-sidebar',
            'title'             => __('Content With Sidebar'),
            'description'       => __('Content on left and Sidebar on Right'),
            'render_template'   => 'template-parts/blocks/digital-marketing-page/content-sidebar-block/content-sidebar.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'font-awsome-related','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
                wp_enqueue_style( 'related-owl-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
                wp_enqueue_style( 'related-owl-thm', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
                //wp_enqueue_style( 'slider_css-blog', get_template_directory_uri() . '/style.css' );
                wp_enqueue_script( 'related-crousel',get_template_directory_uri() . '/assets/js/owl.carousel.min.js' , array(), '1.0.0', true  );
                wp_enqueue_script( 'relate-slider', get_template_directory_uri() . '/template-parts/blocks/digital-marketing-page/content-sidebar-block/related-carousel.js', array(), '1.0.0', true );
            }
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}


//Our Team Member
add_action('acf/init', 'acf_team_member');
function acf_team_member() {

    // Check function exists.
    if( function_exists('acf_team_member') ) {

        // Register Content With Sidebar block.
        acf_register_block_type(array(
            'name'              => 'team-member',
            'title'             => __('Team Member'),
            'description'       => __('Image and Description of team member'),
            'render_template'   => 'template-parts/blocks/digital-marketing-page/team-member/team-member.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Content with form sidebar
add_action('acf/init', 'acf_content_sidebar_form_block');
function acf_content_sidebar_form_block() {

    // Check function exists.
    if( function_exists('acf_content_sidebar_form_block') ) {

        // Register Content with form sidebar block.
        acf_register_block_type(array(
            'name'              => 'content-sidebar-form',
            'title'             => __('Content and Form Sidebar'),
            'description'       => __('Content and Form'),
            'render_template'   => 'template-parts/blocks/google-marketing-platform/content-with-form-sidebar/content-from-sidebar.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
             'enqueue_assets'    => function(){
                wp_enqueue_style( 'font-gmp-awsome-related','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
                wp_enqueue_style( 'related-gmp-owl-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
                wp_enqueue_style( 'related-gmp-owl-thm', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
                //wp_enqueue_style( 'slider_css-blog', get_template_directory_uri() . '/style.css' );
                wp_enqueue_script( 'related-gmp-crousel',get_template_directory_uri() . '/assets/js/owl.carousel.min.js' , array(), '1.0.0', true  );
                wp_enqueue_script( 'relate-gmp-slider', get_template_directory_uri() . '/template-parts/blocks/google-marketing-platform/content-with-form-sidebar/content-form-sidebar.js', array(), '1.0.0', true );
            }
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Image on right, content on left
add_action('acf/init', 'acf_image_right_left_content_block');
function acf_image_right_left_content_block() {

    // Check function exists.
    if( function_exists('acf_image_right_left_content_block') ) {

        // Register Image on right content on left block.
        acf_register_block_type(array(
            'name'              => 'image-right-content-left',
            'title'             => __('Image Right and Content Left'),
            'description'       => __('Image Right and Content Left'),
            'render_template'   => 'template-parts/blocks/google-marketing-platform/right-image-left-content/right-image-left-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}


//Clients Logo Section
add_action('acf/init', 'acf_clients_logo_block');
function acf_clients_logo_block() {

    // Check function exists.
    if( function_exists('acf_clients_logo_block') ) {

        // Clients Logo Section block.
        acf_register_block_type(array(
            'name'              => 'clients-logo-section',
            'title'             => __('Clients Logo Section'),
            'description'       => __('Client Logos'),
            'render_template'   => 'template-parts/blocks/about-us/our-clients/clients-logo.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}




//Rean Tab Section
add_action('acf/init', 'acf_rean_tabs_block');
function acf_rean_tabs_block() {

    // Check function exists.
    if( function_exists('acf_rean_tabs_block') ) {

        // Rean Tab Section
        acf_register_block_type(array(
            'name'              => 'rean-tabs-section',
            'title'             => __('Tabs Section'),
            'description'       => __('Four Tabs'),
            'render_template'   => 'template-parts/blocks/about-us/rean-tabs/rean-tabs.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
			'enqueue_assets'    => function(){
				
                wp_enqueue_script( 'tab-js', get_template_directory_uri() . '/template-parts/blocks/about-us/rean-tabs/tab.js', array(), '1.0.0', true );
            }
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Rean White Boxes Section
add_action('acf/init', 'acf_rean_white_boxes_block');
function acf_rean_white_boxes_block() {

    // Check function exists.
    if( function_exists('acf_rean_white_boxes_block') ) {

        //Rean White Boxes Section and tab Section
        acf_register_block_type(array(
            'name'              => 'rean-boxes-section',
            'title'             => __('Boxes Section'),
            'description'       => __('White Boxes'),
            'render_template'   => 'template-parts/blocks/about-us/rean-white-boxes/rean-white-boxes.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Basic Image And Content Section
add_action('acf/init', 'acf_image_content_boxes_block');
function acf_image_content_boxes_block() {

    // Check function exists.
    if( function_exists('acf_image_content_boxes_block') ) {

        //Basic Image And Content Section
        acf_register_block_type(array(
            'name'              => 'basic-image-content-section',
            'title'             => __('Basic Image And Content Section'),
            'description'       => __('Display Image And Content.'),
            'render_template'   => 'template-parts/blocks/about-us/basic-image-content/basic-image-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Team Vacancies And Organization Section
add_action('acf/init', 'acf_team_vacancies_organization_block');
function acf_team_vacancies_organization_block() {

    // Check function exists.
    if( function_exists('acf_team_vacancies_organization_block') ) {

        //Basic Image And Content Section
        acf_register_block_type(array(
            'name'              => 'team-vacancie-organization',
            'title'             => __('Team Vacancies And Organization'),
            'description'       => __('Team Vacancies And Organization'),
            'render_template'   => 'template-parts/blocks/about-us/team-vacancies-organization/team-vacancies-organization.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
			'enqueue_assets'    => function(){
                wp_enqueue_style( 'font-gmp-awsome-related','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
                wp_enqueue_style( 'teampicslider-owl-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
                wp_enqueue_style( 'teampicslider-owl-thm', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
                wp_enqueue_script( 'teampicslider-crousel',get_template_directory_uri() . '/assets/js/owl.carousel.min.js' , array(), '1.0.0', true  );
                wp_enqueue_script( 'teampicslider-slider', get_template_directory_uri() . '/template-parts/blocks/about-us/team-vacancies-organization/team-vacancies-organization.js', array(), '1.0.0', true );
            }
        ));
    }

}

//Traffic Builders People Section
add_action('acf/init', 'acf_traffic_builders_people_block');
function acf_traffic_builders_people_block() {

    // Check function exists.
    if( function_exists('acf_traffic_builders_people_block') ) {

        //Basic Image And Content Section
        acf_register_block_type(array(
            'name'              => 'traffic-builders-people-section',
            'title'             => __('Traffic Builders People Section'),
            'description'       => __('Traffic Builders People Section'),
            'render_template'   => 'template-parts/blocks/about-us/traffic-builders-people/traffic-builders-people.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

// Register Box Section
add_action('acf/init', 'acf_register_box_block');
function acf_register_box_block() {

    // Check function exists.
    if( function_exists('acf_register_box_block') ) {

        //Basic Image And Content Section
        acf_register_block_type(array(
            'name'              => 'register_box-section',
            'title'             => __('Register Box Section'),
            'description'       => __('Register Box Section'),
            'render_template'   => 'template-parts/blocks/about-us/register-box/register-box.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

// Summer School Content Section
add_action('acf/init', 'acf_register_summer_school_block');
function acf_register_summer_school_block() {

    // Check function exists.
    if( function_exists('acf_register_summer_school_block') ) {

        //Basic Image And Content Section
        acf_register_block_type(array(
            'name'              => 'summer-school-content-section',
            'title'             => __('Summer School Content'),
            'description'       => __('Summer School Content'),
            'render_template'   => 'template-parts/blocks/about-us/summer-school/summer-school-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}



// Webinar Content Section
add_action('acf/init', 'acf_register_webinar_content_block');
function acf_register_webinar_content_block() {

    // Check function exists.
    if( function_exists('acf_register_webinar_content_block') ) {

        //Webinar Content Section
        acf_register_block_type(array(
            'name'              => 'webinar-content-section',
            'title'             => __('Webinar Content'),
            'description'       => __('Webinar Content'),
            'render_template'   => 'template-parts/blocks/about-us/webinar/webinar-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}
// our team Content Section
add_action('acf/init', 'acf_register_our_team_content_content_block');
function acf_register_our_team_content_content_block() {

    // Check function exists.
    if( function_exists('acf_register_our_team_content_content_block') ) {

        //our team Content Section
        acf_register_block_type(array(
            'name'              => 'our-team-content-section',
            'title'             => __('Our Team Content'),
            'description'       => __('our Team Content'),
            'render_template'   => 'template-parts/blocks/about-us/our-team-content/our-team-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

// Banner With Video Popup
add_action('acf/init', 'acf_register_banner_with_video_block');
function acf_register_banner_with_video_block() {

    // Check function exists.
    if( function_exists('acf_register_banner_with_video_block') ) {

        //Banner With Video Popup Section
        acf_register_block_type(array(
            'name'              => 'banner-with-video-section',
            'title'             => __('Banner with video Content'),
            'description'       => __('Banner with video Content'),
            'render_template'   => 'template-parts/blocks/about-us/banner-with-video/banner-with-video.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'popup-style','https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css' );
                wp_enqueue_script( 'pop-js', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js' , array(), '1.0.0', true  );
            }
         //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}


// Left Image right content with small images
add_action('acf/init', 'acf_register_left_image_right_content_and_small_image_block');
function acf_register_left_image_right_content_and_small_image_block() {

    // Check function exists.
    if( function_exists('acf_register_left_image_right_content_and_small_image_block') ) {

        //Left Image right content with small images
        acf_register_block_type(array(
            'name'              => 'left-image-right-content-and-small-image-section',
            'title'             => __('left image right content and small image'),
            'description'       => __('left image right content and small image'),
            'render_template'   => 'template-parts/blocks/about-us/left-image-right-content-and-small-image/left-image-right-content-and-small-image.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
         //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}


// Accordion
add_action('acf/init', 'accordion_block');
function accordion_block() {

    // Check function exists.
    if( function_exists('accordion_block') ) {

        //Accordion
        acf_register_block_type(array(
            'name'              => 'accordion-section',
            'title'             => __('accordion block'),
            'description'       => __('accordion block'),
            'render_template'   => 'template-parts/blocks/about-us/accordion-block/accordion-block.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            'enqueue_assets'    => function(){
                //wp_enqueue_script( 'accordion-js', get_template_directory_uri() . '/template-parts/blocks/about-us/accordion-block/accordion-block.js', array(), '1.0.0', true );
                wp_enqueue_script( 'accordion-js', get_template_directory_uri() . '/template-parts/blocks/about-us/accordion-block/accordion-block.js', array('jquery'), '', true );
            }
         //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}


//Contact Us Content With form
add_action('acf/init', 'acf_contact_us_content_block');
function acf_contact_us_content_block() {

    // Check function exists.
    if( function_exists('acf_contact_us_content_block') ) {

        // Register Contact Us Content With form
        acf_register_block_type(array(
            'name'              => 'contact-us-content',
            'title'             => __('Contact Us Content'),
            'description'       => __('Contact us Content'),
            'render_template'   => 'template-parts/blocks/contact-us/contact-us-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'font-contact-awsome','https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
                wp_enqueue_style( 'contact-owl-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
                wp_enqueue_style( 'contact-owl-thm', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
                //wp_enqueue_style( 'slider_css-blog', get_template_directory_uri() . '/style.css' );
                wp_enqueue_script( 'contact-crousel',get_template_directory_uri() . '/assets/js/owl.carousel.min.js' , array(), '1.0.0', true  );
                wp_enqueue_script( 'contact-slider', get_template_directory_uri() . '/template-parts/blocks/contact-us/contact-us-slider.js', array(), '1.0.0', true );
            }
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//blog banner
add_action('acf/init', 'acf_blog_banner_block');
function acf_blog_banner_block() {

    // Check function exists.
    if( function_exists('acf_blog_banner_block') ) {

        // Register blog banner
        acf_register_block_type(array(
            'name'              => 'blog-banner-content',
            'title'             => __('Blog Banner'),
            'description'       => __('Blog Banner'),
            'render_template'   => 'template-parts/blocks/blog/blog-banner/blog-banner.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
        ));
    }

}



//blog banner
add_action('acf/init', 'acf_blog_content_block');
function acf_blog_content_block() {

    // Check function exists.
    if( function_exists('acf_blog_content_block') ) {

        // Register blog banner
        acf_register_block_type(array(
            'name'              => 'blog-page-content',
            'title'             => __('Blog Search Content'),
            'description'       => __('Blog Search Content'),
            'render_template'   => 'template-parts/blocks/blog/blog-content/blog-content.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
			'enqueue_assets'    => function(){
                wp_enqueue_script( 'blog-filter-js',get_template_directory_uri() . '/template-parts/blocks/blog/blog-content/blog-filter.js' , array(), '1.0.0', true  );
            }
        ));
    }

}

//Case Content
add_action('acf/init', 'acf_case_content_block');
function acf_case_content_block() {

    // Check function exists.
    if( function_exists('acf_case_content_block') ) {

        // Register Case Content
        acf_register_block_type(array(
            'name'              => 'case-page-content',
            'title'             => __('Case Search Content'),
            'description'       => __('Case Search Content'),
            'render_template'   => 'template-parts/blocks/case/case.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            'enqueue_assets'    => function(){
                wp_enqueue_script( 'case-filter-js',get_template_directory_uri() . '/template-parts/blocks/case/case-filter.js' , array(), '1.0.0', true  );
            }
        ));
    }

}

//Vacancy Content
add_action('acf/init', 'acf_vacancy_content_block');
function acf_vacancy_content_block() {

    // Check function exists.
    if( function_exists('acf_vacancy_content_block') ) {

        // Register Vacancy Content
        acf_register_block_type(array(
            'name'              => 'vacancies-page-content',
            'title'             => __('Vacancies Content'),
            'description'       => __('Vacancies Content'),
            'render_template'   => 'template-parts/blocks/vacancies/vacancies.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
			'enqueue_assets'    => function(){
                wp_enqueue_script( 'vac-filter-js',get_template_directory_uri() . '/template-parts/blocks/vacancies/vac-filter.js' , array(), '1.0.0', true  );
            }
        ));
    }

}

//Content Image
add_action('acf/init', 'acf_simple_content_block');
function acf_simple_content_block() {

    // Check function exists.
    if( function_exists('acf_simple_content_block') ) {

        //Content Image
        acf_register_block_type(array(
            'name'              => 'simple-content-image',
            'title'             => __('Nornal Content Block'),
            'description'       => __('Nornal Content Block'),
            'render_template'   => 'template-parts/blocks/content-image/content-block.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Content Image
add_action('acf/init', 'acf_left_right_block');
function acf_left_right_block() {

    // Check function exists.
    if( function_exists('acf_left_right_block') ) {

        //Content Image
        acf_register_block_type(array(
            'name'              => 'left-right-content',
            'title'             => __('Left Right Content'),
            'description'       => __('Left Right Content'),
            'render_template'   => 'template-parts/blocks/content-image/left-right.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}

//Type banner block
add_action('acf/init', 'acf_type_banner_block');
function acf_type_banner_block() {

    // Check function exists.
    if( function_exists('acf_type_banner_block') ) {

        // Register inner banner block.
        acf_register_block_type(array(
            'name'              => 'type-banner',
            'title'             => __('Type Banner'),
            'description'       => __('Type Banner block.'),
            'render_template'   => 'template-parts/blocks/banner/type-banner.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
             'enqueue_assets'    => function(){
                wp_enqueue_script( 'typewriter',get_template_directory_uri() . '/assets/js/typewriter.js' , array(), '1.0.0', true ,100 );
                wp_enqueue_script( 'typewriter-text', get_template_directory_uri() . '/template-parts/blocks/banner/type-banner.js', array(), '1.0.0', true ,1001);
            }
        ));
    }

}

//Text block
add_action('acf/init', 'acf_type_text_block');
function acf_type_text_block() {

    // Check function exists.
    if( function_exists('acf_type_text_block') ) {

        // Register inner banner block.
        acf_register_block_type(array(
            'name'              => 'text-block-column',
            'title'             => __('Text block'),
            'description'       => __('Text block 2 Column'),
            'render_template'   => 'template-parts/blocks/text-block/text-block.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true)
    ));

}
}

//Content Section
add_action('acf/init', 'acf_content_section');
function acf_content_section() {

    // Check function exists.
    if( function_exists('acf_content_section') ) {

        // Register Content With Sidebar block.
        acf_register_block_type(array(
            'name'              => 'content-section',
            'title'             => __('Content Section'),
            'description'       => __('Content Section'),
            'render_template'   => 'template-parts/blocks/text-block/content-block.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            
        ));
    }

}

//Content Section
add_action('acf/init', 'acf_content_section_full');
function acf_content_section_full() {

    // Check function exists.
    if( function_exists('acf_content_section_full') ) {

        // Register Content With Sidebar block.
        acf_register_block_type(array(
            'name'              => 'content-section-full',
            'title'             => __('Content Section Full With'),
            'description'       => __('Content Section'),
            'render_template'   => 'template-parts/blocks/text-block/content-block-full.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            
        ));
    }

}

//Content Section
add_action('acf/init', 'acf_content_alternate_section');
function acf_content_alternate_section() {

    // Check function exists.
    if( function_exists('acf_content_alternate_section') ) {

        // Register Content With Sidebar block.
        acf_register_block_type(array(
            'name'              => 'content-alternate_section',
            'title'             => __('Alternate Content Section'),
            'description'       => __('Alternate Content Section'),
            'render_template'   => 'template-parts/blocks/text-block/content-alternate.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            
        ));
    }

}



// transparent background section
add_action('acf/init', 'acf_register_tbs_block');
function acf_register_tbs_block() {

    // Check function exists.
    if( function_exists('acf_register_tbs_block') ) {

        //Basic Image And Content Section
        acf_register_block_type(array(
            'name'              => 'transparent_bg_box-section',
            'title'             => __('Two transparent background boxes'),
            'description'       => __('Two transparent background boxes'),
            'render_template'   => 'template-parts/blocks/digital-marketing-page/transparent-bg/transparent-bg.php',
            'category'          =>  'widgets',
            'mode'              => 'edit',
            'icon'              => 'format-gallery',
            'supports'          => array('mode'=>true),
            //'enqueue_style'     => get_template_directory_uri() . '/style.css'
        ));
    }

}






   // Register New Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'services-menu' => __( 'Services Menu' ),
      'condition-menu' => __( 'Terms & Conditions Menu' ),
      'about-traffic-builder-menu' => __( 'About Traffic Builder Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_filter('tiny_mce_before_init', 'tinymce_init');

function tinymce_init( $init ) {
    $init['extended_valid_elements'] .= ', span[style|id|nam|class|lang]';
$init['verify_html'] = false;
    return $init;
}







function create_team_post_type() {
  register_post_type( 'consultant',
    array(
      'labels' => array(
        'name' => 'Team',
        'singular_name' => 'Team',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team',
        'edit_item' => 'Edit Team',
        'new_item' => 'New Team',
        'view_item' => 'View Team',
        'search_items' => 'Search Team',
        'not_found' =>  'Nothing Found',
        'not_found_in_trash' => 'Nothing found in the Trash',
        'parent_item_colon' => ''
      ),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'menu_icon' => 'dashicons-hammer',
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'menu_position' => null,
      'supports' => array('title','editor','thumbnail','page-attributes') //'thumbnail',
    )
  );
}
add_action( 'init', 'create_team_post_type' );

function filterjob() {
  $cat_1 = $_POST['category_1'];
  $cat_2 = $_POST['category_2'];
  $cat_3 = $_POST['category_3'];

$tax_query = array('relation' => 'OR');
    if (!empty($cat_1))
    {
        $tax_query[] =  array(
                'taxonomy' => 'werkervaring',
                'field' => 'id',
                'terms' => $cat_1
            );
    }
    if (!empty($cat_2))
    {
        $tax_query[] =  array(
                'taxonomy' => 'dienstverband',
                'field' => 'id',
                'terms' => $cat_2
            );
    }
    if (!empty($cat_3))
    {
        $tax_query[] =  array(
                'taxonomy' => 'opleidingsniveau',
                'field' => 'id',
                'terms' => $cat_3
            );
    }


	$ajaxposts = new WP_Query(
		array(
			'post_type' 		=> 'vacatures',
			'posts_per_page' 	=> '-1',
			'orderby' 			=> 'date', 
			'order' 			=> 'desc',
			'tax_query' 		=> $tax_query,
		)
	);
	
  
  $response = ''; 
  if($ajaxposts->have_posts()) {
  
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
	//$count_posts = wp_count_posts()->publish;

        $cat_list=array();
		$terms_werkervaring = get_the_terms(get_the_ID(), 'werkervaring');
		foreach($terms_werkervaring as $term_werkervaring) {
			//echo $term_werkervaring->name;
			array_push($cat_list,$term_werkervaring->name);
		}
		
		$terms_vakgebieden = get_the_terms(get_the_ID(), 'vakgebieden');
		foreach($terms_vakgebieden as $term_vakgebieden) {
			//echo $term_vakgebieden->name;
			array_push($cat_list,$term_vakgebieden->name);
		}
		
		$terms_dienstverband = get_the_terms(get_the_ID(), 'dienstverband');
		foreach($terms_dienstverband as $term_dienstverband) {
			//echo $term_dienstverband->name;
			array_push($cat_list,$term_dienstverband->name);
		}
		
		$terms_opleidingsniveau = get_the_terms(get_the_ID(), 'opleidingsniveau');
		foreach($terms_opleidingsniveau as $term_opleidingsniveau) {
			//echo $term_opleidingsniveau->name;
			array_push($cat_list,$term_opleidingsniveau->name);
		}
	 
	    $response .= '<div class="vacancy-bx">';
		$response .= '<h3>'.get_the_title().'</h3>';
		
		$response .= '<div class="tagarea">';
		foreach($cat_list as $cat_list_row){
			$response .= '<span>'.$cat_list_row.'</span>';
		}
		$response .= '</div>';
		
		
		$response .= '<a href="'.get_the_permalink().'" class="more">Bekijk deze vacature <img src="'.get_template_directory_uri ().'/assets/images/rgt-arrw.png" alt="" title=""></a>';
		$response .= '</div>';
	 
    endwhile;

  } else {
    $response = '<p>Vacature niet gevonden..</p>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filterjob', 'filterjob');
add_action('wp_ajax_nopriv_filterjob', 'filterjob');


function filterjobtitle() {
  $jtitle = $_POST['jtitle'];


	$ajaxposts = new WP_Query(
		array(
			'post_type' 	 	=> 'vacatures',
			'posts_per_page' 	=> '-1',
			"s" 				=> $jtitle,
			'orderby' 			=> 'date', 
			'order' 			=> 'desc'
		)
	);
	
  
  $response = ''; 
  if($ajaxposts->have_posts()) {
  
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
	//$count_posts = wp_count_posts()->publish;

        $cat_list=array();
		$terms_werkervaring = get_the_terms(get_the_ID(), 'werkervaring');
		foreach($terms_werkervaring as $term_werkervaring) {
			//echo $term_werkervaring->name;
			array_push($cat_list,$term_werkervaring->name);
		}
		
		$terms_vakgebieden = get_the_terms(get_the_ID(), 'vakgebieden');
		foreach($terms_vakgebieden as $term_vakgebieden) {
			//echo $term_vakgebieden->name;
			array_push($cat_list,$term_vakgebieden->name);
		}
		
		$terms_dienstverband = get_the_terms(get_the_ID(), 'dienstverband');
		foreach($terms_dienstverband as $term_dienstverband) {
			//echo $term_dienstverband->name;
			array_push($cat_list,$term_dienstverband->name);
		}
		
		$terms_opleidingsniveau = get_the_terms(get_the_ID(), 'opleidingsniveau');
		foreach($terms_opleidingsniveau as $term_opleidingsniveau) {
			//echo $term_opleidingsniveau->name;
			array_push($cat_list,$term_opleidingsniveau->name);
		}
	 
	    $response .= '<div class="vacancy-bx">';
		$response .= '<h3>'.get_the_title().'</h3>';
		
		$response .= '<div class="tagarea">';
		foreach($cat_list as $cat_list_row){
			$response .= '<span>'.$cat_list_row.'</span>';
		}
		$response .= '</div>';
		
		
		$response .= '<a href="'.get_the_permalink().'" class="more">Bekijk deze vacature <img src="'.get_template_directory_uri ().'/assets/images/rgt-arrw.png" alt="" title=""></a>';
		$response .= '</div>';
	 
    endwhile;

  } else {
    $response = '<p>Vacature niet gevonden..</p>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filterjobtitle', 'filterjobtitle');
add_action('wp_ajax_nopriv_filterjobtitle', 'filterjobtitle');

/* Case Filter */
function casefilter() {
  $cat_1 = $_POST['category_1'];
  $cat_2 = $_POST['category_2'];
  $cat_3 = $_POST['category_3'];

$tax_query = array('relation' => 'OR');
    if (!empty($cat_1))
    {
        $tax_query[] =  array(
                'taxonomy' => 'case_branches',
                'field' => 'id',
                'terms' => $cat_1
            );
    }
    if (!empty($cat_2))
    {
        $tax_query[] =  array(
                'taxonomy' => 'case_cat',
                'field' => 'id',
                'terms' => $cat_2
            );
    }

    $ajaxposts = new WP_Query(
        array(
            'post_type'         => 'cases',
            'posts_per_page'    => '9',
            'orderby'           => 'date', 
            'order'             => 'desc',
            'tax_query'         => $tax_query,
        )
    );
    
  
  $response = ''; 
  if($ajaxposts->have_posts()) {
    $response .= '<div class="row">';
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();

            
        $response .= '<div class="col-lg-4">';
        $response .= '<div class="disbox">';
        $response .= '<div class="disimgbx"><a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a></div>';
        $response .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';  
        $response .= '<div class="line"></div>';  
        $response .= '<div class="text-center">';
        $response .= '<a href="'.get_the_permalink().'" class="more">Bekijk casestudy <img src="'.get_template_directory_uri ().'/assets/images/rgt-arrw.png" alt="" title=""></a>';
        $response .= '</div>';
        $response .= '</div>';
        $response .= '</div>';
     
    endwhile;
    $response .= '</div>';

  } else {
    $response = '<p>Case Not Found..</p>';
  }

  echo $response;
  // wp_pagenavi( array( 'query' => $ajaxposts ) );
  //wp_reset_postdata();
  exit;
}
add_action('wp_ajax_casefilter', 'casefilter');
add_action('wp_ajax_nopriv_casefilter', 'casefilter');


function filtercasetitle() {
  $ctitle = $_POST['ctitle'];


	$ajaxposts = new WP_Query(
		array(
			'post_type' 	 	=> 'cases',
			'posts_per_page' 	=> '-1',
			"s" 				=> $ctitle,
			'orderby' 			=> 'date', 
			'order' 			=> 'desc'
		)
	);
	
  
  $response = ''; 
  if($ajaxposts->have_posts()) {
    $response .= '<div class="row">';
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();

            
        $response .= '<div class="col-lg-4">';
        $response .= '<div class="disbox">';
        $response .= '<div class="disimgbx"><a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a></div>';
        $response .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';  
        $response .= '<div class="line"></div>';  
        $response .= '<div class="text-center">';
        $response .= '<a href="'.get_the_permalink().'" class="more">Bekijk casestudy <img src="'.get_template_directory_uri ().'/assets/images/rgt-arrw.png" alt="" title=""></a>';
        $response .= '</div>';
        $response .= '</div>';
        $response .= '</div>';
     
    endwhile;
    $response .= '</div>';

  } else {
    $response = '<p>Case Not Found..</p>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filtercasetitle', 'filtercasetitle');
add_action('wp_ajax_nopriv_filtercasetitle', 'filtercasetitle');


/* Blog Filter */
function blogfilter() {
  $cat_1 = $_POST['category_1'];

$tax_query = array('relation' => 'OR');
    if (!empty($cat_1))
    {
        $tax_query[] =  array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $cat_1
            );
    }
    $ajaxposts = new WP_Query(
        array(
            'post_type'         => 'post',
            'posts_per_page'    => '-1',
            'orderby'           => 'date', 
            'order'             => 'desc',
            'tax_query'         => $tax_query,
        )
    );
    
  
  $response = ''; 
  if($ajaxposts->have_posts()) {
    $response .= '<div class="row">';
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $thumb = get_the_post_thumbnail();
		$category = get_the_category();
        $firstCategory = $category[0]->cat_name;
            
        $response .= '<div class="col-lg-4 col-md-6">';
        $response .= '<div class="blogbox">';
		$response .= '<div class="disimgbx">';
		$response .= '<span class="uk-label-cat">'.$firstCategory.'</span>';
		if ($thumb):
        $response .= '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a>';
		else:
		$response .= '<a href="'.get_the_permalink().'"><img src="'.get_template_directory_uri().'/assets/images/placeholder.jpg"></a>';
		endif;
		$response .= '</div>'; 
        $response .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';  
        $response .= '<h5>By <span>'.get_the_author().'</span>  •'.get_the_date( 'F j, Y').'</h5>';  
        $response .= '</div>';
        $response .= '</div>';
     
    endwhile;
    $response .= '</div>';

  } else {
    $response = '<p>Bericht niet gevonden..</p>';
  }

  echo $response;
  // wp_pagenavi( array( 'query' => $ajaxposts ) );
  //wp_reset_postdata();
  exit;
}
add_action('wp_ajax_blogfilter', 'blogfilter');
add_action('wp_ajax_nopriv_blogfilter', 'blogfilter');

function filterblogtitle() {
  $btitle = $_POST['btitle'];

     
	$ajaxposts = new WP_Query(
		array(
			'post_type' 	 	=> 'post',
			'posts_per_page' 	=> '-1',
			'post_title_like'	=> $btitle,
			'suppress_filters' => false,
			'orderby' 			=> 'date', 
			'order' 			=> 'desc'
		)
	);
	
  
  $response = ''; 
  if($ajaxposts->have_posts()) {
  
    $response .= '<div class="row">';
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $thumb = get_the_post_thumbnail();
        $category = get_the_category();
        $firstCategory = $category[0]->cat_name;    
        $response .= '<div class="col-lg-4 col-md-6">';
        $response .= '<div class="blogbox">';
		$response .= '<div class="disimgbx">';
		$response .= '<span class="uk-label-cat">'.$firstCategory.'</span>';
		if ($thumb):
        $response .= '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a>';
		else:
		$response .= '<a href="'.get_the_permalink().'"><img src="'.get_template_directory_uri().'/assets/images/placeholder.jpg"></a>';
		endif;
		$response .= '</div>'; 
        $response .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';  
        $response .= '<h5>By <span>'.get_the_author().'</span>  •'.get_the_date( 'F j, Y').'</h5>';  
        $response .= '</div>';
        $response .= '</div>';
     
    endwhile;
    $response .= '</div>';

  } else {
    $response = '<p>Bericht niet gevonden..</p>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filterblogtitle', 'filterblogtitle');
add_action('wp_ajax_nopriv_filterblogtitle', 'filterblogtitle');


add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, $wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function wpvkp_social_buttons($content) {
    global $post;
    if(is_singular() || is_home()){
    
        // Get current page URL 
		$url = get_the_permalink();
        $sb_url = urlencode(get_permalink());
 
        // Get current page title
        $sb_title = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=wpvkp';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
        $whatsappURL = 'https://wa.me/?text='.$sb_title . ' ' . $sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;

       if(!empty($sb_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
        }
        else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;description='.$sb_title;
        }
 
        // Based on popular demand added Pinterest too
        //$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
       
 
        // Add sharing button at the end of page/page content
        $content .= '<ul>';
		$content .= '<li><a href="'.$linkedInURL.'" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in"></i></a></li>';
		$content .= '<li><a href="'.$facebookURL.'" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>';
        $content .= '<li><a href="'. $twitterURL .'" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a></li>';       
        $content .= '<li><a href="'.$whatsappURL.'" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a></li>';	
        $content .= '<li><a href="javascript:void(0)" onclick="copyToClipboard(\'#texttocopy\')" ><i class="fas fa-link"></i></a></li>';
        $content .= '<li><a href="mailto:info@trafficbuilders.com"><i class="far fa-envelope"></i></a></li>';
        $content .= '</ul>';		
		$content .= '<div id ="texttocopy" style="display:none;">'.$url.'</div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content if you want to automatically show social buttons below your post.

//add_filter( 'the_content', 'wpvkp_social_buttons');

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons appear their.
// You will need to enabled shortcode execution in widgets.
add_shortcode('social','wpvkp_social_buttons');

add_rewrite_rule('^cases/page/([0-9]+)','index.php?pagename=cases&paged=$matches[1]', 'top');

//Gravity Forms
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    if($form['id']==18){
        return "<input type='submit' value='Neem contact op' class='submit' id='gform_submit_button_{$form['id']}'>";
    }else{
		return "<input type='submit' value='Verzenden' class='submit flt_none' id='gform_submit_button_{$form['id']}'>";
	}
}

/*
** Gravity Forms - Disable Autocomplete
*/
add_filter( 'gform_form_tag', 'gform_form_tag_autocomplete', 11, 2 );
function gform_form_tag_autocomplete( $form_tag, $form )
{
if ( is_admin() ) return $form_tag;
if ( GFFormsModel::is_html5_enabled() )
{
$form_tag = str_replace( '>', ' autocomplete="off">', $form_tag );
}
return $form_tag;
}
add_filter( 'gform_field_content_#_#', 'gform_form_input_autocomplete', 11, 5 );
function gform_form_input_autocomplete( $input, $field, $value, $lead_id, $form_id )
{
if ( is_admin() ) return $input;
if ( GFFormsModel::is_html5_enabled() )
{
$input = preg_replace( '/<(input|textarea)/', '<${1} autocomplete="off" ', $input );
}
return $input;
}

function comment_form_change_cookies_consent( $fields ) {
	$commenter = wp_get_current_commenter();
	$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$fields['cookies'] = '<div class="newsbx chk"><span class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					 '<label for="wp-comment-cookies-consent ">Bewaar mijn naam, e-mailadres en website in deze browser voor de volgende keer dat ik commentaar geef.</label></span></div>';
	return $fields;
}
add_filter( 'comment_form_default_fields', 'comment_form_change_cookies_consent' );


function my_post_object_query( $args, $field, $post )
{
    // modify the order
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';
    $args['post_status'] = 'publish';

    return $args;
}

// filter for a specific field based on it's name
add_filter('acf/fields/post_object/query/name=blog_slider_bss', 'my_post_object_query', 10, 3);