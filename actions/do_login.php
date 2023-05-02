<?php
session_start();
/*if(!defined('jhshjgdhgdhgdhhj')){
	echo '<script>window.location = "#";</script>';
}|*/
include '../includes/Dbconnect.php';
include '../includes/passwordLib.php';

 $user=$_POST['username'];
 $pass=$_POST['password'];

 if($user){
    
    if($pass){
       
		$stmt = $conn->prepare("SELECT `user_type`, `user_name`, `user_password` FROM `users_tbl` WHERE `user_name`=?");
		$stmt->bind_param("s",$user);
		$stmt->execute();
		$stmt->bind_result($level,$username,$password);
		
        if ($row=$stmt->fetch()){
            
               
           $dbuser=$username;
            $dbpass = $password;
            $dblevel=$level;
			$dbactive=1;
            
            if(password_verify($pass ,$dbpass )){
			  
                if($dbactive==1){
                    if($dblevel==0){
                      
                        $_SESSION['user_id_wel']=$dbuser;
                        $_SESSION['level']=$dblevel;
						$_SESSION['lockapp']='';
						$cookie_name = "user_id";
$cookie_value = $dbuser;
setcookie($cookie_name, $cookie_value , time() + (86400 * 365), "/"); // 86400 = 1 day
                       	
                   echo 'success';
                    }
                    elseif($dblevel==1){
                      
                        $_SESSION['user_id_wel']=$dbuser;
                        $_SESSION['level']=$dblevel;
						$_SESSION['lockapp']='';
                       				$cookie_name = "user_id";
$cookie_value = $dbuser;
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day			
					echo 'success';  
                  }
              
                    }
                    else
                
                echo "you must activate your account to login.  <a href='VerifyAccount.php' >Click Here</a> to Activate";
                
                }else
            
            echo "The user username or  password is not correct1";
            }else
            
            echo "The user username or  password is not correct2";
            
               }else
    
    echo "you need to enter a password..";
       
       
       
       
    }else
       echo "you did not enter a username..";
 
 
 //}
 
  
      

?>   