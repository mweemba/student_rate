<?php
include 'includes/sessions.php';
?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Group members</title>
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
				
				<?php $group_id=$_GET['group_id']; ?>
                  <h4 class="card-title"><?php  $sql="SELECT `group_id`, `group_name`, `group_number` FROM `studentgroups` WHERE `group_id`='$group_id'";
									$stmt = $conn2->query($sql);

						while ($row5 = $stmt->fetch()) {
                          echo $row5['group_name'];
						}
								?> Members</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           
                          </th>
                          <th>
                            Student ID 
                          </th>
                          <th>
                          Student First Name
                          </th>
                          <th>
                             Student Middle Name
                          </th>
						  <th>
                             Student Surname
                          </th>
                          <th>
                            Email
                          </th>
                        </tr>
                      </thead>
                      <tbody>
					  
						<?php 
									 $sql="SELECT * FROM `users_tbl` JOIN `student_tbl` on `users_tbl`.`user_id`=`student_tbl`.`user_id` WHERE `group_id`='$group_id'";
									$stmt = $conn2->query($sql);

						while ($row5 = $stmt->fetch()) {

									
								?>
                        <tr>
                          <td class="py-1">
                             <img src="<?php if($row5['picture']){ echo 'images/'.$row5['picture']; } else{ echo 'images/user.png';} ?>" alt="profile Image"/>
                          </td>
                          <td>
                          <?php echo $row5['student_id'];?>
                          </td>
						  <td>
                          <?php echo $row5['first_name'];?>
                          </td>
                         <td>
                          <?php echo $row5['middle_name'];?>
                          </td>
						   <td>
                          <?php echo $row5['last_name'];?>
                          </td>
                          <td>
                          <a href='profile_view.php?uid=<?php echo $row5['student_id'];?>'>View Details</a>
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
