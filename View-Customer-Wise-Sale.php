<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Customer Wise Sale</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter Customer Name
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
								<form method="post">
                                    <thead>
											<th>Customer Name <input class="form-control" name="customer_name"></th>
                                            <th><input type="submit" name="submit" class="btn btn-primary"></th>
                                            
                                    </thead>
                                </form>    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			
			<?php 
				if(isset($_POST['submit'])){
			?>
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Customer Wise Sale
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
											<th>Bill No</th>
											<th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Net Amount</th>
                                            <th>Payment Amount</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                    </thead>
                                    <tbody>
									<?php 
										$customer_name = mysql_real_escape_string($_POST['customer_name']);										
										
										
										$sql = mysql_query("SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id and customer_name like '$customer_name%' AND s.delete_record=0 ORDER BY `s`.`sale_id` DESC");
										$i=1;
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr <?php if(($i%2)==0){ echo 'class="success"';}else{ echo 'class="info"'; } ?>>
											<td><?php echo $res['sale_id']; ?></td>
                                            <td><?php echo $res['customer_name']; ?></td>
                                            <td><?php echo $res['entry_data']; ?></td>
                                            <td><?php echo $res['net_cash_amt']; ?></td>
                                            <td class="center"><?php echo $res['payment_amount']; ?></td>
                                            <td class="center"><?php echo $res['remark']; ?></td>
                                            <td class="center"><a target="_blank" href="View-Sale-Bill-Details.php?sale_id=<?php echo $res['sale_id']; ?>">View</a></td>
                                        </tr>
									<?php 
									$i++;
										}
									?>	
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			<?php 
				}
			?>	
				
                
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
