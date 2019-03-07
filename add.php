<?php 

$target = "images/"; 

$target = $target . basename( $_FILES["photo"]["name"]); 
$name=$_POST['name']; 
$pic=($_FILES['photo']['name']); 

mysql_connect("localhost", "root", "") or die(mysql_error()) ; 

mysql_select_db("demo") or die(mysql_error()) ;

mysql_query("INSERT INTO visitors VALUES ('$name', '$pic')") ;

if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)) 

{ 
echo "The file ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory"; 

 } 

else { 
 
echo "Sorry, there was a problem uploading your file."; 

 } 


$data = mysql_query("SELECT * FROM visitors") or die(mysql_error());

while($info = mysql_fetch_array( $data )) { 

echo '<img src="data:image/jpeg;base64,'.base64_encode($info['photo'] ).'" height="480" width="720"  />';

Echo "<b>Name:</b> ".$info['name'] . "<br> "; 
 } 
 ?>  