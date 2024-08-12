<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_our_works_Post_Type')) :
    class WeaversWeb_our_works_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'our_works_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function our_works_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('Our works', 'WeaversWeb'),
                'singular_name' => __('Our works', 'WeaversWeb'),
                'add_new' => __('Add New', 'WeaversWeb'),
                'add_new_item' => __('Add New Our works', 'WeaversWeb'),
                'edit_item' => __('Edit Our works', 'WeaversWeb'),
                'new_item' => __('Add New Our works', 'WeaversWeb'),
                'view_item' => __('View Our works', 'WeaversWeb'),
                'search_items' => __('Search Our works', 'WeaversWeb'),
                'not_found' => __('No Our works found', 'WeaversWeb'),
                'not_found_in_trash' => __('No Our works found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-format-chat',
                'rewrite' => array('slug' => 'our works'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail','excerpt')
            );

            $args = apply_filters('WeaversWeb_our_works_args', $args);
            register_post_type('our works', $args);


            // Add new Class Type taxonomy,NOT hierarchical(like tags)
            $labels_one = array(
                'name' => _x('Ourworks Categories', 'taxonomy general name'),
                'singular_name' => _x('Ourworks Type', 'taxonomy singular name'),
                'search_items' => __('Search Ourworks Types'),
                'popular_items' => __('Popular Ourworks Types'),
                'all_items' => __('All Ourworks Types'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Edit Ourworks Type'),
                'update_item' => __('Update Ourworks Type'),
                'add_new_item' => __('Add New Ourworks Categories'),
                'new_item_name' => __('New Ourworks Type Name'),
                'separate_items_with_commas' => __('Separate Ourworks types with commas'),
                'add_or_remove_items' => __('Add or remove Ourworks types'),
                'choose_from_most_used' => __('Choose from the most used Ourworks types'),
                'not_found' => __('No Ourworks types found.'),
                'menu_name' => __('Ourworks Categories'),
            );

            $args_one = array(
                'hierarchical' => true,
                'labels' => $labels_one,
                'show_ui' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'ourworks_type'),
            );

             register_taxonomy('Ourworks_type', 'ourworks', $args_one);
        }
    }
    new WeaversWeb_our_works_Post_Type;
endif;
