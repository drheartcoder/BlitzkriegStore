<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Stock Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
						
			
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
