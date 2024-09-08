<?php require_once('db/db.php'); ?>
<?php
	$category_id = $_REQUEST["category_id"];
	
	$sql="SELECT * FROM product WHERE category_id = $category_id";

	$data=mysql_query($sql);
	if(mysql_num_rows($data)>0){
	?>
		<option value="">--Select Section--</option>
	<?php
		while($row=mysql_fetch_row($data)){
		echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
	}}else{
		echo "<option value=\"".""."\">"."* Select Section *"."</option>";
		echo "<option value=\"".""."\">"."N/A"."</option>";
	}
?>