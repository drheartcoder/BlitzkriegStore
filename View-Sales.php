<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Billing</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View Billing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bill No</th>
                                            <th>Company Name</th>
                                            <th>Date</th>
                                            <th>Net Amount</th>
                                            <th>Payment Amount</th>
                                            <th>Balance Amount</th>
                                            <th>Remarks</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$sql = mysql_query("SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id And s.delete_record=0 ORDER BY `s`.`sale_id` DESC");
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $res['sale_id']; ?></td>
                                            <td><?php echo $res['customer_name']; ?></td>
                                            <td><?php echo $res['entry_data']; ?></td>
                                            <td><?php echo $res['net_cash_amt']; ?></td>
                                            <td class="center">
											<?php 
												$sale_id = $res['sale_id'];
												$sqls = mysql_query("SELECT SUM(payment_amount) tot FROM sale_payment WHERE sale_id=$sale_id");
												$respay = mysql_fetch_array($sqls);
												echo $respay['tot']; 
											?>
											</td>
                                            <td class="center"><?php echo (($res['net_cash_amt']) - ($respay['tot'])); ?></td>
                                            <td class="center"><?php echo $res['remark']; ?></td>
											<td class="center"><a target="_blank()" href="view_sale_bill.php?sale_id=<?php echo $res['sale_id']; ?>">View</a> &nbsp <a href="Sale-Entry-Upadte.php?sale_id=<?php echo $res['sale_id']; ?>">Edit</a> &nbsp <a href="Sale-Entry-Delete.php?sale_id=<?php echo $res['sale_id']; ?>">Delete</a></td>
                                        </tr>
									<?php 
										}
									?>	
                                    
                                    </tbody>
                                </table>
                            </div>
                           
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
