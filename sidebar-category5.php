	<div id="primary" class="sidebar" style="margin-top: 24px;">
		<h3 style="margin-top: 0;"><a href="<?php echo get_contract_url(); ?>"><?php _e("<!--:zh-->联系我们<!--:--><!--:en-->Contact us<!--:-->"); ?></a></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<span id="contact-addr"><?php _e("<!--:zh-->上海<!--:--><!--:en-->Shanghai<!--:-->"); ?><span><br/>
			<span id="contact-num">+86 15901980381</span><br/>
			<span>English</span>
			<span>+86 13321816681</span>
			<span id="contact-email"><a href="/" title="<?php _e('Email', 'sandbox')?>"><?php bloginfo('admin_email')?></a></span> <br/>
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
				<h3 class="cornerTitle"><?php _e(get_cat_name(45), 'sandbox'); ?></h3>
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
