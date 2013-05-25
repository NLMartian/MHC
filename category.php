<?php get_header() ?>

<div id="main">
	<div id="container">
		<div id="content">
<?php
	global $wp_query;
	$args = array_merge( $wp_query->query_vars,
		array( 'order' => 'ASC'));
	query_posts($args); 
?>
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
	
	<!--ÊúÖ±·Ö¸îÏß-->
	<div id="vertical-separator"></div>
	<?php
		$category = get_the_category();
		$parentID = $category[0]->parent;
		if($parentID == 2)
		{
			get_sidebar('category2');
		}else if($parentID == 3)
		{
			get_sidebar('category3');
		}else
		{
			get_sidebar('category4');
		}
		//get_sidebar($cat);
	?>
</div>
<?php get_footer() ?>