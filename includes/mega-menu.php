<?php
/**
 * Creates Mega Menu Post Type
 * ................................................................
 */

// Initialize
//................................................................
StaticBlockContent::onload();

// Easy access to static block output
//................................................................
function the_static_blocks( $id = false, $args = array() ) {
	if ($id) {
		$args["id"] = $id;
		echo StaticBlockContent::get_static_content($args);
	}
}

#-----------------------------------------------------------------
# Static Block Class
#-----------------------------------------------------------------
class StaticBlockContent {
	static function onload() {
		add_action('init', array(__CLASS__,'init_static_blocks'));
		add_action("after_switch_theme", "flush_rewrite_rules", 10 ,  2); // update permalinks for new rewrite rules
		add_shortcode('static_content', array(__CLASS__,'static_content_shortcode'));
		add_shortcode('medim_mega_menu', array(__CLASS__,'static_content_shortcode'));
	}
	static function init_static_blocks() {
		if (function_exists('register_post_type')) {
			register_post_type('medim_mega_menu',
				array(
					'labels' => array(
							'name' =>				esc_html_x('Mega Menu Post', 'post type general name', 'medim'),
							'singular_name' =>		esc_html_x('Mega Menu', 'post type singular name', 'medim'),
							'add_new' =>			esc_html_x('Add New', 'block', 'medim'),
							'add_new_item' =>		esc_html__('Add New Mega Menu', 'medim'),
							'edit_item' =>			esc_html__('Edit Mega Menu', 'medim'),
							'new_item' =>			esc_html__('New Mega Menu', 'medim'),
							'all_items' =>			esc_html__('Mega Menus', 'medim'),
							'view_item' =>			esc_html__('View Mega Menu', 'medim'),
							'search_items' =>		esc_html__('Search', 'medim'),
							'not_found' =>			esc_html__('No Mega Menus found', 'medim'),
							'not_found_in_trash' =>	esc_html__('No Mega Menus found in Trash', 'medim'), 
							'parent_item_colon' => '',
							'menu_name' => 'Mega Menu'
						),
						'exclude_from_search' => true,
						'publicly_queryable'  => true,
						'public'              => true,
						'show_ui'             => true,
						'query_var'           => 'medim_mega_menu',
						'rewrite'             => array('slug' => 'medim_mega_menu'),
						'supports'            => array(
							'title',
							'editor',
							'revisions',
						),
				)
			);
		}
	}
}
