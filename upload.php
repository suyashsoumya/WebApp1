<!DOCTYPE html>
<html>
<head>
</head>
<body bgcolor="#728FCE">
<p><center><h3> <a href="index.php?logout='1'" style="color: white;">logout</a> </p></h3></center>
<center><button type="submit" class="btn" name="homepage"> <a href="register.php">Go To Homepage</button></a></center>
<center><button type="submit" class="btn" name="delete_picture"> <a href="delete.php">Delete Last Image Uploaded</button></a></center>
<center><button type="submit" class="btn" name="caption"> <a href="caption.html">Update Caption</button></a></center>
</body>
</html>

<?php
$target_dir = "images/"; 
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$caption=$_POST["name"];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



// Check file size. Stop upload of big files
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, upload file
} 

else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "	YES! SUCCESS!! Image has been uploaded!!!"."<br /><br />";
		
    } else {
        echo "Sorry, there was an error uploading your file."."<br /><br />";
    }
}
		

//connect to database

//displaying the caption and images

mysql_connect("localhost", "root", "") or die(mysql_error()) ; 

mysql_select_db("demo") or die(mysql_error()) ;

mysql_query("INSERT INTO visitors(name,photo) VALUES ('$caption', 'photo')") ;

echo "<b>The Images Displayed below have the Respective Captions:</b> "."<br> "; 

$data = mysql_query("SELECT * FROM visitors") or die(mysql_error());
while($info = mysql_fetch_array( $data )) 
{ 
echo "<b>Caption Name:</b> ".$info['name'] . "<br> "; 
}

$suyash=1;
$c=0;
$files = glob("images/*.*");
for ($i=1; $i<count($files); $i++)
{
	$c=$c+1;
	if($c%11!=0) 
	{
	$num = $files[$i];
	print "<center>".$num."<style type='text/css'> img.center { display: block;  margin-left: auto;  margin-right: auto; } </style></center>"."<br />";
	echo '<img src="'.$num.'" alt="random image" height="480" width="720"  class="center" />'."<br /><br />";
	}
	else
	{
		
	$suyash=$suyash+1;
	echo "<center>".'<a href="register_page2.php">' . $suyash . '</a> ';
	exit;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>

<style type="text/css">
img.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>


