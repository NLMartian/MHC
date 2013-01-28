	<div id="primary" class="sidebar">
		<h3><?php _e('Contact us', 'sandbox')?></h3>
		<div id="contact-img">
			<img src="<?php bloginfo('template_directory'); ?>/images/contact-us-per.png" alt="Contact us" />
		</div>
		<div id="contact-info">
			<span id="contact-addr">Shanghai<span><br/>
			<span id="contact-num">+86 15901980381</span><br/>
			<span id="contact-email"><a href="/" title="<?php _e('Email', 'sandbox')?>">adbcde@gmail.com</a></span> <br/>
		</div>
		<div id="contact-way">
			<span>Contact us online</span>
			<img src="<?php bloginfo('template_directory');?>/images/contact-skype.png" alt="Skype" title="Skype" style="padding-left: 15px;"/>
			<img src="<?php bloginfo('template_directory');?>/images/contact-msn.png" alt="MSN" title="MSN" />
		</div>
	</div><!-- #primary .sidebar -->

	<div id="secondary" class="sidebar">
		<ul class="xoxo">
			<li id="pages">
				<h3 class="cornerTitle"><?php _e( 'Health information', 'sandbox' ) ?></h3>
				<ul>
					<?php wp_list_pages('title_li=&sort_column=menu_order' ) ?>
				</ul>
			</li>

			<li id="categories">
				<h3 class="cornerTitle"><?php _e( 'Insurance news', 'sandbox' ) ?></h3>
				<ul>
					<li><a href="" title="">Who choose MHC</a></li>
					<li><a href="" title="">List of hospital in China</a></li>
					<li><a href="" title="">List of hospital in Hongkong</a></li>

				</ul>
			</li>
		</ul>
	</div><!-- #secondary .sidebar -->
