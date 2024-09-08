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
<script type="text/javascript">
function populateCompanyId(bill_no){
	//alert(bill_no);
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
				// alert("Stud Id"+bill_no+" doesn't exist. Please check the Stud Id!");
				// return;
			  // }
			  
			  document.getElementById('balance_amount').value=name[1].childNodes[0].nodeValue;
			  var val=name[1].childNodes[0].nodeValue;
			  
            }
          }
        xmlhttp.open("GET","populate_salepayment_amount.php?bill_no="+bill_no,true);
        xmlhttp.send();	
}
</script>
<script>
	
	function calculate(){
			//alert('hii');
		var balance_amounts = document.getElementById('balance_amount').value;	
		var payment_amount = document.getElementById('payment_amount').value;
		if(Number(payment_amount)>Number(balance_amounts)){
			document.getElementById('payment_amount').value=0;
			alert("Payment Amount Is Greater Then  Balance Amount......!");			
		}	
		
}


function validateNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	
</script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Billing Pending Payment</h1>
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
					<?php
						$sql = mysql_query("SELECT MAX(sale_id) maxid FROM sale");
						$res = mysql_fetch_array($sql);
						
					?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Bill No</label>
                                            <p class="help-block"><input class="form-control" name="bill_no" id="bill_no" onchange="populateCompanyId(this.value)" placeholder="Bill No" required></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Payment Amount*:</label>
                                            <input class="form-control" name="payment_amount" id="payment_amount" onchange="return calculate()" placeholder="Payment Amount" required>
                                        </div>
										<div class="form-group">
                                            <label>Payment Type:</label>
                                            <select name="payment_mode" id="type"  class="form-control">
												<option ame="l_letter" value="cash">Cash</option>
												<option name="bank" value="bank">Cheque/Bank</option>
											</select>
                                        </div>
                                       
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Balance Amount :</label>
                                            <input class="form-control" name="balance_amount" id="balance_amount" onkeypress="return validateNumber(event)" placeholder="Balance Amount" readonly required>
                                        </div>
										<div class="form-group">
                                            <label>Date*:</label>
                                            <input class="form-control" value="<?php echo date('Y-m-d'); ?>" type="date" name="entry_data" required>
                                        </div>
										<div class="form-group">
                                            <label>Remarks/Note:</label>
                                             <textarea class="form-control" rows="3" name="remarks" placeholder="Remarks"></textarea>
                                        </div>
																				
                                        </fieldset>
                                    
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
				<input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
				  </form>
					<?php
						if(isset($_POST['submit'])){
						try{
								$token="";
								$dbh = getConnection();
								$dbh->beginTransaction();
							
							$bill_no = mysql_real_escape_string($_POST['bill_no']);
							$payment_amount = mysql_real_escape_string($_POST['payment_amount']);
							$remarks = mysql_real_escape_string($_POST['remarks']);
							$entry_data = mysql_real_escape_string($_POST['entry_data']);
							$payment_mode = mysql_real_escape_string($_POST['payment_mode']);
							$cheque_no = mysql_real_escape_string($_POST['cheque_no']);
							$cheque_date = mysql_real_escape_string($_POST['cheque_date']);
							$bank_name = mysql_real_escape_string($_POST['bank_name']);
							$narration = mysql_real_escape_string($_POST['narration']);
														
							
							mysql_query("SET sql_mode = ''");
							$sql = "INSERT INTO sale_payment (`sale_id`,`payment_amount`,`remark`,`entry_data`,payment_mode,cheque_no,cheque_date,bank_name,narration) VALUES ('$bill_no','$payment_amount','$remarks','$entry_data','$payment_mode','$cheque_no','$cheque_date','$bank_name','$narration')";
							$dbh->exec($sql);
							
							
							
							
							$sql="INSERT INTO transaction(date,amount,narration,fee_id,sale_id) VALUES('$entry_data','$payment_amount','Sale Payment','$bill_no','$bill_no')";
							$dbh->exec($sql);
							$tid=$dbh->lastInsertId();
							
			$ac_code=46;
			if($payment_mode=="cash"){
				$sql3="INSERT INTO cash_book(ac_code,tid,type_id)
					VALUES($ac_code,$tid,2)"; //Party account Credit and cash a/c Debit 
					/*Here it seems like party account is being debited but because type_id is 1, but this is the format of cash_book. Because receipt entry will always be reflected as a "Debit" */
			$sql4="INSERT INTO account_transaction(ac_code,tid,type_id)
				VALUES($ac_code,$tid,2)"; //Party account Credit and cash a/c Debit 
					/* here type_id has been used for the purpose of displaying the records in the respected books, despite both the entries are having same effect. */	
			//echo "<br>SQL3: $sql3<br>";
			//echo "<br>SQL4: $sql4<br>";
			$dbh->exec($sql3);
			$dbh->exec($sql4);
			}else if($payment_mode=="bank"){
				$sql3="INSERT INTO account_transaction(ac_code,tid,type_id)
					VALUES($ac_code,$tid,2)"; //Party account Credit
				$sql4="INSERT INTO bank_book(ac_code,tid,type_id)
					VALUES($ac_code,$tid,2)"; //Bank account Debit
				$dbh->exec($sql3);
				$dbh->exec($sql4);	
			}
			//Day book entry
			$sql="INSERT INTO day_book(ac_code,tid,type_id)
				VALUES($ac_code,$tid,2)";   //Receipt will be debited
			$dbh->exec($sql);
			
			
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
								window.location="Sale-Payment.php";				
							</script>
			
						<?php	
							}
						?>
					
								
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
