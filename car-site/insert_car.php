<?php include "inc-files/before_content.code"; ?>
 <div id="content">
 <table align="center"><tr><td>
 <form id="insertCar" action="exec_insert_car.php" method="post" enctype="multipart/form-data">
 <h4>Insert data for new car</h4><br>
 Mark:
 <?php
 $mysqli= new mysqli(dbHost, dbUser, dbPasswd, dbName);
 $mysqli-> set_charset('utf8');
 $result =$mysqli->query("SELECT * FROM tbl_makes order by make");
 echo "<select name='id_make'>";
 echo "<option value='0'>Choose...</otpion>";
 while($row=$result->fetch_assoc())
 {
	 echo "<option value='".htmlspecialchars(stripslashes($row['id_make'])) ."'>".htmlspecialchars(stripslashes($row['make'])). "</option>";
 }
 echo "</select>";
 $mysqli->close();
 ?>
 Price<input type="number" min="0" name="price" value="">lv<br><br>
 <textarea name="moreinfo" rows="5" cols="50">
 Information...</textarea><br>
 Photo:<input type="file" name="imgFile"><br>
 <br><br>
 <input type="submit" value="Insert">
 
 
 
 </form>
 </table>

 </div>
 <?php include "inc-files/after_content.code"; ?>
