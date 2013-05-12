jQuery(document).ready(function($) {
	jQuery('.cornerTitle').corner('top');
	jQuery('.cornerUl').corner('bottom');
	jQuery('#companies-board-content').corner("round 8px").parent().corner("round 10px");


	//模拟select
	//展开或关闭下拉菜单 
	jQuery("#open_select").click(function(event){    
		event.stopPropagation();
		jQuery(".select_list").toggle(); 
	});
							  
	//离开选择区域后，展开的下拉列表关闭
	$(document).click(function(event){
		var eo=$(event.target);
	if(jQuery("#open_select").is(":visible") && eo.attr("class")!="select_list" && !eo.parent(".select_list").length)
	jQuery('.select_list').hide();
							  
	});
							  
	/*获取选中的值*/
	var $dss=jQuery(".currency_type");
	$dss.click(function(){  
			var $txt=jQuery(this).text();//展开菜单中的列表文本值
			var $id = jQuery(this).attr("id");
			var $url=jQuery("#url-" + $id);
			var $t1=jQuery("#open_select");//模拟文本框，接受选择的值
			$t1.text($txt); 
			changeLanguage($url.val());
			jQuery(this).parents(".select_list").hide();         
		});
	//下拉列表滑过的背景
	jQuery(".select_list li").hover(function(){
			jQuery(this).addClass("h_bg");
		},function(){
			jQuery(this).removeClass("h_bg");        
		});


	//截取评论提交动作
	jQuery('#commentform').submit(function() {

		var call = jQuery('call').val();
		var age = jQuery('age').val();
		var nation = jQuery('live').val();
		var when = jQuery('#when').val();
		var where = jQuery('#where').val();
		var what = jQuery('#comment').val();

		jQuery('#comment').val('称呼：' + call + ' 年龄：' + age + 
			' 方便联系的时间：' + when + '  国籍：' + where + 
			' 居住地：' + live + '  留言的内容：' + what);
	});
});

function changeLanguage(obj) {
	window.location.href = obj;
	console.log("next" + obj);
}