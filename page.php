<?php get_header() ?>

<div id="main">
	<div id="container">
		<div id="content">

<?php the_post() ?>

			<div  id="message-board" class="<?php sandbox_post_class() ?>" >
				<div id="message-board-title" class="cornerTitle"><?php _e('<!--:zh-->联系我们<!--:--><!--:en-->Contract Us<!--:-->'); ?></div>
				
				<?php if ( get_post_custom_values('comments') ){ ?>
				<div id="message-board-border">
						<div id="message-board-content">
				<?php } ?>

				<div id="page-content" class="entry-content">
<?php the_content() ?>

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>

<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			<!--/div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key+value of "comments" to enable comments on this page ?>
			
			<?php if ( get_post_custom_values('comments') ){ ?>
					</div><!-- #companies-board-content-->
				</div><!--#companies-board-border -->
			<?php } ?>

		</div><!-- #content -->

	</div><!-- #container -->
	
	<!--竖直分割线-->
	<div id="vertical-separator"></div>
<?php get_sidebar() ?>
</div>
<?php get_footer() ?>