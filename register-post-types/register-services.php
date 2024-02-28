<?php 

// register products post type
function services_custom_post_type(){
    $labels = array(
        'name' => __('Стоматологические услуги', 'threedent-theme'),
        'singular_name' => __('Стоматологическая услуга', 'threedent-theme'),
        'add_new' => __('Добавить новый', 'threedent-theme'),
        'add_new_item' => __('Добавить новый', 'threedent-theme'),
        'edit_item' => __('Редактировать', 'threedent-theme'),
        'new_item' => __('Новый', 'threedent-theme'),
        'view_item' => __('Вид', 'threedent-theme'),
        'search_items' => __('Поиск', 'threedent-theme'),
        'not_found' =>  __('Пост не найден', 'threedent-theme'),
        'not_found_in_trash' => __('Пост не найден в корзине', 'threedent-theme'),
        'parent_item_colon' => '',
        'menu_name' => __( "Стоматологические услуги",  "threedent-theme"),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'show_in_nav_menus'   => false,
        'supports' => array('title','editor','thumbnail', 'excerpt'),
        'rewrite' => array(
            'slug'       => 'Стоматологические услуги',
            'with_front' => FALSE,
        )
    );
    register_post_type('services',$args);

    $labels = array(
        'name' => __( 'Категории', 'threedent-theme' ),
        'singular_name' => __( 'Категория', 'threedent-theme' ),
        'search_items' =>  __( 'Типы поиска', 'threedent-theme' ),
        'all_items' => __( 'все категории', 'threedent-theme' ),
        'parent_item' => __( 'Parent Category', 'threedent-theme' ),
        'parent_item_colon' => __( 'Родительская категория:', 'threedent-theme' ),
        'edit_item' => __( 'Изменить категорию', 'threedent-theme' ),
        'update_item' => __( 'Обновить категорию', 'threedent-theme' ),
        'add_new_item' => __( 'Добавить новую категорию', 'threedent-theme' ),
        'new_item_name' => __( 'Новое название категории', 'threedent-theme' ),
    );


    register_taxonomy('service_categoryies',array('services'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'Категория услуги' ),
        'show_admin_column' => true,
    ));


}
add_action('init', 'services_custom_post_type');