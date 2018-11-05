$(document).ready(function(){
// This method is used to checked the all element using one checkbox  
  $('.checkAll').click(function(){
    $('.checkItem').prop('checked', $(this).prop('checked'));
    CheckedCountNumber('.checkItem' , '.countChecked');
  });
  $('.checkItem').click(function(){
    CheckedCountNumber('.checkItem' , '.countChecked');
    if( $('.checkItem:checked').length == $('.checkItem').length ){
      $('.checkAll').prop('checked',true);  
    }else{
      $('.checkAll').prop('checked',false);
    }  
  });
// This function is accept the two parameter
// This function is used to count the checkbox checked  
// return NULL
  function CheckedCountNumber($classname , $output){
    var countCheckedRow = $($classname+':checked').length;
    $(countCheckedRow) ? $($output).html(countCheckedRow) : $($output).html('');
    if(countCheckedRow == 0){
      $($output).html('');
    }    
  }

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

/*
 * Multiple records are delete successfull using jQuery,Ajax
 */
   $('#actionButton').click( function(){
    var post_arr = [];
    var message  = "Are you sure you want to delete this multiple Records !";
    if( $('.checkItem:checked').length == '' ){
       return alert('Please select atleast one checkbox');
    }
    $('.checkItem:checked').each(function(){        
      post_arr.push( $(this).val() );
    });
    if(confirm(message)){
      $.ajax({
        type: "get",
        url: "?multiAction=deleted",
        data:{ users : post_arr } ,
        //cache: true,
        beforeSend: function() {
          $('.checkItem:checked').parents("tr").animate({'backgroundColor':'#fb6c6c' });
        },      
        success: function(response) {
          $.each(post_arr, function() {
            $(parent).slideUp(3000,function() {
              $('.checkItem:checked').parents("tr").remove();
            });
          });
          alert('Data delete successfull');
        },
        error: function(){
          alert('Your records are not delete');
        }
      });
    }else{
      alert('No action taken');
    }
    return false;
  });


});
