<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Company</h1>
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
					<?php 
						$company_id = $_REQUEST['company_id'];
						$sqls = mysql_query("SELECT * FROM company WHERE company_id=$company_id");
						$res = mysql_fetch_array($sqls);
					?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Company Name</label>
                                            <p class="help-block"><input class="form-control"  name="company_name" id="company_name" value="<?php echo $res['company_name']; ?>" placeholder="Company Name" required></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>E-mail*:</label>
                                            <input class="form-control" name="email_id" id="email_id" value="<?php echo $res['email_id']; ?>" placeholder="Email Id">
                                        </div>
                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Mobile No</label>
                                            <input class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $res['mobile_no']; ?>" maxlength="10" placeholder="Mobile No" required>
                                        </div>
										<div class="form-group">
                                            <label>Address*:</label>
                                            <textarea class="form-control" rows="3" name="address" id="address" required><?php echo $res['address']; ?></textarea>
                                        </div>
										
                                        </fieldset>
                                    
                                    
                                    
                                    </form>
					<?php

						if(isset($_POST['submit'])){
							$company_id = $_REQUEST['company_id'];
							$company_name = mysql_real_escape_string($_POST['company_name']);
							$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
							$email_id = mysql_real_escape_string($_POST['email_id']);
							$address = mysql_real_escape_string($_POST['address']);
							
							$sqls = mysql_query("SELECT * FROM company WHERE mobile_no='$mobile_no'");
							if(mysql_num_rows($sqls)>0){
								
								echo "<script type='text/javascript'> alert('Already Added......!'); window.location.href = 'View-Company.php';</script>";
							}else{							
	
							$sql = "UPDATE company SET company_name='$company_name',mobile_no='$mobile_no',email_id='$email_id',address='$address' WHERE company_id=$company_id";

							mysql_query($sql);


							echo "<script type='text/javascript'> alert('SuccessFully Added......!'); window.location.href = 'View-Company.php';</script>";
							}
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
	
	
	var company_name = jQuery("#company_name").val();
	var mobile_no = jQuery("#mobile_no").val();
	var address = jQuery("#address").val();
	    
	if(company_name == ''){
			 alert("Company Name Required");
			 return false;
		 }
	
			
	
	var regphone = /^\d{10}$/;
	if(mobile_no == '' || isNaN(mobile_no) || !mobile_no.match(regphone)){
		alert("Enter the Valid Mobile Number");
		return false;
	}
	
	
	
	
	if(address == ''){
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
