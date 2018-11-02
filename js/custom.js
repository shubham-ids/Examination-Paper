$(document).ready(function(){
// This method is used to checked the all element using one checkbox  
  $('.checkAll').click(function(){
    $('.checkItem').prop('checked', $(this).prop('checked'));
  });
  $('.checkItem').click(function(){
    if( $('.checkItem:checked').length == $('.checkItem').length ){
      $('.checkAll').prop('checked',true);  
    }else{
      $('.checkAll').prop('checked',false);
    }  
  });

/*
 *  Data delete in jquery ajax method
 */

 $(".deleteAjax").click(function(){
  var parent     = $(this).parents("tr");
  var del_id = $(this).attr("id");
  var info   = 'id=' + del_id;
  if(confirm("Are you sure you want to delete this Record ?")){
    $.ajax({
      type: "get",
      url:  "?task=delete",
      data: info,
      beforeSend: function() {
        $(parent).animate({'backgroundColor':'#fb6c6c' });
      },      
      success: function(){
        $(parent).slideUp('slow',function() {
          $(parent).remove();
        });
        alert('Record is delete successfull');
      },
      error: function(){
        alert('Something is wrong !');
      }
    });
  }else{
    alert('No action taken');
  }
  });  
});