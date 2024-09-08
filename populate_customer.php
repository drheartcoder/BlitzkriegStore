<?php 

require_once('db/db.php');



$mobile_no=$_REQUEST["mobile_no"];


$sql = mysql_query("SELECT * FROM customer WHERE mobile_no='$mobile_no'");
$row=mysql_fetch_array($sql);
$customer_id=$row['customer_id'];
$mobile_no=$row['mobile_no'];
$customer_name=$row['customer_name'];
$mobile_no=$row['mobile_no'];
$email_id=$row['email_id'];
$address=$row['address'];

?>
<main_category>
<sub_category>
    <student_name><?php echo $customer_id;?></student_name>
	<student_name><?php echo $customer_name;?></student_name>
	<student_name><?php echo $mobile_no;?></student_name>
	<student_name><?php echo $email_id;?></student_name>
	<student_name><?php echo $address;?></student_name>
</sub_category>
</main_category>

