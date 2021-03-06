<?php get_header() ?>

<div id="main">
	<div id="container">
		<div id="content">
			
			<?php the_post(); ?>
				<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>" style="margin-top: 20px;">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a>
					</h2>
					<div class="entry-content">
					<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'sandbox' ) ) ?>
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
					</div>
				</div><!-- .post -->
			
		</div><!-- #content -->
	</div><!-- #container -->
	
	<!--��ֱ�ָ���-->
	<div id="vertical-separator"></div>
	<?php get_sidebar() ?>
</div>
<?php get_footer() ?>