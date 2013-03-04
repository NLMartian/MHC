<?php get_header() ?>

<div id="main">
	<div id="container">
		<div id="content">

<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title" style="color: #DE5441;">
					<?php the_title() ?>
				</h2>
				<div class="entry-content">
				<?php 
					global $more;
					$more = 1;
					the_content(''); 
				?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
				</div>
			</div><!-- .post -->

<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #container -->
	
	<!--��ֱ�ָ���-->
	<div id="vertical-separator"></div>
	<?php get_sidebar('category4') ?>
</div>
<?php get_footer() ?>