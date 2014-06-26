<?php
	require_once('session.php');
?>

<html>

<script src="jquery.js" type="text/javascript"></script>

<script type="text/javascript">

<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

/*function postcom()
{
var f=document.createElement("form");
f.setAttribute('method',"post");
f.setAttribute('action',"comment.php");

var i=document.createElement("textarea");
i.type="text";
i.cols="30";
i.rows="2";
i.id="message";


var b=document.createElement("input");
b.type="submit";
b.value="comment";

f.appendChild(i);
f.appendChild(b);

var q=document.getElementById("asd");
q.appendChild(f);

}*/

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<head><title>Home</title></head>
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />

<link rel="icon" href="img/icon.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
	<link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../css/example.css" media="screen" rel="stylesheet" type="text/css" />
			<script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
			<script type="text/javascript">

jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
  	closeImage   : " ../src/closelabel.png" 
})
</script>

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
		
   });
      });
   </script>
<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
-->
</style>
</body>
<div class="main">
<div id="shadow" class="popup"></div>

  <div class="lefttop1">
  <div class="lefttopleft"><img src="img/logo1.jpg" width="150" height="40" /></div>
   <div class="propic">
	<?php
include('connect.php');
$id= $_SESSION['SESS_MEMBER_ID'];	
$image=mysql_query("SELECT * FROM members WHERE member_id='$id'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['profImage'];
			echo '<div id="pic">';
			echo "<a href=".$row['profImage']." rel=facebox;><img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
			echo '</div>';

?>
</div>

  </div>
  <div class="righttop1">
       <div class="search">
      <form action="search.php" method="POST">
        <input name="search" type="text" maxlength="30" class="textfield"  value="search"/>
	
      </form>
</div>
    <div class="nav">
      <ul id="sddm">
        <li><a href="profile.php" ><?php


$result = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row = mysql_fetch_array($result))
  {
  echo "<img width=20 height=15 alt='Unable to View' src='" . $row["profImage"] . "'>";
echo"  ";
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }

?></a></li>
      <li><a href="Home.php">Home</a></li>
               <li><a  href="#"onmouseover="mopen('m5')" onmouseout="mclosetime()">Account</a>
          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
</a>
        
		<a href="logout.php"><font size="2" class="font1">Logout</font></a>
        </li>
      </ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  
  </div>
  
<div class="right">
	<div class="rightright">
	
	 </div>

	   <div class="shout">


</div> 
<div class="shoutout">
    
		
		<div  class="back"><h4><class="p"><div></h4></div>
			
		</br>
		</br>
		<div class="u">
        <form  name="form1" method="post" action="comment.php">
          <div id="c" class="comment">
            <textarea name="message" cols="45" rows="5" id="message" onclick="this.value='';"></textarea>
          </div>
          <input name="name" type="hidden" id="name" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>"/>
		  <input name="poster" type="hidden" id="name" value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>"/>
          <input name="name1" type="hidden" id="name" value="<?php echo $_SESSION['SESS_LAST_NAME'];?>"/>
          <input type="submit" name="btnlog" value="Post" class="greenButton" />
          </div>
        </form>
		</div>
     <div class="s"> 
	   <?php
	   

 $query  = "
select x.date_created, x.comment_id, x.comment, x.member_id, x.FirstName, x.LastName, x.profImage, UNIX_TIMESTAMP( ) - date_created AS TimeSpent
from(
(
SELECT c.date_created, c.comment_id, c.comment, m.member_id, m.FirstName, m.LastName, m.profImage, UNIX_TIMESTAMP( ) - date_created AS TimeSpent
FROM COMMENT AS c, friends f, members m
WHERE m.member_id = c.member_id
AND c.member_id = f.friends_with
AND f.member_id ='".$_SESSION['SESS_MEMBER_ID'] ."'
AND STATUS =  'conf'
)
UNION (

SELECT c.date_created, c.comment_id, c.comment, m.member_id, m.FirstName, m.LastName, m.profImage, UNIX_TIMESTAMP( ) - date_created AS TimeSpent
FROM COMMENT AS c, friends f, members m
WHERE m.member_id = c.member_id
AND m.member_id ='".$_SESSION['SESS_MEMBER_ID'] ."'
)
UNION (

SELECT c.date_created, c.comment_id, c.comment, m.member_id, m.FirstName, m.LastName, m.profImage, UNIX_TIMESTAMP( ) - date_created AS TimeSpent
FROM COMMENT AS c, friends f, members m
WHERE m.member_id = c.member_id
AND c.member_id = f.member_id
AND f.friends_with ='".$_SESSION['SESS_MEMBER_ID'] ."'
AND STATUS =  'conf'
)
) x

order by x.comment_id desc";

$result = mysql_query($query);
			
			

while($row = mysql_fetch_assoc($result))
{
  /* echo '<div class="information">';
	echo '<div class="pic1">';
			$result1 = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row1 = mysql_fetch_array($result1))
  {
	echo "<img width=40 height=40 alt='Unable to View' src='" . $row1["profImage"] . "'>";
	}
	echo '<div class="message">';
	
		$result1 = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row1 = mysql_fetch_array($result1))
  {


 echo " Posted by:<font color=#1d3162> {$row1['FirstName']}"."&nbsp;{$row1["LastName"]}</font>";
  }*/
	echo '<div class="information">';
	echo '<div class="pic1">';
	echo "<img width=40 height=40 alt='Unable to View' src='" . $row["profImage"] . "'>";
	echo '<div class="message">';
	 echo " Posted by:<font color=#1d3162> {$row['FirstName']}"."&nbsp;{$row["LastName"]}</font>";
	echo '</br>';
	echo "{$row['comment']}";

	echo'</br>';
	echo'</br>';
	echo'</div>';
	echo'<hr width="390">';
	echo '<div class="kkk">';
	
	$query1="SELECT COUNT(1) AS final FROM likesss where comment_id='" . $row["comment_id"] . "'";
	$result1=mysql_query($query1);
	while($row1 = mysql_fetch_assoc($result1))
	{
	echo'<a class="style" href="deletepost.php?id=' . $row["comment_id"] . '"">delete</a>&nbsp;&nbsp;<a class="style" href="like.php?id=' . $row["comment_id"] . '"">Like</a>';
	echo "".$row1['final']."";
	echo'&nbsp;&nbsp;<a id="asd" class="style" href="postcom.php">comment</a>&nbsp';
	//echo "".$row1['final']."";
	}
	echo'</br>';
	echo'</br>';
	$days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
		
	echo'</div>';
	echo'</br>';
	echo'</br>';
	}
	
  echo '</div>';
  echo'</br>';
 
  ?>
  
  
  </div>
	 </div>
	</div>

 
  
</body>
</html>