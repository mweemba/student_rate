<?php 


function isinorder($course_id,$student_id,$session_id){
	include'../includes/Dbconnect.php';
	

$stmt = $conn2->prepare("SELECT * FROM `order_course` WHERE (`student_id`=:student_id OR `session_id`=:session_id )AND `course_id`=:course_id");
		$stmt->bindParam(":course_id",$course_id);
		$stmt->bindParam(":student_id",$student_id);
		$stmt->bindParam(":session_id",$session_id);
		
		$stmt->execute();
	$count = $stmt->rowCount();
						if($count > 0){
							return 'yes';
						}else {
							return 'no';
						}
	
	
}


 function isinenrolment($course_id,$student_id,$session_id){
	
	include'../includes/Dbconnect.php';
	

$stmt = $conn2->prepare("SELECT * FROM `course_enrolment` WHERE (`student_id`=:student_id OR `session_id`=:session_id )AND `course_id`=:course_id");
		$stmt->bindParam(":course_id",$course_id);
		$stmt->bindParam(":student_id",$student_id);
		$stmt->bindParam(":session_id",$session_id);
		$stmt->execute();
		$count = $stmt->rowCount();
						if($count > 0){
									return 'yes';
						}else {
							return 'no';
						}
						}
	  
	  
  
  
  ?>