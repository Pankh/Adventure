
<?php
			require_once('session.php');	 
			include('connect.php');
			//$messages =  $_POST['comment_id'];
			$comment_id = $_GET['id'];
			//echo '".$_SESSION['SESS_MEMBER_ID'] ."';
			$member=$_SESSION['SESS_MEMBER_ID'];
			
			//echo $member;
			//echo $comment_id;
			
			
			
			
			
			
			
			
			//echo '$messages';
			//$poster =clean($_POST['poster']);
			//mysql_query("INSERT INTO like(like, likeby) VALUES ('$messages_id','$likeby')");
			$sql="INSERT INTO likess (member_id,comment_id)VALUES('$member','$comment_id')";

if (!mysql_query($sql,$con))
  {
  echo '40';
  die('Error: ' . mysql_error());
  }
			header("location: friendprofile.php");
			exit();
			
			//mysql_close($con);
			
			?>