(function($){
    $(window).load(function(){
        $('.js-scroll pre').mCustomScrollbar({
            horizontalScroll:true,
            scrollButtons:{
                enable:true,
                scrollType:"pixels",
                scrollAmount:116
            },
            callbacks:{
                onScroll:function(){
                    snapScrollbar();
                }
            }
        });

        /* toggle buttons scroll type */
        $("a[rel='toggle-buttons-scroll-type']").click(function(e){
            e.preventDefault();
            var $this=$(this);
            var cont=$("#content_2");
            var scrollType;
            if(cont.data("scrollButtons-scrollType")==="pixels"){
                scrollType="continuous";
            }else{
                scrollType="pixels";
            }
            cont.data({"scrollButtons-scrollType":scrollType}).mCustomScrollbar("update");
            $this.toggleClass("off");
        });
        /* snap scrollbar fn */
        var snapTo=[];
        $(".js-scroll .images_container img").each(function(){
            var $this=$(this);
            var thisX=$this.position().left;
            snapTo.push(thisX);
        });
        function snapScrollbar(){
            if(!$(document).data("mCS-is-touch-device")){ //no snapping for touch devices
                var posX=$(".js-scroll .mCSB_container").position().left;
                var closestX=findClosest(Math.abs(posX),snapTo);
                if(closestX===0){
                    $(".js-scroll pre").mCustomScrollbar("scrollTo","left",{
                        callback:false //scroll to is already a callback fn
                    });
                }else{
                    $(".js-scroll pre").mCustomScrollbar("scrollTo",closestX,{
                        callback:false //scroll to is already a callback fn
                    });
                }
            }
        }
        function findClosest(num,arr){
            var curr=arr[0];
            var diff=Math.abs(num-curr);
            for(var val=0; val<arr.length; val++){
                var newdiff=Math.abs(num-arr[val]);
                if(newdiff<diff){
                    diff=newdiff;
                    curr=arr[val];
                }
            }
            return curr;
        }
    });
})(jQuery);