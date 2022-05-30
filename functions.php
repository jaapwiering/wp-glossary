<?php

/* initialise child theme */

add_action(
  'wp_enqueue_scripts',
  function () {
     wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
  },
  10
);


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
		'taxonomies'          => array('category', 'post_tag'),
		// 'hierarchical'        => true,
    'has_archive'         => true,
	);

	register_post_type('glossary', $args);
}
add_action('init', 'fngl_cpt_glossary');