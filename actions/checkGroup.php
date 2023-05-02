<?php 
$group_id=$_POST['Group_id'];
 $student_id;

	include'../includes/Dbconnect.php';
	

$stmt = $conn2->prepare("SELECT * FROM `student_tbl` WHERE `group_id`=:group_id");
		
		$stmt->bindParam("group_id",$group_id);
		
		$stmt->execute();
		$count = $stmt->rowCount();
						if($count == 3){
									echo 'Yes';
						}else {
							echo  'No';
						}
						
	  
	  
  
  
  ?>