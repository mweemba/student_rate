
<?php




$group_id=$_GET['group_id'];

echo emaiilgenerate($group_id);

function emaiilgenerate($group_id){
	include'includes/Dbconnect.php';
$sql="SELECT `rating _id`, `rating_by`, `rating_for`, `rating_value`, `rating_nararion`, `date_of_rating` 
				  FROM `student_ratings` INNER JOIN `student_tbl`  ON `student_ratings`.`rating_for`=`student_tbl`.`student_id` 
				  INNER JOIN `studentgroups` ON `student_tbl`.`group_id`=`studentgroups`.`group_id` WHERE  `studentgroups`.`group_id`='$group_id' and  `student_ratings`.`status`='Submited'";
									$stmt = $conn2->query($sql);

 $message ='<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<title></title>
<style></style>
</head>

<body>
<div id="email" style="width:600px;">

<!-- Header --> 
<table role="presentation" border="2" cellspacing="0" width="100%">
<tr>
<th>
                            Evaluation ID
                          </th>
                          <th>
                          Evaluation By
                          </th>
                          <th>
                             Evaluation For
                          </th>
						  <th>
                             Value
                          </th>
                          <th>
                           Justification
                          </th>
						  <th>
                           Date
                          </th>
</tr>
</table>
<table role="presentation" border="2" cellspacing="0" width="100%">
<tbody>
';
 
						while ($row5 = $stmt->fetch()) {

						
							
                      $message.='<tr>
                          <td >'
                                .$row5['rating _id'].
                         '</td>
                          <td>'
                           .$row5['rating_by'].
                          '</td>
						  <td>'
                         .$row5['rating_for'].
                         ' </td>
                         <td>'
                           .$row5['rating_value'].
                         '</td>
						   <td>'
                           .$row5['rating_nararion'].
                          '</td>
                          <td>'
                           .$row5['date_of_rating'].
                         '</td>
                          
                        </tr>';
						 } 
                 $message.='</tbody>

</table>

<!-- Footer -->
<table role="presentation" border="0" cellspacing="0" width="100%">
<tr>
<td>

</td>
</tr>
</table> 
</div>
</body>';


echo $to=getAddress($group_id);

$subject ='Group Evaluation';
$From ='lecturer@course.com';;
$headers = "From: ".$From;
if(mail($to,$subject,$message,$headers)){
 echo '<script>window.location = "Teams.php?emailsent=YES";</script>';	
}else{
echo '<script>window.location = "Teams.php?emailsent=NO";</script>';	

}


}
function getAddress($group_id){
	include'includes/Dbconnect.php';
	$group_id=$_GET['group_id'];
								 $sql="SELECT `student_id`, `first_name`, `middle_name`, `last_name`, `email`, `group_id`, `status`, `user_id` FROM `student_tbl` WHERE `group_id`=$group_id";
									$stmt = $conn2->query($sql);

                     $results='';
						while ($row5 = $stmt->fetch()) {
							
							$results .= $row5['email'].',';
						}
						

	return $results;
}



 ?>
 
 