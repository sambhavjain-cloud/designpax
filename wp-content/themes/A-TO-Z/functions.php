<?php
// Theme setup: Menus & Support
function my_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'mytheme')
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// Enqueue Styles
function my_theme_styles()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'my_theme_styles');

// site setting create ka code 
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'site-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// sub page of header and footer in this 

if ( function_exists('acf_add_options_sub_page') ) {
    // Header Settings
    acf_add_options_sub_page(array(
        'page_title'    => 'Header Settings',
        'menu_title'    => 'Header Settings',
        'parent_slug'   => 'site-settings',
        'menu_slug'     => 'header-settings',
        'capability'    => 'edit_posts',
    ));

    // Footer Settings
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer Settings',
        'parent_slug'   => 'site-settings',
        'menu_slug'     => 'footer-settings',
        'capability'    => 'edit_posts',
    ));

        acf_add_options_sub_page(array(
        'page_title'    => 'Archive Settings',
        'menu_title'    => 'Archive Settings',
        'parent_slug'   => 'site-settings',
        'menu_slug'     => 'archive-settings',
        'capability'    => 'edit_posts',
    ));
}




// Helper function: Convert video URL to proper embed URL
function mytheme_get_embed_url($url) {
    if (!$url) return '';

    $parsed = parse_url($url);

    //  YouTube (watch?v=)
    if (strpos($url, 'youtube.com/watch') !== false) {
        parse_str($parsed['query'], $params);
        if (!empty($params['v'])) {
            return 'https://www.youtube.com/embed/' . $params['v'];
        }
    }

    //  YouTube (youtu.be/)
    if (strpos($url, 'youtu.be/') !== false) {
        $video_id = basename($parsed['path']);
        return 'https://www.youtube.com/embed/' . $video_id;
    }

    //  YouTube (embed already)
    if (strpos($url, 'youtube.com/embed/') !== false) {
        return $url;
    }

    //  Vimeo
    if (strpos($url, 'vimeo.com/') !== false) {
        $video_id = ltrim($parsed['path'], '/');
        return 'https://player.vimeo.com/video/' . $video_id;
    }

    // Fallback (unknown)
    return $url;
}

function register_project_item_cpt() {

  // Register Custom Post Type: Project Item
  register_post_type('project_item', [
    'label' => 'Our Work',
    'labels' => [
      'name'               => 'Our Work',
      'singular_name'      => 'Project Item',
      'add_new_item'       => 'Add New Project',
      'edit_item'          => 'Edit Project',
      'new_item'           => 'New Project',
      'view_item'          => 'View Project',
      'search_items'       => 'Search Projects',
      'not_found'          => 'No projects found',
    ],
    'public'            => true,
    'has_archive'       => true,
    'rewrite'           => [
      'slug'       => 'our-work', //  Archive lives at /our-work
      'with_front' => false,
    ],
    'supports'          => ['title', 'editor', 'thumbnail'],
    'menu_icon'         => 'dashicons-portfolio',
    'show_in_rest'      => true,
    'hierarchical'      => false,
    'show_ui'           => true,
    'capability_type'   => 'post',
  ]);

  // Register Taxonomy: Industry
  register_taxonomy('industry', 'project_item', [
    'label'  => 'Industries',
    'labels' => [
      'name'              => 'Industries',
      'singular_name'     => 'Industry',
      'search_items'      => 'Search Industries',
      'all_items'         => 'All Industries',
      'edit_item'         => 'Edit Industry',
      'update_item'       => 'Update Industry',
      'add_new_item'      => 'Add New Industry',
      'new_item_name'     => 'New Industry Name',
      'menu_name'         => 'Industries',
    ],
    'hierarchical'      => true,
    'rewrite'           => ['slug' => 'industry'],
    'show_in_rest'      => true,
  ]);

  // Register Taxonomy: Technology
  register_taxonomy('technology', 'project_item', [
    'label'  => 'Technologies',
    'labels' => [
      'name'              => 'Technologies',
      'singular_name'     => 'Technology',
      'search_items'      => 'Search Technologies',
      'all_items'         => 'All Technologies',
      'edit_item'         => 'Edit Technology',
      'update_item'       => 'Update Technology',
      'add_new_item'      => 'Add New Technology',
      'new_item_name'     => 'New Technology Name',
      'menu_name'         => 'Technologies',
    ],
    'hierarchical'      => true,
    'rewrite'           => ['slug' => 'technology'],
    'show_in_rest'      => true,
  ]);
}

add_action('init', 'register_project_item_cpt');



function atoz_enqueue_scripts() {
  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'atoz_enqueue_scripts');


