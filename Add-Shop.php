<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Shop/Business Details</h1>
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
                                <div class="col-lg-6">
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Shop/Business Details Name</label>
                                            <p class="help-block"><input class="form-control"  name="business_name" id="business_name" placeholder="Shop/Business Details Name" required></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>E-mail*:</label>
                                            <input class="form-control" name="email_id" id="email_id" placeholder="Email Id">
                                        </div>
                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Mobile No</label>
                                            <input class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile No" required>
                                        </div>
										<div class="form-group">
                                            <label>Address*:</label>
                                            <textarea class="form-control" rows="3" name="address" id="address" required></textarea>
                                        </div>
										
                                        </fieldset>
                                    
                                    
                                    
                                    </form>
					<?php

						if(isset($_POST['submit'])){
							
							$business_name = mysql_real_escape_string($_POST['business_name']);
							$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
							$email_id = mysql_real_escape_string($_POST['email_id']);
							$address = mysql_real_escape_string($_POST['address']);
							
							$sqls = mysql_query("SELECT * FROM business_details");
							if(mysql_num_rows($sqls)>0){
								
								echo "<script type='text/javascript'> alert('Already Added......!'); window.location.href = 'Add-Shop.php';</script>";
							}else{							

							$sql = "INSERT INTO business_details (`business_name`,`mobile_no`,`email_id`, `address`) VALUES ('$business_name','$mobile_no','$email_id','$address')";

							mysql_query($sql);


							echo "<script type='text/javascript'> alert('SuccessFully Added......!'); window.location.href = 'Add-Shop.php';</script>";
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
	
	
	var business_name = jQuery("#business_name").val();
	var mobile_no = jQuery("#mobile_no").val();
	var address = jQuery("#address").val();
	    
	if(business_name == ''){
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
