<?php

// simply include in a theme's function.php file for shortcode accessibility

function include_pmg_widget() {
    //wp_enqueue_script( 'pmg-widget', get_template_directory_uri() . '/js/wp.js', array('jquery'), '', true ); /
    wp_register_script( 
        'pmg-widget', 
        get_template_directory_uri() . '/js/wp.js',
        array( 'jquery' ), // jQuery as dependency
        false,
        true
    );
    wp_enqueue_script( 'pmg-widget');
}


function append_content($content) {
	if(is_single()) {
		$content .= '<div class="pmg-widget-container"></div>';
	}
	return $content;
}

add_filter( 'the_content', 'append_content' );


function makePMGWidget() {
	wp_enqueue_script( 'pmg-widget', get_template_directory_uri() . '/js/wp.js' );
}

add_shortcode( 'pmg_widget', 'makePMGWidget' );