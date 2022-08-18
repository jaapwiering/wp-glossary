<?php

/* Initialise child theme */

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/* Disable block editor */
add_filter('use_block_editor_for_post', '__return_false', 10);


/* Disables the block editor from managing widgets */
add_filter( 'use_widgets_block_editor', '__return_false' );


/* Declaration of custom post type "glossary" */

function fngl_cpt_glossary()
{

	$labels = array(
		'name'               => _x('Glossary', 'post type general name', 'wp-glossary'),
		'singular_name'      => _x('Glossary Item', 'post type singular name', 'wp-glossary'),
		'menu_name'          => _x('Glossary', 'admin menu', 'wp-glossary'),
		'name_admin_bar'     => _x('Glossary', 'add new on admin bar', 'wp-glossary'),
		'add_new'            => _x('Add New', 'wp-glossary'),
		'add_new_item'       => __('Add New Item', 'wp-glossary'),
		'new_item'           => __('New Item', 'wp-glossary'),
		'edit_item'          => __('Edit Item', 'wp-glossary'),
		'view_item'          => __('View Item', 'wp-glossary'),
		'all_items'          => __('All Items', 'wp-glossary'),
		'search_items'       => __('Search Items', 'wp-glossary'),
		// 'parent_item_colon'  => __('Parent glossary:', 'wp-glossary'),
		'not_found'          => __('No items found.', 'wp-glossary'),
		'not_found_in_trash' => __('No items found in Trash.', 'wp-glossary'),
	);

	$support = array(
		'title',
		'editor',
    	'author',
		// 'thumbnail',
		// 'excerpt',
		// 'custom-fields',
    	'comments',
		'revisions',
		// 'page-attributes',
	);

	$args = array(
		// 'label'               => _x('glossary', 'post type general name', 'wp-glossary'),
		'labels'              => $labels,
		'menu_position'       => 32,
		'supports'            => $support,
		'public'              => true,
		'capability_type'     => 'page',
		// 'show_in_rest'        => true,
		'taxonomies'          => array('glossary-category'),
		'hierarchical'        => true,
    'has_archive'         => true,
	);

	register_post_type('glossary', $args);
}
add_action('init', 'fngl_cpt_glossary');


/* Show unlimited entries on glossary archives */

function fngl_get_all_glossary_posts( $query ) {
	if( !is_admin() && $query->is_main_query() && is_post_type_archive( 'glossary' ) ) {
		$query->set( 'posts_per_page', '-1' );
//		$query->set( 'orderby', 'title' ); // doesn't work due to multilingual titles
//		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'fngl_get_all_glossary_posts' );



/* Register a 'glossary-category' taxonomy for post type 'glossary'. */

function fngl_cpt_glossary_cat() {
   register_taxonomy( 'glossary-category', 'glossary', array(
       'label'        => __( 'Glossary Category', 'wp-glossary' ),
       'rewrite'      => array( 'slug' => 'glossary-category' ),
       'hierarchical' => true,
   ) );
}
add_action( 'init', 'fngl_cpt_glossary_cat', 0 );


/* Add custom taxonomy 'glossary-category' column to CPT 'glossary' edit screen */
/* source: https://wordpress.stackexchange.com/questions/253640/adding-custom-columns-to-custom-post-types */

// Add the custom columns to the post type 'glossary'
add_filter( 'manage_glossary_posts_columns', 'set_custom_edit_glossary_columns' );
function set_custom_edit_glossary_columns($columns) {
    unset( $columns['date'] );
    $columns['glossary-category'] = __( 'Category', 'wp-glossary' );
    // $columns['publisher'] = __( 'Publisher', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the post type 'glossary'
add_action( 'manage_glossary_posts_custom_column' , 'custom_glossary_column', 10, 2 );
function custom_glossary_column( $column, $post_id ) {
    switch ( $column ) {

        case 'glossary-category' :
            $terms = get_the_term_list( $post_id , 'glossary-category' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( '- none -', 'wp-glossary' );
            break;

        // case 'publisher' :
        //     echo get_post_meta( $post_id , 'publisher' , true ); 
        //     break;

    }
}

/* Last updated function */
function fngl_last_update(){
	$updated_date = get_the_modified_time('Y-m-d');
	echo '<span>last update </span>' . $updated_date; 
}