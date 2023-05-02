<?php
session_start();
error_reporting(0);

include 'Dbconnect.php';
 $dbuser=$_SESSION['user_id_wel'];
 $user_level=$_SESSION['level'];

	
$semail="";
$firstname="";
$lastname="";
$credit_limit="";
$user_id='';
$todayDate=date('Y-m-d');
$picture="";
$cust_id="";
$group_id='';
$group_name='';
include 'passwordLibClass.php';
$user_name="";


date_default_timezone_set("Africa/Harare");
 $todayDate=date('Y-m-d');
if($user_level==0){
   $query="SELECT * FROM `users_tbl` WHERE `user_name`=:dbuser";
      
}else{
	
	 $query="SELECT * FROM `users_tbl` JOIN `student_tbl` on `users_tbl`.`user_id`=`student_tbl`.`user_id`  WHERE `user_name`=:dbuser";
}
	$stmt = $conn2->prepare($query);
	 $stmt->bindParam("dbuser",$dbuser);
	
	$stmt->execute();
   while($row = $stmt->fetch()){
           
           
   $_SESSION['user_id_wel']=$row['user_name'];

			$firstname=$row['first_name'];
			$lastname=$row['last_name'];
			$group_id=$row['group_id'];
			$midname=$row['mid_name'];
			$user_id=$row['user_id'];
		    $user_name=$row['user_name'];
			$group_name='';
			$picture=$row['picture'];
            }




?> 