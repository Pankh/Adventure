
<?php
	require_once('session.php');
?>
	
	
	
	
<?php
include('connect.php');


	$id = $_GET['id'];
	mysql_query("UPDATE friends SET status = 'conf' WHERE member_id = '$id'")or die(mysql_error());
?>


<html>
<body>
<?php
								$post = mysql_query("SELECT * FROM members WHERE member_id='$id'")or die(mysql_error());
									$row = mysql_fetch_array($post);
									echo '
										
										<div align="left">'.$row['FirstName']." ".$row['LastName']. '<style="text-decoration:none;">has been successfully added to your schoolfriends</div>
										<div align="right"></div>
									';
								
							?>


</body>
</html>