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
				<h3 class="cornerTitle"><?php _e("<!--:zh-->健康信息<!--:--><!--:en-->Health Information<!--:-->"); ?></h3>
				<ul class="cornerUl" style="padding-bottom: 0;">
					<?php 
						global $post;
						$args = array('numberposts' => 3, 'category' => 5, 'order' => 'DESC', 'orderby' => 'post_date');
						$myposts = get_posts($args);

						foreach($myposts as $post) :
						setup_postdata($post);
					?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
					
					<a href="<?php echo get_category_link(5); ?>" title="View all posts under Health information" class="more" style="line-height: 48px;"><?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>

				</ul>
			</li>
		</ul>
	</div><!-- #secondary .sidebar -->
