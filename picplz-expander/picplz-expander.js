function setPicplzImage(picplz_id) {
    $myjQuery = jQuery.noConflict(); 
    $myjQuery.getJSON(("http://api.picplz.com/api/v2/pic.json?shorturl_id=" + picplz_id + "&pic_formats=640r&callback=?"), 
        function(data){ 
            $myjQuery.each(data.value.pics, function(i,item){ 
                 document.getElementById("picplzImg"+picplz_id).src=item.pic_files['640r'].img_url; 
            });
        });
}
