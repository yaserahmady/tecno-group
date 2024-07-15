<?php 
/* Child theme generated with WPS Child Theme Generator */
            
if ( ! function_exists( 'b7ectg_theme_enqueue_styles' ) ) {            
    add_action( 'wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles' );
    
    function b7ectg_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    }
}

// function enqueue_inactivity_script() {
//     wp_enqueue_script('inactivity-script',  'https://www.tecno-group.eu/wp-content/themes/tecno-hello-elementor-child/inactivity.js
// ', array(), null, true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_inactivity_script');


function register_custom_widget( $widgets_manager ) {
    require_once( __DIR__ . '/custom-widgets/class-custom-json-widget.php' );
    $widgets_manager->register( new \Custom_JSON_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_custom_widget' );


function enqueue_custom_scripts() {
    wp_enqueue_script( 'custom-json-script',  'https://www.tecno-group.eu/wp-content/themes/tecno-hello-elementor-child/custom-widgets/custom-json-script.js', [ 'jquery' ], null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

function enqueue_dynamic_data_scripts() {
    wp_enqueue_script( 'dynamic-data-script', get_stylesheet_directory_uri() . '/custom-widgets/dynamic-data-script.js', [ 'jquery' ], null, true );
    wp_localize_script( 'dynamic-data-script', 'dynamicDataAjax', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ]);
}
add_action( 'wp_enqueue_scripts', 'enqueue_dynamic_data_scripts' );


function add_custom_js() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleCheckbox = document.querySelector('#mode-toggle #toggle');
        
        // Check if grayscale enabled
        if (localStorage.getItem('grayscale-mode') === 'enabled') {
            document.body.classList.add('grayscale-mode');
            toggleCheckbox.checked = true;
            document.cookie = "grayscale-mode=enabled; path=/";
        } else {
            document.cookie = "grayscale-mode=disabled; path=/";
        }

        toggleCheckbox.addEventListener('change', function () {
            document.body.classList.toggle('grayscale-mode');
            
            // Save the grayscale  in local storage and cookie
            if (document.body.classList.contains('grayscale-mode')) {
                localStorage.setItem('grayscale-mode', 'enabled');
                document.cookie = "grayscale-mode=enabled; path=/";
            } else {
                localStorage.setItem('grayscale-mode', 'disabled');
                document.cookie = "grayscale-mode=disabled; path=/";
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'add_custom_js');

function add_custom_js2() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleCheckbox = document.querySelector('#mode-toggle-2 #toggle-2');
        
        
        if (localStorage.getItem('grayscale-mode') === 'enabled') {
            document.body.classList.add('grayscale-mode');
            toggleCheckbox.checked = true;
            document.cookie = "grayscale-mode=enabled; path=/";
        } else {
            document.cookie = "grayscale-mode=disabled; path=/";
        }

        toggleCheckbox.addEventListener('change', function () {
            document.body.classList.toggle('grayscale-mode');
            
         
            if (document.body.classList.contains('grayscale-mode')) {
                localStorage.setItem('grayscale-mode', 'enabled');
                document.cookie = "grayscale-mode=enabled; path=/";
            } else {
                localStorage.setItem('grayscale-mode', 'disabled');
                document.cookie = "grayscale-mode=disabled; path=/";
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'add_custom_js2');

function add_grayscale_body_class($classes) {
    if (isset($_COOKIE['grayscale-mode']) && $_COOKIE['grayscale-mode'] === 'enabled') {
        $classes[] = 'grayscale-mode';
    }
    return $classes;
}
add_filter('body_class', 'add_grayscale_body_class');

function add_custom_div_to_body() {
    echo '<div id="grayscale"></div>';
}
add_action('wp_body_open', 'add_custom_div_to_body');