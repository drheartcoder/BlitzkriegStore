<?php
require_once('db/db.php');

if ( !isset($_SESSION['logged-admin']) || $_SESSION['logged-admin'] !== true) {

 header('Location: login.php');

 exit;

 }

 
$bill_no = $_REQUEST['sale_id'];

//echo "<br>";
 
$bill_no = $_REQUEST['sale_id'];
$date = date('Y-m-d');

$sql = mysql_query("SELECT * FROM sale WHERE sale_id=$bill_no");
$result = mysql_fetch_array($sql); 

if($result['delete_record'] == 0){
 
$sql = "UPDATE sale SET delete_record=1,delete_date='$date' WHERE sale_id=$bill_no";
mysql_query($sql);

$sql = "UPDATE sale_product SET delete_record=1 WHERE sale_id=$bill_no";
mysql_query($sql);
 
$sqls = mysql_query("SELECT * FROM sale_payment WHERE sale_id=$bill_no LIMIT 0 , 1");
$ress = mysql_fetch_array($sqls);
$sale_payment_id = $ress['sale_payment_id'];

if($sale_payment_id !=""){
$sqlp = "UPDATE sale_payment SET delete_record=1 WHERE sale_payment_id=$sale_payment_id";
mysql_query($sqlp);

}else{
								
$sqlp = "UPDATE sale_payment SET delete_record=1 WHERE sale_id=$bill_no";
mysql_query($sqlp);
}

$sql = mysqli_query($con,"SELECT p.product_name,sp.quantity,sp.price,sp.product_id FROM sale_product sp,product p WHERE sp.product_id=p.product_id and sp.sale_id=$bill_no");
while($res = mysqli_fetch_array($sql)){
	
	$product_id = $res['product_id'];
	
	$sqlitem = mysqli_query($con,"SELECT quantity FROM product WHERE product_id=$product_id");
	$resitem = mysqli_fetch_array($sqlitem);
	
	$oldquantity = $resitem['quantity'];
	//echo "<br> Newquantity : ".$res['quantity'];
	//echo "<br>";
	
	$newquantity = ($oldquantity+$res['quantity']);
	
	$sqlu = "UPDATE product SET quantity=$newquantity WHERE product_id=$product_id";
	mysql_query($sqlu);
	
	echo "<br>";
}


				
			
$sql="UPDATE transaction SET delete_record=1 WHERE sale_id=$bill_no";
mysql_query($sql);


$sqls = mysql_query("SELECT * FROM transaction WHERE sale_id=$bill_no");
while($ress = mysql_fetch_array($sqls)){
$tid = $ress['tid'];


$sql3="UPDATE cash_book SET delete_record=1 WHERE tid=$tid";
mysql_query($sql3);

$sql4="UPDATE bank_book SET delete_record=1 WHERE tid=$tid";
mysql_query($sql4);

$sql5="UPDATE account_transaction SET delete_record=1 WHERE tid=$tid";
mysql_query($sql5);

$sql6="UPDATE day_book SET delete_record=1 WHERE tid=$tid";
mysql_query($sql6);

}

echo "<script>window.location='View-Sales.php'</script>";

}else{
	echo "<script>window.location='View-Sales.php'</script>";
}

?>

