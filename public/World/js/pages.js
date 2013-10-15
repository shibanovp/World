$(function(e) {  
    $("#tbody").click(function() {$("#tbody").load(BASE_URL +'/world/country/index/10&2'); }); 
    $("li.lipagination").click(function() {
        $("li.lipagination").removeClass('active');
        $(this).addClass("active");
        var page =$(this).attr("value");
        var maxResult = $("#maxResult button.btn.active").attr("value");
        $("#tbody").load(BASE_URL +'/world/country/index/'+maxResult+'&'+page);
        alert(maxResult); 
        });
    $("#maxResult button").click(function() {
        $("#maxResult button").removeClass('active');
        $(this).addClass("active");
        
    });    
});

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


