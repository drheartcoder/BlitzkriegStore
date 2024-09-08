<?php 

require_once('db/db.php');



$product_id=$_REQUEST["product_id"];


$sql = mysql_query("SELECT * FROM product WHERE product_id='$product_id'");
$row=mysql_fetch_array($sql);
$product_id=$row['product_id'];
$price=$row['price'];
$quantity=$row['quantity'];

?>
<main_category>
<sub_category>
    <student_name><?php echo $product_id;?></student_name>
	<student_name><?php echo $price;?></student_name>
	<student_name><?php echo $quantity;?></student_name>
</sub_category>
</main_category>

