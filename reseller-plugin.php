<?php

/**
 * Plugin Name: CustomSeller
 * Plugin URI: https://github.com/PedramDev/CustomSeller
 * Description: Custom seller , Usage : [reseller] , [post_reseller]
 * Version: 1.0
 * Author: Pedram Karimi
 * Author URI: https://github.com/PedramDev
 * Text Domain: custom-seller
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

define('CustomSeller__PLUGIN_FILE', __FILE__);
define('CustomSeller__VERSION', '1.0');

    wp_register_style("ssd_iranmap.css", plugins_url( '/assets/css/iranmap.css', CustomSeller__PLUGIN_FILE ),[],CustomSeller__VERSION );
    wp_register_script("iranmap.min.js", plugins_url( '/assets/js/iranmap.min.js', CustomSeller__PLUGIN_FILE ),['jquery'],CustomSeller__VERSION);



add_action( 'init', 'agate_resaler_post_page_type' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function agate_resaler_post_page_type() {
    $labels = array(
        'name'               => 'نمایندگی',
        'singular_name'      => 'نمایندگی',
        'menu_name'          => 'نمایندگی',
        'name_admin_bar'     => 'نمایندگی',
        'add_new'            => 'نمایندگی جدید',
        'add_new_item'       => 'آیتم جدید نمایندگی',
        'new_item'           => 'آیتم جدید نمایندگی',
        'edit_item'          => 'ویرایش آیتم نمایندگی',
        'view_item'          => 'دیدگاه آیتم نمایندگی',
        'all_items'          => 'همه موارد نمایندگی',
        'search_items'       => 'جستجو آیتم نمایندگی',
        'parent_item_colon'  => 'آیتم پدر نمایندگی',
        'not_found'          => 'نمایندگی پیدا نشد',
        'not_found_in_trash' => 'موردی در زباله دان نمایندگی یافت نشد'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'custom-seller' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'resaler' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author' )
    );

    register_post_type( 'resaler', $args );
}
function agate_postresaler_post_page_type() {
    $labels = array(
        'name'               => 'نمایندگی پس از فروش',
        'singular_name'      => 'نمایندگی پس از فروش',
        'menu_name'          => 'نمایندگی پس از فروش',
        'name_admin_bar'     => 'نمایندگی پس از فروش',
        'add_new'            => 'نمایندگی پس از فروش جدید',
        'add_new_item'       => 'آیتم جدید نمایندگی پس از فروش',
        'new_item'           => 'آیتم جدید نمایندگی پس از فروش',
        'edit_item'          => 'ویرایش آیتم نمایندگی پس از فروش',
        'view_item'          => 'دیدگاه آیتم نمایندگی پس از فروش',
        'all_items'          => 'همه موارد نمایندگی پس از فروش',
        'search_items'       => 'جستجو آیتم نمایندگی پس از فروش',
        'parent_item_colon'  => 'آیتم پدر نمایندگی پس از فروش',
        'not_found'          => 'نمایندگی پس از فروش پیدا نشد',
        'not_found_in_trash' => 'موردی در زباله دان نمایندگی پس از فروش یافت نشد'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'custom-seller' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'postresaler' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author' )
    );

    register_post_type( 'resaler', $args );
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_resaler_province_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_resaler_province_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => 'نوع استان',
        'singular_name'     => 'نوع استان',
        'search_items'      => 'جستجو در آیتم استان',
        'all_items'         => ' همه موارد استان',
        'parent_item'       => 'آیتم پدر استان',
        'parent_item_colon' => 'کلون آیتم پدر استان',
        'edit_item'         => 'ویرایش آیتم استان',
        'update_item'       => 'به روزرسانی آیتم استان',
        'add_new_item'      => 'افزودن آیتم جدید استان',
        'new_item_name'     => 'افزودن نام آیتم جدید استان',
        'menu_name'         => 'دسته بندی استان',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'province' ),
    );

    register_taxonomy( 'province', array( 'resaler','postresaler' ), $args );


}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_resaler_city_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_resaler_city_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => 'نوع شهر',
        'singular_name'     => 'نوع شهر',
        'search_items'      => 'جستجو در آیتم شهر',
        'all_items'         => ' همه موارد شهر',
        'parent_item'       => 'آیتم پدر شهر',
        'parent_item_colon' => 'کلون آیتم پدر شهر',
        'edit_item'         => 'ویرایش آیتم شهر',
        'update_item'       => 'به روزرسانی آیتم شهر',
        'add_new_item'      => 'افزودن آیتم جدید شهر',
        'new_item_name'     => 'افزودن نام آیتم جدید شهر',
        'menu_name'         => 'دسته بندی شهر',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'city' ),
    );

    register_taxonomy( 'city', array( 'resaler','postresaler' ), $args );


}


require_once dirname(__FILE__) . '/postresaler-short-code';
require_once dirname(__FILE__) . '/resaler-short-code';