<?php 
include 'check_order.php';
 $enrolment=0;
 $start_date=date("Y/m/d");
 $end_date="0000-00-00";
 $student_id=$_POST['student_id'];
 $course_id=$_POST['course_id'];
  $session_id=$_POST['session_id'];
 $paid='no';
 
 

  echo $inorder=isinorder($course_id,$student_id,$session_id);
   echo $inenrolment=isinenrolment($course_id,$student_id,$session_id);
 
	  

	 include '../includes/DBconnect.php';

if($inorder=='yes' or $inenrolment=='yes' ){
	
		echo "Course is already registered";
}else{
  $SQL3 = "INSERT INTO `order_course`(`enrolment_id`, `start_date`, `end_date`, `student_id`, `course_id`, `paid`, `session_id`) 
  VALUES (:enrolment,:start_date,:end_date,:student_id,:course_id,:paid,:session_id)";
    $stmt = $conn2->prepare($SQL3);
$stmt->bindParam(":enrolment",$enrolment);
$stmt->bindParam(":start_date",$start_date);
$stmt->bindParam(":end_date",$end_date);
$stmt->bindParam(":student_id",$student_id);
$stmt->bindParam(":course_id",$course_id);
$stmt->bindParam(":session_id",$session_id);
$stmt->bindParam(":paid",$paid);


   if($stmt->execute()){
	   echo 'success';
  }
  else {
	echo "Not Successfull";
  }


	
}
   
?>