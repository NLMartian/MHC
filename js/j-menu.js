var mouseover_tid = [];
var mouseout_tid = [];

jQuery(document).ready(function(){
	jQuery('#menus > li').each(function(index){
	
		// 去除titile属性
		jQuery(this).find('a').removeAttr('title');
		jQuery(this).hover(

			function(){
				var _self = this;
				clearTimeout(mouseout_tid[index]);
				mouseover_tid[index] = setTimeout(function() {
					jQuery(_self).find('ul:eq(0)').slideDown(400);
				}, 400);
				
				//淡出select
				/*if(jQuery(this).attr('class') == 'cat-item cat-item-5') {
					jQuery('select#language').fadeOut(400);
				}*/
			},

			function(){
				var _self = this;
				clearTimeout(mouseover_tid[index]);
				mouseout_tid[index] = setTimeout(function() {
					jQuery(_self).find('ul:eq(0)').slideUp(400);
				}, 400);
				
				//淡入select
				/*if(jQuery(this).attr('class') == 'cat-item cat-item-5') {
					jQuery('select#language').fadeIn(600);
				}*/
			}

		);
	});
	
	//子菜单下方添加圆角添加背景
	jQuery('ul.children').each(function() {
			console.log("圆角");
			jQuery(this).append('<li class="submenubg-bottom"></li>');
		}
	);
	
});
