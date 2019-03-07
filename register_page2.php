

<?php
$suyash2=1;
$c2=0;
$files = glob("images/*.*");
for ($i=11; $i<count($files); $i++)
{
	$c2=$c2+1;
	if($c2%11!=0) 
	{
	$num = $files[$i];
	print "<center>".$num."<style type='text/css'> img.center { display: block;  margin-left: auto;  margin-right: auto; } </style></center>"."<br />";
	echo '<img src="'.$num.'" alt="random image" height="480" width="720"  class="center" />'."<br /><br />";
	}
	else
	{
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
<body bgcolor="#f08080">
<div class="wrapper">
<button onclick="goBack()">Go Back</button>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>
<style type="text/css">
.wrapper {
    text-align: center;
}

.button {
    position: absolute;
    top: 50%;
}
</style>