<?php

// configurações

	// remove itens padrões
	add_action( 'init', 'my_custom_init' );
	function my_custom_init() {
		remove_post_type_support( 'post', 'editor' ); // REMOVE EDITOR POST
		remove_post_type_support('page', 'editor'); // REMOVE EDITOR PAGE
		remove_post_type_support( 'page', 'thumbnail' );
	}

	// remove pagina pai
	function remove_post_custom_fields() {
		remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
	}

	// remove admin bar
	add_filter('show_admin_bar', '__return_false');



	//adiciona thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// adiciona excerpt
	add_post_type_support( 'post', 'excerpt' );
	add_post_type_support( 'page', 'excerpt' );


// menu
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menu( 'primary', __( 'header', 'header' ) );
}

// muda nome post
function change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Mangás';
	$submenu['edit.php'][5][0] = 'Todos os mangás';
	$submenu['edit.php'][10][0] = 'Adicionar mangá';
	echo '';
}
function change_post_object() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Mangás';
	$labels->singular_name = 'Mangá';
	$labels->add_new = 'Adicionar';
	$labels->add_new_item = 'Adicionar';
	$labels->edit_item = 'Editar';
	$labels->new_item = 'Mangá';
	$labels->view_item = 'Ver';
	$labels->search_items = 'Buscar';
	$labels->not_found = 'Nenhum item encontrado';
	$labels->not_found_in_trash = 'Nenhum item encontrado na lixeira';
	$labels->all_items = 'Todos os mangás';
	$labels->menu_name = 'Mangás';
	$labels->name_admin_bar = 'Mangás';
}
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

// fan area
add_action( 'init', 'post_type_fan_area' );
function post_type_fan_area() {

	$labels = array(
	    'name' => _x('Fan Área', 'post type general name'),
	    'singular_name' => _x('Fan Área', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Fan Área'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos os post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Fan Área'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'fan-area',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%categoria_fan_area%/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-groups',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'fan-area', $args );
}
add_action( 'init', 'create_taxonomy_categoria_fan_area' );
function create_taxonomy_categoria_fan_area() {

	$labels = array(
		'name' => _x( 'Categoria Fan Área', 'taxonomy general name' ),
		'singular_name' => _x( 'Categoria Fan Área', 'taxonomy singular name' ),
		'search_items' =>  __( 'Procurar categoria' ),
		'all_items' => __( 'Todas as categorias' ),
		'parent_item' => __( 'Categoria pai' ),
		'parent_item_colon' => __( 'Categoria pai:' ),
		'edit_item' => __( 'Editar categoria' ),
		'update_item' => __( 'Atualizar categoria' ),
		'add_new_item' => __( 'Adicionar nova categoria' ),
		'new_item_name' => __( 'Nova categoria' ),
		'menu_name' => __( 'Categoria' ),
	);

	register_taxonomy( 'categoria_fan_area', array( 'fan-area' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_tag_cloud' => true,
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'fan-area',
			'with_front' => true,
			)
		)
	);
}


// notícias
/*
add_action( 'init', 'post_type_noticias' );
function post_type_noticias() {

	$labels = array(
	    'name' => _x('Notícias', 'post type general name'),
	    'singular_name' => _x('Notícias', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'notícias'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Notícias'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'noticias',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-rss',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','editor','excerpt')
	  );

    register_post_type( 'noticias', $args );
}

// videos
add_action( 'init', 'post_type_videos' );
function post_type_videos() {

	$labels = array(
	    'name' => _x('Vídeos', 'post type general name'),
	    'singular_name' => _x('Vídeos', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'vídeos'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Vídeos'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'videos',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-video-alt3',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'videos', $args );
}


// materiais
add_action( 'init', 'post_type_materiais' );
function post_type_materiais() {

	$labels = array(
	    'name' => _x('Materiais', 'post type general name'),
	    'singular_name' => _x('Materiais', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'materiais'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos os post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Materiais'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'materiais',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-cloud-saved',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt','editor')
	  );

    register_post_type( 'materiais', $args );
}
add_action( 'init', 'create_taxonomy_categoria_materiais' );
function create_taxonomy_categoria_materiais() {

	$labels = array(
		'name' => _x( 'Categoria Materiais', 'taxonomy general name' ),
		'singular_name' => _x( 'Categoria Materiais', 'taxonomy singular name' ),
		'search_items' =>  __( 'Procurar categoria' ),
		'all_items' => __( 'Todas as categorias' ),
		'parent_item' => __( 'Categoria pai' ),
		'parent_item_colon' => __( 'Categoria pai:' ),
		'edit_item' => __( 'Editar categoria' ),
		'update_item' => __( 'Atualizar categoria' ),
		'add_new_item' => __( 'Adicionar nova categoria' ),
		'new_item_name' => __( 'Nova categoria' ),
		'menu_name' => __( 'Categoria' ),
	);

	register_taxonomy( 'categoria_materiais', array( 'materiais' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_tag_cloud' => true,
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'materiais',
			'with_front' => true,
			)
		)
	);
}

// perfis
add_action( 'init', 'post_type_perfis' );
function post_type_perfis() {

	$labels = array(
	    'name' => _x('Perfis', 'post type general name'),
	    'singular_name' => _x('Perfis', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'perfis'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Perfis'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'perfis',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-businessperson',
	    'menu_position' => 5,
	    'supports' => array('title','editor','thumbnail','excerpt')
	  );

    register_post_type( 'perfis', $args );
}

// soluções
add_action( 'init', 'post_type_solucoes' );
function post_type_solucoes() {

	$labels = array(
	    'name' => _x('Soluções', 'post type general name'),
	    'singular_name' => _x('Soluções', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'solucoes'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Soluções'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'solucoes',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-edit-page',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'solucoes', $args );
}

// Iniciativas
add_action( 'init', 'post_type_iniciativas' );
function post_type_iniciativas() {

	$labels = array(
	    'name' => _x('Iniciativas', 'post type general name'),
	    'singular_name' => _x('Iniciativas', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'iniciativas'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Iniciativas'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'iniciativas',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-thumbs-up',
	    'menu_position' => 5,
	    'supports' => array('title','editor','thumbnail','excerpt')
	  );

    register_post_type( 'iniciativas', $args );
}


// banner
add_action( 'init', 'post_type_banner' );
function post_type_banner() {

	$labels = array(
	    'name' => _x('Banner', 'post type general name'),
	    'singular_name' => _x('Banner', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'banner'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Banner'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'banner',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-format-gallery',
	    'menu_position' => 6,
	    'supports' => array('title','thumbnail')
	  );

    register_post_type( 'banner', $args );
}


// voce-sabia
add_action( 'init', 'post_type_voce_sabia' );
function post_type_voce_sabia() {

	$labels = array(
	    'name' => _x('Você Sabia', 'post type general name'),
	    'singular_name' => _x('Você Sabia', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Você Sabia'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Você Sabia'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'voce-sabia',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-format-gallery',
	    'menu_position' => 6,
	    'supports' => array('title')
	  );

    register_post_type( 'voce-sabia', $args );
}


// banner
add_action( 'init', 'post_type_banner_destaque' );
function post_type_banner_destaque() {

	$labels = array(
	    'name' => _x('Banner Destaque', 'post type general name'),
	    'singular_name' => _x('Banner Destaque', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Banner Destaque'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Banner Destaque'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'banner-destaque',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-format-gallery',
	    'menu_position' => 6,
	    'supports' => array('title','thumbnail')
	  );

    register_post_type( 'banner-destaque', $args );
}
*/

// paginas de opções
if( function_exists('acf_add_options_page') ) {

	/*acf_add_options_page(array(
        'page_title'  => 'Gatilhos Rápidos',
        'menu_title'  => 'Gatilhos Rápidos',
        'menu_slug'   => 'gatilhos-rapidos',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url' => 'dashicons-excerpt-view',
        'position' => 8
    ));*/



    /*acf_add_options_page(array(
        'page_title'  => 'Minhas redes sociais',
        'menu_title'  => 'Redes Sociais',
        'menu_slug'   => 'redes-sociais',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url' => 'dashicons-share',
        'position' => 9
    ));*/

	
	// configurações gerais
	acf_add_options_page(array(
	  'page_title'  => 'Informações gerais do meu site',
	  'menu_title'  => 'Configurações',
	  'menu_slug'   => 'configuracoes-gerais',
	  'capability'  => 'edit_posts',
	  'redirect'    => false,
      'icon_url' => 'dashicons-admin-settings',
      'position' => 9
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Redes Sociais',
		'menu_title'  => 'Redes Sociais',
		'parent_slug' => 'configuracoes-gerais',
	));

	/*acf_add_options_sub_page(array(
		'page_title'  => 'Vídeos',
		'menu_title'  => 'Vídeos',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Materiais',
		'menu_title'  => 'Materiais',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
	  'page_title'  => 'Bloco perfis',
	  'menu_title'  => 'Bloco perfis',
	  'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Bloco materiais',
		'menu_title'  => 'Bloco materias',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Banners',
		'menu_title'  => 'Banners',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_page(array(
        'page_title'  => 'Blocos de menu posicionados no rodapé',
        'menu_title'  => 'Menu Footer',
        //'menu_slug'   => 'menu-footer',
        //'capability'  => 'edit_posts',
        //'redirect'    => true,
        'icon_url' => 'dashicons-menu',
        //'position' => 9
		'parent_slug' => 'configuracoes-gerais',
    ));*/
}


// redireciona o login para a listagem de post
function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( is_user_logged_in() ) {
            $url = admin_url( '/edit.php' );
        } else {
            //$url = home_url();
        }
    }
    return $url;
}
add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 10, 3 );


// redireciona o wp-admin para a listagem do post
add_action( 'admin_init', 'redirect_users_to_specific_page' );
function redirect_users_to_specific_page() {
	if ( is_user_logged_in() ) {
		if( $_SERVER['PHP_SELF'] == '/wp-admin/index.php' ){
			$url = admin_url( '/edit.php' );
			wp_redirect( $url ); 
		}

		if( $_SERVER['PHP_SELF'] == '/wp-admin/themes.php' ){
			$url = admin_url( '/widgets.php' );
			wp_redirect( $url ); 
		}
   	}
}



// remove itens do admin
if( (wp_get_current_user()->user_login == 'ederton_') || (wp_get_current_user()->user_login == '_admin@ux4you') ){
	$producao = false;
}else{
	$producao = true;
}
if($producao){
	add_action('admin_head', 'remove_itens_admin');

	function remove_itens_admin() {
	  echo '
		<style>
			#menu-dashboard,#menu-comments,#menu-plugins,#toplevel_page_edit-post_type-acf-field-group,#menu-settings,#menu-tools,#menu-media,#toplevel_page_wpide,#toplevel_page_ai1wm_export,#toplevel_page_asl_settings,#toplevel_page_simple-social-buttons,#wp-admin-bar-updates,#wp-admin-bar-comments, #user-1 {
				display: none;
			}
		</style>
		<script type="text/javascript">
			jQuery.noConflict();
			jQuery("document").ready(function(){

				// menu
				jQuery("#menu-dashboard").remove(); //dashboard
				//jQuery("#menu-appearance").remove(); //aparencias
					jQuery("#menu-appearance li:nth-child(6)").remove();
					jQuery("#menu-appearance li:nth-child(3)").remove();
					jQuery("#menu-appearance li:nth-child(2)").remove();	
					jQuery("#menu-appearance li:nth-child(1)").remove();					
				jQuery("#menu-comments").remove(); //comentários
				jQuery("#menu-plugins").remove(); //plugins
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove(); //ACF
				jQuery("#menu-settings").remove(); //configurações
				jQuery("#menu-tools").remove(); //ferramentas
				jQuery("#menu-media").remove(); //midias
				jQuery("#toplevel_page_wpide").remove(); //wpide
				jQuery("#toplevel_page_ai1wm_export").remove(); //all-in-one
				jQuery("#toplevel_page_asl_settings").remove(); //ajax-search-lite	
				jQuery("#toplevel_page_simple-social-buttons").remove(); //simple-social-buttons
				jQuery("#wp-admin-bar-updates").remove(); //barra top bar, atualização
				jQuery("#wp-admin-bar-comments").remove(); ////barra top bar, comentários

				// usuario master
				jQuery("#user-1").remove();
			}); 
		</script>
	  ';
	}
}

?>