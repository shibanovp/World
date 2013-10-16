$(function(e) {   
    $(document).on('click',"li.lipagination",function(){
        //alert('da');
        $("li.lipagination").removeClass('active');
        $(this).addClass("active");
        var page =$(this).attr("value");
        var maxResult = $("#maxResult button.btn.active").attr("value");
        $("#tbody *").remove();
        tr = $("#tbody").append('<tr></tr>');
        tr.append('<div id="progressbar"></div>');
        $("#tbody").load(BASE_URL +'/world/country/index/'+maxResult+'&'+page);
    });
        
    $("#maxResult button").click(function() {
        $("#maxResult button").removeClass('active');
        $(this).addClass("active");
        var maxResults=$(this).attr("value");
        var pages = Math.ceil(RESULTS/maxResults);
        $("#ulpagination li").remove();
        for (var i=1;i<=pages;i++){
            cname = (1==i)? 'lipagination active' : 'lipagination';
            li =$("#ulpagination").append('<li class="'+ cname+'" value="'+ i +'"><a>'+i+'</a></li>');
            $("#tbody").load(BASE_URL +'/world/country/index/'+maxResults+'&'+1);
        }      
    });
    
});

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


