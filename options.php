<?php
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}


function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'mythemeoption' ),
		'two' => __( 'Two', 'mythemeoption' ),
		'three' => __( 'Three', 'mythemeoption' ),
		'four' => __( 'Four', 'mythemeoption' ),
		'five' => __( 'Five', 'mythemeoption' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'mythemeoption' ),
		'two' => __( 'Pancake', 'mythemeoption' ),
		'three' => __( 'Omelette', 'mythemeoption' ),
		'four' => __( 'Crepe', 'mythemeoption' ),
		'five' => __( 'Waffle', 'mythemeoption' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	/* Basic Setting */

	$options[] = array(
		'name' => __( 'Basic Settings', 'mythemeoption' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __( 'Home Page Logo', 'mythemeoption' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'mythemeoption' ),
		'id' => 'logo',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Inner Page Logo', 'mythemeoption' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'mythemeoption' ),
		'id' => 'innerlogo',
		'type' => 'upload'
	);


	
	/* End Basic Setting */
	
	/* Contact Info Setting */
	
	$options[] = array(
		'name' => __( 'Contact Information', 'mythemeoption' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Email', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'mailid',
		'std' => '',
		'type' => 'text'
	);
	
	
	/* End Contact Info Setting */
	
		/* Social Info Setting */

	$options[] = array(
		'name' => __( 'Social Information', 'mythemeoption' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Facebook', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'facebook',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Instagram', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'instagram',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Twitter', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'twitter',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Linkden', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'linkedin',
		'std' => '',
		'type' => 'text'
	);
	/* End Social Info Setting */
	
/* Footer Text */
$options[] = array(
		'name' => __( 'Footer Information', 'mythemeoption' ),
		'type' => 'heading'
	);
$options[] = array(
		'name' => __( 'Footer Text', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'footer-text',
		'std' => '',
		'type' => 'editor'
	);
$options[] = array(
		'name' => __( 'Copyright Text', 'mythemeoption' ),
		'desc' => __( '' ),
		'id' => 'copy-text',
		'std' => '',
		'type' => 'text'
	);



	return $options;
}

