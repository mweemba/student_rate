<?php include 'includes/sessions.php';

$evaluation_for=$_GET['evaluation_for'];
$evaluation_by=$_GET['evaluation_by'];								
												
										
										// let's create some shortcuts`


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
      