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

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>

				<span class="tags"><?php the_tags(); ?></span> 
			</div>
			

			<footer class="author-meta clearfix">

				<?php echo get_avatar(get_the_author_meta( 'user_email' ), 100); ?>

				<h3>Written By <?php the_author_posts_link(); ?></h3>

				<span class="date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				<p><?php the_author_meta('description'); ?></p>
				<p><a href="<?php the_author_meta('user_url'); ?>">
					Visit <?php the_author_meta('display_name'); ?>'s website
				</a></p>
			</footer>				
				
		</article><!-- end post -->

		<section class="pagination">
			<?php 
			previous_post_link( '%link', '&larr; Earlier: %title' ); 	//1 older post
			next_post_link( '%link', 'Later: %title &rarr;' ); 		//1 newer post
			 ?>
		</section>

		<?php comments_template(); ?>

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>