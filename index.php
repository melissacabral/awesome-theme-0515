<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
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

		<section class="pagination">
			<?php 
			//make sure pagenavi plugin is running before calling it
			if( function_exists('wp_pagenavi') ){
				wp_pagenavi();
			}else{
				//pagenavi is not active. show default pagination
				$number = get_option('posts_per_page');
				previous_posts_link( "&larr; $number Newer Posts" );
				next_posts_link( "$number Older Posts &rarr;" );
			} 
			?>
		</section>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>