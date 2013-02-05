jQuery(document).ready(function($) {
	jQuery('.cornerTitle').corner('top');
	jQuery('.cornerUl').corner('bottom');
	jQuery('#companies-board-content').corner("round 8px").parent().corner("round 10px");
});

function changeLanguage(obj) {
	document.location.href = obj;
}