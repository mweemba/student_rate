<?php
 include '../includes/sessions.php';

 $message=$dbuser." has logged out";

unset($_SESSION["user_id_wel"]);

echo '<script>window.location = "../login.php";</script>';	

?>