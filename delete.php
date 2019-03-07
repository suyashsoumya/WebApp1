<?php

mysql_connect("localhost", "root", "") or die(mysql_error()) ; 

mysql_select_db("demo") or die(mysql_error()) ;

mysql_query("DELETE FROM `visitors` WHERE name=caption") ;
echo "Latest Picture Has Been Deleted!!!";

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body bgcolor="#f08080">
<p><center><h3> <a href="index.php?logout='1'" style="color: white;">logout</a> </p></h3></center>
<center><button type="submit" class="btn" name="homepage"> <a href="register.php">Go To Homepage</button></a></center>
<center><button type="submit" class="btn" name="upload"> <a href="upload.html">Upload new image</button></a></center>
</body>
</html>