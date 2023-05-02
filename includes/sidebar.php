<?php if($user_level==0 ){?>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
        
           <li class="nav-item">
            <a class="nav-link" href="Teams.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Teams and Members</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="Search.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Evaluations and Reports</span>
            </a>
          </li>
         
         
        
		
	 <?php } if($user_level==1 ){?>
	 
	  <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
      
       <li class="nav-item">
            <a class="nav-link" href="Group_Students.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">My Group and Peers</span>
            </a>
          </li>
        
         
        
          <li class="nav-item">
            <a class="nav-link" href="Student_Evaluation.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Evaluate Team members</span>
            </a>
          </li>
		 
		  
        </ul>
	 <?php } ?>