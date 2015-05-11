<?php
//activate sleeping features
//this will add the option for "featured image" on each post
add_theme_support( 'post-thumbnails' );
//allows you to style different formats of posts
add_theme_support( 'post-formats', array('gallery', 'link', 'quote') );
//background image uploader will appear in the customize screen
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header', array(
										'width' => 330,
										'height' => 80,
									) );
//link to RSS feeds in the <head>
add_theme_support( 'automatic-feed-links' );

//upgrade markup of default forms to HTML5
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 
	'gallery', 'caption') );

//make <title> better. don't forget to add wp_title() to header.php
add_theme_support( 'title-tag' );

//allows you to make editor-style.css for the post edit screen
add_editor_style();

//add a banner image size for the home page
//				name     width height crop?
add_image_size( 'banner', 1300, 300, true );

//maximum width for auto embeds
if ( ! isset( $content_width ) ) $content_width = 700;


/**
 * Make excerpts better
 * @since 0.1
 */
function awesome_excerpt_length(){
	//on search results, make excerpts 20 words long. otherwise, 75 words long. 
	if(is_search()){
		return 20;
	}else{
		return 75; //words
	}
}
add_filter( 'excerpt_length', 'awesome_excerpt_length' );


function awesome_readmore(){
	return ' <a href="' . get_permalink() . '" class="readmore">Read More...</a>';
}
add_filter( 'excerpt_more', 'awesome_readmore' );


/**
 * Impprove UX when replying to comments - Make the form jump up to meet the user
 * @since  0.1
 */
function awesome_comment_reply(){
	if( is_singular() AND comments_open() ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_print_scripts', 'awesome_comment_reply' );

/**
 * Add Menu Areas
 * @since 0.1
 */
function awesome_menus(){
	register_nav_menus( array(
		// 'code name' => 'nice name'
		'main_nav' 	=> 'Main Navigation Area',
		'utilities' => 'Utility Area',
	) );
}
add_action( 'init', 'awesome_menus' );


/**
 * Add Widget Areas (dynamic sidebars)
 * @since  0.1 
 */
function awesome_widget_areas(){
	register_sidebar( array(
		'name' 			=> 'Blog Sidebar',
		'id' 			=> 'blog_sidebar',
		'description' 	=> 'these widgets will appear next to the blog and archives',
		//front-end HTML wrappers. Make these work with your own markup
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Footer Widgets',
		'id' 			=> 'footer_widgets',
		'description' 	=> 'these widgets will appear at the bottom of every screen',
		//front-end HTML wrappers. Make these work with your own markup
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Page Sidebar',
		'id' 			=> 'page_sidebar',
		'description' 	=> 'these widgets will appear next to static pages',
		//front-end HTML wrappers. Make these work with your own markup
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Home Widgets',
		'id' 			=> 'home_widgets',
		'description' 	=> 'these widgets will appear on the front page',
		//front-end HTML wrappers. Make these work with your own markup
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'awesome_widget_areas' );




//no close PHP
