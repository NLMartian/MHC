<?php
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks.' );
?>
			<div id="comments">
<?php
	if ( !empty($post->post_password) ) :
		if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
				<div class="nopassword"><?php _e( 'This post is protected. Enter the password to view any comments.', 'sandbox' ) ?></div>
			</div><!-- .comments -->
<?php
		return;
	endif;
endif;
?>
<?php if ( $comments ) : ?>
<?php global $sandbox_comment_alt ?>

<?php // Number of pings and comments
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
	get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
<?php if ( $comment_count ) : ?>
<?php $sandbox_comment_alt = 0 ?>

				<div id="comments-list" class="comments">
					<!--h3><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'sandbox') : __('<span>One</span> Comment', 'sandbox'), $comment_count) ?></h3-->

					<ol>
<?php foreach ($comments as $comment) : ?>
<?php if ( get_comment_type() == "comment" ) : ?>
						<!--li id="comment-<?php comment_ID() ?>" class="<?php sandbox_comment_class() ?>">
							<div class="comment-author vcard"><?php sandbox_commenter_link() ?></div>
							<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'sandbox'),
										get_comment_date(),
										get_comment_time(),
										'#comment-' . get_comment_ID() );
										edit_comment_link(__('Edit', 'sandbox'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div-->
<!--?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'sandbox') ?-->
							<!--?php comment_text() ?-->
						</li>
<?php endif; // REFERENCE: if ( get_comment_type() == "comment" ) ?>
<?php endforeach; ?>

					</ol>
				</div><!-- #comments-list .comments -->

<?php endif; // REFERENCE: if ( $comment_count ) ?>
<?php if ( $ping_count ) : ?>
<?php $sandbox_comment_alt = 0 ?>

				<div id="trackbacks-list" class="comments">
					<h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'sandbox') : __('<span>One</span> Trackback', 'sandbox'), $ping_count) ?></h3>

					<ol>
<?php foreach ( $comments as $comment ) : ?>
<?php if ( get_comment_type() != "comment" ) : ?>

						<li id="comment-<?php comment_ID() ?>" class="<?php sandbox_comment_class() ?>">
							<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'sandbox'),
									get_comment_author_link(),
									get_comment_date(),
									get_comment_time() );
									edit_comment_link(__('Edit', 'sandbox'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'sandbox') ?>
							<?php comment_text() ?>
						</li>
<?php endif // REFERENCE: if ( get_comment_type() != "comment" ) ?>
<?php endforeach; ?>

					</ol>
				</div><!-- #trackbacks-list .comments -->

<?php endif // REFERENCE: if ( $ping_count ) ?>
<?php endif // REFERENCE: if ( $comments ) ?>
<?php if ( 'open' == $post->comment_status ) : ?>
<?php $req = get_option('require_name_email'); // Checks if fields are required. Thanks, Adam. ;-) ?>

				<div id="respond">
					<h3 id="message-board-text"><?php _e('<!--:zh-->请将您的联系方式留下<!--:--><!--:en-->Please leave your contact information<!--:-->'); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'sandbox'),
					get_bloginfo('wpurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>
					<div class="formcontainer">	
						<form id="commentform" action="<?php bloginfo('wpurl') ?>/wp-comments-post.php" method="post" class="form-horizontal">
							<!--评论跳转到感谢页面-->
							<input name="redirect_to" type="hidden" value=<?php bloginfo('wpurl'); ?>"/?page_id=2" />
<?php if ( $user_ID ) : ?>
							<p id="login"><?php printf( __( '<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'sandbox' ),
								get_bloginfo('wpurl') . '/wp-admin/profile.php',
								_wp_specialchars( $user_identity, 1 ),
								get_bloginfo('wpurl') . '/wp-login.php?action=logout&amp;redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>

							<p id="comment-notes"><?php if ($req) _e('<!--:zh-->带*的为必填选项<!--:--><!--:en-->Required fields are marked <span class="required">*</span><!--:en-->'); ?></p>
							<div class="control-group">
								<label class="control-label" for="author"><span class="required">* </span><?php _e("<!--:zh-->姓名<!--:--><!--:en-->Name<!--:-->") ?></label> <?php if ($req) _e( '<!--span class="required">*</span-->', 'sandbox' ) ?>
								<div class="controls"><input id="author" name="author" class="text<?php if ($req) echo ' required'; ?>" type="text" value="" size="30" maxlength="50" tabindex="3" /></div>
							</div>

							<div class="control-group">
								<label class="control-label" for="call"><?php _e("<!--:zh-->称呼<!--:--><!--:en-->Mr/Ms<!--:-->") ?></label>
								<div class="controls">
									<select class="form-input" name="call" id="call">
										<option><?php _e("<!--:zh-->先生<!--:--><!--:en-->Mr.<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->夫人<!--:--><!--:en-->Mrs.<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->女士<!--:--><!--:en-->Ms.<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->小姐<!--:--><!--:en-->Miss.<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->博士<!--:--><!--:en-->Dr.<!--:-->") ?></option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="age"><?php _e("<!--:zh-->年龄<!--:--><!--:en-->Age<!--:-->") ?></label> <?php if ($req) _e( '<!--span class="required">*</span-->', 'sandbox' ) ?>
								<div class="controls"><input id="age" name="age" class="text" type="text" value="" size="30" maxlength="50" tabindex="5" /></div>
							</div>					

							<div class="control-group">
								<label class="control-label" for="url"><span class="required">* </span><?php _e("<!--:zh-->手机<!--:--><!--:en-->Mobile<!--:-->") ?></label>
								<div class="controls"><input id="url" name="url" class="text" type="text" value="" size="30" maxlength="50" tabindex="5" /></div>
							</div>

							<div class="control-group">
								<label class="control-label" for="where"><?php _e("<!--:zh-->何时联系<!--:--><!--:en-->When to call<!--:-->") ?></label>
								<div class="controls">
									<select class="form-input" name="when" id="when">
										<option><?php _e("<!--:zh-->尽快联系<!--:--><!--:en-->Call as soon as possible<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->一小时以后<!--:--><!--:en-->Call in an hour<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->今天<!--:--><!--:en-->Call today<!--:-->") ?></option>
										<option><?php _e("<!--:zh-->明天<!--:--><!--:en-->Call tomorrow<!--:-->") ?></option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="email"><span class="required">* </span><?php _e("<!--:zh-->邮箱<!--:--><!--:en-->Email<!--:-->") ?></label> <?php if ($req) _e( '<!--span class="required">*</span-->', 'sandbox' ) ?>
								<div class="controls"><input id="email" name="email" class="text<?php if ($req) echo ' required'; ?>" type="text" value="" size="30" maxlength="50" tabindex="4" /></div>
							</div>

							<div class="control-group">
								<label class="control-label" for="where"><?php _e("<!--:zh-->国籍<!--:--><!--:en-->Nationality<!--:-->") ?></label>
								<div class="controls">
									<select class="form-input" name="where" id="where">
									<?php 
										global $q_config;
										if($q_config['language'] == 'zh') {
									 ?>						
										<option value="null1">----------------</option>
										<option value="America">美国</option>
										<option value="China">中国</option>
										<option value="Hong Kong">香港</option>
										<option value="Indonesia">印度尼西亚</option>
										<option value="Japan">日本</option>
										<option value="Singapore">新加坡</option>
										<option value="Thailand">泰国</option>
										<option value="UAE">阿联酋</option>
										<option value="United Kingdom">英国</option>
										<optgroup label="&nbsp;"></optgroup><option value="null3">----------------</option>
										<option value="Afghanistan">阿富汗</option>
										<option value="Albania">阿尔巴尼亚</option>
										<option value="Algeria">阿尔及利亚</option>
										<option value="Andorra">安道尔</option>
										<option value="Angola">安哥拉</option>
										<option value="Antigua and Barbuda">安提瓜和巴布达</option>
										<option value="Argentina">阿根廷</option>
										<option value="Armenia">亚美尼亚</option>
										<option value="Aruba">阿鲁巴</option>
										<option value="Australia">澳大利亚</option>
										<option value="Austria">奥地利</option>
										<option value="Azerbaijan">阿塞拜疆</option>
										<option value="Bahamas">巴哈马</option>
										<option value="Bahrain">巴林</option>
										<option value="Bangladesh">孟加拉国</option>
										<option value="Barbados">巴巴多斯</option>
										<option value="Bali">巴厘岛</option>
										<option value="Belarus">白俄罗斯</option>
										<option value="Belgium">比利时</option>
										<option value="Belize">伯利兹</option>
										<option value="Bermuda">百慕大</option>
										<option value="Benin">贝宁</option>
										<option value="Bhutan">不丹</option>
										<option value="Bolivia">玻利维亚</option>
										<option value="Bosnia & Herzegovina">波斯尼亚和黑塞哥维那</option>
										<option value="Botswana">博茨瓦纳</option>
										<option value="Brazil">巴西</option>
										<option value="British Virgin Islands">英属维尔京群岛</option>
										<option value="British West Indies">英属西印度群岛</option>
										<option value="Brunei">文莱</option>
										<option value="Burma">缅甸</option>
										<option value="Bulgaria">保加利亚</option>
										<option value="Burkina Faso">布基纳法索</option>
										<option value="Burundi">布隆迪</option>
										<option value="Cambodia">柬埔寨</option>
										<option value="Cameroon">喀麦隆</option>
										<option value="Canada">加拿大</option>
										<option value="Cape Verde">佛得角</option>
										<option value="Cayman Islands">开曼群岛</option>
										<option value="Central African Republic">中非共和国</option>
										<option value="Chad">乍得</option>
										<option value="Chile">智利</option>
										<option value="China Only">只有中国</option>
										<option value="Colombia">哥伦比亚</option>
										<option value="Comoros">科摩罗</option>
										<option value="Congo">刚果</option>
										<option value="Costa Rica">哥斯达黎加</option>
										<option value="Croatia">克罗地亚</option>
										<option value="Cuba">古巴</option>
										<option value="Cyprus">塞浦路斯</option>
										<option value="Czech Republic">捷克共和国</option>
										<option value="Denmark">丹麦</option>
										<option value="Djibouti">吉布提</option>
										<option value="Dominica">多米尼加</option>
										<option value="Dominican Republic">多米尼加共和国</option>
										<option value="East Timor">东帝汶</option>
										<option value="Ecuador">厄瓜多尔</option>
										<option value="Egypt">埃及</option>
										<option value="El Salvador">厄瓜多尔</option>
										<option value="Equatorial Guinea">赤道几内亚</option>
										<option value="Eritrea">厄立特里亚</option>
										<option value="Estonia">爱沙尼亚</option>
										<option value="Ethiopia">埃塞俄比亚</option>
										<option value="Falkland Island(Islas Malvinas)">福克兰群岛（马尔维纳斯）</option>
										<option value="Fiji">斐济</option>
										<option value="Finland">芬兰</option>
										<option value="France">法国</option>
										<option value="Gabon">加蓬</option>
										<option value="Gambia">冈比亚</option>
										<option value="Georgia">格鲁吉亚</option>
										<option value="Germany">德国</option>
										<option value="Ghana">加纳</option>
										<option value="Gibraltar">直布罗陀</option>
										<option value="Greece">希腊</option>
										<option value="Grenada">格林纳达</option>
										<option value="Guam">关岛</option>
										<option value="Guatemala">危地马拉</option>
										<option value="Guernsey">根西岛</option>
										<option value="Guinea">几内亚</option>
										<option value="Guinea-Bissau">几内亚比绍</option>
										<option value="Guyana">圭亚那</option>
										<option value="Haiti">海地</option>
										<option value="Honduras">洪都拉斯</option>
										<option value="HK">香港</option>
										<option value="Hungary">匈牙利</option>
										<option value="Iceland">冰岛</option>
										<option value="India">印度</option>
										<option value="Iran">伊朗</option>
										<option value="Iraq">伊拉克</option>
										<option value="Ireland">爱尔兰</option>
										<option value="Isle of Man">曼岛</option>
										<option value="Israel">以色列</option>
										<option value="Italy">意大利</option>
										<option value="Ivory Coast">象牙海岸</option>
										<option value="Jamaica">牙买加</option>
										<option value="Jersey">泽西岛</option>
										<option value="Jordan">约旦</option>
										<option value="Kazakhstan">哈萨克斯坦</option>
										<option value="Kenya">肯尼亚</option>
										<option value="Kiribati">基里巴斯</option>
										<option value="Korea">韩国</option>
										<option value="Kuwait">科威特</option>
										<option value="Kyrgyzstan">吉尔吉斯斯坦</option>
										<option value="Laos">老挝</option>
										<option value="Latvia">拉脱维亚</option>
										<option value="Lebanon">黎巴嫩</option>
										<option value="Lesotho">莱索托</option>
										<option value="Liberia">利比里亚</option>
										<option value="Libya">利比亚</option>
										<option value="Liechtenstein">列支敦士登</option>
										<option value="Lithuania">立陶宛</option>
										<option value="Luxembourg">卢森堡</option>
										<option value="Macau">澳门</option>
										<option value="Macedonia">马其顿</option>
										<option value="Madagascar">马达加斯加</option>
										<option value="Malawi">马拉维</option>
										<option value="Malaysia">马来西亚</option>
										<option value="Maldives">马尔代夫</option>
										<option value="Mali">马里</option>
										<option value="Malta">马耳他</option>
										<option value="Marshall Islands">马绍尔群岛</option>
										<option value="Martinique">马提尼克</option>
										<option value="Mauritania">毛里塔尼亚</option>
										<option value="Mauritius">毛里求斯</option>
										<option value="Mexico">墨西哥</option>
										<option value="Micronesia">密克罗尼西亚</option>
										<option value="Moldova">摩尔多瓦</option>
										<option value="Monaco">摩纳哥</option>
										<option value="Mongolia">蒙古</option>
										<option value="Morocco">摩洛哥</option>
										<option value="Mozambique">莫桑比克</option>
										<option value="Myanmar">缅甸</option>
										<option value="Namibia">纳米比亚</option>
										<option value="Nauru">瑙鲁</option>
										<option value="Nepal">尼泊尔</option>
										<option value="Netherlands">荷兰</option>
										<option value="Netherland Antilles">荷兰安的列斯群岛</option>
										<option value="New Zealand">新西兰</option>
										<option value="Nicaragua">尼加拉瓜</option>
										<option value="Niger">尼日尔</option>
										<option value="Nigeria">尼日利亚</option>
										<option value="Norway">挪威</option>
										<option value="Oman">阿曼</option>
										<option value="Pakistan">巴基斯坦</option>
										<option value="Palau">帕劳</option>
										<option value="Panama">巴拿马</option>
										<option value="Papua New Guinea">巴布亚新畿内亚</option>
										<option value="Paraguay">巴拉圭</option>
										<option value="Peru">秘鲁</option>
										<option value="Philippines">菲律宾</option>
										<option value="Poland">波兰</option>
										<option value="Portugal">葡萄牙</option>
										<option value="Puerto Rico">波多黎各</option>
										<option value="Qatar">卡塔尔</option>
										<option value="Romania">罗马尼亚</option>
										<option value="Russia">俄罗斯</option>
										<option value="Rwanda">卢旺达</option>
										<option value="Samoa">萨摩亚</option>
										<option value="San Marino">圣马力诺</option>
										<option value="Sao Tome and Principe">圣多美和普林西比</option>
										<option value="Saudi Arabia">沙特阿拉伯</option>
										<option value="Serbia & Montenegro">塞尔维亚和黑山</option>
										<option value="Senegal">塞内加尔</option>
										<option value="Seychelles">塞舌尔群岛</option>
										<option value="Sierra Leone">塞拉利昂</option>
										<option value="Slovakia">斯洛伐克</option>
										<option value="Slovenia">斯洛文尼亚</option>
										<option value="Solomon Islands">所罗门群岛</option>
										<option value="Somalia">索马里</option>
										<option value="South Africa">南非</option>
										<option value="Spain">西班牙</option>
										<option value="Sri Lanka">斯里兰卡</option>
										<option value="St Kitts & Nevis">圣基茨和尼维斯</option>
										<option value="St Lucia">圣卢西亚</option>
										<option value="St Martin">圣马丁</option>
										<option value="St Vincent &  Grenadines">圣文森特和格林纳丁斯</option>
										<option value="Sudan">苏丹</option>
										<option value="Suriname">苏里南</option>
										<option value="Swaziland">斯威士兰</option>
										<option value="Sweden">瑞典</option>
										<option value="Switzerland">瑞士</option>
										<option value="Syria">叙利亚</option>
										<option value="Taiwan">台湾</option>
										<option value="Tajikistan">塔吉克斯坦</option>
										<option value="Tanzania">坦桑尼亚</option>
										<option value="Togo">多哥</option>
										<option value="Tonga">汤加</option>
										<option value="Trinidad & Tobago">特里尼达和多巴哥</option>
										<option value="Tunisia">突尼斯</option>
										<option value="Turkey">土耳其</option>
										<option value="Turkmenistan">土库曼斯坦</option>
										<option value="Turks & Caicos">特克斯和凯科斯</option>
										<option value="Tuvalu">图瓦卢</option>
										<option value="Uganda">乌干达</option>
										<option value="Ukraine">乌克兰</option>
										<option value="UK">英国</option>
										<option value="USA">美国</option>
										<option value="Uruguay">乌拉圭</option>
										<option value="Uzbekistan">乌兹别克斯坦</option>
										<option value="Vanuatu">瓦努阿图</option>
										<option value="Venezuela">委内瑞拉</option>
										<option value="Vietnam">越南</option>
										<option value="Yemen">也门</option>
										<option value="Zambia">赞比亚</option>
										<option value="Zimbabwe">津巴布韦</option>
									</select>
									<?php 
										}
										else {
									?>
										<option value="null1">----------------</option>
										<option value="America">America</option>
										<option value="China">China</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Japan">Japan</option>
										<option value="Singapore">Singapore</option>
										<option value="Thailand">Thailand</option>
										<option value="UAE">UAE</option>
										<option value="United Kingdom">United Kingdom</option>
										<optgroup label="&nbsp;"></optgroup><option value="null3">----------------</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bali">Bali</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Benin">Benin</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Brazil">Brazil</option>
										<option value="British Virgin Islands">British Virgin Islands</option>
										<option value="British West Indies">British West Indies</option>
										<option value="Brunei">Brunei</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burma">Burma</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China Only">China Only</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="East Timor">East Timor</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Island(Islas Malvinas)">Falkland Island(Islas Malvinas)</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Grenada">Grenada</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-Bissau">Guinea-Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Honduras">Honduras</option>
										<option value="HK">HK</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Iran">Iran</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Ivory Coast">Ivory Coast</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea">Korea</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Laos">Laos</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libya">Libya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macau">Macau</option>
										<option value="Macedonia">Macedonia</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia">Micronesia</option>
										<option value="Moldova">Moldova</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherland Antilles">Netherland Antilles</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Romania">Romania</option>
										<option value="Russia">Russia</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Serbia & Montenegro">Serbia & Montenegro</option>
										<option value="Senegal">Senegal</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="St Kitts & Nevis">St Kitts & Nevis</option>
										<option value="St Lucia">St Lucia</option>
										<option value="St Martin">St Martin</option>
										<option value="St Vincent &  Grenadines">St Vincent &  Grenadines</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syria">Syria</option>
										<option value="Taiwan">Taiwan</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Togo">Togo</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad & Tobago">Trinidad & Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks & Caicos">Turks & Caicos</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="UK">UK</option>
										<option value="USA">USA</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Vietnam">Vietnam</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									<?php 
										}
									 ?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="live"><?php _e("<!--:zh-->常住地<!--:--><!--:en-->Country of residence<!--:-->") ?></label>
								<div class="controls">
									<select class="form-input" name="live" id="live">
									<?php 
										global $q_config;
										if($q_config['language'] == 'zh') {
									 ?>						
										<option value="null1">----------------</option>
										<option value="America">美国</option>
										<option value="China">中国</option>
										<option value="Hong Kong">香港</option>
										<option value="Indonesia">印度尼西亚</option>
										<option value="Japan">日本</option>
										<option value="Singapore">新加坡</option>
										<option value="Thailand">泰国</option>
										<option value="UAE">阿联酋</option>
										<option value="United Kingdom">英国</option>
										<optgroup label="&nbsp;"></optgroup><option value="null3">----------------</option>
										<option value="Afghanistan">阿富汗</option>
										<option value="Albania">阿尔巴尼亚</option>
										<option value="Algeria">阿尔及利亚</option>
										<option value="Andorra">安道尔</option>
										<option value="Angola">安哥拉</option>
										<option value="Antigua and Barbuda">安提瓜和巴布达</option>
										<option value="Argentina">阿根廷</option>
										<option value="Armenia">亚美尼亚</option>
										<option value="Aruba">阿鲁巴</option>
										<option value="Australia">澳大利亚</option>
										<option value="Austria">奥地利</option>
										<option value="Azerbaijan">阿塞拜疆</option>
										<option value="Bahamas">巴哈马</option>
										<option value="Bahrain">巴林</option>
										<option value="Bangladesh">孟加拉国</option>
										<option value="Barbados">巴巴多斯</option>
										<option value="Bali">巴厘岛</option>
										<option value="Belarus">白俄罗斯</option>
										<option value="Belgium">比利时</option>
										<option value="Belize">伯利兹</option>
										<option value="Bermuda">百慕大</option>
										<option value="Benin">贝宁</option>
										<option value="Bhutan">不丹</option>
										<option value="Bolivia">玻利维亚</option>
										<option value="Bosnia & Herzegovina">波斯尼亚和黑塞哥维那</option>
										<option value="Botswana">博茨瓦纳</option>
										<option value="Brazil">巴西</option>
										<option value="British Virgin Islands">英属维尔京群岛</option>
										<option value="British West Indies">英属西印度群岛</option>
										<option value="Brunei">文莱</option>
										<option value="Burma">缅甸</option>
										<option value="Bulgaria">保加利亚</option>
										<option value="Burkina Faso">布基纳法索</option>
										<option value="Burundi">布隆迪</option>
										<option value="Cambodia">柬埔寨</option>
										<option value="Cameroon">喀麦隆</option>
										<option value="Canada">加拿大</option>
										<option value="Cape Verde">佛得角</option>
										<option value="Cayman Islands">开曼群岛</option>
										<option value="Central African Republic">中非共和国</option>
										<option value="Chad">乍得</option>
										<option value="Chile">智利</option>
										<option value="China Only">只有中国</option>
										<option value="Colombia">哥伦比亚</option>
										<option value="Comoros">科摩罗</option>
										<option value="Congo">刚果</option>
										<option value="Costa Rica">哥斯达黎加</option>
										<option value="Croatia">克罗地亚</option>
										<option value="Cuba">古巴</option>
										<option value="Cyprus">塞浦路斯</option>
										<option value="Czech Republic">捷克共和国</option>
										<option value="Denmark">丹麦</option>
										<option value="Djibouti">吉布提</option>
										<option value="Dominica">多米尼加</option>
										<option value="Dominican Republic">多米尼加共和国</option>
										<option value="East Timor">东帝汶</option>
										<option value="Ecuador">厄瓜多尔</option>
										<option value="Egypt">埃及</option>
										<option value="El Salvador">厄瓜多尔</option>
										<option value="Equatorial Guinea">赤道几内亚</option>
										<option value="Eritrea">厄立特里亚</option>
										<option value="Estonia">爱沙尼亚</option>
										<option value="Ethiopia">埃塞俄比亚</option>
										<option value="Falkland Island(Islas Malvinas)">福克兰群岛（马尔维纳斯）</option>
										<option value="Fiji">斐济</option>
										<option value="Finland">芬兰</option>
										<option value="France">法国</option>
										<option value="Gabon">加蓬</option>
										<option value="Gambia">冈比亚</option>
										<option value="Georgia">格鲁吉亚</option>
										<option value="Germany">德国</option>
										<option value="Ghana">加纳</option>
										<option value="Gibraltar">直布罗陀</option>
										<option value="Greece">希腊</option>
										<option value="Grenada">格林纳达</option>
										<option value="Guam">关岛</option>
										<option value="Guatemala">危地马拉</option>
										<option value="Guernsey">根西岛</option>
										<option value="Guinea">几内亚</option>
										<option value="Guinea-Bissau">几内亚比绍</option>
										<option value="Guyana">圭亚那</option>
										<option value="Haiti">海地</option>
										<option value="Honduras">洪都拉斯</option>
										<option value="HK">香港</option>
										<option value="Hungary">匈牙利</option>
										<option value="Iceland">冰岛</option>
										<option value="India">印度</option>
										<option value="Iran">伊朗</option>
										<option value="Iraq">伊拉克</option>
										<option value="Ireland">爱尔兰</option>
										<option value="Isle of Man">曼岛</option>
										<option value="Israel">以色列</option>
										<option value="Italy">意大利</option>
										<option value="Ivory Coast">象牙海岸</option>
										<option value="Jamaica">牙买加</option>
										<option value="Jersey">泽西岛</option>
										<option value="Jordan">约旦</option>
										<option value="Kazakhstan">哈萨克斯坦</option>
										<option value="Kenya">肯尼亚</option>
										<option value="Kiribati">基里巴斯</option>
										<option value="Korea">韩国</option>
										<option value="Kuwait">科威特</option>
										<option value="Kyrgyzstan">吉尔吉斯斯坦</option>
										<option value="Laos">老挝</option>
										<option value="Latvia">拉脱维亚</option>
										<option value="Lebanon">黎巴嫩</option>
										<option value="Lesotho">莱索托</option>
										<option value="Liberia">利比里亚</option>
										<option value="Libya">利比亚</option>
										<option value="Liechtenstein">列支敦士登</option>
										<option value="Lithuania">立陶宛</option>
										<option value="Luxembourg">卢森堡</option>
										<option value="Macau">澳门</option>
										<option value="Macedonia">马其顿</option>
										<option value="Madagascar">马达加斯加</option>
										<option value="Malawi">马拉维</option>
										<option value="Malaysia">马来西亚</option>
										<option value="Maldives">马尔代夫</option>
										<option value="Mali">马里</option>
										<option value="Malta">马耳他</option>
										<option value="Marshall Islands">马绍尔群岛</option>
										<option value="Martinique">马提尼克</option>
										<option value="Mauritania">毛里塔尼亚</option>
										<option value="Mauritius">毛里求斯</option>
										<option value="Mexico">墨西哥</option>
										<option value="Micronesia">密克罗尼西亚</option>
										<option value="Moldova">摩尔多瓦</option>
										<option value="Monaco">摩纳哥</option>
										<option value="Mongolia">蒙古</option>
										<option value="Morocco">摩洛哥</option>
										<option value="Mozambique">莫桑比克</option>
										<option value="Myanmar">缅甸</option>
										<option value="Namibia">纳米比亚</option>
										<option value="Nauru">瑙鲁</option>
										<option value="Nepal">尼泊尔</option>
										<option value="Netherlands">荷兰</option>
										<option value="Netherland Antilles">荷兰安的列斯群岛</option>
										<option value="New Zealand">新西兰</option>
										<option value="Nicaragua">尼加拉瓜</option>
										<option value="Niger">尼日尔</option>
										<option value="Nigeria">尼日利亚</option>
										<option value="Norway">挪威</option>
										<option value="Oman">阿曼</option>
										<option value="Pakistan">巴基斯坦</option>
										<option value="Palau">帕劳</option>
										<option value="Panama">巴拿马</option>
										<option value="Papua New Guinea">巴布亚新畿内亚</option>
										<option value="Paraguay">巴拉圭</option>
										<option value="Peru">秘鲁</option>
										<option value="Philippines">菲律宾</option>
										<option value="Poland">波兰</option>
										<option value="Portugal">葡萄牙</option>
										<option value="Puerto Rico">波多黎各</option>
										<option value="Qatar">卡塔尔</option>
										<option value="Romania">罗马尼亚</option>
										<option value="Russia">俄罗斯</option>
										<option value="Rwanda">卢旺达</option>
										<option value="Samoa">萨摩亚</option>
										<option value="San Marino">圣马力诺</option>
										<option value="Sao Tome and Principe">圣多美和普林西比</option>
										<option value="Saudi Arabia">沙特阿拉伯</option>
										<option value="Serbia & Montenegro">塞尔维亚和黑山</option>
										<option value="Senegal">塞内加尔</option>
										<option value="Seychelles">塞舌尔群岛</option>
										<option value="Sierra Leone">塞拉利昂</option>
										<option value="Slovakia">斯洛伐克</option>
										<option value="Slovenia">斯洛文尼亚</option>
										<option value="Solomon Islands">所罗门群岛</option>
										<option value="Somalia">索马里</option>
										<option value="South Africa">南非</option>
										<option value="Spain">西班牙</option>
										<option value="Sri Lanka">斯里兰卡</option>
										<option value="St Kitts & Nevis">圣基茨和尼维斯</option>
										<option value="St Lucia">圣卢西亚</option>
										<option value="St Martin">圣马丁</option>
										<option value="St Vincent &  Grenadines">圣文森特和格林纳丁斯</option>
										<option value="Sudan">苏丹</option>
										<option value="Suriname">苏里南</option>
										<option value="Swaziland">斯威士兰</option>
										<option value="Sweden">瑞典</option>
										<option value="Switzerland">瑞士</option>
										<option value="Syria">叙利亚</option>
										<option value="Taiwan">台湾</option>
										<option value="Tajikistan">塔吉克斯坦</option>
										<option value="Tanzania">坦桑尼亚</option>
										<option value="Togo">多哥</option>
										<option value="Tonga">汤加</option>
										<option value="Trinidad & Tobago">特里尼达和多巴哥</option>
										<option value="Tunisia">突尼斯</option>
										<option value="Turkey">土耳其</option>
										<option value="Turkmenistan">土库曼斯坦</option>
										<option value="Turks & Caicos">特克斯和凯科斯</option>
										<option value="Tuvalu">图瓦卢</option>
										<option value="Uganda">乌干达</option>
										<option value="Ukraine">乌克兰</option>
										<option value="UK">英国</option>
										<option value="USA">美国</option>
										<option value="Uruguay">乌拉圭</option>
										<option value="Uzbekistan">乌兹别克斯坦</option>
										<option value="Vanuatu">瓦努阿图</option>
										<option value="Venezuela">委内瑞拉</option>
										<option value="Vietnam">越南</option>
										<option value="Yemen">也门</option>
										<option value="Zambia">赞比亚</option>
										<option value="Zimbabwe">津巴布韦</option>
									</select>
									<?php 
										}
										else {
									?>
										<option value="null1">----------------</option>
										<option value="America">America</option>
										<option value="China">China</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Japan">Japan</option>
										<option value="Singapore">Singapore</option>
										<option value="Thailand">Thailand</option>
										<option value="UAE">UAE</option>
										<option value="United Kingdom">United Kingdom</option>
										<optgroup label="&nbsp;"></optgroup><option value="null3">----------------</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bali">Bali</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Benin">Benin</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Brazil">Brazil</option>
										<option value="British Virgin Islands">British Virgin Islands</option>
										<option value="British West Indies">British West Indies</option>
										<option value="Brunei">Brunei</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burma">Burma</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China Only">China Only</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="East Timor">East Timor</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Island(Islas Malvinas)">Falkland Island(Islas Malvinas)</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Grenada">Grenada</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-Bissau">Guinea-Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Honduras">Honduras</option>
										<option value="HK">HK</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Iran">Iran</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Ivory Coast">Ivory Coast</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea">Korea</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Laos">Laos</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libya">Libya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macau">Macau</option>
										<option value="Macedonia">Macedonia</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia">Micronesia</option>
										<option value="Moldova">Moldova</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherland Antilles">Netherland Antilles</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Romania">Romania</option>
										<option value="Russia">Russia</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Serbia & Montenegro">Serbia & Montenegro</option>
										<option value="Senegal">Senegal</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="St Kitts & Nevis">St Kitts & Nevis</option>
										<option value="St Lucia">St Lucia</option>
										<option value="St Martin">St Martin</option>
										<option value="St Vincent &  Grenadines">St Vincent &  Grenadines</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syria">Syria</option>
										<option value="Taiwan">Taiwan</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Togo">Togo</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad & Tobago">Trinidad & Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks & Caicos">Turks & Caicos</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="UK">UK</option>
										<option value="USA">USA</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Vietnam">Vietnam</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									<?php 
										}
									 ?>
									</select>
								</div>
							</div>

<?php endif // REFERENCE: * if ( $user_ID ) ?>

							<div class="control-group">
								<label class="control-label" for="comment"><?php _e("<!--:zh-->留言<!--:--><!--:en-->Comment<!--:-->") ?></label>
								<div class="controls"><textarea id="comment" name="comment" class="text required" cols="45" rows="6" tabindex="6"></textarea></div>
							</div>

							<div class="control-group">
								<div class="controls"><input id="submit" name="submit" class="btn" type="submit" value="<?php _e("<!--:zh-->提交留言<!--:--><!--:en-->Post Comment<!--:-->") ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id ?>" /></div>
							</div>

							

							<div class="form-option"><?php do_action( 'comment_form', $post->ID ) ?></div>

						</form><!-- #commentform -->
					</div><!-- .formcontainer -->
<?php endif // REFERENCE: if ( get_option('comment_registration') && !$user_ID ) ?>

				</div><!-- #respond -->
<?php endif // REFERENCE: if ( 'open' == $post->comment_status ) ?>

			</div><!-- #comments -->