<?php
include 'sessions.php';
$id=$_POST['prod_id'];
  $prod_sql="SELECT * FROM `cart` WHERE `product_id`='$id'";
			          $GrandTotal="";
					  $number_of_items="";
						$product = mysqli_query($conn,$prod_sql);
						
                    if ($row1 = mysqli_fetch_array($product)) {
						echo $row1['product_total'];
					}
			  ?>