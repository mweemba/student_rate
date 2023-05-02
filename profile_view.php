<?php include 'includes/sessions.php'; ?><!DOCTYPE html>
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
	<?php									if(isset($_POST['submit']) OR isset($_POST['save'])){
												
										
										// let's create some shortcuts


// store the file

										
$evaluation_id=rand(000,999);
 $evaluationby=$_POST['evaluationby'];
$evaluation_for =$_POST['evaluation_for'];
$evaluation_value=$_POST['evaluation_value'];
 $justification=$_POST['justification'];


if(isset($_POST['submit'])){
	$status='Saved';
	
}elseif(isset($_POST['save'])){

$status='Submited';	
}

$SQL4 ="UPDATE `student_ratings` SET `rating_value`=:evaluation_value ,`rating_nararion`=:justification,
 `status`=:status WHERE `rating_by`=:evaluationby and `rating_for`=:evaluation_for ";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("evaluationby",$evaluationby);
$stmt->bindParam("evaluation_for",$evaluation_for);
$stmt->bindParam("evaluation_value",$evaluation_value);
$stmt->bindParam("justification",$justification);
$stmt->bindParam("status",$status);




if ($stmt->execute()) {
  
 if(isset($_POST['submit'])){
	 
	 echo '<script>window.location = "Student_Evaluation.php?submited=YES";</script>';	
	
	
}elseif(isset($_POST['save'])){

 echo '<script>window.location = "Student_Evaluation.php?saved=YES";</script>';		
}
 }
    		
else {


			
			 echo '<div class="alert alert-danger">the evaluation was not saved due to some error. Please try again</div>';

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
			  $uid=$_GET['uid'];
			   $query="SELECT * FROM `users_tbl` JOIN `student_tbl` on `users_tbl`.`user_id`=`student_tbl`.`user_id`  WHERE `user_name`=:user_name";

	$stmt = $conn2->prepare($query);
	 $stmt->bindParam("user_name",$uid);
	
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
				  
				  <div class="form-group">
                     <img  style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;width: 50%; " class="editable img-responsive"  src="<?php  if(!$row['picture']){ echo 'images/user.png'; } else{ echo 'images/'.$row['picture']; };?>" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Student ID</label>
                      <input   class="form-control" value="<?php echo $user_name; ?>" name="evaluationby" readonly >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" class="form-control" name="evaluation_for" value="<?php echo $firstname ?>" readonly >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Middle Name</label>
                      <input type="text" class="form-control" name="evaluation_for" value="<?php echo $midname ?>" readonly  >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input type="text" class="form-control" name="evaluation_for" value="<?php echo $lastname ?>" readonly  >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" name="evaluation_for" value="<?php echo $row['email'] ?>" readonly >
                    </div>
                   
                   
				
                    <a href="Group_Students_lect.php?group_id=<?php echo $group_id?>">Back to Group</a>
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
  <!-- End custom js for this page-->
</body>

</html>
