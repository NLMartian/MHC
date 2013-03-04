	<div id="primary" class="sidebar">
		<h3><?php _e("<!--:zh-->联系我们<!--:--><!--:en-->Contact us<!--:-->"); ?></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<span id="contact-addr"><?php _e("<!--:zh-->上海<!--:--><!--:en-->Shanghai<!--:-->"); ?><span><br/>
			<span id="contact-num">+86 15901980381</span><br/>
			<span id="contact-email"><a href="/" title="<?php _e('<!--:zh-->邮箱<!--:--><!--:en-->Email<!--:-->'); ?>"><?php bloginfo('admin_email')?></a></span> <br/>
		</div>
		<div id="contact-way">
			<span><?php _e("<!--:zh-->在线联系我们<!--:--><!--:en-->Contact us online<!--:-->"); ?></span>
			<img src="<?php bloginfo('template_directory');?>/images/contact-skype.png" alt="Skype" title="Skype" style="padding-left: 15px;"/>
			<img src="<?php bloginfo('template_directory');?>/images/contact-msn.png" alt="MSN" title="MSN" style="margin-left: -8px;"/>
		</div>
	</div><!-- #primary .sidebar -->

	<div id="secondary" class="sidebar">
		<ul class="xoxo">
			<li id="pages">
				<h3 class="cornerTitle"><?php _e(get_cat_name(5), 'sandbox' ) ?></h3>
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
					
					<a href="<?php echo get_category_link(5); ?>" title="<?php _e('<!--:zh-->浏览健康信息下的所有文章<!--:--><!--:en-->View all posts under Health information<!--:-->'); ?>" class="more" style="line-height: 48px;">
					<?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>
				</ul>
			</li>

			<li id="categories">
				<h3 class="cornerTitle"><?php _e(get_cat_name(6), 'sandbox' ) ?></h3>
				<ul class="cornerUl">
					<img src="<?php bloginfo('template_directory'); ?>/images/insurance-news.jpg" alt="Insurance news" />
					<?php 
						global $news;
						$args = array('category' => 6, 'numberposts' => 1);
						$mynews = get_posts($args);

						setup_postdata($mynews[0]);
						global $more;
						$more = 0;
						the_content('');
					?>
					
					<a href="<?php echo get_category_link(6);?>" title="<?php _e('<!--:zh-->浏览保险新闻下的所有文章<!--:--><!--:en-->View all posts under Insurance news<!--:-->'); ?>" class="more">
					<?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>

				</ul>
			</li>
		</ul>
	</div><!-- #secondary .sidebar -->
