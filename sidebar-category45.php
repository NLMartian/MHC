	<div id="ahead" class="sidebar">
		<ul class="xoxo">
			<li id="companies">
				<h3 class="cornerTitle">
					<?php _e(get_cat_name(45), 'sandbox')?>
				</h3>
				<ul class="cornerUl categoryUl">
					<?php 
						$args = array(
							'orderby' => 'id',
							'order' => 'ASC',
							'child_of' => 45,
							'hide_empty' => 1,
							'title_li' => ''
						);
						wp_list_categories($args) ?>
				</ul>
			</li>
		</ul>
	</div>

	<div id="primary" class="sidebar" style="margin-top: 24px;">
		<h3 style="margin-top: 0;"><?php _e('<!--:zh-->联系我们<!--:--><!--:en-->Contact us<!--:-->');?></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<?php 
				$user_info = get_userdata(1);
				echo '<span class="contact-addr">'; ?>
			<?php
				_e("<!--:zh-->中文<!--:--><!--:en-->Chinese<!--:-->");
				echo '</span><br>';
				$span1 = '<span class="contact-num">'. $user_info -> aim .'</span><br>';
				echo $span1;
				echo '<span class="contact-addr">'; ?>
			<?php
				_e("<!--:zh-->英文<!--:--><!--:en-->English<!--:-->");
				echo '</span><br>';
				$span2 = '<span class="contact-num">'. $user_info -> yim .'</span>';
				echo $span2;
			?>
			<br>
			<span id="contact-email"><a href="/" title="<?php _e('<!--:zh-->邮箱<!--:--><!--:en-->Email<!--:-->'); ?>"><?php bloginfo('admin_email')?></a></span> <br/>
		</div>
		<div id="contact-way">
			<span><?php _e("<!--:zh-->在线联系我们<!--:--><!--:en-->Contact us online<!--:-->"); ?></span>
			<a href="skype:nl_martia?chat">
				<img src="<?php bloginfo('template_directory');?>/images/contact-skype.png" alt="Skype" title="Skype" style="padding-left: 15px;" />
			</a>
			<!--img src="<?php bloginfo('template_directory');?>/images/contact-msn.png" alt="MSN" title="MSN" style="margin-left: -8px;"/-->
		</div>
	</div><!-- #primary .sidebar -->

	<div id="secondary" class="sidebar">
		<ul class="xoxo">
			<li id="categories">
				<h3 class="cornerTitle"><?php _e(get_cat_name(42), 'sandbox' ) ?></h3>
				<ul class="cornerUl" style="padding-bottom: 0;">
					<img src="<?php bloginfo('template_directory'); ?>/images/insurance-news.jpg" alt="Insurance news" />
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
		</ul>
	</div><!-- #secondary .sidebar -->
