<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Today Total Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
						
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Sale Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
											<th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Net Amount</th>
                                            <th>Payment Amount</th>
                                            <th>Remarks</th>
                                    </thead>
                                    <tbody>
									<?php 
									
										$date = date('Y-m-d');										
										
										$sql = mysql_query("SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id and entry_data='$date' ORDER BY `s`.`sale_id` DESC");
										$i=1;
										$totalSaleAmount = 0;
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr <?php if(($i%2)==0){ echo 'class="success"';}else{ echo 'class="info"'; } ?>>
                                            <td><?php echo $res['customer_name']; ?></td>
                                            <td><?php echo $res['entry_data']; ?></td>
                                            <td><?php echo $res['net_cash_amt']; ?></td>
                                            <td class="center"><?php echo $res['payment_amount']; ?></td>
											<?php $totalSaleAmount +=$res['payment_amount']; ?>
                                            <td class="center"><?php echo $res['remark']; ?></td>
                                        </tr>
									<?php 
									$i++;
										}
									?>	
									
										<tr class="warning">
                                            
                                            <td></td>
                                            <td></td>
                                            <td>Total Payment : </td>
											<td class="center"><?php echo ($totalSaleAmount); ?></td>
											<td></td>
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
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Purchase Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
											<th>Bill No</th>
											<th>Company Name</th>
                                            <th>Date</th>
                                            <th>Net Amount</th>
                                            <th>Payment Amount</th>
                                            <th>Balance Amount</th>
                                            <th>Remarks</th>
                                    </thead>
                                    <tbody>
									<?php 
									
										$date = date('Y-m-d');										
										
										$sql = mysql_query("SELECT * FROM purchase p,company c WHERE c.company_id=p.company_id and entry_data='$date' ORDER BY `p`.`purchase_id` DESC");
										$i=1;
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr <?php if(($i%2)==0){ echo 'class="success"';}else{ echo 'class="info"'; } ?>>
                                            <td><?php echo $res['purchase_id']; ?></td>
                                            <td><?php echo $res['company_name']; ?></td>
                                            <td><?php echo $res['entry_data']; ?></td>
                                            <td><?php echo $res['net_cash_amt']; ?></td>
                                            <td class="center">
											<?php 
												$purchase_id = $res['purchase_id'];
												$sqls = mysql_query("SELECT SUM(payment_amount) tot FROM purchase_payment WHERE purchase_id=$purchase_id");
												$respay = mysql_fetch_array($sqls);
												echo $respay['tot']; 
											?></td>
                                            <td class="center"><?php echo (($res['net_cash_amt']) - ($respay['tot'])); ?></td>
                                            <td class="center"><?php echo $res['remarks']; ?></td>
                                        </tr>
									<?php 
									$i++;
										}
									?>
									
										<tr class="warning">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
											<td class="center"><?php //echo ($totalAmount); ?></td>
											<td></td>
											<td></td>
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
				
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Expenses Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
											<th>Expenses Name</th>
                                            <th>Date</th>
                                            <th>Remarks</th>
											<th>Amount</th>
                                    </thead>
                                    <tbody>
									<?php 
										$date = date('Y-m-d');
										$sql = mysql_query("SELECT * FROM expenses WHERE entry_date='$date'");
										$i=1;
										$totalExpensesAmount = 0; 
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr <?php if(($i%2)==0){ echo 'class="success"';}else{ echo 'class="info"'; } ?>>
                                            <td><?php echo $res['expenses_name']; ?></td>
                                            <td><?php echo $res['amount']; ?></td>
                                            <td><?php echo $res['entry_date']; ?></td>
                                            <td class="center"><?php echo $res['remarks']; ?></td>
											<?php $totalExpensesAmount +=($res['amount']); ?>
                                        </tr>
									<?php 
									$i++;
										}
									?>	
									
										<tr class="warning">
                                            <td></td>
                                            <td></td>
                                            <td>Total Amount : </td>
											<td class="center"><?php echo ($totalExpensesAmount); ?></td>
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
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Stock Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
											<th>Customer Name</th>
											<th>Product Type</th>
                                            <th>Quantity/Box</th>
                                            <th>Piece</th>
                                            <th>Sale Price</th>
                                            <th>Stock Value</th>
                                    </thead>
                                    <tbody>
									<?php 
									
										$sql = mysql_query("SELECT * FROM product ORDER BY `product_name` DESC");
										$i=1;
										$totalAmount = 0; 
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr <?php if(($i%2)==0){ echo 'class="success"';}else{ echo 'class="info"'; } ?>>
                                            <td><?php echo $res['product_name']; ?></td>
                                            <td class="center"><?php if($res['product_type'] == 1){ echo "Marbel"; }else{ echo "Tiles"; } ?></td>
                                            <td><?php echo $res['quantity']; ?></td>
                                            <td><?php echo $res['piece']; ?></td>
                                            <td><?php echo $res['price']; ?></td>
                                            <td><?php echo ($res['quantity']*$res['price']); ?></td>
											<?php $totalAmount +=($res['quantity']*$res['price']); ?>
                                        </tr>
									<?php 
									$i++;
										}
									?>	
									
										<tr class="warning">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Stock Values : </td>
											 <td class="center"><?php echo ($totalAmount); ?></td>
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
