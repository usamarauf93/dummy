<?php 
/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
    // style sheets
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/css/linearicons.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/css/themify-icons.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/css/nice-select.css');
    wp_enqueue_style( 'nouislider', get_template_directory_uri() . '/css/nouislider.min.css');
    wp_enqueue_style( 'ion-rangeSlider', get_template_directory_uri() . '/css/ion.rangeSlider.css');
    wp_enqueue_style( 'ion-rangeSlider-skinFlat', get_template_directory_uri() . '/css/ion.rangeSlider.skinFlat.css');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');

    // scripts

    wp_enqueue_script( 'jquery-2.2.4', get_template_directory_uri() . '/js/vendor/jquery-2.2.4.min.js',  true );
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',  true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js',  true );
    wp_enqueue_script( 'jquery.ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js',  true );
    wp_enqueue_script( 'jquery.nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js',  true );
    wp_enqueue_script( 'jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js',  true );
    wp_enqueue_script( 'nouislider', get_template_directory_uri() . '/js/nouislider.min.js',  true );
    wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/countdown.js',  true );
    wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',  true );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js',  true );
    //    js gmap
    wp_enqueue_script( 'google-maps','https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE',  true );
    wp_enqueue_script( 'gmaps', get_template_directory_uri() . '/js/gmaps.min.js',  true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js',  true );
   

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );

  
  /* Custom Post Type Start */
  function create_posttype() {
      register_post_type( 'sliders',
      // CPT Options
      array(
        'labels' => array(
         'name' => __( 'sliders' ),
         'singular_name' => __( 'sliders' )
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'sliders'),
       )
      );
      }
      // Hooking up our function to theme setup
      add_action( 'init', 'create_posttype' );
      /* Custom Post Type End */
  
  
      add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
   
  function add_my_post_types_to_query( $query ) {
      if ( is_home() && $query->is_main_query() )
          $query->set( 'post_type', array( 'post', 'sliders' ) );
      return $query;
  }
  ?>