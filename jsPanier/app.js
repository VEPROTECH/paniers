/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function($){
    $(".addPanier").click(function(event){
        event.preventDefault();
        $.get($(this).attr('href'),{},function(data) {
        if(data.error){
            alert(data.message);
        }else{
             alert(data.message);
             $("#count").empty().append(data.count);
        }
        },'json');
        return false;
    });
})(jQuery);
