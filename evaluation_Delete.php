<?php include 'includes/sessions.php';

$evaluation_for=$_GET['evaluation_id'];								
												
										
										// let's create some shortcuts`


// store the file

										

 $evaluation_by=$_GET['evaluation_by'];
 $evaluation_for=$_GET['evaluation_for'];




$SQL4 ="DELETE FROM `student_ratings` WHERE `rating_by`=:evaluation_by and `rating_for`=:evaluation_for";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("evaluation_for",$evaluation_for);

$stmt->bindParam("evaluation_by",$evaluation_by);
$stmt->execute();
$count = $stmt->rowCount();

if ($count>0) {
  


 echo '<script>window.location = "Student_Evaluation.php?deleted=YES";</script>';		

 }
    		
else {


			
 echo '<script>window.location = "Student_Evaluation.php?deleted=NO";</script>';	

 }
			
		
		
//}



	
	
	

	
?>  
      