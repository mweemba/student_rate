<?php
function numberingroup($group_id){
	
	


	include'includes/Dbconnect.php';
	
$number=0;
$stmt = $conn2->prepare("SELECT count(*) as numb FROM `student_tbl` WHERE `group_id`=:group_id");
		
		$stmt->bindParam("group_id",$group_id);
		
		$stmt->execute();
		while ($row5 = $stmt->fetch()) {
			
			$number=$row5['numb'];
		}
						
			return $number;			
	  
	  
  
}

function Nogroupevaluations($group_id){
	
	


	include'includes/Dbconnect.php';
	
$number=0;
  $sql="SELECT count(*)  as numb
				  FROM `student_ratings` INNER JOIN `student_tbl`  ON `student_ratings`.`rating_for`=`student_tbl`.`student_id` 
				  INNER JOIN `studentgroups` ON `student_tbl`.`group_id`=`studentgroups`.`group_id` WHERE  `studentgroups`.`group_id`='$group_id' and  `student_ratings`.`status`='Submited'";
									$stmt = $conn2->query($sql);

				
		while ($row5 = $stmt->fetch()) {
			
			$number=$row5['numb'];
		}
						
			return $number;			
	  
	  
  
}
function checkevaluation($evaBy,$evaFor){
	
	include'includes/Dbconnect.php';
	
	$results='';
	
$number=0;
$stmt = $conn2->prepare("SELECT `rating _id`, `rating_by`, `rating_for`, `rating_value`, 
`rating_nararion`, `date_of_rating`, `status` FROM `student_ratings` WHERE `rating_by`=:evaBy and `rating_for`=:evaFor");
		
		$stmt->bindParam("evaBy",$evaBy);
		$stmt->bindParam("evaFor",$evaFor);
		$stmt->execute();
		
		$count = $stmt->rowCount();
						if($count > 0){
							
							while ($row5 = $stmt->fetch()) {
			
			 $results=$row5['status'];
		                 }
									
			return $results;						
									
									
						}else {
							return  'No';
							
							
							
						}
						
		
						
			return $number;
	
}

?>