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
	
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Student Evaluation Form</h4>
               <?php    $stmt = $conn2->prepare("SELECT `rating _id`, `rating_by`, `rating_for`, `rating_value`, 
`rating_nararion`, `date_of_rating`, `status` FROM `student_ratings` WHERE `rating_by`=:evaBy and `rating_for`=:evaFor");
		
		$stmt->bindParam("evaBy",$user_name);
		$stmt->bindParam("evaFor",$_GET['for']);
		$stmt->execute();
		
		$count = $stmt->rowCount();
						
							while ($row5 = $stmt->fetch()) {
			
		
		                 
									
			 ?>
						
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
                      <select class="js-example-basic-single w-100" name="evaluation_value" disabled>
					  <option value="<?php echo $row5['rating_value']?>"><?php echo $row5['rating_value']?></option>
					
					   
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Justification</label>
                      <textarea type="text" class="form-control" name="justification" rows="4" readonly><?php echo $row5['rating_nararion'] ?></textarea>
                    </div>
                   
					 
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
