
<?php
				  if (isset($_GET['id']))
	{
			$con = mysql_connect("localhost", "root", "root");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("db", $con);
			$messages_id = $_GET['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM postcomment WHERE comment_id='$messages_id'");
			header("location: profile.php");
			exit();
			
			mysql_close($con);
			}
			?>