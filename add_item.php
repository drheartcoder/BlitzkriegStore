<?php require_once('header.php'); ?>
<div id="content">
<?php require_once('sidebar.php'); ?>
<div class="descdash">
<div class="addnew">
<span class="Addnew">Add Product Name</span> <!--<span class="newadd"><a href="#" class="myButton"></a></span>-->
</div><!--addnew-->

<script>
	
	function populatevariantsValue(variants_id,mval){
	//alert("class id: "+variants_id);
	//alert(mval);
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
            document.getElementById("variants_value_id"+mval+"").innerHTML=res;
            }
          }
	xmlhttp.open("GET","populate_variants.php?variants_id="+variants_id,true);
	xmlhttp.send();
}
</script>

<div class="addnew" style="height: auto;">

<form method="post" enctype="multipart/form-data">
Product Name : <input type="text" name="product_name" class="" placeholder="Enter Product Name" > <br>
Product Category : <select name="categories">
	<option value="">-- Select --</option>
	<?php 
		$data = selectData('categories');
		foreach($data as $item){
	?>
	<option value="<?php echo  $item[0]; ?>"><?php echo  $item[1]; ?></option>
	<?php
		} 
	?>
</select><br>
SKU : <input type="text" name="sku" class="" placeholder="Enter Product Code" ><br>
Product image : <input type="file" name="files[]" multiple><br>
Product variants : 
<input type="hidden" id="0" value="0"><!--onchange="populatevariantsValue(this.value,document.getElementById("inputid1").value)"-->
<select name="variants_id[]" onchange="populatevariantsValue(this.value,document.getElementById(0).value)">
	<option value="">-- Select --</option>
	<?php 
		$data = selectData('variants');
		foreach($data as $item){
	?>
	<option value="<?php echo  $item[0]; ?>"><?php echo  $item[1]; ?></option>
	<?php
		} 
	?>
</select>
Variants Value: 
<select name="variants_value_id[]" id="variants_value_id0">
	<option value="">-- Select --</option>
</select>
Price : <input type="text" name="price[]">
<br>

<div class="more">
                      <div class="moreareabut1ch_17"></div>
                      <div class="more1">
                        <button id="addmorebut1ch_17">ADD AREA</button>
                      </div>
                    </div>
					
					
<input type="submit" name="submit" value="Save"/>
</form>
</div><!--addnew-->
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
                                              $(document).ready(function() {
                                                    var max_fields       = 6; //maximum input boxes allowed
                                                    var wrapper11        = $(".morearea_ch17");  //AREA ONLY
                                                    var wrapper12        = $(".moreareabutch_17"); //AREA AND CURTAIN  BOX
                                                    var wrapper13        = $(".moreareabut1ch_17");  //AREA AND INPUT NUMBER BOX
                                                    var add_button11     = $(".addmorech_17"); //AREA ONLY
                                                    var add_button12     = $("#addmorebutch"); //AREA AND CURTAIN  BOX
                                                    var add_button13     = $("#addmorebut1ch_17");  //AREA AND INPUT NUMBER BOX
                                                    var p = 1;
                                                    var n = 1;       
                                                    var m = 1; 

                                                    
                                                    // AREA AND INPUT NUMBER BOX
                                                    $(add_button13).click(function(e){ 
                                                      e.preventDefault();
                                                      if(m < max_fields){ //max input box allowed
                                                         
                                                          $(wrapper13).append('<div class="inputblock ltselect"><div class = "dylablename"><div><label>Product variants : </label><input type="hidden" id="'+m+'" value="'+m+'"><select name="variants_id[]" onchange="populatevariantsValue(this.value,document.getElementById('+m+').value)"><option value="">NA</option><?php $data = selectData('variants');
																					foreach($data as $item){
																					?><option value="<?php echo  $item[0]; ?>"><?php echo  $item[1]; ?></option><?php } ?></select> Variants Value : <select name="variants_value_id[]" id="variants_value_id'+m+'"><option value="">NA</option></select> Price :<input type="text" name="price[]"></div></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
                                                     m++; 
													}                     
                                                    });

                                                    // AREA ONLY 
                                                    $(wrapper11).on("click",".remove_field", function(e){ //user click on remove text
                                                    e.preventDefault(); $(this).parent('div').remove(); p--;
                                                    });            
                                                    // AREA AND CURTAIN  BOX 
                                                    $(wrapper12).on("click",".remove_field", function(e){ //user click on remove text
                                                    e.preventDefault(); $(this).parent('div').remove(); y--;
                                                    }); 
                                                        
                                                    // AREA AND INPUT NUMBER BOX
                                                    $(wrapper13).on("click",".remove_field", function(e){ //user click on remove text
                                                    e.preventDefault(); $(this).parent('div').remove(); m--;
                                                    }); 
                                               });
                                          </script> 


<div class="list1" style="height:auto">

<?php 
if(isset($_POST['submit'])){
	
	
	extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
   
	
	
	echo $product_name = $_POST['product_name'];
	echo $categories = $_POST['categories'];
	echo "<br>";
	echo $sku = $_POST['sku'];
	echo "<br>";
	$variants_id = $_POST['variants_id'];
	print_r($variants_id);
	echo "<br>";
	$variants_value_id = $_POST['variants_value_id'];
	print_r($variants_value_id);
	$price = $_POST['price'];
	echo "<br>";
	print_r($price);
	$entry_date = date('Y-m-d');
	echo "<br>";
	
	
	
	$sql = mysqli_query($con,"INSERT INTO product (cat_id,product_name,sku,sort_order,status,entry_date) VALUES('$categories','$product_name','$sku','0','0','$entry_date')");
	$last_id = mysqli_insert_id($con);
	
	
	
	 foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name= $last_id.'_'.$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("productimages/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"productimages/".$file_name);
						$sql = mysqli_query($con,"INSERT INTO product_images (product_id,images) VALUES('$last_id','$file_name')");
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"productimages/".$newFileName);
						$sql = mysqli_query($con,"INSERT INTO product_images (product_id,images) VALUES('$last_id','$file_name')");
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
	
	
	echo "<br>";
	for($i=0;$i<count($_POST['variants_id']);$i++){
		//$sqls = mysqli_query($con,"INSERT INTO product_variants(product_id,variant_value_id,price) VALUES('$last_id','$variants_value_id[$i]','$price[$i]')");	
	}
}
?>
</div><!--list-->



</div><!--descdash-->
</div><!--content-->


</div><!--wrapper-->
</body>
</html>
