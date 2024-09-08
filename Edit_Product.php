<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product</h1>
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
						$product_id = $_REQUEST['product_id'];
						$sqls = mysql_query("SELECT * FROM product WHERE product_id=$product_id");
						$res = mysql_fetch_array($sqls);
					?>
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Product Name</label>
                                            <p class="help-block"><input class="form-control"   name="product_name" id="product_name" value="<?php echo $res['product_name']; ?>" placeholder="Product Name" required readonly></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Sale Price*:</label>
                                            <input class="form-control" name="price" id="price" value="<?php echo $res['price']; ?>" onkeypress="return validateNumber(event)" placeholder="Sale Price" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Product Quantity:</label>
                                            <input class="form-control" name="quantity" id="quantity" class="form-control" value="<?php echo $res['quantity']; ?>" onkeypress="return validateNumber(event)" placeholder="Product Quantity" required>
                                        </div>
                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control" name="category_id" required>
                                                <option value="">- Select Type -</option>											
											<?php 
												$sql = mysql_query("SELECT * FROM product_category");
												while($ress = mysql_fetch_array($sql)){
											?>		
												<option value="<?php echo $ress['category_id']; ?>" <?php if($ress['category_id'] == $res['category_id']){ echo "selected"; } ?>> <?php echo $ress['category_name']; ?> </option>
											<?php 
												}
											?>													
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Price*:</label>
                                            <input class="form-control" name="myprice" id="myprice" value="<?php echo $res['myprice']; ?>" onkeypress="return validateNumber(event)" placeholder="Price" required>
                                        </div>
										<div class="form-group">
                                            <label>Description:</label>
											<textarea class="form-control" rows="3" name="product_desc" placeholder="Product Description"><?php echo $res['product_desc']; ?></textarea>
                                        </div>
										
                                        </fieldset>
                                    
                                    
                                    
                                    </form>
					<?php

						if(isset($_POST['submit'])){
							
							$product_id = $_REQUEST['product_id'];
							$quantity = mysql_real_escape_string($_POST['quantity']);
							$price = mysql_real_escape_string($_POST['price']);
							$myprice = mysql_real_escape_string($_POST['myprice']);
							$category_id = mysql_real_escape_string($_POST['category_id']);
							$product_desc = mysql_real_escape_string($_POST['product_desc']);
							
							$sqls = mysql_query("SELECT quantity FROM product WHERE product_id=$product_id");
							$res = mysql_fetch_array($sqls);

							if($res['quantity']>$quantity){	
								echo "<b style='color:red'>Record Could Not Be Edited!</b>";
							}else{
							$sql = mysql_query("UPDATE product SET price='$price',myprice='$myprice',quantity='$quantity',category_id='$category_id' WHERE product_id=$product_id");

							if($sql){
								echo "<b style='color:red'>Product Update Successfully</b>";
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
