<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Sale Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Sale Details
                        </div>
<?php 							
	$sqls = mysql_query("SELECT * FROM business_details");													
	$ress = mysql_fetch_array($sqls);
 
	$sale_id = $_REQUEST['sale_id'];
	$sql = mysqli_query($con,"SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id and s.sale_id=$sale_id");
	$result = mysqli_fetch_array($sql);
	if($result['delete_record'] == 0){ 
?>						
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

<table width="100%" height="237" border="1" cellspacing="0">

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
                            <!-- /.table-responsive -->
                        </div>
<?php 
	}
?>						
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Purchase Payment Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
											<th>Sl.No</th>
											<th>Bill No</th>
											<th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Net Amount</th>
                                            <th>Payment Amount</th>
                                            <th>Remarks</th>
                                    </thead>
                                    <tbody>
									<?php 
										$sale_id = $_REQUEST['sale_id'];										
										$sql = mysql_query("SELECT c.customer_name,sp.entry_data,sp.payment_amount,s.net_cash_amt,sp.remark FROM sale s,customer c,sale_payment sp WHERE c.customer_id=s.customer_id and sp.sale_id=s.sale_id and sp.sale_id='$sale_id'");
										$i=1;
										$payAmt = 0;
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr <?php if(($i%2)==0){ echo 'class="success"';}else{ echo 'class="info"'; } ?>>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $_REQUEST['sale_id']; ?></td>
                                            <td><?php echo $res['customer_name']; ?></td>
                                            <td><?php echo $res['entry_data']; ?></td>
                                            <td><?php echo $netAmt = $res['net_cash_amt']; ?></td>
                                            <td>
												<?php 
													echo $res['payment_amount']; 
													$payAmt +=$res['payment_amount'];
												?>
											</td>
                                            <td class="center"><?php echo $res['remark']; ?></td>
                                        </tr>
									<?php 
									$i++;
										}
									?>	
									
									<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Balance Amount</td>
                                            <td><?php echo ($netAmt - $payAmt); ?></td>
                                            <td class="center"></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			
				
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
