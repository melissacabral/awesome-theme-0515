<?php
//activate sleeping features
//this will add the option for "featured image" on each post
add_theme_support('post-thumbnails');


//add a banner image size for the home page
//				name     width height crop?
add_image_size( 'banner', 1300, 300, true );

//no close PHP
