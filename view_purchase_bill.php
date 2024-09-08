<?php include('db/db.php'); ?>
<div class="feewraper" id="block2">


<table width="1002" height="237" border="1" cellspacing="0">
<tr>
	<th colspan="6">
	 <div class="headfee" style="text-align: center;">
 <div class="lobilfee"></div>
	<b style="font-size:50px">GRAND MARBLE & TILES</b><br>
	<b style="font-size:20px">PACHIM PALLY CHOWK, KISHAN GANJ</b>
 </div>
<div class="feecont">
<?php 
	$purchase_id = $_REQUEST['purchase_id'];
	$sql = mysqli_query($con,"SELECT * FROM purchase p,company c WHERE c.company_id=p.company_id and purchase_id=$purchase_id");
	$result = mysqli_fetch_array($sql);
?>
	</th>
</tr>
<tr><td  colspan="4"><b>Company Name:</b> <?php echo $result['company_name']; ?>,<b>Mobile No:</b> <?php echo $result['mobile_no']; ?></td><td  colspan="2">Bill No : <?php echo $_REQUEST['purchase_id']; ?></td></tr>
<tr><td colspan="4">Address: <?php echo $result['address']; ?></td> <td  colspan="2">Date : <?php echo $result['entry_data']; ?></td> </tr>
<tr>
	<th width="155">Sl.No</th> 
	<th width="198">Product Name</th> 
	<th width="198">Qty</th> 
	<th width="106">Price</th>  
	<th  width="184">Total Price</th> 
</tr>
<?php 
	$purchase_id = $_REQUEST['purchase_id'];
	$sql = mysqli_query($con,"SELECT p.product_name,pp.quantity,pp.price FROM purchase_product pp,product p WHERE pp.product_id=p.product_id and pp.purchase_id=$purchase_id");
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
<th> <?php //echo "Balance Amount:".$bln_camt; ?></th>
<th></th>
<th></th>
<th  width="149">Total Amount</th>
<th align="center"><?php echo $totAmt; ?></th>
</tr>
<tr>
<th> <?php //echo "Balance Amount:".$bln_camt; ?></th>
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