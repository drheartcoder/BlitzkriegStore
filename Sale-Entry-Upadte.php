<?php include('header.php'); ?>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
$(function() {
    $('#row_dim').hide(); 
    $('#type').change(function(){
        if($('#type').val() == 'bank') {
            $('#row_dim').show(); 
        } else {
            $('#row_dim').hide(); 
        } 
    });
});
</script>

<script>
	
	function populateProduct(category_id,cid){
	//alert("category id: "+category_id);
	//alert(cid);
	//alert("hiii");
    var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            var res=xmlhttp.responseText;
			//alert(res);
            document.getElementById("product"+cid+"").innerHTML=res;
            }
          }
	xmlhttp.open("GET","populate_product_name.php?category_id="+category_id,true);
	xmlhttp.send();
}
</script>


<script type="text/javascript">
function populateCustomerId(mobile_no){
	//alert(mobile_no);
 var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            var res=xmlhttp.responseText;
			//alert("Response: "+res);
			var parser=new DOMParser();
			  var xmlDoc=parser.parseFromString(xmlhttp.responseText,"text/xml");
			  var name = xmlDoc.getElementsByTagName("student_name");
			 //alert("Name: "+name);
			 //alert("Name: "+name[1].childNodes[0].nodeValue);
			 
			  // var value=name[0].childNodes[0].nodeValue;
			  // if(parseInt(value)==-1){
				// alert("Stud Id"+mobile_no+" doesn't exist. Please check the Stud Id!");
				// return;
			  // }
			  
			  document.getElementById('customer_name').value=name[1].childNodes[0].nodeValue;
			  document.getElementById('mobile_no').value=name[2].childNodes[0].nodeValue;
			  document.getElementById('address').value=name[4].childNodes[0].nodeValue;
			  var val=name[3].childNodes[0].nodeValue;
			  
            }
          }
        xmlhttp.open("GET","populate_customer.php?mobile_no="+mobile_no,true);
        xmlhttp.send();	
}



function populatePrice(product_id,obj){
	
	var rateId = obj;
	
	//alert(product_id);
	//alert(rateId);
 var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            var res=xmlhttp.responseText;
			//alert("Response: "+res);
			var parser=new DOMParser();
			  var xmlDoc=parser.parseFromString(xmlhttp.responseText,"text/xml");
			  var name = xmlDoc.getElementsByTagName("student_name");
			 //alert("Name: "+name);
			 //alert("Name: "+name[1].childNodes[0].nodeValue);
			 
			  // var value=name[0].childNodes[0].nodeValue;
			  // if(parseInt(value)==-1){
				// alert("Stud Id"+mobile_no+" doesn't exist. Please check the Stud Id!");
				// return;
			  // }
			  
			  document.getElementById(rateId).value=name[1].childNodes[0].nodeValue;
			  var val=name[3].childNodes[0].nodeValue;
			  
            }
          }
        xmlhttp.open("GET","populate_product.php?product_id="+product_id,true);
        xmlhttp.send();	
}





function validateNumber(evt) {
		
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       
	}
</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Billing Update</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Billing Update
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
                                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter Bill No 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<form method="post">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
									
                                        <tr>
                                            <td>Enter Bill No</td>
                                            <td><input class="form-control" name="bill_no" placeholder="Enter Bill No" value="<?php if(isset($_REQUEST['sale_id'])){ echo $_REQUEST['sale_id']; } ?>" required></td>
                                            <td><input type="submit" name="billsubmit" class="btn btn-primary"></td>
                                        </tr>
									
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
							
						</form>
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                            </div>
				<?php 
					if(isset($_POST['billsubmit'])){
						$bill_no = $_POST['bill_no'];
						$sql = mysql_query("SELECT * FROM sale s,customer c WHERE s.customer_id=c.customer_id AND s.sale_id=$bill_no");
						$result = mysql_fetch_array($sql);
						
					?>	
						 <form role="form" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                   
										<div class="form-group">
                                            <label>Bill No</label>
                                            <p class="help-block"> <input type="hidden" class="form-control" name="bill_no" value="<?php echo $bill_no; ?>" readonly><?php echo $bill_no; ?></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Customer  Name*:</label>
                                            <input class="form-control" name="customer_name" id="customer_name" value="<?php echo $result['customer_name']; ?>" placeholder="Customer Name" >
                                        </div>
                                        <div class="form-group">
                                            <label>Date*:</label>
                                            <input class="form-control" value="<?php echo $result['entry_data']; ?>" type="date" name="entry_data" id="date" value="<?php echo $result['mobile_no']; ?>" required>
                                        </div>
                                       <div class="form-group">
                                            <label>Remarks/Note:</label>
                                             <textarea class="form-control" rows="3" name="remark" placeholder="Remarks"><?php echo $result['customer_name']; ?></textarea>
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Mobile No*:</label>
                                            <input class="form-control" name="mobile_no" id="mobile_no" maxlength="10" onchange="populateCustomerId(this.value)"   onkeypress="return validateNumber(event)"  value="<?php echo $result['mobile_no']; ?>" placeholder="Mobile No" required>
                                        </div>
										<div class="form-group">
                                            <label>Email Id :</label>
                                            <input class="form-control" name="email_id" id="email_id"  value="<?php echo $result['email_id']; ?>" placeholder="Email Id">
                                        </div>
										<div class="form-group">
                                            <label>Address:</label>
                                             <textarea class="form-control" rows="3" name="address" id="address" placeholder="Enter Address"><?php echo $result['address']; ?></textarea>
                                        </div>
										<div class="form-group">
                                            <label>Payment Type:</label>
                                            <select name="payment_mode" id="type"  class="form-control">
												<option ame="l_letter" value="cash">Cash</option>
												<option name="bank" value="bank">Cheque/Bank</option>
												<option name="bank" value="credit">Credit</option>
												<option name="bank" value="nft">NFT/RTGS</option>
											</select>
                                        </div>
                                        </fieldset>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
							
							
				<div class="row" id="row_dim">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Payment Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
                                    <tbody>
									    <tr>
											<td>
											<label>Cheque No.</label>
                                            <input class="form-control" name="cheque_no" placeholder="Cheque No">
											</td>
                                            <td>
											 <label>Name.</label>
                                            <input class="form-control" name="first_name" placeholder="Name">
											</td>
                                            <td><label>Cheque Date:</label>
                                            <input value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" name="cheque_date" placeholder="Cheque Date"></td>
                                            <td><label>Bank Name:</label>
                                            <input class="form-control" name="bank_name" maxlength="10" placeholder="Bank Name"></td>
                                            <td><label>Narration:</label>
                                             <textarea class="form-control" rows="3" name="narration" placeholder="Narration"></textarea></td>
                                        </tr>
								        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
							
						</div>
					</div>
					 <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
							
							<div class="row">
                                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Category</th>
                                            <th>Product Type</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
											<th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$i = 0;
										$sqls = mysql_query("SELECT * FROM sale_product WHERE sale_id=$bill_no");
										while($res = mysql_fetch_array($sqls)){
									?>
                                        <tr>
											<td>
											<select class="form-control" name="category_id[]" id="<?php echo "category_id".$i; ?>"  onchange="populateProduct(this.value,'<?php echo $i; ?>')">
                                                <option value="">- Select Category -</option>
											<?php 
												$sqlp = mysql_query("SELECT * FROM product_category ORDER BY category_name ASC");
												while($resp = mysql_fetch_array($sqlp)){
											?>	
												<option value="<?php echo $resp['category_id']; ?>" <?php if($resp['category_id'] == $res['category_id']){ echo "selected";} ?>> <?php echo $resp['category_name']; ?> </option>
											<?php 
												} 
											?>
                                            </select>
											</td>
                                            <td>
											<input type="hidden" class="form-control" name="sale_product_id[]" value="<?php echo $res['sale_product_id']; ?>"  readonly>
											<select class="form-control" name="product[]" id="<?php echo "product".$i; ?>" onchange="populatePrice(this.value,'<?php echo "rate".$i; ?>')" onblur="calculate(<?php echo $i; ?>); totalamt(<?php echo $i; ?>)">
                                                <option value="">- Select Product -</option>
											<?php 
												$category_id = $res['category_id']; 
												$sqlp = mysql_query("SELECT * FROM product WHERE category_id=$category_id ORDER BY product_name ASC");
												while($resp = mysql_fetch_array($sqlp)){
											?>	
												<option value="<?php echo $resp['product_id']; ?>" <?php if($resp['product_id'] == $res['product_id']){ echo "selected"; } ?>> <?php echo $resp['product_name']; ?> </option>
											<?php 
												} 
											?>
                                            </select>
											</td>
                                            <td><input class="form-control" name="rate[]" id="<?php echo "rate".$i; ?>" value="<?php echo $res['price']; ?>" onkeypress="return validateNumber(event)" onblur="calculate(<?php echo $i; ?>); totalamt(<?php echo $i; ?>)" placeholder="price"></td>
                                            <td><input class="form-control" name="quantity[]" value="<?php echo $res['quantity']; ?>" id="<?php echo "quantity".$i; ?>" onblur="calculate(<?php echo $i; ?>); totalamt(<?php echo $i; ?>)" onkeypress="return validateNumber(event)" placeholder="Quantity"></td>
                                            <td><input class="form-control" name="amount[]" value="<?php echo ($res['quantity']*$res['price']); ?>" id="<?php echo "amount".$i; ?>" placeholder="Total price" readonly></td>
                                        </tr>
									<?php 
										$i++;
										}
									?>	
									
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><input class="form-control" name="tot_cash_amt" id="tot_cash_amt" value="<?php echo $result['tot_cash_amt']; ?>" placeholder="Total" readonly></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Discount Amount</td>
                                            <td><input class="form-control" value="<?php echo $result['discount']; ?>" onchange="return Blnc(this.value)" id="txtbal1" name="discount" placeholder="Discount"></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Tax %</td>
                                            <td><input class="form-control" value="<?php echo $result['tax']; ?>" onchange="return TaxBlnc(this.value)" id="taxAmt" placeholder="tax"></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Net Total</td>
                                            <td><input class="form-control" value="<?php echo $result['net_cash_amt']; ?>" name="net_cash_amt" id="net_cash_amt" placeholder="net total" readonly></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Payment Amount</td>
                                            <td><input class="form-control" value="<?php echo $result['payment_amount']; ?>" name="payment_amount" placeholder="Payment Amount"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
							<input type="submit" name="submit" class="btn btn-primary" style="float: right;">
							<button type="button" class="btn btn-primary" onclick="printPage('block2')">Print</button>
							</form>
						<?php 
							}
						?>	
							<?php 
						if(isset($_POST['submit'])){
							
							try{
								$token="";
								$dbh = getConnection();
								$dbh->beginTransaction();
					
							$bill_no = mysql_real_escape_string($_POST['bill_no']);
							$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
							$customer_name = mysql_real_escape_string($_POST['customer_name']);
							$email_id = mysql_real_escape_string($_POST['email_id']);
							$address = mysql_real_escape_string($_POST['address']);
							
							$sqls = mysqli_query($con,"SELECT * FROM customer WHERE mobile_no='$mobile_no'");
							if(mysqli_num_rows($sqls)>0){
								$ress = mysqli_fetch_array($sqls);
								$customer_id = $ress['customer_id'];
							}else{
																
								$sqli = mysqli_query($con,"INSERT INTO customer (`customer_name`,`mobile_no`,`email_id`, `address`) VALUES ('$customer_name','$mobile_no','$email_id','$address')");
								
								$customer_id = mysqli_insert_id($con);
							}
														
							$remark = mysql_real_escape_string($_POST['remark']);
							$net_cash_amt = mysql_real_escape_string($_POST['net_cash_amt']);
							$discount = mysql_real_escape_string($_POST['discount']);
							$tax = mysql_real_escape_string($_POST['tax']);
							$tot_cash_amt = mysql_real_escape_string($_POST['tot_cash_amt']);
							$payment_amount = mysql_real_escape_string($_POST['payment_amount']);
							$payment_mode = mysql_real_escape_string($_POST['payment_mode']);
							$cheque_no = mysql_real_escape_string($_POST['cheque_no']);
							$cheque_date = mysql_real_escape_string($_POST['cheque_date']);
							$bank_name = mysql_real_escape_string($_POST['bank_name']);
							$narration = mysql_real_escape_string($_POST['narration']);
							
							$newDate = date("Y-m-d", strtotime($_POST['entry_data']));
							
							$category_id = array_filter($_POST['category_id']);
							$product_id = array_filter($_POST['product']);
							$sale_product_id = array_filter($_POST['sale_product_id']);
							
							$quantity = array_filter($_POST['quantity']);
							$rate = array_filter($_POST['rate']);
							
							if((count($product_id) == count($quantity)) &&  (count($quantity) == count($rate))){
								
							$username = $_SESSION['username']['username'];
							mysqli_query($con,"SET sql_mode = ''");
							
							
							$sql = "UPDATE sale SET customer_id='$customer_id',tot_cash_amt='$tot_cash_amt',net_cash_amt='$net_cash_amt',tax='$tax',discount='$discount',payment_amount='$payment_amount',remark='$remark',entry_data='$newDate' WHERE sale_id=$bill_no";
							$dbh->exec($sql);
							
							$_SESSION['sale_id'] = $bill_no;
							
							$sqls = mysql_query("SELECT * FROM sale_payment WHERE sale_id=$bill_no LIMIT 0 , 1");
							$ress = mysql_fetch_array($sqls);
							$sale_payment_id = $ress['sale_payment_id'];
							echo "<br>";
							
							if($sale_payment_id !=""){
								
								$sqlp = "UPDATE sale_payment SET sale_id='$bill_no',payment_amount='$payment_amount',remark='$remark',entry_data='$newDate',payment_mode='$payment_mode',cheque_no='$cheque_no',cheque_date='$cheque_date',bank_name='$bank_name',narration='$narration' WHERE sale_payment_id=$sale_payment_id";
								$dbh->exec($sqlp);
								
							}else{
								
								$sqlp = "UPDATE sale_payment SET sale_id='$bill_no',payment_amount='$payment_amount',remark='$remark',entry_data='$newDate',payment_mode='$payment_mode',cheque_no='$cheque_no',cheque_date='$cheque_date',bank_name='$bank_name',narration='$narration' WHERE sale_id=$bill_no";
								$dbh->exec($sqlp);
							}
							
							echo "<br>";
							
							$count = count($product_id);
							
							$i=0;
							while($i<count($product_id)){
								
								
								$sqlitem = mysqli_query($con,"SELECT quantity FROM product WHERE product_id=$product_id[$i]");
								$resitem = mysqli_fetch_array($sqlitem);
								$oldquantity = $resitem['quantity'];
								
								
								$sqlsp = mysqli_query($con,"SELECT * FROM sale_product WHERE sale_product_id=$sale_product_id[$i]");
								$ressp = mysqli_fetch_array($sqlsp);
								//echo $ressp['product_id'].' , '.$product_id[$i]."<br>";
								//echo $ressp['quantity'].' , '.$quantity[$i]."<br>";
								
								
								if($ressp['product_id'] == $product_id[$i]){
									
									if(($quantity[$i]) < ($ressp['quantity'])){
										$addQty = ($ressp['quantity'] - $quantity[$i]);
										$newquantity = ($oldquantity+$addQty);
										
										$sqlu = "UPDATE product SET quantity=$newquantity WHERE product_id=$product_id[$i]";
										$dbh->exec($sqlu);
										
									}else{
										$addQty = ($quantity[$i] - $ressp['quantity']);
										$newquantity = ($oldquantity-$addQty);
										$oldproduct_id = $ressp['product_id'];
										
										$sqlu = "UPDATE product SET quantity=$newquantity WHERE product_id=$oldproduct_id";
										$dbh->exec($sqlu);
										
									}
									
								}else{
									
									/*====================== Old Product Update========================*/								
									$oldproductid = $ressp['product_id'];
									
									$sqlitem = mysqli_query($con,"SELECT quantity FROM product WHERE product_id=$oldproductid");
									$resitem = mysqli_fetch_array($sqlitem);
									$oldproductquantity = $resitem['quantity'];
									$addQty = $ressp['quantity'];
									
									$oldproductquantity = ($oldproductquantity+$addQty);
									$sqlu = "UPDATE product SET quantity=$oldproductquantity WHERE product_id=$oldproductid";
									$dbh->exec($sqlu);
									
									/*====================== End Product Update========================*/	
									echo "<br>";
									
									/*====================== New Product Update========================*/	
									
									$sqlitem = mysqli_query($con,"SELECT quantity FROM product WHERE product_id=$product_id[$i]");
									$resitem = mysqli_fetch_array($sqlitem);
									$oldquantity = $resitem['quantity'];
									
									$newquantity = ($oldquantity - $quantity[$i]);
									$sqlu = "UPDATE product SET quantity=$newquantity WHERE product_id=$product_id[$i]";
									$dbh->exec($sqlu);
									
									/*====================== End New Product Update========================*/	
								}
								
								
								$sql = "UPDATE sale_product SET sale_id='$bill_no',category_id='$category_id[$i]',product_id='$product_id[$i]',quantity='$quantity[$i]',price='$rate[$i]' WHERE sale_product_id=$sale_product_id[$i]"; 
								
								$dbh->exec($sql);
								
								echo "<br>";
							$i++;	
							}
							
							if($i==$count){
								$token="success";
								echo "<b style='color:red;'>Records has been saved successfully!</b>";
			
							}else{
								$token="fail" ;
								echo "<b style='color:red;'>Try Again!</b>";
							}
			
			$sqls = mysql_query("SELECT * FROM transaction WHERE sale_id=$bill_no LIMIT 0 , 1");
			$ress = mysql_fetch_array($sqls);
			$tid = $ress['tid'];
				
			
			$sql="UPDATE transaction SET date='$newDate',amount='$payment_amount',payment_mode='$payment_mode',narration='Sale Payment' WHERE tid=$tid";
			$dbh->exec($sql);
			//$tid=$dbh->lastInsertId();
							
			$ac_code=46;
			if($payment_mode=="cash" || $payment_mode=="credit" || $payment_mode=="nft"){
				$sql3="UPDATE cash_book SET ac_code='$ac_code',tid=$tid,type_id=2 WHERE tid=$tid"; //Party account Credit and cash a/c Debit 
					/*Here it seems like party account is being debited but because type_id is 1, but this is the format of cash_book. Because receipt entry will always be reflected as a "Debit" */
			$sql4="UPDATE account_transaction SET ac_code=$ac_code,tid=$tid,type_id=2 WHERE tid=$tid"; //Party account Credit and cash a/c Debit 
					/* here type_id has been used for the purpose of displaying the records in the respected books, despite both the entries are having same effect. */	
			//echo "<br>SQL3: $sql3<br>";
			//echo "<br>SQL4: $sql4<br>";
			$dbh->exec($sql3);
			$dbh->exec($sql4);
			}else if($payment_mode=="bank"){
				$sql3="UPDATE account_transaction SET ac_code=$ac_code,tid=$tid,type_id=2 WHERE tid=$tid"; //Party account Credit
				$sql4="UPDATE bank_book SET ac_code=$ac_code,tid=$tid,type_id=2 WHERE tid=$tid"; //Bank account Debit
				$dbh->exec($sql3);
				$dbh->exec($sql4);	
			}
			//Day book entry
			$sql="UPDATE day_book SET ac_code=$ac_code,tid=$tid,type_id=2 WHERE tid=$tid";   //Receipt will be debited
			$dbh->exec($sql);
							
							
							
							$dbh->commit();
							$_SESSION['token']=$token;
							}else{
								$token="EMPTY";
								$_SESSION['token']=$token;								
							}
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
								window.location="Sale-Entry-Upadte.php";				
							</script>
			
						<?php	
							}
						?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
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

<div class="feewraper" id="block2" style="display:none">

<table width="1002" height="237" border="1" cellspacing="0">
<tr>
	<th colspan="6">
	 <div class="headfee" style="text-align: center;">
 <div class="lobilfee"></div>
	<b style="font-size:50px">GRAND MARBLE & TILES</b><br>
	<b style="font-size:20px">PACHIM PALLY CHOWK, KISHAN GANJ</b>
 </div>
<div class="feecont">
<?php 
	$sale_id = $_SESSION['sale_id'];
	$sql = mysqli_query($con,"SELECT * FROM sale s,customer c WHERE c.customer_id=s.customer_id and s.sale_id=$sale_id");
	$result = mysqli_fetch_array($sql);
?>
	</th>
</tr>
<tr><td  colspan="4"><b>Customer Name:</b> <?php echo $result['customer_name']; ?>,<b>Mobile No:</b> <?php echo $result['mobile_no']; ?></td><td  colspan="2">Bill No : <?php echo $_SESSION['sale_id']; ?></td></tr>
<tr><td colspan="4">Address: <?php echo $result['address']; ?></td> <td  colspan="2">Date : <?php echo $result['entry_data']; ?></td> </tr>
<tr>
	<th width="155">Sl.No</th> 
	<th width="198">Product Name</th> 
	<th width="198">Qty</th> 
	<th width="106">Price</th>  
	<th  width="184">Total Price</th> 
</tr>
<?php 
	$sale_id = $_SESSION['sale_id'];
	$sql = mysqli_query($con,"SELECT p.product_name,sp.quantity,sp.price FROM sale_product sp,product p WHERE sp.product_id=p.product_id and sp.sale_id=$sale_id");
	$i=1;
	$totAmt = 0;
	while($res = mysqli_fetch_array($sql)){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $res['product_name']; ?></td>
<td align="center"><?php echo $res['quantity']; ?></td>
<td align="center"><?php echo $res['price']; ?></td>
<td align="center"><?php echo ($res['quantity']*$res['price']); ?></td>
<?php $totAmt +=($res['quantity'])*($res['price']); ?>
</tr>
<?php 
	$i++;
	}
?>
<tr>
<th></th>
<th></th>
<th></th>
<th  width="149">Total Amount</th>
<th align="center"><?php echo $totAmt; ?></th>
</tr>
<tr>
<th></th>
<th></th>
<th></th>
<th  width="149">Payment Amount</th>
<th align="center"><?php echo $result['payment_amount']; ?></th>
</tr>


</table>

</div>
</div>
	
	<script>
function printPage(id)
{
   var html="<html>";
   html+= document.getElementById(id).innerHTML;

   html+="</html>";

   var printWin = window.open('','','left=0,top=0,width=1000,height=auto,toolbar=0,scrollbars=0,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>	
	
<script>
		
	function calculate(index){
			//alert('hii');

	var v1=document.getElementsByName('quantity[]');
	var v2=document.getElementsByName('rate[]');
	var v3=document.getElementsByName('amount[]');
	var sum=0;
	if(v1[index].value!="" && v2[index].value!=""){
		sum=Number(v1[index].value)*Number(v2[index].value);
		v3[index].value=(sum);
		
		//alert(v3[index]);
		//v3[index].focus();
		//document.getElementById('totalbillamt').focus();
		//v3[index].focus();
	}	
}

		
		
		
		
			 function totalamt(index){
					//alert("hii");
				 var amt=document.getElementsByName('amount[]');
				 var cashSum=0;
				 
				 for(var i=0; i<amt.length; i++){
					 
					if(parseInt(amt[i].value)){
						cashSum+=parseFloat(amt[i].value);
						//alert("cash sum"+cashSum);
						} 
				 }
				document.getElementById('tot_cash_amt').value=cashSum; 
				document.getElementById('net_cash_amt').value=cashSum; 
				
			}
			
			
			function Blnc(){
	
		
	var bln = document.getElementById("tot_cash_amt").value;
	var pad = document.getElementById("txtbal1").value;
	
	if (parseInt(pad) <= parseInt(bln)) {
    
		var bl1 =  ((parseInt(pad)));
		var bl = (parseInt(bln)-bl1);
		
		var tAmts = document.getElementById("taxAmt").value;
		
		var TaxblAmts = Number(bl)*Number(tAmts)/100;
		
		var blAmts = Number(TaxblAmts) + Number(bl);
		
		document.getElementById("net_cash_amt").value = blAmts;
	
	}else{
		alert("Exceeding the total amount!");
		document.getElementById("txtbal1").value = "";
	}
}


function TaxBlnc(){
	
		
	var bln = document.getElementById("tot_cash_amt").value;
	var pad = document.getElementById("txtbal1").value;
	
	if (parseInt(pad) <= parseInt(bln)) {
    
		var bl1 =  ((parseInt(pad)));
		var bl = (parseInt(bln)-bl1);
		
		var tAmts = document.getElementById("taxAmt").value;
		
		var TaxblAmts = Number(bl)*Number(tAmts)/100;
		
		var blAmts = Number(TaxblAmts) + Number(bl);
		
		document.getElementById("net_cash_amt").value = blAmts;
	
	}else{
		alert("Exceeding the total amount!");
		document.getElementById("txtbal1").value = "";
	}
}


		</script>
	
    <!-- /#wrapper -->

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
