<?php include('config.php'); ?>
<html>
	<head>
		<title>InfoQuicker</title>
		<link rel="stylesheet" href="st.css" />
	</head>
	<body>		
		<div class="login">
		<form method="post">
			Title : <textarea name="meta_title"></textarea><br>			
			Description : <textarea name="meta_description"></textarea><br>	
			<input type="submit" name="submit">	
		</form>
		<?php 
			if(isset($_POST['submit'])){
				$site_url = "#";
				$meta_title = mysql_real_escape_string($_POST['meta_title']);
				$meta_description = mysql_real_escape_string($_POST['meta_description']);
				
				$sql = mysql_query("INSERT INTO web_information (site_url,meta_title,meta_description) VALUES('$site_url','$meta_title','$meta_description')");
				
				if($sql){
					echo "<b>Successfully Added</b>";
				}
			}
		?>
		</div>
	</body>
</html>
