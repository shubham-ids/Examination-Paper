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
// This method is used to display the status.
// Admin can checked the checkbox value then diaplay the status in user is block
// Else admin can unchecked the value then display the status in user is unblock
  $('#statusUser').click(function(){
    var Userchecked = $('#statusUser').prop('checked');
    if(Userchecked){
      $('.userstatus').html('This person is Blocked' );
      $('.userstatus').addClass('text-light-blue');
    }else{
      $('.userstatus').html('This person is Unblocked' );
      $('.userstatus').addClass('text-light-blue');
    }
    //$(Userchecked) ? $('.userstatus').html('This person is Blocked' ) : $('.userstatus').html('This person is Unblocked' );
  });
/*
 *  Data delete in jquery ajax method
 */

 $(".deleteAjax").click(function(){
  var parent = $(this).parents("tr");
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

  // This method is used to get the drop down select value
    var bulkAction = [];
    $.each($(".bulkaction option:selected"), function(){            
        bulkAction.push($(this).val());
    });
    //alert("You have selected the action - " + bulkAction); 

  // This method is used to delete the multiple user using JQuery ajax
    if( bulkAction == 'deleted' ){
      var message  = "Are you sure you want to delete this multiple Records !";
      if( $('.checkItem:checked').length == '' ){
       alert('Please select atleast one checkbox');
       return false;
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
    } 
  // This method is used to block of the multiple user in one time
    if(bulkAction == 'block'){
      var message  = "Are you sure you want to "+bulkAction+" this users !";
    }
  // This method is used to unblock of the multiplr user in one time  
    if(bulkAction == 'unblock'){
      var message  = "Are you sure you want to "+bulkAction+" this users !";
    }
    if(bulkAction !== ''){
    // This method is used to checked the blank checked checkbox field   
      if( $('.checkItem:checked').length == '' ){
         alert('Please select atleast one checkbox in one time');
         return false;
      } 
    //  This method is used to assigen of the checkbox checked value in array variable
      $('.checkItem:checked').each(function(){        
        post_arr.push( $(this).val() );
      });
    // This method is used to check the equal of the value like : block == block / unblock == unblock
    // In wich new function used in trim 
    // Trim function id used to erace of the extra spacing   
      if($.trim($('.checkItem:checked').parents("tr").children("td.statusAction").text()) == bulkAction){
        $('#outputMessage').html("<h4 class='alert alert-danger'><i class='icon fa fa-ban'></i>User is already "+bulkAction+".</h4>");
        return false;
      }else{
        $('#outputMessage').html("");
      }
      if(confirm(message)){
        $.ajax({
        type: "get",
        url: "?multiAction="+bulkAction,
        data:{ users : post_arr } ,
        beforeSend: function() {
          $('.checkItem:checked').parents("tr").animate({'backgroundColor':'#fb6c6c' });
        },      
        success: function(response) {
          $.each(post_arr, function() {
            $('.checkItem:checked').parents("tr").animate({'backgroundColor':'rgba(255,0,0,0.2)' });
            $('.checkItem:checked').parents("tr").children("td.statusAction").html(bulkAction);
            $('.checkItem:checked').prop('checked',false);
          });
          alert('Users '+bulkAction+' are successfull');
        },
        error: function(){
          alert('Users are '+bulkAction+' not success full');
        }
      });      
      }

      return false
    }   
    return false;
  });
// This method is used to first dropdown select Value
// Then fetch the data   
  $('#country').on('change',function(){
  // This method is used to get the drop down select value
    var country = '';
    $.each($("#country option:selected"), function(){            
      country = $(this).val();
      $('#state').removeAttr("disabled");
    });
    console.log("You have selected the action - " + country);
    if(country == ''){
      $('#state').attr("disabled",'');
      $('#district').attr("disabled",''); 
      return; 
    }
    if(country != ''){
      $('#state').removeAttr("disabled");
      $.ajax({
        type: "post",
        url:  "../state.php",
        data: {CountryId:country},  
        success: function(data){
          $('#state').html(data);
          $('#district').attr("disabled",'');
        },
        error: function(){
          alert('Something is wrong !');
        },  
      });
    }
  });
  $('#state').on('change',function(){
  // This method is used to get the drop down select value
    var state = '';
    $.each($("#state option:selected"), function(){            
      state = $(this).val();
    });   
    if(state == ''){
      return $('#district').attr("disabled",''); 
    }  
    if(state != ''){  
      $('#district').removeAttr("disabled");
      $.ajax({
        type: "post",
        url:  "../state.php",
        data: {stateId:state},  
        success: function(data){
          $('#district').html(data);
        },
        error: function(){
          alert('Something is wrong !');
        },    
      });
    }    
  });

/*
 *
*/





/*
$('#country').on('change',function(){
  DependentDropdownBox('#country','#state');
});
$('#state').on('change',function(){
  DependentDropdownBox('#state','#district');
});   
function DependentDropdownBox( $fieldId,$output){
// This method is used to first dropdown select Value
// Then fetch the data   
  $inputId = $($fieldId).val();
  $.ajax({
    type: "post",
    url:  "../state.php",
    data: {Id:$inputId},  
    success: function(data){
      console.log(data);
      $($output).html(data);
    },
    error: function(){
      alert('Something is wrong !');
    },     
  });     
}
*/       
});
