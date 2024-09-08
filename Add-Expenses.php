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
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Expenses</h1>
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
                                            <label>Expenses Name</label>
                                            <p class="help-block"><input class="form-control"  name="expenses_name" id="expenses_name" placeholder="Expenses Name" required></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Amount*:</label>
                                            <input class="form-control" name="amount" id="amount" placeholder="Amount">
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
                                            <label>Date</label>
                                            <input class="form-control" type="date" name="entry_date" id="entry_date" required>
                                        </div>
										<div class="form-group">
                                            <label>Remarks*:</label>
                                            <textarea class="form-control" rows="3" name="remarks" id="remarks"></textarea>
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
								
							$expenses_name = mysql_real_escape_string($_POST['expenses_name']);
							$entry_date = mysql_real_escape_string($_POST['entry_date']);
							$amount = mysql_real_escape_string($_POST['amount']);
							$remarks = mysql_real_escape_string($_POST['remarks']);
							$payment_mode = mysql_real_escape_string($_POST['payment_mode']);
							$cheque_no = mysql_real_escape_string($_POST['cheque_no']);
							$cheque_date = mysql_real_escape_string($_POST['cheque_date']);
							$bank_name = mysql_real_escape_string($_POST['bank_name']);
							$narration = mysql_real_escape_string($_POST['narration']);
							
							
							$sql = mysqli_query($con,"INSERT INTO expenses (`expenses_name`,`entry_date`,`amount`, `remarks`,payment_mode,cheque_no,cheque_date,bank_name,narration) VALUES ('$expenses_name','$entry_date','$amount','$remarks','$payment_mode','$cheque_no','$cheque_date','$bank_name','$narration')");

							$bill_no = mysqli_insert_id($con);
							
							
							
			$sql="INSERT INTO transaction(date,amount,narration,fee_id,expenses_id) VALUES('$entry_date','$amount','Expenses Payment','$bill_no','$bill_no')";
			$dbh->exec($sql);
			$tid=$dbh->lastInsertId();
							
			$ac_code=52;
			if($payment_mode=="cash"){
				$sql3="INSERT INTO cash_book(ac_code,tid,type_id)
					VALUES($ac_code,$tid,1)"; //Party account Credit and cash a/c Debit 
					/*Here it seems like party account is being debited but because type_id is 1, but this is the format of cash_book. Because receipt entry will always be reflected as a "Debit" */
			$sql4="INSERT INTO account_transaction(ac_code,tid,type_id)
				VALUES($ac_code,$tid,1)"; //Party account Credit and cash a/c Debit 
					/* here type_id has been used for the purpose of displaying the records in the respected books, despite both the entries are having same effect. */	
			//echo "<br>SQL3: $sql3<br>";
			//echo "<br>SQL4: $sql4<br>";
			$dbh->exec($sql3);
			$dbh->exec($sql4);
			}else if($payment_mode=="bank"){
				$sql3="INSERT INTO account_transaction(ac_code,tid,type_id)
					VALUES($ac_code,$tid,1)"; //Party account Credit
				$sql4="INSERT INTO bank_book(ac_code,tid,type_id)
					VALUES($ac_code,$tid,1)"; //Bank account Debit
				$dbh->exec($sql3);
				$dbh->exec($sql4);	
			}
			//Day book entry
			$sql="INSERT INTO day_book(ac_code,tid,type_id)
				VALUES($ac_code,$tid,1)";   //Receipt will be debited
			$dbh->exec($sql);


							$dbh->commit();
							
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
								window.location="Add-Expenses.php";				
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
	
	
	var expenses_name = jQuery("#expenses_name").val();
	var entry_date = jQuery("#entry_date").val();
	var remarks = jQuery("#remarks").val();
	    
	if(expenses_name == ''){
			 alert("Company Name Required");
			 return false;
		 }
	
			
	
	var regphone = /^\d{10}$/;
	if(entry_date == '' || isNaN(entry_date) || !entry_date.match(regphone)){
		alert("Enter the Valid Mobile Number");
		return false;
	}
	
	
	
	
	if(remarks == ''){
			 alert("remarks Required");
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
