	<div id="primary" class="sidebar">
		<h3><?php _e('Contact us', 'sandbox')?></h3>
		<span id="contact-addr">Shanghai<span><br/>
		<span id="contact-num">+86 15901980381</span><br/>
		<span id="contact-email"><a href="/" title="<?php _e('Email', 'sandbox')?>">adbcde@gmail.com</a></span> <br/>
		Contact us online
	</div><!-- #primary .sidebar -->

	<div id="secondary" class="sidebar">
		<ul class="xoxo">
			<li id="pages">
				<h3><?php _e( 'Pages', 'sandbox' ) ?></h3>
				<ul>
					<?php wp_list_pages('title_li=&sort_column=menu_order' ) ?>
				</ul>
			</li>

			<li id="categories">
				<h3><?php _e( 'Categories', 'sandbox' ) ?></h3>
				<ul>
					<?php wp_list_categories('title_li=&show_count=0&hierarchical=1') ?> 
				</ul>
			</li>

			<li id="archives">
				<h3><?php _e( 'Archives', 'sandbox' ) ?></h3>
				<ul>
					<?php wp_get_archives('type=monthly') ?>
				</ul>
			</li>
		</ul>
	</div><!-- #secondary .sidebar -->
