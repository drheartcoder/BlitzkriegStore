<?php 

require_once('db/db.php');



$company_id=$_REQUEST["company_id"];


$sql = mysql_query("SELECT * FROM company WHERE company_id='$company_id'");
$row=mysql_fetch_array($sql);
$company_id=$row['company_id'];
$company_name=$row['company_name'];
$mobile_no=$row['mobile_no'];
$email_id=$row['email_id'];
$address=$row['address'];

?>
<main_category>
<sub_category>
        <student_name><?php echo $company_id;?></student_name>
	<student_name><?php echo $company_name;?></student_name>
	<student_name><?php echo $mobile_no;?></student_name>
	<student_name><?php echo $email_id;?></student_name>
	<student_name><?php echo $address;?></student_name>
</sub_category>
</main_category>

