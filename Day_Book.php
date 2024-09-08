<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Day Book</h1>
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
											<th>From Date <input class="form-control" value="<?php echo date('Y-m-d'); ?>" type="date" name="from_data" id="date"></th>
                                            <th>To Date <input class="form-control" value="<?php echo date('Y-m-d'); ?>" type="date" name="to_data" id="date"></th>
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
				//if(isset($_POST['submit'])){
			?>
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Day Book
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <div id="block2" >
                <div class="stdtable1" style="height: auto;">
				<form method="post" enctype="multipart/form-data">
              		<table width="697" id="thetable" class="table" >
						<thead>
		<tr>
			<th colspan="5"><b>Day Book Report</b></th>
		</tr>
		<tr>
			<th>S.No</th>
			<th>Date</th>
			<th>To/By</th>
			<th>Particulars</th>
			<th>Dr/Cr</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>	
	 
	<?php
	if(isset($_POST['submit']))
	{
	
		?>
		<div style="display:block">
	<!--	<img src="../../images/final_logo.png"/>
		<img src="../../images/logo.png"/>		-->
			
		<?php
			$date1=date("Y-m-d", strtotime($_POST['from_data']));
			$date2=date("Y-m-d", strtotime($_POST['to_data']));
			
			echo "<br>From Date:<font >".$date1."</font>";
			echo "\t &nbsp;&nbsp; <font >     To Date:".$date2."</font>";
		?>
		</div>
		<?php
			$sql="SELECT t.date, tt.toby, ac.ac_name,tt.drcr, t.amount, db.tid, t.delete_record
FROM account ac, transaction t, transaction_type tt, day_book db
WHERE t.tid = db.tid
AND tt.type_id = db.type_id
AND ac.ac_code = db.ac_code
AND t.delete_record=0
AND t.date>='$date1' and t.date<= '$date2'";
			//echo "<br>SQL: ".$sql."<br>";
				$res=mysql_query($sql);
			$total = 0;	
			while($row=mysql_fetch_array($res))
			{
				?>
				<tr>
					<td><?php echo $row['tid'];?></td>
					<td><?php echo $row['date'];?></td>
					<td><?php echo $row['toby'];?></td>
					<td><?php echo $row['ac_name'];?></td>
					<td><?php echo $row['drcr'];?></td>
					<td><?php echo $row['amount'];?></td>
					<?php $total += $row['amount'];?>
				</tr>	
				<?php	
					}//while ends here...	
			
	} //if ends here..
	
?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total Amount</td>
					<td><?php echo $total;?></td>
				</tr>
 
		</tbody>
				
                    </table>
					
					<!--<a href="export_db_doc.php?date1=<?php echo $date1; ?>&date2=<?php echo $date2; ?>&branch_id=<?php echo $branch_id; ?>"> <img src='../images/word.jpg' style='height:45px;width:70px;margin-left: 275px;'> </a>-->	
					</form>
                  </div>
                  </div>	
					
					

					
					
						<input type="submit" name="submit" onclick="printPage('block2');" value="Print" style="float: right;">
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			<?php 
				//}
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
	<script>
function printPage(id)
{
   var html="<html>";
   html+= document.getElementById(id).innerHTML;

   html+="</html>";

   var printWin = window.open('','','left=0,top=0,width=500,height=500,toolbar=0,scrollbars=0,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>

</body>

</html>
