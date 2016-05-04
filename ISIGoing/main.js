$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
    //make username editable
     $('.description').editable({
   type: 'text',
   url: 'post.php',
   ajaxOptions: {
     type: 'post',
     tpl: '<textarea maxlength="5"></textarea>'
     
   }   
 });

});