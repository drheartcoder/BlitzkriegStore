<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Date Wise Sale</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter Date
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
								<form method="post">
                                    <thead>
											<th>From Date <input class="form-control" type="date" name="from_data" id="date"></th>
                                            <th>To Date <input class="form-control" type="date" name="to_data" id="date"></th>
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
                            View Date Wise Sale
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
                                    </thead>
                                    <tbody>
									<?php 
										$fdate = date("Y-m-d", strtotime($_POST['from_data']));
										$tdate = date("Y-m-d", strtotime($_POST['to_data']));
										
										$sql = mysql_query("SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id and entry_data>='$fdate' and entry_data<='$tdate' AND s.delete_record=0 ORDER BY `s`.`sale_id` DESC");
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
