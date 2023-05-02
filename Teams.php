<?php
include 'includes/sessions.php';
?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Teams</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
     <!-- partial -->
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
      <!-- partial:../../partials/_sidebar.html -->
        <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
		   
          <div class="row">
           <div class="col-lg-12 grid-margin stretch-card">
		   <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Student Teams</h4>
                  <?php
				 $email_sent=$_GET['emailsent'];
				  if($email_sent=='YES'){
					  echo '<div class="alert alert-success"> The evaluation Email has  been sent Succeffully</div>';
					  
				  }elseif($email_sent=='NO'){
					  
					 echo '<div class="alert alert-danger"> The evaluation Email has not been sent due to an error, Please try again!</div>'; 
				  }
				  
				  ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                         
                        
                          <th>
                          Group No
                          </th>
                          
						  <th>
                           No of registered Members
                          </th>
						    <th>
                         Submitted Evaluations 
                          </th>
                          <th>
                            Options
                          </th>
                        </tr>
                      </thead>
                      <tbody>
					  
						<?php 
						include 'functions.php';
									$sql="SELECT `group_id`, `group_name`, `group_number` FROM `studentgroups`";
									$stmt = $conn2->query($sql);

						while ($row5 = $stmt->fetch()) {

									
								?>
                        <tr>
                          
                          
                         
                          <td>
                          <?php echo $row5['group_name'];?>
                          </td>
						  
						   <td>
                          <?php echo numberingroup($row5['group_id']);?>
                          </td>
						  <td>
                          <?php echo $submittedeva=Nogroupevaluations($row5['group_id']);?>
                          </td>
						  
						 
						   <td>
                             <div class="btn-group">
                            <a href='Group_Students_lect.php?group_id=<?php echo $row5['group_id'];?>'><button type="button" class="btn btn-inverse-primary " >View Members</button></a>
                                <a href='Group_Evaluations.php?group_id=<?php echo $row5['group_id'];?>'><button type="button" class="btn btn-inverse-primary " >View  Evaluations</button></a>
                          <?php if($submittedeva > 0){ ?><a href='email.php?group_id=<?php echo $row5['group_id'];?>'><button type="button" class="btn btn-inverse-primary " >Email Evaluations</button></a><?php } 
						  else{ echo '<div class="alert alert-danger">This Group has no Submissions</div>'; }?>								
                          </div>
                          </td>
						
                          
                        </tr>
						<?php } ?>
                 </tbody>
                    </table>
                  </div>
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
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
