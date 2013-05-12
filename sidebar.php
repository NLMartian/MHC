	<div id="primary" class="sidebar">

		<?php 
			$args2 = array(
						'meta_key' => 'contractus',
						'meta_value' => 'yes'
					); 
			$pages = get_pages($args2);
			$contract_page_url = "";
			if(count($pages) != 0) {
				$contract_page_url = get_page_link( $pages[0]->ID );
			}
		?>
		<h3><a href="<?php echo $contract_page_url; ?>"><?php _e("<!--:zh-->联系我们<!--:--><!--:en-->Contact us<!--:-->"); ?></a></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<?php 
				$user_info = get_userdata(1);
				echo '<span class="contact-addr">中文</span><br>';
				$span1 = '<span class="contact-num">'. $user_info -> aim .'</span><br>';
				echo $span1;
				echo '<span class="contact-addr">English</span><br>';
				$span2 = '<span class="contact-num">'. $user_info -> yim .'</span>';
				echo $span2;
			?>
			<br>
			<span id="contact-email"><a href="/" title="<?php _e('<!--:zh-->邮箱<!--:--><!--:en-->Email<!--:-->'); ?>"><?php bloginfo('admin_email')?></a></span> <br/>
		</div>
		<div id="contact-way">
			<span><?php _e("<!--:zh-->在线联系我们<!--:--><!--:en-->Contact us online<!--:-->"); ?></span>
			<a href="skype:myhealthcover?chat">
				<img src="<?php bloginfo('template_directory');?>/images/contact-skype.png" alt="Skype" title="Skype" style="padding-left: 15px;" />
			</a>

			<!--img src="<?php bloginfo('template_directory');?>/images/contact-msn.png" alt="MSN" title="MSN" style="margin-left: -8px;"/-->
		</div>
	</div><!-- #primary .sidebar -->

	<div id="secondary" class="sidebar">
		<ul class="xoxo">
			<li id="pages">
				<h3 class="cornerTitle"><?php _e(get_cat_name(2), 'sandbox' ) ?></h3>
				<ul class="cornerUl" style="padding-bottom: 0;">
					<?php 
						global $category;
						$args = array('number' => 4, 'parent' => 42, 'order' => 'DESC', 'orderby' => 'name', 'include' => '51,52,53,54');
						$categorys = get_categories($args);

						foreach($categorys as $category) {
							$li = '<li><a href="' . get_category_link($category->term_id) . '" title="' . $category->name . '" class="title">'. $category->name .'</a></li>';
							echo $li;
						}
					?>
					
					<a href="<?php echo get_category_link(42); ?>" title="<?php _e('<!--:zh-->浏览计划信息下的所有文章<!--:--><!--:en-->View all posts under Plan information<!--:-->'); ?>" class="more" style="line-height: 48px;">
					<?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>
				</ul>
			</li>

			<li id="categories">
				<h3 class="cornerTitle"><?php _e(get_cat_name(45), 'sandbox' ) ?></h3>
				<ul class="cornerUl">
					<img src="<?php bloginfo('template_directory'); ?>/images/insurance-news.jpg" alt="Insurance news" />
					<?php 
						global $res;
						$args = array('parent' => 45, 'orderby' => 'id', 'order' => 'DESC');
						$cats = get_categories($args);

						foreach($cats as $res) {
							$li = '<li><a href="' . get_category_link($res->term_id) . '" title="' . $res->name . '" class="title">'. $res->name .'</a></li>';
							echo $li;
						}
					?>
				</ul>
			</li>
		</ul>
	</div><!-- #secondary .sidebar -->
