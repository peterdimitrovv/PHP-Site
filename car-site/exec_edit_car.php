 <?php include "inc-files/before_content.code"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>You are not allowed to do that action!</span>";
	exit;
}
$errMsg="";
if (empty($_POST["price"]))
	$errMsg .="Not inserted price!<br>";
else
	if (!is_numeric($_POST["price"])) $errMsg .="Incorrect price!<br>";
if ($errMsg) 
{
	echo "<span class='errMsg'>".$errMsg."</span><br>";
	echo "<a href='edit_car.php?edit_id=".$_POST["id_car"]."'>Edit data</a>";
}
else
{
  $mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName); 
	$mysqli->set_charset('utf8'); 
	$str_query="update tbl_cars set price=".$_POST["price"].", moreinfo='".$_POST["moreinfo"]."' where id_car=".$_POST["id_car"];
	if ($mysqli->query($str_query))
		echo "The data is uploaded...<br>";
	$mysqli->close();
}
?>
 </div>
 <?php include "inc-files/after_content.code"; ?>
