<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
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
					<?php 
						$category_id = $_REQUEST['category_id'];
						$sqls = mysql_query("SELECT * FROM product_category WHERE category_id=$category_id");
						$res = mysql_fetch_array($sqls);
					?>
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Category Name</label>
                                            <p class="help-block"><input class="form-control"   name="category_name" id="category_name" value="<?php echo $res['category_name']; ?>" placeholder="Category Name" required></p>
                                        </div>
										                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                    
                                    
                                    
                                    </form>
					<?php

						if(isset($_POST['submit'])){
							
							$category_id = $_REQUEST['category_id'];
							$category_name = $_POST['category_name'];
														
							$sqls = mysql_query("SELECT category_name FROM product_category WHERE category_name=$category_name");
							$res = mysql_fetch_array($sqls);

							if($res['quantity']>$quantity){	
								echo "<b style='color:red'>Record Could Not Be Edited!</b>";
							}else{
							$sql = mysql_query("UPDATE product_category SET category_name='$category_name' WHERE category_id=$category_id");

							if($sql){
								echo "<b style='color:red'>Category Update Successfully</b>";
							}
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
