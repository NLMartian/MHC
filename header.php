<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	
	<!-- 导入jquery.js -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
	<!-- 导入jquery.corner.js -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.corner.js"></script>
	<!-- 弹出菜单的样式文件 -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/j-menu.js"></script>
	<!-- 导入mhc.js -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mhc.js"></script>

	<?php wp_head() // For plugins ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
</head>

<body class="<?php sandbox_body_class() ?>">

<div id="wrapper" class="hfeed">

	<div id="header">
	
		<div id="title-nav">
			<div id="title">
				<h1 id="blog-title"><span><?php //bloginfo('name'); ?></span></h1>
				<div id="blog-description">
					<?php //bloginfo('description') ?>
				</div>
			</div>
			
			<div class="menubar" 
			<?php 
				global $q_config;
				if ($q_config['language'] == 'en'){
					echo 'style="margin:47px 48px 10px 0; margin:55px 48px 10px 0\9;"';
				}else {
					echo 'style="margin:49px 48px 10px 0; margin:57px 48px 10px 0\9;"';
				} 
				?> >
				<ul class="menus" id="menus">
					<?php
						if (is_home()) {
							$home_menu_class = 'current-cat cat-item-1';
						} else {
							$home_menu_class = 'cat-item cat-item-1';
						}
					?>
					<li class="<?php echo($home_menu_class); ?>">
						<a title="<?php _e('Home', 'default'); ?>" href="<?php echo get_settings('home').'/?lang='.$q_config['language']; ?>"><?php _e('Home', 'default'); ?></a>
					</li>
					<?php 
						$args = array(
							'depth' => 2,
							'orderby' => 'ID',
							'order' => 'ASC',
							'hide_empty' => 1,
							'title_li' => '',
							/*'number' => 5,*/
							'exclude' => '5,6,7,8',
							'include' => ''
						);
						wp_list_categories($args); ?>
					<?php $args2 = array(
						'meta_key' => 'contractus',
						'meta_value' => 'yes'
					); 
					$pages = get_pages($args2);
					$page_name = "";
					$contract_page_url = "";
					if(count($pages) != 0) {
						$page_name = $pages[0]->post_title;
						$contract_page_url = get_page_link( $pages[0]->ID );

						if(is_page($pages[0]->ID)) {
							$page_contract_class = 'current-cat cat-item-8';
						} else {
							$page_contract_class = 'cat-item cat-item-8';
						}
					}
					?>
					<li class="<?php echo $page_contract_class; ?>">
						<a title="<?php _e($page_name, 'default'); ?>" href="<?php echo $contract_page_url; ?>"> <?php _e($page_name, 'default'); ?></a>
					</li>

				</ul>
			</div><!--	#nav-menu -->
		</div>
		<div style="clear:both;"></div>

		<div id="language-setting" style="margin-top: 0;">
			<!--select id="language" onchange="changeLanguage(this.value)"?>">
				<?php 
					global $q_config;
					foreach(qtrans_getSortedLanguages() as $language) {
				?>
					<option value="<?php echo htmlspecialchars_decode(qtrans_convertURL($url, $language), ENT_NOQUOTES); ?>" <?php if($q_config['language'] == $language) echo 'selected="selected"'?>><?php echo $q_config['language_name'][$language]; ?></option>

				<?php 
					
					}
				?>
				
			</select-->

			<div class="select_box">
		        <div class="open_select_box"><span class="usd" id="ensign"></span><span  id="open_select"><?php _e("<!--:zh-->选择语言<!--:--><!--:en-->select a language<!--:-->"); ?></span></div>
		        <ul class="select_list">
		        	<?php 
						global $q_config;
						foreach(qtrans_getSortedLanguages() as $language) {
					?>
		           	<li><span class="currency_icon aud"></span><span class="currency_type"><?php echo $q_config['language_name'][$language]; ?></span></li>
		           	<?php 
						}
					?>
		        </ul>
		        <input type="hidden"  class="hidden_txt" />
    		</div><!-- 模拟select -->
		</div><!--	#language-setting -->
	</div><!--  #header -->
