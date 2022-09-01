$( document ).ready(function() {
    $(".muneliBtn").click(function(e){
        e.stopPropagation;
        $(this).children("ol").slideDown();
       
    });//左邊按鈕
    $(".muneliBtn_2").click(function(e){
        e.stopPropagation;
        $(this).children("ul").slideDown();
        $(this).find("a").addClass("actives");
    });
    $(".titleIcon").click(function(){
        $(this).parent(".chartTitle").siblings(".chartBox").children("canvas").fadeToggle();
        $(this).children("i").toggleClass("faToggle");
    });//瀏覽人數-收合按鈕
    $(".active").parents(".muneliBtn").addClass("active");    

    $(".checkboxAll").click(function(){
        if($(".checkboxAll").prop("checked")){
            $(".memberTable").find(".checkC").prop("checked",true);
            $(".productTable").find(".checkC").prop("checked",true);
            
        }else{
            $(".memberTable").find(".checkC").prop("checked",false);
            $(".productTable").find(".checkC").prop("checked",false);
        }
    });

    $(".editPassword").click(function(){
        $(".editPasswordBox").fadeIn().css("display","flex");
    });
    $(".editPasswordclose").click(function(){
        $(".editPasswordBox").fadeOut();
        $(".old_pass").val(""),
        $(".new_pass1").val(""),
        $(".new_pass2").val("")
    });
    $(".editPasswordBoxclose").click(function(){
        $(".editPasswordBox").fadeOut();
        $(".old_pass").val(""),
        $(".new_pass1").val(""),
        $(".new_pass2").val("")
    });
    
    $(".orderEdit").click(function(){
        $(".orderSave").show();
        $(this).hide();
        $(this).parents(".header").siblings(".main").find(".order").toggleClass("orderToggle");
    });
    $(".orderSave").click(function(){
        $(".orderEdit").show();
        $(this).hide();
        $(this).parents(".header").siblings(".main").find(".order").toggleClass("orderToggle");
    });
});