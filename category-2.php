<?php get_header('') ?>

<div id="main">
	<div id="container">
		<div id="content">

<?php
	
	//获取当前目录第一子目录的id 
	$args = array(
		'child_of' => 2,
		'order' => 'ASC',
		'orderby' => 'id');
	
	$cag = get_categories($args);
	
	$fisrt_child_id = $cag[0]->cat_ID;
?>

<?php query_posts('cat=' . $fisrt_child_id); ?>
<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-titles" style="color: #DE5441;">
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
<?php 
	endwhile;
	wp_reset_postdata(); 
?>

		</div><!-- #content -->
	</div><!-- #container -->
	
	<!--竖直分割线-->
	<div id="vertical-separator"></div>
	<?php get_sidebar('category2') ?>
</div>
<?php get_footer() ?>

