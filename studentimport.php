<?php

$connect = mysql_connect("localhost","obdst4rz_schan","school_an") or die ("error");

$database = mysql_select_db("obdst4rz_ugs") or die("error");


if(isset($_POST["Import"]))
{
echo $filename=$_FILES["file"]["tmp_name"];
if($_FILES["file"]["size"] > 0)
{
echo "<br>File name: ".$filename;
$file = fopen($filename, "r"); 

$count=0;



while (($data = fgetcsv($file, 10000, ",")) !== FALSE)

			
{			
		
				
		if($count>0){
			//echo "<br>";
			$year = 1959;
			$j=3;	
			for($i=1;$i<=56;$i++){
			 echo $country = $data[0].",";
			 echo $county_code = mysql_real_escape_string($data[1]).",";
			  echo ($year+$i).",";
			 $k = ($j+$i);
			 echo $county_code = mysql_real_escape_string($data[$k])."<br>";
			
			} 
			
				
		}
	$count++;
}
fclose($file);
echo "<b style='color:red'>CSV File has been successfully Imported</b>";// . $sql;
}
else
echo "<b style='color:red'>Invalid File:Please Upload CSV File</b>";// . $sql;

}   
?>
     <img src="images/application-form.png" alt="" height="16" width="16"> <h3>Import Excel File</h3> <span></span> </div> 
    <form  enctype="multipart/form-data" method="post">
     
	<div >
		<div class="section _100" style="height:100px;"> <label> Excel/csv File </label> 
			<div style="margin-top:5px;">  
		
			<input type="file" name="file" id="file"  class="te1" /> 
			<input type="submit" name="Import" value="Upload/Save" />
      
			</div> 
		</div> 
    </div> 
	</form> 
	</div> 
            
<!-- 
Earlier Code: Before 04/04/2014
		$data[4]!=""?$branch_code=$data[4]:$branch_code=2;
		//By default assigning branch code to 2 which is Bangalore
		$data[5]!=""?$counter_code=$data[5]:$counter_code=5;
		//By default assigning counter code 5 which is in Banglore branch section-A("Bang-1")
-->