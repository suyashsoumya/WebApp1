<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body bgcolor="#f08080">
  <div class="header">
  	<center><h1>Application Security Web App</h1>
  </div>
	  	<p>
  		<center>Already a member? <a href="login.php">Sign in</a>
  	</p>
  <center><form method="post" action="server.php">
  	
  	<div class="input-group">
  	  <label>Enter Username</label>
  	  <input type="text" name="username" 
	  value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Enter Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Enter Password</label>
  	  <input type="password" name="password_1">
	  <br></br>
  	</div>
	<div class="g-recaptcha" data-sitekey="6LcTLlAUAAAAAAKcw22NELXRgL6knKwCtO8vHegE">
	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Complete Registeration</button>
	  <br></br>
  	</div>

  </form>
  
</body>
</html>

<?php

//showing images on homescreen

$suyash=1;
$c=0;
$files = glob("images/*.*");

//display only 10 images a page

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

<style type="text/css">
img.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

</style>
