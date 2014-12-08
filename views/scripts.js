
$(document).ready(function(){$(".alert").addClass("in").fadeOut(4500);

/* swap open/close side menu icons */
$('[data-toggle=collapse]').click(function(){

		// toggle icon
		$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");

});

/* highlight for clicked subject menu*/
/*$(".toHighlight").click(function()
{
		$(".subjectmenu").removeClass("panel panel-default" );
		$(".subjectmenu").addClass("active-subjectmenu");

});
*/
/*subject menu enter*/
/*$(".toHighlight").mouseenter(function(e)
{
		$(".subjectmenu").parent().removeClass("panel panel-default" );
		$(".subjectmenu").parent().addClass("subjectmenu-hover");
		 e.stopPropagation();

});
*/
/*$(".toHighlight").mouseleave(function(e)
{
		$(".subjectmenu").parent().removeClass("subjectmenu-hover");
		$(".subjectmenu").parent().addClass("panel panel-default");
		 e.stopPropagation();

});
*/
});