$(function(){

    $("#header-container nav ul li").hover(function(){
    
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    
    }, function(){
    
        $(this).removeClass("hover");
        $('ul:first',this).css('visibility', 'hidden');
    
    });
    
    $("#header-container nav ul li ul li:has(ul)").find("a:first").append(" &raquo; ");

});