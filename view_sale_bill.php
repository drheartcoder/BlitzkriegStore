<?php include('db/db.php'); ?>

<div class="feewraper" id="block2">

<?php 							
	$sqls = mysql_query("SELECT * FROM business_details");													
	$ress = mysql_fetch_array($sqls);					
?>
<table width="1002" height="237" border="1" cellspacing="0">
<tr>
	<th colspan="6">
	 <div class="headfee" style="text-align: center;">
 <div class="lobilfee"></div>
	<b style="font-size:50px"><?php echo $ress['business_name']; ?></b><br>
	<b style="font-size:20px"><?php echo $ress['address']; ?></b>
 </div>
<div class="feecont">
<?php 
	$sale_id = $_REQUEST['sale_id'];
	$sql = mysqli_query($con,"SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id and s.sale_id=$sale_id");
	$result = mysqli_fetch_array($sql);
?>
	</th>
</tr>
<tr><td  colspan="4"><b>Customer Name:</b> <?php echo $result['customer_name']; ?>,<b>Mobile No:</b> <?php echo $result['mobile_no']; ?></td><td  colspan="2">Bill No : <?php echo $_REQUEST['sale_id']; ?></td></tr>
<tr><td colspan="4">Address: <?php echo $result['address']; ?></td> <td  colspan="2">Date : <?php echo $result['entry_data']; ?></td> </tr>
<tr>
	<th width="155">Sl.No</th> 
	<th width="198">Product Name</th> 
	<th width="198">Qty</th> 
	<th width="106">Price</th>  
	<th  width="184">Total Price</th> 
</tr>
<?php 
	$sale_id = $_REQUEST['sale_id'];
	$sql = mysqli_query($con,"SELECT p.product_name,sp.quantity,sp.price FROM sale_product sp,product p WHERE sp.product_id=p.product_id and sp.sale_id=$sale_id");
	$i=1;
	$totAmt = 0;
	while($res = mysqli_fetch_array($sql)){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $res['product_name']; ?></td>
<td align="center"><?php echo $res['quantity']; ?></td>
<td align="center"><?php echo $res['price']; ?></td>
<td align="center"><?php echo ($res['quantity']*$res['price']); ?></td>
<?php $totAmt +=($res['quantity'])*($res['price']); ?>
</tr>
<?php 
	$i++;
	}
?>
<tr>
<th></th>
<th></th>
<th></th>
<th  width="149">Total Amount</th>
<th align="center"><?php echo $totAmt; ?></th>
</tr>
<tr>
<th></th>
<th></th>
<th></th>
<th  width="149">Payment Amount</th>
<th align="center"><?php echo $result['payment_amount']; ?></th>
</tr>


</table>

</div>
</div>
<button type="button" class="btn btn-primary" onclick="printPage('block2')">Print</button>

<script>
function printPage(id)
{
   var html="<html>";
   html+= document.getElementById(id).innerHTML;

   html+="</html>";

   var printWin = window.open('','','left=0,top=0,width=1000,height=auto,toolbar=0,scrollbars=0,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>	