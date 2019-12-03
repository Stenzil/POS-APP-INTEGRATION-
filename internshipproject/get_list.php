
<?php
$path = ".";
$dh = opendir($path);
$i=1;
$k=0;
$auth="bjhjbVZMTWt5SHZoTkg5YnlXMkR5ZlZ0ZlBZS1E2S0prZndrNG5XZWI1dEVEdVFGeWVVRXNNVGJaZE1zSjlBU1l2VmpEOTJaekx1cFhzWGRmcGZzcXRNbk1SV2FqRkdGa0RG";
foreach (getallheaders() as $name => $value) {  
    if($name=="Authorization"){
        $authkey=$value;
    }
}
if(strcmp($auth,$authkey)==false)
{
    if(strlen($_GET["date"])!=0 or strlen($_GET["time"])!=0){
    while (($file = readdir($dh)) !== false) {
        if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin" ) {
            if (strlen($_GET["date"])==0 && strlen($_GET["time"])!=0){
                if (strpos($file, ('.mp4'))!=false && strpos($file,($_GET["time"]))!=false){
                //echo nl2br("<a href='$path/$file'>$file</a><br /><br />");
                $post_data = json_encode(array('item' => $file));
                echo $post_data;
                $i++;
                $k=1;
            }
            }
            if (strlen($_GET["date"])!=0 && strlen($_GET["time"])==0){
                if (strpos($file, ('.mp4'))!=false && strpos($file,($_GET["date"]))!=false){
                //echo nl2br("<a href='$path/$file'>$file</a><br /><br />");
                $i = getHostByName(getHostName());    
                $post_data = json_encode(array('Name' => $file,'IP'=>$i));
                echo json_encode(array("Resp"=>$post_data));
                $i++;
                $k=1;
            }
            }
            if (strlen($_GET["date"])!=0 && strlen($_GET["time"])!=0){
                if (strpos($file, ('.mp4'))!=false && strpos($file,($_GET["date"]))!=false && strpos($file,($_GET["time"]))!=false){
                //echo nl2br("<a href='$path/$file'>$file</a><br /><br />");
                $post_data = json_encode(array('item' => $file));
                echo $post_data;
                $i++;
                $k=1;
            }
            }
            

            
        }
    }

    }   
    if($k==0){
                echo json_encode(array('item' => "Invalid Request"));
    }
    closedir($dh);
}
else{
    echo json_encode(array('item' => "Invalid AuthKey"));
}

?> 
