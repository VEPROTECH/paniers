/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function($){
    $(".addFavoris").click(function(event){
        event.preventDefault();
        $.get($(this).attr('href'),{},function(data_fav) {
        if(data_fav.error){
            alert(data_fav.message)
        }else{
             alert(data_fav.message)
             $("#count_favoris").empty().append(data_fav.count_fav);
        }
        },'json');
        return false;
    });
})(jQuery);
