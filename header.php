<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	
	<!-- 导入jquery.js -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
	<!-- 弹出菜单的样式文件 -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/j-menu.js"></script>
	
	<?php wp_head() // For plugins ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
</head>

<body class="<?php sandbox_body_class() ?>">

<div id="wrapper" class="hfeed">

	<div id="header">
		<h1 id="blog-title"><span><?php bloginfo('name'); ?></span></h1>
		<div id="blog-description">
			<?php bloginfo('description') ?>
		</div>
		<div class="menubar">
			<ul class="menus" id="menus">
				<?php
					if (is_home()) {
						$home_menu_class = 'current-cat';
					} else {
						$home_menu_class = 'cat-item';
					}
				?>
				<li class="<?php echo($home_menu_class); ?>">
					<a title="<?php _e('Home', 'default'); ?>" href="<?php echo get_settings('home'); ?>/"><?php _e('Home', 'default'); ?></a>
				</li>
				<?php wp_list_categories('depth=2&title_li=0&orderby=name&show_count=0'); ?>
			</ul>
		</div><!--	#nav-menu -->
		<div style="clear:both;"></div>
		<div id="language-setting">
			<select id="language">
				<option value="English">English</option>
				<option value="Chinese">Chinese</option>
				<option value="default" selected="selected">Choose your language</option>
			</select>
		</div><!--	#language-setting -->
	</div><!--  #header -->
