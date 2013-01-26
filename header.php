<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	<?php wp_head() // For plugins ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
</head>

<body class="<?php sandbox_body_class() ?>">

<div id="wrapper" class="hfeed">

	<div id="header">
<<<<<<< HEAD
		<h1 id="blog-title"><span><a href="<?php bloginfo('home') ?>/" title="<?php echo _wp_specialchars( get_bloginfo('name'), 1 ) ?>" rel="home"><?php bloginfo('name') ?></a></span></h1>
=======
		<h1 id="blog-title"><span><?php bloginfo('name'); ?></span></h1>
>>>>>>> 小小的修改了一下。。。。
		<div id="blog-description">
			<?php bloginfo('description') ?>
		</div>
		<div id="nav-menu">
		</div><!--	#nav-menu -->
		<div id="language-setting">
<<<<<<< HEAD
=======
			<select id="language">
				<option value="English">English</option>
				<option value="Chinese">Chinese</option>
				<option value="default" selected="selected">Choose your language</option>
			</select>
>>>>>>> 小小的修改了一下。。。。
		</div><!--	#language-setting -->
	</div><!--  #header -->
