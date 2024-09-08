<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cash Book</h1>
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
                            View Date Wise Sale
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <div id="block2">
                                <table width="697" id="thetable" class="table" >
                    <thead>
		<tr>
			<th colspan="5"><b>Cash Book Report</b></th>
		</tr>
		<tr>
			<th>Date</th>
			<th>to/by</th>
			<th>Particulars</th>
			<th>Dr/Cr</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>	
	
	<?php
	
	
	if(isset($_POST['submit']) || (isset($_SESSION['d1']) && isset($_SESSION['d2']) ))
	{
		
		
		
		if(isset($_SESSION['brid']) ){
			$branch_id = $_SESSION['brid'];
			//echo "Inside submit.... session  branch: ".$branch_id;
		}
		
		$from_data = date("Y-m-d", strtotime($_POST['from_data']));
		$newDate = date("Y-m-d", strtotime($_POST['to_data']));
		
		if(isset($_SESSION['d2'])){
			$date1 = $_SESSION['d1'];
		}if(isset($from_data)){
			$date1=$from_data;
		}
		
		
		if(isset($_SESSION['d2']) ){
			$date2=$_SESSION['d2'];
		}if(isset($newDate)){
			$date2=$newDate;
		}
		
		//echo "<br>Date1: ".$date1;
		//echo "<br>Date2: ".$date2;
		//echo "<br>Branch: ".$branch_id;
		
		$_SESSION['d1'] = $date1;
		$_SESSION['d2'] = $date2;
		$_SESSION['brid'] = $branch_id;
	
		
		
		?>
		<div style="display:block">
	<!--	<img src="../../images/final_logo.png"/>
		<img src="../../images/logo.png"/>		-->
				
		<?php
			
			echo "<br>From Date:<font >".$date1."</font>";
			echo "\t &nbsp;&nbsp; <font >     To Date:".$date2."</font>";
		?>
		</div>
		<?php
		$limit = 10;
			
			$query = "SELECT count(*) num 
			FROM account ac, transaction t, transaction_type tt, cash_book cb
			WHERE t.tid = cb.tid
			AND tt.type_id = cb.type_id
			AND ac.ac_code = cb.ac_code";
			if(isset($branch_id))
			$query.=" AND t.date>='$date1' and t.date<= '$date2'";
			
				
			//echo "Count query: "; 	
			//echo $query;
			
			$total_pages = mysql_fetch_array(mysql_query($query));
			$total_pages = $total_pages['num'];
			
			$stages = 3;
	$page = mysql_escape_string($_GET["page"]);
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}
			
			$sql="SELECT t.date, tt.toby, ac.ac_name, tt.drcr, t.amount
			FROM account ac, transaction t, transaction_type tt, cash_book cb
			WHERE t.tid = cb.tid
			AND tt.type_id = cb.type_id
			AND ac.ac_code = cb.ac_code
			AND t.date>='$date1' and t.date<= '$date2'
			ORDER BY t.date
			LIMIT $start, $limit";
		
		//echo "<br>SQL: ".$sql."<br>";
				$res=mysql_query($sql);
			while($row=mysql_fetch_array($res))
			{
				?>
				<tr>
					<td><?php echo $row['date'];?></td>
					<td><?php echo $row['toby'];?></td>
					<td><?php echo $row['ac_name'];?></td>
					<td><?php echo $row['drcr'];?></td>
					<td><?php echo $row['amount'];?></td>
				</tr>	
				<?php	
					}//while ends here...	
			
	} //if ends here..
	
	 $sql1="SELECT SUM(t.amount) Debit
FROM account ac, transaction t, transaction_type tt, cash_book cb
WHERE t.tid = cb.tid
AND tt.type_id = cb.type_id
AND ac.ac_code = cb.ac_code
AND tt.drcr='Debit'
AND t.date>='$date1' and t.date<= '$date2'";
	
	$sql2="SELECT SUM(t.amount) Credit
FROM account ac, transaction t, transaction_type tt, cash_book cb
WHERE t.tid = cb.tid
AND tt.type_id = cb.type_id
AND ac.ac_code = cb.ac_code
AND tt.drcr='Credit'
AND t.date>='$date1' and t.date<= '$date2'";
				
				//echo "<br>SQL1: ".$sql1;
				//echo "<br>SQL2: ".$sql2."<br>";
				
				
				$res1=mysql_query($sql1);
				$row1=mysql_fetch_array($res1);
				$res2=mysql_query($sql2);
				$row2=mysql_fetch_array($res2);
				$dr=$row1['Debit'];
				$cr=$row2['Credit'];				
	?>
			
			<tfoot>
		<tr>
			<th scope="row">Total Debit</th>
			<td colspan="3"></td>
			<td><?php echo round($dr,2);?></td>
		</tr>
		<tr>
			<th scope="row">Total Credit</th>
			<td colspan="3"></td>
			<td><?php echo round($cr,2);?></td>
		</tr>
		<tr>
			<th scope="row">By Closing Balance</th>
			<td colspan="3"></td>
			<td><?php if($dr>$cr){?>
						<?php echo"<font color='green'/>".round($dr-$cr,2);?>
					<?php }else echo "<font color='red'/>".round($cr-$dr,2); ?>
			</td>
		</tr>
		</tfoot>
 
		</tbody>
				
                    </table>
			</div>		
					
					
<div class="pagi">

<?php
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	
	$paginate = '';
	if($lastpage > 1)
	{	
	

	
	
		$paginate .= "<div class='paginate'>";
		// Previous
		if ($page > 1){
			$paginate.= "<a href='Cash_Book.php?page=$prev'>previous</a>";
		}else{
			$paginate.= "<span class='disabled'>previous</span>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='Cash_Book.php?page=$counter'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='Cash_Book.php?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='Cash_Book.php?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='Cash_Book.php?page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='Cash_Book.php?page=1'>1</a>";
				$paginate.= "<a href='Cash_Book.php?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='Cash_Book.php?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='Cash_Book.php?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='Cash_Book.php?page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='Cash_Book.php?page=1'>1</a>";
				$paginate.= "<a href='Cash_Book.php?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='Cash_Book.php?page=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<a href='Cash_Book.php?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
			
		$paginate.= "</div>";		
	
	
}
 echo $total_pages.' Results';
 // pagination
 echo $paginate;
?>

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
<style>
.paginate {
font-family:Arial, Helvetica, sans-serif;
	padding: 3px;
	margin: 3px;
}

.paginate a {
	padding:2px 5px 2px 5px;
	margin:2px;
	border:1px solid #999;
	text-decoration:none;
	color: #666;
}
.paginate a:hover, .paginate a:active {
	border: 1px solid #999;
	color: #000;
}
.paginate span.current {
    margin: 2px;
	padding: 2px 5px 2px 5px;
		border: 1px solid #999;
		
		font-weight: bold;
		background-color: #999;
		color: #FFF;
	}
	.paginate span.disabled {
		padding:2px 5px 2px 5px;
		margin:2px;
		border:1px solid #eee;
		color:#DDD;
	}
	
	
.pagi{

margin-left:104px;
}	
	
</style>
</body>

</html>
