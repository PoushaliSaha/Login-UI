$(document).ready(function(){
	
    /******* Copyright Section *******/
    var date = new Date().getFullYear();
    $(this).find("span.year").text(date);
    
    /************ add section *******/
    $("#add-btn").click(function(){
    	$('li#add-btn').hide();
    	$('section#3').show();
    	$('section#1').hide();
    	$('section#2').hide();
    });
    
});