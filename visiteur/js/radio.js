$(document).ready(function(){
    $('.label').on("click", function(){
        $('.label').css({'background-color' : 'transparent', 'color' : '#E62651'});
        $(this).css({'background-color' : '#E62651', 'color' : 'white'});
    });
});