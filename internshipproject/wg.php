<html>
<head>
	<title>Search Result</title>
	<style>
			div.relative {
			  font-size: 40px;		  
			}
	</style>
</head>

<body style="background-color: #f2efd5; color: Black">
<iframe src="http://free.timeanddate.com/clock/i6uynimx/n64/fn6/fs16/fc9ff/tc000/ftb/bas2/bat1/bacfff/pa8/tt0/tw1/tm3/th1/ta1/tb2" frameborder="0" width="249" height="38"></iframe>

<div class="relative">Searched Result for Date  :<?php echo $_GET["date"];?><br></div> 

<div class="relative">Searched Result for Time  :<?php echo $_GET["time"];?><br></div> 

<?php
echo nl2br("Matching Files");
$path = ".";
$dh = opendir($path);
$i=1;
$k=0;
echo "<br>";
echo "<br>";
if(strlen($_GET["date"])!=0 or strlen($_GET["time"])!=0){
while (($file = readdir($dh)) !== false) {
    if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin" && is_file($file)) {
        if (strlen($_GET["date"])==0 && strlen($_GET["time"])!=0){
        	if (strpos($file, ('.mp4'))!=false && strpos($file,($_GET["time"]))!=false){
			echo nl2br("<a href='$path/$file'>$file</a><br /><br />");
        	$i++;
        	$k=1;
        }
        }
        if (strlen($_GET["date"])!=0 && strlen($_GET["time"])==0){
        	if (strpos($file, ('.mp4'))!=false && strpos($file,($_GET["date"]))!=false){
			echo nl2br("<a href='$path/$file'>$file</a><br /><br />");
        	$i++;
        	$k=1;
        }
        }
        if (strlen($_GET["date"])!=0 && strlen($_GET["time"])!=0){
        	if (strpos($file, ('.mp4'))!=false && strpos($file,($_GET["date"]))!=false && strpos($file,($_GET["time"]))!=false){
			echo nl2br("<a href='$path/$file'>$file</a><br /><br />");
        	$i++;
        	$k=1;
        }
        }
        

        
    }
}

}	
if($k==0){
			echo "<script> location.href='404.html'; </script>";
}



closedir($dh);
?> 

</body>
</html>
