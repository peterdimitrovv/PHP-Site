<?php include "inc-files/before_content.code"; ?>
 <div id="content">
 <?php
 if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
 {
	 echo "<span class='errMsg'>You are not allowed to do this action!!</span>";
	 exit;
 }
 $errMsg="";
 if ($_POST["id_make"]==0) $errMsg .="Mark - not chosen!<br>";
 if (empty($_POST["price"]))
	 $errMsg .="Price - not chosen!<br>";
 else 	
	 if (!is_numeric($_POST["price"])) $errMsg .="Incorrectly entered price!<br>";
 if($errMsg)
 {
	 echo "<span class='errMsg'>".$errMsg."</span><br>";
	 echo "<a href='insert_car.php'>New insert</a>";	 
 }
 else{
	 $mysqli = new mysqli(dbHost, dbUser, dbPasswd,dbName);
	 $mysqli->set_charset('utf8');
	 $str_query="INSERT INTO tbl_cars(id_make,price, moreinfo, picture) VALUES ('".$_POST["id_make"]."','".$_POST["price"]."', '".$_POST["moreinfo"]."','')";
	 if($mysqli->query($str_query))
		 echo "Tha data is preserved in the date base<br>";
	 
	 $fileErr=$_FILES["imgFile"]["error"]>0; 
	 
	 if($fileErr)
	 {
		 echo "<span class='errMsg'>Photo not loaded</span><br>";
	 }
	 else{
		 $allowedExt=array("gif", "jpeg", "jpg", "png");
		 $arrName=explode(".", $_FILES["imgFile"]["name"]);
		 $ext =end($arrName);
		 if(in_array($ext, $allowedExt) && ($_FILES["imgFile"]["size"
		 ] <200000))
		 {
			 $idCar=$mysqli->insert_id;
			 $picName="Pic".$idCar.".".$ext;
			 move_uploaded_file($_FILES["imgFile"]["tmp_name"], "pictures/".$picName);
			 $str_query="update tbl_cars set picture='".$picName."'
			 where id_car=".$idCar;
		 if($mysqli->query($str_query))
			 echo "The photo is uploaded...<br>";
		 }
		 
		else
			echo "<span class='errMsg'>Invalid image file</span><br>"	;	 
		 
	 }
	 $mysqli->close();
		 
 }
 ?>
 
 
 
 </div>
 <?php include "inc-files/after_content.code"; ?>