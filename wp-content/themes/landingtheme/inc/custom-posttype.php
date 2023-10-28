<?php
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {

$labels = array(
		"name" => __( 'Slideshows', 'mysite' ),
		"singular_name" => __( 'Slideshow', 'mysite' ),
		);

	$args = array(
		"label" => __( 'Slideshows', 'mysite' ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slides", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-media-interactive",		
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),				
	);
	register_post_type( "slides", $args );

// End of cptui_register_my_cpts()
}

