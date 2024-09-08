<?php 
	session_start();
	
	
	function getConnection(){
		$dbh=new PDO('mysql:host=localhost;dbname=blitz_store','blitz_storeblitz','blitz@123');
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $dbh;
	}


$connect = @mysql_connect("localhost","blitz_storeblitz","blitz@123") or die ("error");

$database = @mysql_select_db("blitz_store") or die("error");
	
	
	@mysql_connect('localhost','blitz_storeblitz','blitz@123');
        @mysql_select_db('blitz_store');

$con = mysqli_connect("localhost","blitz_storeblitz","blitz@123","blitz_store");
	
	
	$DB_Server = "localhost"; 
	$DB_Username = "blitz_storeblitz";    
	$DB_Password = "blitz@123";                
	$DB_DBName = "blitz_store"; 
	$table = ""; 
	
	
	
function getTokenMessage($token){
	$message="";
	if(strnatcasecmp($token,"success")==0){
		$message="<div class='validateTips' style='background:#4EF572;  color:black;'  >Message: Record Saved Successfully!</div>";
	}else if(strnatcasecmp($token,"fail")==0){
		$message="<div class='validateTips' style='background:#F56F4E; '>Message: Record Could Not Be Saved!</div>";
	}else if(strnatcasecmp($token,"exists")==0){
		$message="<div class='validateTips' style='background:#4E9CF5; '>Message: Record Already Exists!</div>";
	}else if(strnatcasecmp($token,"EDIT_OK")==0){
		$message="<div class='validateTips' style='background:#4EF572; ' >Message: Record Edited Successfully!</div>";
	}else if(strnatcasecmp($token,"EDIT_FAIL")==0){
		$message="<div class='validateTips' style='background:#F56F4E; '>Message: Record Could Not Be Edited!</div>";
	}else if(strnatcasecmp($token,"DELETE_OK")==0){
		$message="<div class='validateTips' style='background:#4EF572; ' >Message: Record Deleted Successfully!</div>";
	}else if(strnatcasecmp($token,"DELETE_FAIL")==0){
		$message="<div class='validateTips' style='background:#F56F4E; '>Message: Record Could Not Be Deleted!</div>";
	}else if(strnatcasecmp($token,"EMPTY")==0){
		$message="<div class='validateTips' style='background:#FC21F4; '>Message: Record Could Not Be Saved .. Please Enter Required Fields!</div>";
	}	
	return $message;
}
	

?>