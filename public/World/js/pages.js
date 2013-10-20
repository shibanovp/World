$(function(e) {   
    
    alert(BASE_URL);
    $(document).on('click',"li.lipagination",function(){
        
        $("#tbody *").remove();
        $("#tbody").append("<tr><td colspan='"+COLS+"'><div class='progress progress-striped active'><div class='bar' style='width: 100%;'></div></div></td></tr>");
        $("li.lipagination").removeClass('active');
        $(this).addClass("active");
        var page =$(this).attr("value");
        var maxResult = $("#maxResult button.btn.active").attr("value");
        $("#tbody").load(BASE_URL+maxResult+'&'+page);
    });
        
    $("#maxResult button").click(function() {
        $("#tbody *").remove();
        $("#tbody").append("<tr><td colspan='"+COLS+"'><div class='progress progress-striped active'><div class='bar' style='width: 100%;'></div></div></td></tr>");
        $("#maxResult button").removeClass('active');
        $(this).addClass("active");
        var maxResults=$(this).attr("value");
        var pages = Math.ceil(RESULTS/maxResults);
        $("#ulpagination li").remove();
        for (var i=1;i<=pages;i++){
            cname = (1==i)? 'lipagination active' : 'lipagination';
            li =$("#ulpagination").append('<li class="'+ cname+'" value="'+ i +'"><a>'+i+'</a></li>');            
        }
        $("#tbody").load(BASE_URL + maxResults+'&'+1);      
    });
    
});

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


