	<div id="ahead" class="sidebar">
		<ul class="xoxo">
			<li id="companies">
				<h3 class="cornerTitle"><?php _e('Insurance companies', 'sandbox')?></h3>
				<ul class="cornerUl categoryUl">
					<?php 
						$args = array(
							'orderby' => 'id',
							'order' => 'DESC',
							'child_of' => 4,
							'hide_empty' => 0,
							'title_li' => ''
						);
						wp_list_categories($args) ?>
				</ul>
			</li>
		</ul>
	</div>

	<div id="primary" class="sidebar" style="margin-top: 24px;">
		<h3 style="margin-top: 0;"><?php _e('Contact us', 'sandbox')?></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<?php 
				$user_info = get_userdata(1);
				echo '<span class="contact-addr">����</span><br>';
				$span1 = '<span class="contact-num">'. $user_info -> aim .'</span><br>';
				echo $span1;
				echo '<span class="contact-addr">English</span><br>';
				$span2 = '<span class="contact-num">'. $user_info -> yim .'</span>';
				echo $span2;
			?>
			<br>
			<span id="contact-email"><a href="/" title="<?php _e('Email', 'sandbox')?>"><?php bloginfo('admin_email')?></a></span> <br/>
		</div>
		<div id="contact-way">
			<span><?php _e("<!--:zh-->������ϵ����<!--:--><!--:en-->Contact us online<!--:-->"); ?></span>
			<a href="skype:nl_martia?chat">
				<img src="<?php bloginfo('template_directory');?>/images/contact-skype.png" alt="Skype" title="Skype" style="padding-left: 15px;" />
			</a>
			<!--img src="<?php bloginfo('template_directory');?>/images/contact-msn.png" alt="MSN" title="MSN" style="margin-left: -8px;"/-->
		</div>
	</div><!-- #primary .sidebar -->

	<div id="secondary" class="sidebar">
		<ul class="xoxo">
			<li id="categories">
				<h3 class="cornerTitle"><?php _e( get_cat_name(45), 'sandbox' ) ?></h3>
				<ul class="cornerUl">
					<img src="<?php bloginfo('template_directory'); ?>/images/insurance-news.jpg" alt="Insurance news" />
					<?php 
						global $res;
						$args = array('parent' => 45, 'orderby' => 'name', 'order' => 'DESC');
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
