<?php include('header.php'); ?>
<script>
function validateDate(){
	if(document.getElementById("branch_id").value==""){
		alert("Please Enter Organization Name");
		return false;
	}
	else if(document.getElementById("class_id").value==""){
		alert("Pleas Select Class Name");
		return false;
	}
	else if(document.getElementById("section_id").value==""){
		alert("Pleas Select Section Name");
		return false;
	}
	else if(document.getElementById("form_date").value==""){
		alert("Pleas Select Date");
		return false;
	}
	}
	
	function checkPresent(index){
	alert(index);
	document.getElementById("hid_present"+index).value="1";
}
function markChecked(cb,index){
	if(cb.checked==false)
		document.getElementById("hid_present"+index).value="0";
	//alert("Checked="+cb.checked);
	
	if(cb.checked==true)
		document.getElementById("hid_present"+index).value="1";
}
</script>

<script>
    function toggle_visibility(id) {
	var e = document.getElementById(id);
	//e.style.display = ((e.style.display!='none') ? 'none' : 'block');
	document.getElementById(id).innerHTML = '<b style="color:red">Absent</b>';
	}
  </script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Employee-Attendance</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12">
							
	<?php
		if(isset($_SESSION['token'])){
			echo getTokenMessage($_SESSION['token']);
			unset($_SESSION['token']);
		}
		if(!isset($_SESSION)){
			echo "Session Is Not Set!";
		}
		if(isset($_GET['token'])){
			echo getTokenMessage($_GET['token']);
		}
	?>		
							
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employee-Attendance
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
								<form method="post">	
                                    <tbody>
									
									<?php
										$att_date=$_POST['att_date'];
										$sql= mysql_query("SELECT * FROM employee");
										$i=1;
										while($row=mysql_fetch_array($sql)){
									?>
                                        <tr>
                                            <td>
												<input type="hidden" name="roll_no[]" value="<?php echo $row['employee_id'];?>" id="<?php echo "roll_no".$i;?>" width="20" readonly />
												<?php echo $row['employee_id'];?>	
										</td>
                                        <td>
											<input type="hidden" name="stud_name" id="stud_id" value="<?php echo $row['first_name'];?>" onblur="checkPresent(<?php echo $i;?>)" readonly />
											<input type="hidden" name="hid_present[]" id="<?php echo "hid_present".$i;?>" />
											<?php echo $row['first_name'];?>
										</td>
                                            <td>
											<div class="checkbox">
                                                <label>
													<input type="checkbox" name="present[]" id="<?php echo "present".$i;?>" checked onclick="markChecked(this,<?php echo $i;?>);toggle_visibility('<?php echo $i; ?>');"/><b id='<?php echo $i; ?>'>Present</b>
                                                </label>
                                            </div>
											</td>
                                            
                                        </tr>
									<?php 
									$i++;
										}
									?>	
                                    <tr>
                                        <td></td>
                                        <td>
											<div class="col-lg-4">
                                            <label>Attendance Date*:</label>
                                            <input value="<?php echo date('Y-m-d'); ?>" type="date" name="entry_data" id="date" required>
											</div>
										</td>
                                        <td>
											<input type="submit" name="submit" class="btn btn-primary">
										</td>
									</tr>    
                                    
                                    </tbody>
								</form>

<?php
			if(isset($_POST['submit'])){
				
				$date = date("Y-m-d", strtotime($_POST['entry_data']));
							
				try{
					$token="";
					$dbh = getConnection();
					$dbh->beginTransaction();
				
							
				
				
				$count=count($_POST['hid_present']);
				$present=$_POST['hid_present'];
			
				//echo "Count=".$count;
				$i=0;
				while($i<$count){
					if($present[$i]=="")
						$present[$i]="P";
					else
						$present[$i]="A";
				 $i++;
				}
				//echo "<br>";

				foreach($present as $x){
					if($x=="1")
						echo "<br> Present";
					else if($x=="0")
						echo "<br> Absent";
				}
					
			$roll_no=$_POST['roll_no'];	
			//var_dump($roll_no);	
			$date=$_POST['entry_data'];
			//echo "<br>Date<br>".$date;
			$repatt="SELECT * from employee_attendance where attend_date='$date'";
			//echo "<br> date query: ".$repatt;
			$sth = $dbh->query($repatt);
			 if($sth->rowCount()>0){
			 echo "<b style='color:red;font-size: 20px;'> Attendance ".$date." has already been submitted!</b></font>";
			 exit();
		 }
			
			$sql = "INSERT into employee_attendance(attend_date) values('$date')";
			//echo "<br>SQl: ".$sql;
			$sth = $dbh->exec($sql) or die(mysql_error());
			
			
			$atid=$dbh->lastInsertId(); //Getting recently inserted max attendance id
		
			
		
			$i=0;
			while($i<$count){
			$sql2="insert into branch_attendance(employee_id,attendance_id,remark) VALUES('$roll_no[$i]',$atid,'$present[$i]')";
				//echo "<br>SQL1: ".$sql2;
			$sth = $dbh->exec($sql2);
					
			$i++;
			
			}	
			echo "<b style='color:red;'>Attendance records has been saved successfully!</b>";
		// if($i==$count)
			// $token="success";
			// echo "<b style='color:red;'>Attendance records has been saved successfully!</b>";
			
		// }else{
			// $token="fail" ;
			// echo "<b style='color:red;'>Please select Branch and press submit button!</b>";
		// }
	
		
		$dbh->commit();
		$token="success";
		$_SESSION['token']=$token;
		}
		catch(PDOException $e){
		echo $e;
		echo $e->getMessage();
		try{
			$dbh->rollback();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>
	<script type="text/javascript">
		window.location="Employee-Attendance.php";				
	</script>
			
		<?php	
 }
		?>


								
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                           
                        </div>
                        <!-- /.panel-body -->
                   
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
