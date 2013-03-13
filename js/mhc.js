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
			var $c_attr=jQuery(this).siblings().attr("class");//选择货币的国旗类
			var $ensign=jQuery("#ensign");
			$ensign.attr("class",$c_attr);//将选中的货币国旗赋给$ensign
							  
			var $txt=jQuery(this).text();//展开菜单中的列表文本值
			var $hidden_txt=jQuery(".hidden_txt");
			var $t1=jQuery("#open_select");//模拟文本框，接受选择的值
			$t1.text($txt); 
			$hidden_txt.val($txt);
			jQuery(this).parents(".select_list").hide();         
		});
	//下拉列表滑过的背景
	jQuery(".select_list li").hover(function(){
			jQuery(this).addClass("h_bg");
		},function(){
			jQuery(this).removeClass("h_bg");        
		});
});

function changeLanguage(obj) {
	document.location.href = obj;
}