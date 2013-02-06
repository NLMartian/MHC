	<div id="primary" class="sidebar">
		<h3><?php _e('Contact us', 'sandbox')?></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<span id="contact-addr"><?php _e("<!--:zh-->上海<!--:--><!--:en-->Shanghai<!--:-->"); ?><span><br/>
			<span id="contact-num">+86 15901980381</span><br/>
			<span id="contact-email"><a href="/" title="<?php _e('Email', 'sandbox')?>"><?php bloginfo('admin_email')?></a></span> <br/>
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
				<h3 class="cornerTitle"><?php _e( 'Health information', 'sandbox' ) ?></h3>
				<ul class="cornerUl">
					<?php 
						global $post;
						$args = array('numberposts' => 3, 'category' => 3, 'order' => 'DESC', 'orderby' => 'post_date');
						$myposts = get_posts($args);

						foreach($myposts as $post) :
						setup_postdata($post);
					?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
					<?php
						$health_information_id = get_cat_ID('Health information');

						$health_information_link = get_category_link($health_information_id);
					?>
					<a href="<?php echo esc_url($health_information_link); ?>" title="View all posts under Health information" class="more"><?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>
				</ul>
			</li>

			<li id="categories">
				<h3 class="cornerTitle"><?php _e( 'Insurance news', 'sandbox' ) ?></h3>
				<ul class="cornerUl">
					<img src="<?php bloginfo('template_directory'); ?>/images/insurance-news.jpg" alt="Insurance news" />
					<?php 
						global $news;
						$args = array('category' => 4, 'numberposts' => 1, 'order' => 'DESC', 'orderby' => 'post_date');
						$mynews = get_posts($args);

						foreach($mynews as $news) :
						setup_postdata($news);
					?>
					<p><?php the_content(); ?></p>
					<?php endforeach; ?>
					<?php
						$insurance_news_id = get_cat_ID('Individual health cover');

						$insurance_news_link = get_category_link($insurance_news_id);
					?>
					<a href="<?php echo esc_url($insurance_news_link);?>" title="View all posts under Insurance news" class="more"><?php _e("<!--:zh-->更多>><!--:--><!--:en-->More>><!--:-->"); ?></a>

				</ul>
			</li>
		</ul>
	</div><!-- #secondary .sidebar -->
