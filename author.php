<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<header class="author-meta clearfix hentry">

				<?php echo get_avatar(get_the_author_meta( 'user_email' ), 100); ?>

				<h3>All Posts By <?php the_author_meta('display_name'); ?></h3>
				<p><?php the_author_meta('description'); ?></p>
				<p><a href="<?php the_author_meta('user_url'); ?>">
					Visit <?php the_author_meta('display_name'); ?>'s website
				</a></p>
		</header>	
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php 
			//display the featured image. choose from 'thumbnail', 'medium', 'large', 'full'
			the_post_thumbnail( 'thumbnail',  array('class' => 'thumb') ); ?>

			<div class="entry-content">
				<?php 
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt();
				} ?>
			</div>
			<div class="postmeta"> 
				<span class="author"> Posted by: <?php the_author(); ?></span>
				<span class="date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				<span class="num-comments"> <?php comments_number(); ?></span>
				<span class="categories"><?php the_category(); ?></span>
				<span class="tags"><?php the_tags(); ?></span> 
			</div><!-- end postmeta -->			
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>