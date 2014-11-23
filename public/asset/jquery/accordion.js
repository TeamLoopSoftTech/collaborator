// JavaScript Document
$(document).ready(function() {

    $('#accordian li').children('ul').hide();
    $('.history_heading').parent().addClass('active').find('ul').show();

    $('#accordian a').click(function(){
		
			
        $(this).parent().siblings('.active').removeClass('active').find('ul').slideUp('fast');

        if ($(this).parent().hasClass('active')) {
            $(this).next('ul').slideUp('fast');
            $(this).parent().removeClass('active');
            setInterval( "slideSwitch()", 5000 );
        } else {
            $(this).next('ul').slideDown('fast');
            $(this).parent().addClass('active');
             setInterval( "slideSwitch()", 5000 );
           
        }
      
    });
 });
