<?php include('header.php'); ?>
<script>
function validateDate(){
	if(document.getElementById("first_name").value==""){
		alert("Please Enter First Name");
		return false;
	}else if(document.getElementById("branch_id").value==""){
		alert("Pleas Select Organization/Branch");
		return false;
	}else if(document.getElementById("phone").value==""){
		alert("Pleas Enter Contact No");
		return false;
	}else if(document.getElementById("jdate").value==""){
		alert("Pleas Select Joining Date");
		return false;
	}else if(document.getElementById("gender").value==""){
		alert("Pleas Select Gender");
		return false;
	}else if(document.getElementById("type_id").value==""){
		alert("Pleas Select Department");
		return false;
	}else if(document.getElementById("is_staff").value==""){
		alert("Pleas Select Service Status");
		return false;
	}
	}
function salarycal(){
	//alert('hii');
	var netSalary = document.getElementById("netSalary").value;
	//alert(netSalary);
	
	var basics = Math.round(netSalary/2);
	var hras = Math.round(basics/2);;	
	var con_allo = 1600;
				
	document.getElementById('Basic').value=basics;
	document.getElementById('HRA').value=hras;
	document.getElementById('Coveyance').value=con_allo;
		 
	var tot = (basics+hras+con_allo);
	var spe_allos = (netSalary-tot);
		
	document.getElementById('SpecialAllowance').value=spe_allos;
	
}	
</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Employee</h1>
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
                            <div class="row">
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
					
                                    <form role="form" method="post">
										<div class="col-lg-4">
                                            <label>Staff id :</label>
                                            <p class="help-block">
											<?php
												$sql = mysql_query("SELECT MAX(employee_id) FROM employee");
												$row = mysql_fetch_array($sql);
												$employee_id = $row['MAX(employee_id)'] + 1;
												echo $employee_id; 
											?>
											<input type="hidden"  name="year" value="<?php echo date('Y'); ?>" id="id_comments" rows="7" cols="40" tabindex="1" >
											</p>
                                        </div>
										
										<div class="col-lg-4">
                                            <label>Picture :*</label>
                                            <p class="help-block">
											<input id="uploadFile" type="file" name="picture"/></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>First name :*</label>
                                            <p class="help-block"><input  name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Last Name :*</label>
                                            <p class="help-block"><input  name="last_name" placeholder="Enter Last Name" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Date Of Birth :*</label>
                                            <p class="help-block"><input  value="<?php echo date('Y-m-d'); ?>" type="date" name="dob" id="dob" placeholder="Enter Last Name" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Father Name :</label>
                                            <p class="help-block"><input  name="father_name" placeholder="Enter Father Name" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Qualification :</label>
                                            <p class="help-block"><input  name="qualification" placeholder="Enter Qualification" class="form-control"></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Experience :</label>
                                            <p class="help-block"><input  name="experiance" placeholder="Enter Experience" class="form-control"></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Contact No : * :</label>
                                            <p class="help-block"><input  name="phone" id="phone" placeholder="Enter Contact No" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Email :</label>
                                            <p class="help-block"><input  name="email" placeholder="Enter Email" class="form-control"></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Joining Date : *</label>
                                            <p class="help-block"><input  value="<?php echo date('Y-m-d'); ?>" type="date" name="joining_date" id="jdate"  placeholder="Enter Qualification" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Gender : *</label>
                                            <p class="help-block">
												<select name="gender" id="gender" class="form-control" required>
													<option value="">-- Select Gender--</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Aadhaar Card :</label>
                                            <p class="help-block"><input  name="adhar_card" id="adhar_card" placeholder="Enter Aadhaar Card" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Department : *</label>
                                            <p class="help-block">
												<select name="type_id" id="type_id" class="form-control" required>
													<option value=""> - Select Department- </option>
													<?php
														$sql = mysql_query("SELECT * FROM emp_type");
														while($row = mysql_fetch_array($sql)){
													?>
														<option value="<?php echo $row['type_id']; ?>"> <?php echo $row['emp_type_name']; ?> </option>
													<?php 
														}
													?>	
												</select>
											</p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Service Status : *</label>
                                            <p class="help-block">
												<select name="is_staff" is="is_staff" class="form-control" required >
													<option value="">-- Select --</option>
													<option value="1">In Service</option>
													<option value="0">Resigned</option>
												</select>
											</p>
                                        </div>
										<div class="col-lg-4">
                                            <label>City :</label>
                                            <p class="help-block"><input  name="city" placeholder="Enter City Name" class="form-control" required></p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Permanent Address* :</label>
                                            <p class="help-block">
												<textarea class="form-control" rows="3" name="permanant_add" placeholder="Permanent Address"></textarea>
											</p>
                                        </div>
										<div class="col-lg-4">
                                            <label>Residency Address :</label>
                                            <p class="help-block">
												<textarea class="form-control" rows="3" name="address1" placeholder="Residency Address"></textarea>
											</p>
                                        </div>
										
										
										                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    </form>
									
									
									<?php
	
	if(isset($_GET['y']))
	echo "<b style='color:red;'>Message: Teacher Record Added Successfully!</b>";
	
	if(isset($_POST['submit']))
	{
	 
	if ((($_FILES["picture"]["type"] == "image/gif")
|| ($_FILES["picture"]["type"] == "image/jpeg")
|| ($_FILES["picture"]["type"] == "image/png")
|| ($_FILES["picture"]["type"] == "image/pjpeg"))
&& ($_FILES["picture"]["size"] < 1000000))
{
if ($_FILES["picture"]["error"] > 0)
{
echo "Return Code: " . $_FILES["picture"]["error"] . "<br/>";
exit;
}
else
{
$imagename = $_FILES["picture"]["name"];
move_uploaded_file($_FILES["picture"]["tmp_name"],
"employeeimage/" . $imagename);
}
}
else
{
echo "Invalid file";
}
	
	$token="";
	
	$dob = date("Y-m-d", strtotime($_POST['dob']));
	$joining_date = date("Y-m-d", strtotime($_POST['joining_date']));
	
	$sql = "INSERT INTO employee(type_id,adhar_card,first_name,last_name,dob,father_name,qualification,address1,gender,experiance,phone,
	email,permanant_add,joining_date,picture,year,is_staff,city) VALUES('{$_POST['type_id']}','{$_POST['adhar_card']}','{$_POST['first_name']}','{$_POST['last_name']}','$dob','{$_POST['father_name']}','{$_POST['qualification']}','{$_POST['address1']}','{$_POST['gender']}','{$_POST['experiance']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['permanant_add']}','$joining_date','{$imagename}','{$_POST['year']}','{$_POST['is_staff']}','{$_POST['city']}')";
	
	//echo "Query sql".$sql;
	(mysql_query($sql))? $token="success" : $token="fail";
		
		
		$_SESSION['token']=$token;
	?>
	<script type="text/javascript">
	window.location="Add-Employee.php";
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
