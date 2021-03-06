<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="baidu-site-verification" content="K5k2YHPDKI8oSrqy" />
	<meta name="description" content="This website is about health cover, insurance and medical" />
	<meta name="keywords" content="www.myhealthcover.com, health insurance medical insurance, international health insurance, international medical insurance, expatriate health insurance, expatriate medical insurance, expat health insurance, expat insurance, china insurance, health insurance overseas, health insurance china, my health insurance, health cover, china family insurance, 医疗保险, 高端医疗保险, 国际医疗保险" />
	<meta name="MyHealthCover" content="vip@myhealthcover.com" />
	<!-- 导入bootstrap -->
	<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />

	<!-- load icon -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" />
	<?php wp_enqueue_script("jquery"); ?>
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
					echo 'style="margin:47px 48px 35px 0; margin:55px 48px 35px 0\9;"';
				}else {
					echo 'style="margin:49px 48px 35px 0; margin:57px 48px 35px 0\9;"';
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

			<div class="select_box" style="font-size:12px;">
		        <div class="open_select_box"><!--span class="usd" id="ensign"></span--><span  id="open_select"><?php _e("<!--:zh-->选择语言<!--:--><!--:en-->select a language<!--:-->"); ?></span></div>
		        <ul class="select_list dropdown-menu">
		        	<?php 
						global $q_config;
						foreach(qtrans_getSortedLanguages() as $language) {
					?>
		           	<li class="currency_type" id="<?php echo $language ?>"><?php echo $q_config['language_name'][$language]; ?></li>
		           	<input type="hidden" id="url-<?php echo $language ?>" class="language_url" value="<?php echo htmlspecialchars_decode(qtrans_convertURL($url, $language), ENT_NOQUOTES); ?>"/>
		           	<?php 
						}
					?>
		        </ul>
		        <input type="hidden"  class="hidden_txt" />
    		</div><!-- 模拟select -->
		</div><!--	#language-setting -->
	</div><!--  #header -->
