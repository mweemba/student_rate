<?php
include 'sessions.php';
include 'Get_invoice_id.php';
$number_of_items=$_POST['items'];
$total=$_POST['total'];
$address=$_POST['address'];
$carttype=$_POST['ordertype'];
$invoice=getinvoiceID();
$todaysDate=Date('Y/m/d');
$sql="";
if($carttype=='8'){
	
 $sql="
UPDATE `cart` INNER JOIN `products` ON  `cart`.`product_id`=`products`.`product_id` SET `order_number`='$invoice' WHERE `userid`='$cust_id' AND `products`.`category`='8'; 
INSERT INTO `order_items`  select `id`, `Cart_id`, `cart`.`Product_id`, `userid`, `number_of_items`, `product_price`, `product_total`, `order_number`, `invoiced` from `cart`
 INNER JOIN `products` ON  `cart`.`product_id`=`products`.`product_id` where `userid`='$cust_id' AND `products`.`category`='8';
DELETE  `cart` FROM `cart` INNER JOIN `products` ON  `cart`.`product_id`=`products`.`product_id` WHERE `userid`='$cust_id' AND `products`.`category`='8' ;
INSERT INTO `order_summery`(`Id`, `Number_of_items`, `DeliveryAddress`, `Total`, `Date_made`, `Date_due`, `cif_id`, `Status`) VALUES
 ('$invoice','$number_of_items','$address','$total','$todaysDate','$todaysDate','$cust_id','not paid');
 ";
}else{

$sql="
UPDATE `cart` INNER JOIN `products` ON  `cart`.`product_id`=`products`.`product_id` SET `order_number`='$invoice' WHERE `userid`='$cust_id' AND `products`.`category`<>'8'; 
INSERT INTO `order_items`  select `id`, `Cart_id`, `cart`.`Product_id`, `userid`, `number_of_items`, `product_price`, `product_total`, `order_number`, `invoiced`  from `cart` INNER JOIN `products` ON  `cart`.`product_id`=`products`.`product_id` where `userid`='$cust_id' AND `products`.`category`<>'8';
DELETE `cart` FROM `cart` INNER JOIN `products` ON  `cart`.`product_id`=`products`.`product_id` WHERE `userid`='$cust_id' AND `products`.`category`<>'8' ;
INSERT INTO `order_summery`(`Id`, `Number_of_items`, `DeliveryAddress`, `Total`, `Date_made`, `Date_due`, `cif_id`, `Status`) VALUES
 ('$invoice','$number_of_items','$address','$total','$todaysDate','$todaysDate','$cust_id','not paid');
 ";	
	
}
if(!$conn->multi_query($sql)){

}else {
echo $invoice; 

 }
 
?>