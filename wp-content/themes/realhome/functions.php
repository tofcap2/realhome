<?php

//Fonction pour insérer le CSS et le JQuery
add_action('wp_enqueue_scripts', 'insert_css');
function insert_css() {
    // On ajoute le css general du theme
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
    wp_enqueue_style('font');

    // On ajoute le jQuery au thème
    wp_register_script('jquery2','https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
    wp_enqueue_script('jquery2');

    // On ajoute le script au thème
    wp_enqueue_script('script', get_template_directory_uri().'/script.js', '', '', true);

    wp_register_script('scroll','https://unpkg.com/scrollreveal/dist/scrollreveal.min.js');
    wp_enqueue_script('scroll');

    //Raleway
    wp_register_style('font','https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_style('font');

    //Playfair Display
    wp_register_style('font','https://fonts.googleapis.com/css?family=Playfair+Display|Raleway');
    wp_enqueue_style('font');
}

// page option ACF
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
    ));
}

//Fonction pour insérer le footer
add_action("wp_footer", "mfp_Add_Text");

// Définr ‘mfp_Add_Text'
function mfp_Add_Text()
{
    echo "<p style='color: black'></p>";
}

//Fonction pour les menus
add_theme_support('menus');
register_nav_menus(array(
    'menu-principal' => 'Navigation principale',
    'menu-secondaire' => 'Navigation secondaire',
    'menu-footer' => 'Navigation footer'
));

// ajouter image mise en avant dans article
add_theme_support('post-thumbnails');

// Insertion sidebar back-end
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'=>'sidebar',
        'before_widget'=>'<div class="widget">',
        'after_widget'=>'</div>',
        'before_title'=>'<h3>',
        'after_title'=>'</h3>',

    ));

// Custom post type : Crée des realisations (ressemble plus ou moins à un article
function create_post_type() {
    register_post_type('realisations',
        array(
            'label'                 => __('Réalisations'),
            'singular_label'        => __('Réalisation'),
            'add_new_item'          => __( 'Ajouter une réalisation' ),
            'edit_item'             => __( 'Modifier une réalisation' ),
            'new_item'              => __( 'Nouvelle réalisation' ),
            'view_item'             => __( 'Voir la réalisation' ),
            'search_items'          => __( 'Rechercher une réalisation' ),
            'not_found'             =>  __( 'Aucune réalisation trouvée' ),
            'not_found_in_trash'    => __( 'Aucune réalisation trouvée' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-video-alt3',
            'taxonomies'            => array('types'),
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'realisation', 'with_front' => true)
        )
    );
}
add_action( 'init', 'create_post_type' );

// Création de taxonomy (equivalent de categorie pour un article)
function themes_taxonomy() {
    register_taxonomy(
        'ville',
        'realisations',
        array(
            'label' => 'Ville',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'ville',
                'with_front' => true
            ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'themes_taxonomy');


