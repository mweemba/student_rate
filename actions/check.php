<?php 
$student_id=$_POST['student_id'];
 $student_id;

	include'../includes/Dbconnect.php';
	

$stmt = $conn2->prepare("SELECT * FROM `users_tbl` WHERE `user_name`=:student_id ");
		
		$stmt->bindParam("student_id",$student_id);
		
		$stmt->execute();
		$count = $stmt->rowCount();
						if($count > 0){
									echo 'Yes';
						}else {
							echo  'No';
						}
						
	  
	  
  
  
  ?>