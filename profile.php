<?php include 'includes/sessions.php'; 4

 if(!isset($_SESSION["user_id_wel"])){ 
 }
 ?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Evaluation Form</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  
  <!--pic editor ccss -->
  <link rel="stylesheet" href="css/slim.min.css"/>
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
     <?php include'includes/header.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      

	  <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
	  
	 <?php include 'includes/sidebar.php'; ?>
	 
      </nav>
      <!-- partial -->
      <div class="main-panel"> 
	<?php									if( isset($_POST['save'])){
												
				require_once('sync_pic.php');						
										// let's create some shortcuts


// store the file

 $user_id=$_POST['user_id'];
$first_name =$_POST['first_name'];
$mid_name=$_POST['mid_name'];
$last_name=$_POST['mid_name'];
 $password1=$_POST['password1'];
  $password2=$_POST['password2'];
  $email=$_POST['email'];
  
  if($password1!=$password2){
			 echo '<div class="alert alert-danger">the Two Passwords are not the same</div>';	
				
  }	else{	
   $email=$_POST['email'];

  
$todaysdate=date('Y-m-d');
$lengthFile=strlen(trim($nameofFile));
$lengthpass=strlen(trim($password1));

$encryptedpass = password_hash($password1 , PASSWORD_BCRYPT);
	  if($user_level==0){
  $SQL4="UPDATE `users_tbl` SET `first_name`='$first_name',`mid_name`='$mid_name',`last_name`='$last_name',`email`='$email',`user_password`=IF($lengthpass=0,`user_password`,'$encryptedpass'),`picture`=IF($lengthFile=0,`picture`,'$nameofFile') WHERE `user_name`='$user_id' 
  ";
}else{
	  $SQL4 ="UPDATE `student_tbl` SET `first_name`='$first_name',`middle_name`='$mid_name',`last_name`='$last_name',`email`='$email' WHERE `student_id`='$user_id';

UPDATE `users_tbl` SET `first_name`='$first_name',`mid_name`='$mid_name',`last_name`='$last_name',`email`='$email',`user_password`=IF($lengthpass=0,`user_password`,'$encryptedpass'),`picture`=IF($lengthFile=0,`picture`,'$nameofFile') WHERE `user_name`='$user_id'
  ";
  
 
	
}



  $stmt = $conn2->prepare($SQL4);





if ($stmt->execute()) {
  
 echo '<div class="alert alert-success">the Profile Had been eddited succeffully</div>';
 }
    		
else {


			
			 echo '<div class="alert alert-danger">the Profile has NOT been edited due to an error. Please try again</div>';

			 }
			
	}

	}	
		
//}



	
	
	

	
?>  
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="margin: 0 auto">
              <div class="card" >
                <div class="card-body">
                  <h4 class="card-title" style="margin: 0 auto">My Profile</h4>
               <?php   
		
			  if($user_level==0){
 $query="SELECT * FROM `users_tbl` WHERE `user_name`=:dbuser";
      
}else{
	
	 $query="SELECT * FROM `users_tbl` JOIN `student_tbl` on `users_tbl`.`user_id`=`student_tbl`.`user_id`  WHERE `user_name`=:dbuser";
}

	$stmt = $conn2->prepare($query);
	  $stmt->bindParam("dbuser",$dbuser);
	
	$stmt->execute();
   while($row = $stmt->fetch()){
           
           
 

			$firstname=$row['first_name'];
			$lastname=$row['last_name'];
			$group_id=$row['group_id'];
			$midname=$row['mid_name'];
			$user_id=$row['user_id'];
		    $user_name=$row['user_name'];
			$group_name='';
            

		
		                 
									
			 ?>
						
                  <form method="POST" class="forms-sample">
				  
				  <div style="max-width:300px; margin: 0 auto;">
																<div class="slim" id="imgContainer"
																 data-label="Drop your picture here"
																 
																 data-size="240,240"
																 data-ratio="1:1"
																 data-max-file-size="10"
																 data-instant-edit="true"
															     data-meta-memberid="<?php echo $user_name;?>"
															     >
															     <input type="file" name="slim[]"  />
																<img style="border-radius: 50%;" class="editable img-responsive"  src="<?php  if(!$row['picture']){ echo 'images/user.png'; } else{ echo 'images/'.$row['picture']; };?>" />
															
                                                                 </div>
																  
														</div>
                                                          
                    <div class="form-group">
                      <label for="exampleInputEmail1">Student ID</label>
                      <input   class="form-control" value="<?php echo $user_name; ?>" name="user_id" readonly >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" class="form-control" name="first_name" value="<?php echo $firstname ?>" >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Middle Name</label>
                      <input type="text" class="form-control" name="mid_name" value="<?php echo $midname ?>" >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="<?php echo $lastname ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" class="form-control" name="password1" value="" >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Re enter Password</label>
                      <input type="password" class="form-control" name="password2" value="" >
                    </div>
                   
					 <button type="submit" name="save" class="btn btn-primary mr-2">Save</button>
                  
                  <a href="index.php" class="btn btn-light">Back to Dashboard</a>
                  </form>
							<?php }?>
                </div>
              </div>
            </div>
             </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Paul Kaumba  All rights reserved.</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <script src="js/slim.kickstart.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
