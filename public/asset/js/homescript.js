$(document).ready(

    function() {


        $(".childNode3").hide();


        $(".parentNode1").click(function(){
            $(".childNode1").show(700);
            $(".childNode2").show(700);
            $(".childNode3").hide(700);
        });
        $(".parentNode2").click(function(){
            $(".childNode1").show(700);
            $(".childNode2").show(700);
            $(".childNode3").hide(700);
        });
        $(".parentNode3").click(function(){
            $(".childNode1").hide(700);
            $(".childNode2").hide(700);
            $(".childNode3").show(700);
        });




    });
/**
 * Created by LOOP6 on 4/21/14.
 */
