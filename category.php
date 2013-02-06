<?php get_header() ?>

<div id="main">
	<div id="container">
		<div id="content">

<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a>
				</h2>
				<div class="entry-content">
				<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'sandbox' ) ) ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
				</div>
			</div><!-- .post -->

<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #container -->
	
	<!--ÊúÖ±·Ö¸îÏß-->
	<div id="vertical-separator"></div>
	<?php get_sidebar('category') ?>
</div>
<?php get_footer() ?>