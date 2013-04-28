<?php get_header() ?>

<div id="main">
	<div id="container">
		<div id="content">
			<div id="companies-board">
					<div id="companies-board-title" class="cornerTitle">Insurance Companies</div>
					<div id="companies-board-border">
						<div id="companies-board-content">
						<!-- 查询“保险公司分类”的链接 -->
						<div id="insurance-grid">
							<div class="insurance-row">
								<?php 
								$args = array(
									'orderby' => 'id',
									'parent' => 4,
									'hide_empty' => 0
									);
								$categories = get_categories($args);
								$inCount = 0;
								foreach($categories as $category) {
									$inCount++;
								?>
								<div class="insurance">
									<a href="<?php echo get_category_link( $category->term_id ); ?>" title="Permalink to <?php echo $category -> name; ?>">
										<img src="<?php bloginfo('template_directory'); ?>/images/insurance-<?php echo $category -> category_nicename; ?>.png" />
									</a>
								</div>
								<?php if(($inCount % 4) == 0) {?>
								</div>
								<div class="separator"></div>
								<div class="insurance-row">
								<?php
									} 
								}
								?>
							</div>
						</div>
						</div>
					</div>
			</div>
			
			<?php
				global $post;
				$args = array('category' => 7, 'order' => 'DESC', 'orderby' => 'post_date');
				$posts = get_posts($args);

				foreach ($posts as $post) :
				setup_postdata($post);
			?>
			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title" style="padding-top: 10px;"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a>
				</h2>
				<div class="entry-content">
				<?php the_content('<div><!--:zh-->更多>><!--:--><!--:en-->More>><!--:--></div>', FALSE, ''); ?>
				<!--
				<a href="<?php the_permalink() ?>" class="more-link"><?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>
				-->
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
				</div>
			</div><!-- .post -->
			<?php endforeach; ?>

		</div><!-- #content -->
	</div><!-- #container -->
	
	<!--竖直分割线-->
	<div id="vertical-separator"></div>
	<?php get_sidebar() ?>
</div>
<?php get_footer() ?>