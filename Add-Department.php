<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Department</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
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
                            <div class="row">
                                <div class="col-lg-6">
					
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Department Name:</label>
                                            <p class="help-block"><input class="form-control" name="emp_type_name" placeholder="Enter Department Name" required></p>
                                        </div>
										                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                                                      
                                    
                                    
                                    </form>
			<?php 

			if (isset($_POST['submit']))
				{
					$token="";
					
					$emp_type_name = $_POST['emp_type_name'];
					
					
					$description = mysql_real_escape_string($_POST['description']);
										
					$sqls = mysql_query("SELECT * FROM emp_type WHERE emp_type_name='$emp_type_name'");
						if(mysql_num_rows($sqls)>0){
							echo "<b style='color:red'>Already Created.</b>";
							exit;
						}
					
					
					$sql  = "INSERT INTO emp_type (emp_type_name,branch_id) VALUES ('$emp_type_name','$branch_id')";


					(mysql_query($sql))? $token="success" : $token="fail";
					$_SESSION['token']=$token;
				?>
		
			<script type="text/javascript">
				window.location="Add-Department.php";				
			</script>
	
			<?php
				}
			?>
					
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View Employee
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Employee Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 							
										$sql = mysql_query("SELECT * FROM emp_type");													
										$i=1;														
										while($res = mysql_fetch_array($sql)){					
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $res['emp_type_name']; ?></td>
                                            <td class="center"><a href="#">Edit</a></td>
                                        </tr>
									<?php 
									$i++;
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>

	<script type="text/javascript">
	$(function(){
	 $(document).on('click','#submit',function(){ 
	
	
	var username = jQuery("#username").val();
	var password = jQuery("#password").val();
	var is_admin = jQuery("#is_admin").val();
	    
	if(username == ''){
			 alert("Company Name Required");
			 return false;
		 }
	
			
	
	var regphone = /^\d{10}$/;
	if(password == '' || isNaN(password) || !password.match(regphone)){
		alert("Enter the Valid Mobile Number");
		return false;
	}
	
	
	
	
	if(is_admin == ''){
			 alert("Address Required");
			 return false;
		 }
	
	

		});
	});

	</script>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
