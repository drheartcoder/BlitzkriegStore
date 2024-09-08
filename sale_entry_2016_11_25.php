<?php include('header.php'); ?>


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
                    <h1 class="page-header">Sale Entry</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Sale Details
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
					<?php
						$sql = mysql_query("SELECT MAX(sale_id) maxid FROM sale");
						$res = mysql_fetch_array($sql);
						
					?>
						 <form role="form" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                   
										<div class="form-group">
                                            <label>Bill No</label>
                                            <p class="help-block"><?php echo $res['maxid']+1; ?></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Customer  Name*:</label>
                                            <input class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name" >
                                        </div>
                                        <div class="form-group">
                                            <label>Date*:</label>
                                            <input class="form-control" type="date" name="entry_data" id="date" required>
                                        </div>
                                       <div class="form-group">
                                            <label>Remarks/Note:</label>
                                             <textarea class="form-control" rows="3" name="remark" placeholder="Remarks"></textarea>
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Mobile No*:</label>
                                            <input class="form-control" name="mobile_no" id="mobile_no" maxlength="10" onchange="populateCustomerId(this.value)"   onkeypress="return validateNumber(event)" placeholder="Mobile No" required>
                                        </div>
										<div class="form-group">
                                            <label>Email Id :</label>
                                            <input class="form-control" name="email_id" id="email_id" value="" placeholder="Email Id">
                                        </div>
										<div class="form-group">
                                            <label>Address:</label>
                                             <textarea class="form-control" rows="3" name="address" id="address" placeholder="Enter Address"></textarea>
                                        </div>
										
                                        </fieldset>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
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
										while($i<=15){
									?>
                                        <tr>
											<td>
											<select class="form-control" name="category_id[]" id="<?php echo "category_id".$i; ?>"  onchange="populateProduct(this.value,'<?php echo $i; ?>')">
                                                <option value="">- Select Product -</option>
											<?php 
												$sqlp = mysql_query("SELECT * FROM product_category ORDER BY category_name ASC");
												while($resp = mysql_fetch_array($sqlp)){
											?>	
												<option value="<?php echo $resp['category_id']; ?>"> <?php echo $resp['category_name']; ?> </option>
											<?php 
												} 
											?>
                                            </select>
											</td>
                                            <td>
											<select class="form-control" name="product[]" id="<?php echo "product".$i; ?>" onchange="populatePrice(this.value,'<?php echo "rate".$i; ?>')">
                                                <option value="">- Select Product -</option>
											</select>
											</td>
                                            <td><input class="form-control" name="rate[]" id="<?php echo "rate".$i; ?>" onkeypress="return validateNumber(event)" onblur="calculate(<?php echo $i; ?>); totalamt(<?php echo $i; ?>)" placeholder="price"></td>
                                            <td><input class="form-control" name="quantity[]" id="<?php echo "quantity".$i; ?>" onblur="calculate(<?php echo $i; ?>); totalamt(<?php echo $i; ?>)" onkeypress="return validateNumber(event)" placeholder="Quantity"></td>
                                            <td><input class="form-control" name="amount[]" id="<?php echo "amount".$i; ?>" placeholder="Total price" readonly></td>
                                        </tr>
									<?php 
										$i++;
										}
									?>	
									
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><input class="form-control" name="tot_cash_amt" id="tot_cash_amt" placeholder="Total" readonly></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Discount Amount</td>
                                            <td><input class="form-control" onchange="return Blnc(this.value)" id="txtbal1" name="discount" placeholder="Discount"></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Tax %</td>
                                            <td><input class="form-control" onchange="return TaxBlnc(this.value)" id="taxAmt" placeholder="tax"></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Net Total</td>
                                            <td><input class="form-control" name="net_cash_amt" id="net_cash_amt" placeholder="net total" readonly></td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Payment Amount</td>
                                            <td><input class="form-control" name="payment_amount" placeholder="Payment Amount"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
							<input type="submit" name="submit" class="btn btn-primary" style="float: right;">
							<button type="button" class="btn btn-primary" onclick="printPage('block2')">Print</button>
							</form>
							<?php 
						if(isset($_POST['submit'])){
							
							try{
								$token="";
								$dbh = getConnection();
								$dbh->beginTransaction();
					
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
														
							$newDate = date("Y-m-d", strtotime($_POST['entry_data']));
							
							$product_id = array_filter($_POST['product']);
							
							$quantity = array_filter($_POST['quantity']);
							$rate = array_filter($_POST['rate']);
							
							if((count($product_id) == count($quantity)) &&  (count($quantity) == count($rate))){
														
							$username = $_SESSION['username']['username'];
							mysqli_query($con,"SET sql_mode = ''");
							$sql = mysqli_query($con,"INSERT INTO sale (customer_id,tot_cash_amt,net_cash_amt,tax,discount,payment_amount,remark,entry_data) Values('$customer_id','$tot_cash_amt','$net_cash_amt','$tax','$discount','$payment_amount','$remark','$newDate')");
							
							$sale_id = mysqli_insert_id($con);
							
							$_SESSION['sale_id'] = $sale_id;
							
							$sqlp = mysqli_query($con,"INSERT INTO sale_payment(sale_id,customer_id,net_cash_amt,payment_amount,remark,entry_data) VALUES('$sale_id','$customer_id','$net_cash_amt','$payment_amount','$remark','$newDate')");
							
							echo "<br>";
							
							$count = count($product_id);
							
							$i=0;
							while($i<count($product_id)){
								
								$sqlitem = mysqli_query($con,"SELECT quantity FROM product WHERE product_id=$product_id[$i]");
								$resitem = mysqli_fetch_array($sqlitem);
								$oldquantity = $resitem['quantity'];
								$quantity[$i];
								$newquantity = ($oldquantity - $quantity[$i]);
								mysqli_query($con,"SET sql_mode = ''");
								mysqli_query($con,"UPDATE product SET quantity=$newquantity WHERE product_id=$product_id[$i]");
																
								$sql = mysqli_query($con,"INSERT INTO sale_product (sale_id,product_id,quantity,price) Values('$sale_id','$product_id[$i]','$quantity[$i]','$rate[$i]')"); 
								echo "<br>";
							$i++;	
							}
							
							if($i==$count){
								$token="success";
								echo "<b style='color:red;'>Attendance records has been saved successfully!</b>";
			
							}else{
								$token="fail" ;
								echo "<b style='color:red;'>Please select class and section and press submit button!</b>";
							}
							
							
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
								window.location="Sale-Entry.php";				
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
	if(document.getElementById('quantity'+index).value==""){
		document.getElementById('rate'+index).value="";
		document.getElementById('amount'+index).value="";
		//alert("Qty:"+document.getElementById('quantity'+index).value+"\n"+
			//	"Rate:"+document.getElementById('rate'+index).value+"\n"+
			//	"amount:"+document.getElementById('rate'+index).value);
		return;
	}
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
