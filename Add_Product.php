<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Product</h1>
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
                                            <label>Product Name</label>
                                            <p class="help-block"><input class="form-control"  name="product_name" id="product_name" placeholder="Product Name" required></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Sale Price*:</label>
                                            <input class="form-control" name="price" id="price" onkeypress="return validateNumber(event)" placeholder="Sale Product Price" required>
                                        </div>
                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control" name="category_id" id="category_id" required>
                                                <option value="">- Select Type -</option>
											<?php 
												$sql = mysql_query("SELECT * FROM product_category");
												while($res = mysql_fetch_array($sql)){
											?>		
												<option value="<?php echo $res['category_id']; ?>"> <?php echo $res['category_name']; ?> </option>
											<?php 
												}
											?>											
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Price*:</label>
                                            <input class="form-control" name="myprice" id="myprice" onkeypress="return validateNumber(event)" placeholder="Product Price" required>
                                        </div>
                                        </fieldset>
                                    
                                    
                                    
                                    </form>
					<?php

						if(isset($_POST['submit'])){
							
							$product_name = mysql_real_escape_string($_POST['product_name']);
							$price = mysql_real_escape_string($_POST['price']);
							$myprice = mysql_real_escape_string($_POST['myprice']);
							$category_id = mysql_real_escape_string($_POST['category_id']);
							
														
							$sqls = mysql_query("SELECT product_name FROM product WHERE product_name='$product_name' AND  category_id='$category_id'");
							if(mysql_num_rows($sqls)>0){
								echo "<b style='color:red'>Product Already Added</b>";
							}else{
								mysql_query("SET sql_mode = ''");
							$sql = mysql_query("INSERT INTO product (`product_name`,`price`,`myprice`,`category_id`) VALUES ('$product_name','$price','$myprice','$category_id')");

							if($sql){
								echo "<b style='color:red'>Product Added Successfully</b>";
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
	
	
	var product_name = jQuery("#product_name").val();
	var category_id = jQuery("#category_id").val();
	var price = jQuery("#price").val();
	    
	if(company_name == ''){
			 alert("Product Name Required");
			 return false;
		 }   
	    
	if(category_id == ''){
			 alert("Category Name Required");
			 return false;
		 }   
		 
	if(price == ''){
			 alert("Price Required");
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
