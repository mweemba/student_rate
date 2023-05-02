<?php 
include '../includes/sessions.php';
 $oldpass=$_POST['oldpass'];

 $qr="SELECT * FROM `users_tbl` WHERE `user_name` =:dbuser";
		 $stmt = $conn2->prepare($qr);

$stmt->bindParam("dbuser",$dbuser);

        $stmt->execute();
	
        if ($stmt->rowCount() == 1){
         
            while($row = $stmt->fetch()){
            $dbpass = $row['user_password'];
        
            
            if(password_verify($oldpass ,$dbpass )){
			  
                echo 'success';
              
                    }
                    else{
                
             
                echo 'The password is not correct';
                }
		}
		
		}else{
			
			 echo 'The user is not found';
		}
		
		
		
		
		
		
            
?>