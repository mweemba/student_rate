
function refreshCaptcha() {
	$("#captcha_code").attr('src', 'captcha_code.php');
}

function validate_id(){
	var valid_id=0
var student_id =document.getElementById('student_id').value;
checkexist(student_id);
	if (student_id.toString().length < 9){
	document.getElementById('feedback').innerHTML="<font color='Red'>The student ID is too short</font>";
	 valid_id=0;	
	}
	
	
	else if(student_id.toString().length > 9){
		document.getElementById('feedback').innerHTML="<font color='Red'>Your Student Number must only have 9 digit</font>";
		valid_id=0;
	}
	

	else{
		valid_id=1;
document.getElementById('feedback').innerHTML="<img height='40' src='images/tick.jpg'>";
	}
	return valid_id;
	
}





function checkexist(student_id){
	 


	 $.ajax({
	 
       type: "POST",
       url: 'actions/check.php',
       data: "student_id="+student_id,
       success: function(data)
       {
        if(data.trim()=='Yes'){
			
		document.getElementById('feedback').innerHTML="<font color='Red'>This user ID already exists</font>";	
		
		} 
		
		
    
	  
       }
	 
	  
   });


  
}


function checkgroupNo(){
	 
var e = document.getElementById("Group_id");
var Group_id = e.value;

	 $.ajax({
	 
       type: "POST",
       url: 'actions/checkGroup.php',
       data: "Group_id="+Group_id,
       success: function(data)
       {
		   
		   console.log(data);
        if(data.trim()=='Yes'){
			
		document.getElementById('Group_number_feedback').innerHTML="<font color='Red'>The Group is Full with 3 Members Already</font>";	
		
		} else{
			
		document.getElementById('Group_number_feedback').innerHTML="";	
		}
		
		
    
	  
       }
	 
	  
   });


  
}


function checkgroup(){
	 


	var value= document.getElementById('Group_number_feedback').innerHTML;	

if(value.trim()){
	return 0;
}else{
	return 1;
}
  
}


function checkBothpasswords() {
	var bothpassvlaid=0;
var pass1= document.getElementById("Password1").value;
var pass2= document.getElementById("Password2").value;
if(pass1.trim() == pass2.trim())
{
document.getElementById("pass2_response").innerHTML ="<img src='images/tick.jpg' width='20'>";
bothpassvlaid=1;
}
else{

document.getElementById("pass2_response").innerHTML="<font color='red'>The two passwords are not the same</font>"
bothpassvlaid=0;
}

return bothpassvlaid;

}

function passidvalidation(){


var pass_valid=0;
var password1= document.getElementById("Password1").value;
var password_strength=document.getElementById("pass1_response");
 var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$" ,"g");
var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$","g");
var enoughRegex = new RegExp("(?=.{6,}).*", "g");

if (password1.length==0) {
 password_strength.innerHTML = 'Type Password';
} else if (false == enoughRegex.test(password1)) {
 password_strength.innerHTML = '<span style="color:red">Too Short!</span>';
 pass_valid=0;
} else if (strongRegex.test(password1)) {
 password_strength.innerHTML = '<span style="color:green">Strong!</span>';
 pass_valid=1;
} else if (mediumRegex.test(password1)) {
 password_strength.innerHTML = '<span style="color:orange">Medium!</span>';
 pass_valid=1;
} else {
 password_strength.innerHTML = '<span style="color:red">Weak!</span>';
 pass_valid=0;
}
checkBothpasswords();
return pass_valid;
}




function FormValidate2(){
	var formvalid=true;
	
   var t1=checkgroup();
	var t3=passidvalidation();
	var t4=checkBothpasswords();
	  var t2=validate_id();
	
	errorlist="";
	
    
	if (t1==0) {
        errorlist += '<li>The Group Is Full with 3 Members already</li>';
		 
    }
	 if (t2==0) {
        errorlist += '<li>Your ID is Invalid</li>';
		  
    }
    if (t3==0) {
        errorlist += '<li>The New Password is too weak</li>';
		  
    }
	
    if (t4==0) {
        errorlist += '<li>The two Passwords are not the same</li>';
		   
    }
	
	
	
    if (errorlist.trim()) {
        document.getElementById("valid_response").innerHTML = '<div class="alert alert-danger"><ul>'+errorlist.trim()+'</ul></div>';
      formvalid=false;
    }
	else {
	formvalid=true;

		
	}
	 
	return formvalid;
}