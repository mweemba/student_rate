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
	<?php									if(isset($_POST['submit_me']) OR isset($_POST['save_me'])){
												
										echo "am here";
										// let's create some shortcuts


// store the file

										
$evaluation_id=rand(000,999);
 $evaluationby=$_POST['evaluationby'];
$evaluation_for =$_POST['evaluation_for'];
$evaluation_value=$_POST['evaluation_value'];
 $justification=$_POST['justification'];
 $first_name='';
 
 $todaysdate=date('Y-m-d');
$status='';
if(isset($_POST['submit_me'])){
	$status='Submited';
	
}elseif(isset($_POST['save_me'])){

$status='Saved';	
}


$SQL4 ="INSERT INTO `student_ratings`(`rating _id`, `rating_by`, `rating_for`, `rating_value`, `rating_nararion`, `date_of_rating`, `status`)
 VALUES (:evaluation_id,:evaluationby,:evaluation_for,:evaluation_value,:justification,:todaysdate,:status)";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("evaluation_id",$evaluation_id);
$stmt->bindParam("evaluationby",$evaluationby);
$stmt->bindParam("evaluation_for",$evaluation_for);
$stmt->bindParam("evaluation_value",$evaluation_value);
$stmt->bindParam("justification",$justification);
$stmt->bindParam("status",$status);
$stmt->bindParam("todaysdate",$todaysdate);


echo "Here";

if ($stmt->execute()) {
  
 if(isset($_POST['submit_here_me'])){
	 
	 echo '<script>window.location = "Student_Evaluation.php?submited=YES";</script>';	
	
	
}elseif(isset($_POST['save_me'])){

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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Student Evaluation Form</h4>
                  
                  <form method="POST" class="forms-sample">
                    <div class="form-group">
                      
                      <input  type="hidden" class="form-control" value="<?php echo $user_name; ?>" name="evaluationby" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Evaluation For Student</label>
                      <input type="text" class="form-control" name="evaluation_for" value="<?php echo $_GET['for']?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Grade</label>
                      <select class="js-example-basic-single w-100" name="evaluation_value">
					  <option value="">--Select Evaluation Grade--</option>
					   <option value="0">Zero</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
					  <option value="6">Six</option>
                      <option value="7">Seven</option>
					  <option value="8">Eight</option>
                      <option value="9">Nine</option>
					   <option value="10">Ten</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Justification</label>
                      <textarea type="text" class="form-control" name="justification" rows="4" required ></textarea>
                    </div>
                   
					 <button type="submit" name="save_me" class="btn btn-primary mr-2">Save</button>
                    <button type="submit" name="submit_me" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
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
