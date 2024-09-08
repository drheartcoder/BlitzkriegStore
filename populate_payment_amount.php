<?php 

require_once('db/db.php');



$bill_no=$_REQUEST["bill_no"];


$sqls = mysql_query("SELECT SUM(pp.payment_amount) tot,p.net_cash_amt FROM purchase_payment pp,purchase p WHERE pp.purchase_id=p.purchase_id and pp.purchase_id=$bill_no GROUP BY net_cash_amt");
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

