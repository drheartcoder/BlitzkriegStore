<?php 

require_once('db/db.php');



$bill_no=$_REQUEST["bill_no"];


$sqls = mysql_query("SELECT SUM(sp.payment_amount) tot,s.net_cash_amt FROM sale_payment sp,sale s WHERE sp.sale_id=s.sale_id and sp.sale_id=$bill_no GROUP BY net_cash_amt");
$row = mysql_fetch_array($sqls);

$tot=$row['tot'];
$net_cash_amt=$row['net_cash_amt'];
$balance = ($net_cash_amt-$tot);

?>
<main_category>
<sub_category>
    <student_name><?php echo $balance;?></student_name>
	<student_name><?php echo $balance;?></student_name>
</sub_category>
</main_category>

