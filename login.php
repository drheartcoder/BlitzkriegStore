<?php
require_once('db/db.php');

error_reporting(0);

if(isset($_POST['submit'])){
  //$_POST[password] =md5($_POST[password]);
  
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  $type = mysql_real_escape_string($_POST['user_type']);
  $ipaddress = $_SERVER['REMOTE_ADDR'];
  
   $result = mysql_query("select * from login where username='$username' AND password='$password' AND is_admin=1"); 
   $numrows = mysql_num_rows($result);  
   if($numrows>0){
      $result1 = mysql_fetch_array($result);
	  $user_type = $result1['user_type'];
	  if($user_type==Admin){
	  $_SESSION['username'] =  $result1;
	  $_SESSION['logged-admin'] = true;
	  header( 'Location:  index.php') ;
	    //echo"admin";  die;
	   }
	   
	  else if($user_type==agent){
		$_SESSION['username'] =  $result1;
		$_SESSION['logged-agent'] = true;
	     header( 'Location: Employee/index.php') ;
	   }
	  else if($user_type==customer){
		$_SESSION['username'] =  $result1;
		$_SESSION['logged-customer'] = true;
	     header( 'Location: Customer/index.php') ;
	   }
	    
	date_default_timezone_set('Asia/Calcutta');
	$login_time = date('Y-m-d h:i:s'); 
	
	
	$sqls = "INSERT INTO login_info(username,password,correct,login_time,ip) Values('$username','$password','Correct','$login_time','$ipaddress')";
	mysql_query($sqls);
	
	$sqlu = mysql_query("UPDATE login set islogin=1,login_time='$login_time' WHERE username='$username'");
	
     }	 
    else{
	 echo "<b style='color:red;font-size: 19px; background: yellow;'>Choose correct login credentials</b>";
	 $sqls = "INSERT INTO login_info(username,password,correct,ip) Values('$username','$password','Wrong','$ipaddress')";
	mysql_query($sqls);
	}  
}  
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyStore Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="username" placeholder="Enter Username" maxlength="10" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" type="submit" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src=".jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=".bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=".metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
