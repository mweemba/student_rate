<!DOCTYPE html>
<html lang="en">
<?php include 'includes/sessions.php'; ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SPES</title>
  <!-- These CSS are running from vendors folder and css folder in student_rate folder -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/capta.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- JQuery Javascript and CSS source below -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
			
			
              <div class="brand-logo">
                <h3>Student Peer Evaluation System-SPES ?</h3>
              </div>
              <h4>Registration Form</h4>
			  
			  					<?php
								
						
											
  
											if(isset($_POST['submit_regi'])){
												
										 //if ($_POST["captcha"] == $_SESSION["captcha_code"]) 
										// let's create some shortcuts
										

	  // Code that computes CAPTCHA 

    $captcha = $_POST["captcha"];
    $confirmcaptcha = $_POST["confirmcaptcha"];
    if($captcha != $confirmcaptcha){
        echo "<script> alert ('Incorrect Captcha, please try again!'); </script>";
    


			
			 echo "<script>window.location = 'register.php?status=No'</script>";
			
			
		
}else{
	


	
	
      




// store data into variables now

										
$user_id=rand(1,99);
$email=$_POST['email'];
$student_id =$_POST['student_id'];
$Password1=$_POST['Password1'];
$Group_id=$_POST['Group_id'];
$first_name='';
$middle_name='';
$pic='';
 
 $status='Active';
 
 $last_name='';
 $todaysdate=date('Y-m-d');

$encryptedpass = password_hash($Password1 , PASSWORD_BCRYPT);
// Inserts data into student table and users table
$SQL4 ="INSERT INTO `student_tbl`(`student_id`, `first_name`, `middle_name`, `last_name`, `email`, `group_id`, `status`, `user_id`) 
VALUES (:student_id,:first_name,:middle_name,:last_name,:email,:Group_id,:status,:user_id);

INSERT INTO `users_tbl`(`user_id`, `first_name`, `mid_name`, `last_name`, `user_type`, `user_name`, `email`, `user_password`, `date_created`, `user_status`,`picture`)
   VALUES (:user_id,:first_name,:middle_name,:last_name,'1',:student_id,:email,:encryptedpass,:todaysdate,:status,:pic)";
  
 // bind the field from the databases to the variables
$stmt = $conn2->prepare($SQL4);
$stmt->bindParam("email",$email);
$stmt->bindParam("student_id",$student_id);
$stmt->bindParam("encryptedpass",$encryptedpass);
$stmt->bindParam("Group_id",$Group_id);
$stmt->bindParam("first_name",$first_name);
$stmt->bindParam("middle_name",$middle_name);
$stmt->bindParam("status",$status);
$stmt->bindParam("last_name",$last_name);
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("todaysdate",$todaysdate);
$stmt->bindParam("pic",$pic);


move_uploaded_file($_FILES['Ducument_upload']['tmp_name'],$document);
 // update the tables
if ($stmt->execute()) {
  
 
 echo "<script>window.location = 'login.php?reg_status=Yes'</script>";
    		
}else {


			
			 echo "<script>window.location = 'register.php?status=No'</script>";
			
			
		
//}

	
	}
}	

  echo '<div class="alert alert-warning"> The Text Entered is not correct, please try again!</div>'; }



?>
         
    <!-- populate data on the input fields on the form  -->		 
              <form  action="#" method="POST" onsubmit="return FormValidate2()">
			 
				 <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  name="email" id="email" placeholder="Email">
                </div>
				 <div class="form-group">
                  <input type="number" class="form-control form-control-lg"  name="student_id" id="student_id" onkeyup="validate_id()" placeholder="Enter 9 Digit number as your ID Number"><span id="feedback"></span>
                </div>
				
               
				 <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="Password1" id="Password1" onkeyup="passidvalidation()" placeholder="Password"><span id="pass1_response"></span>
                </div>
				 <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="Password2" name="Password2"  onkeyup="checkBothpasswords()" placeholder="Re-Enter Password"><span id="pass2_response"></span>
                </div>
               
                <div class="form-group">
                  <select class="form-control" id="Group_id" onchange="checkgroupNo()" name="Group_id">
                    <option>---Select Group---</option>
						<?php 
									$sql="SELECT `group_id`, `group_name`, `group_number` FROM `studentgroups`";
									$stmt = $conn2->query($sql);

						while ($row5 = $stmt->fetch()) {

									$value=$row5['At_Title'];
									$tetle=$row5['At_content'];
								?>
                    <option value="<?php echo $row5['group_id'];  ?>"><?php echo $row5['group_name']; ?></option>
					
						<?php }?>
                    </select>
					
					<span id="Group_number_feedback"></span>
                </div>
				
              
				
				   <div class="link-top-space">
         
	
        </div><br>
		
		
		
                <div class="mt-3">
				 



    
    <style media="screen">
        *{
            user-select: none;
        }
        input.captcha{
            pointer-events: none;
            letter-spacing: 6px;
            text-decoration: line-through;
        }
    </style>
   
       <!-- Enter captcha code in the input fields on the form  -->	   
      

		
            <input type="text" class = "captcha" name="captcha" value="<?php echo substr(uniqid(), 5); ?>"><br>
            <input type="text" name="confirmcaptcha" placeholder="Enter Captcha Code Here" value=""><br>
			<input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  onclick="FormValidate2()" name="submit_regi" type="submit" ><br>
       
        <!-- content-wrapper ends --> </form>
        <br>
       
  <div id="valid_response"></div>



				
				
				
				
				
				<div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
 <!-- This is bootstrap jave scripts imported int my project ----https://getbootstrap.com/docs/4.0/getting-started/introduction/ -->
  <!-- Accessed on 10th November, 2022 -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/capta.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
  <!-- endinject -->
</body>

</html>
