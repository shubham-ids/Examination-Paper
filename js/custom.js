// $(document).ready(function(){
  
//   $('#fname').blur(function(){
//     requireField(this , '#clientErrorMessage');
//   });
//   $('#fname').keyup(function(){
//     notAllowedNumber(this , '#clientErrorMessage');
//   });  
//   $('#fname').keyup(function(){
//     requireField(this , '#clientErrorMessage');
//     notAllowedNumber(this , '#clientErrorMessage');
//   });    

//  // Validation Error
//    function requireField(input , ErrorId){
//    	$(ErrorId).html="";
//     if($(input).val() == ""){ 
//       $(ErrorId).html('<p class="ErrorMessage">This field is required</p>');
//       $(ErrorId).addClass('text-danger');
//       return;
//     }
//    } 
// /*
// *  This Function is used to print the Error Message by not allowed Number
// */
//   function notAllowedNumber(input , ErrorId ){
//   	var notAllowedCharacter = ["+","-","0","1","2","3","4","5","6","7","8","9"];
//     $(ErrorId).html = "";
//   	var InputValue = $(input).val();
//   	for(var i=0; i< InputValue.length; i++){
//  			if( notAllowedCharacter.indexOf(InputValue[i]) !== -1  ){
// 		    $(ErrorId).html('Just filled by character : '+InputValue);       
//     		return;
//  			}
// 		}
//   	return;
//  	}

// });
