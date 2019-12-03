<html>
<head>
	<title>Search Result</title>
	<style>
			div.relative {
			  font-size: 40px;
			}
            .item-record{
                float: left;
            }
            .item-delete-record{
                float: right;
            }
	</style>
</head>

<body style="background-color: #f2efd5; color: Black">
<iframe src="http://free.timeanddate.com/clock/i6uynimx/n64/fn6/fs16/fc9ff/tc000/ftb/bas2/bat1/bacfff/pa8/tt0/tw1/tm3/th1/ta1/tb2" frameborder="0" width="249" height="38"></iframe>

<div class="relative">Searched Result for Date  :<?php echo isset($_GET["date"]) ? $_GET["date"] : ''; ?><br></div> 

<div class="relative">Searched Result for Time  :<?php echo isset($_GET["time"]) ? $_GET["time"] : ''; ?><br></div> 

<?php

function redirect($url){
    header("Location: ".$url );
    exit;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $deleteFiles = isset($_POST['checkDelete']) ? $_POST['checkDelete'] : [];
    $redirect    = isset($_POST['redirect']) ? urldecode($_POST['redirect']) : '';
    if ( count($deleteFiles) > 0 && !empty($redirect) ) {
       foreach ($deleteFiles as $key=>$value ) {
           if ( file_exists($value) ) {
               unlink($value);
           }
       }
       $redirect .= '&msg=true';
       redirect($redirect);
    }
} else {
    $delete   = isset($_GET['delete']) ? $_GET['delete'] : '';
    $redirect = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : '';
    
    if ( !empty($delete) && !empty($redirect) ) {
        if ( file_exists($delete) ) {
            unlink($delete);
        }
        $redirect .= '&msg=true';
        redirect($redirect);
    }
}

echo nl2br("Matching Files");

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function mb_basename($path) {
    if (preg_match('@^.*[\\\\/]([^\\\\/]+)$@s', $path, $matches)) {
        return $matches[1];
    } else if (preg_match('@^([^\\\\/]+)$@s', $path, $matches)) {
        return $matches[1];
    }
    return '';
}

$date = isset($_GET['date']) ? $_GET['date'] : date('m-d-Y', strtotime('-15 day'));
$time = isset($_GET['time']) ? $_GET['time'] : date('H:i:s');
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    if ($msg === 'true') {
        echo '<p style="color: green; font-size: 21px; border: 1px solid green; padding: 5px 10px;">The videos have been deleted success.</p>';
} else if( $msg === 'false') {
    echo '<p style="color: red; font-size: 21px; border: 1px solid red; padding: 5px 10px;">The videos have been deleted failed.</p>';
}


$limit = 10;
$intDatetime = validateDate($date.' '.$time) ? strtotime($date.' '.$time) : strtotime('-15 day');

$files = array();
//$dir   = '/';
$dir   = '/home/pi/html';
$path  = '.';
$flag=0;
$after="";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if(strpos($file,('.mp4'))!=false && $file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin" && is_file($file)) {
                if ( file_exists($file) && strlen($_GET["date"])==0 && strlen($_GET["time"])!=0) {
		//$f=1;
		//echo "you've searched for time only";
                    $filetime = filemtime($file);
                    if ( $filetime >= $intDatetime && stripos($file,($_GET["time"]))!=false){
			$f=1;
                        $files[$filetime] = array(
                            'index'    => $filetime,
                            'filename' => mb_basename($file),
                            'path'        => $path.'/'.$file,
                            'datetime' => date('h:i A, m/d/Y', $filetime)
			//$flag=1;
                        );
                    }
                }
		if ( file_exists($file) && strlen($_GET["date"])!=0 && strlen($_GET["time"])==0) {
		//$f=1;
		//echo "You've searched for Date";
                    	$f=1;
                        $filetime = filemtime($file);
                    if ( $filetime >= $intDatetime && stripos($file,($_GET["date"]))!=false){
                        $files[$filetime] = array(
                            'index'    => $filetime,
                            'filename' => mb_basename($file),
                            'path'        => $path.'/'.$file,
                            'datetime' => date('h:i A, m/d/Y', $filetime)
			//$flag=1;
                        );
                    }
                }
		if ( file_exists($file) && strlen($_GET["date"])!=0 && strlen($_GET["time"])!=0) {
		//$f=1;
                    $filetime = filemtime($file);
                    if ( $filetime >= $intDatetime && stripos($file,($_GET["date"]))!=false && stripos($file,($_GET["time"]))!=false){
                        $f=1;
                        $files[$filetime] = array(
                            'index'    => $filetime,
                            'filename' => mb_basename($file),
                            'path'        => $path.'/'.$file,
                            'datetime' => date('h:i A, m/d/Y', $filetime)
			//$flag=1;
                        );
                    }
                }
            }
        }
        //need closedir for executing another process
        closedir($dh);
        //no need for that, please make message not found video.
    	//if ($f==0){
    		//echo "<script> location.href='404.html';</script>"; 
    	//}
    }
}



krsort($files); //for desc [ksort] for asc
$totalVideo = count($files);
$totalPage  = 0;
$currentLink = '';
$actualLink = $currentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/well.php"; 
$actualLink .= '?date='.(isset($_GET['date']) ? $_GET['date'] : '');
$actualLink .= '&time='.(isset($_GET['time']) ? $_GET['time'] : '');
?>
<form name="frmListing" id="frmListing" method="post" onsubmit="return submitForm();" action="<?php echo $actualLink ?>">
<?php
$number = 1;
if ( $totalVideo > 0 ){
    $pagingData = $files;
    if( $totalVideo > $limit ) {
        $extractData = array_chunk($files, $limit);
        $pagingData  = isset($extractData[$page - 1]) ? $extractData[$page - 1] : array();
        $totalPage   = count($extractData);
    }
    //listing and paging data video
    
	echo "<br>";
    
    foreach( $pagingData as $key=>$value ): ?>
    <p style="display: inline-table; width: 97%; margin: 5px 10px;">
        <label for="checkDelete_<?=$key?>" style="float: left; margin:0px 5px; ">
            <input type="checkbox" name="checkDelete[]" id="checkDelete_<?=$key?>" class="input-delete-record" value="<?php echo $value['filename']; ?>"/> <strong><?php echo $number ?></strong>.
        </label>
        <a href="<?php echo $value['path']; ?>" target="_blank" class="item-record">
             <?php echo $value['filename']; ?> (<?php echo $value['datetime']; ?>) 
        </a>
        <a href="<?php echo $currentLink; ?>?delete=<?php echo $value['filename']; ?>&redirect=<?php echo urlencode($actualLink); ?>" class="item-delete-record">[DELETE]</a> 
    </p>
<?php
    $number ++;
    endforeach;
} else { ?>
    <p style="display: inline-table; width: 100%; margin: 5px 10px;"><h1>The video not found.</h1></p>
    <?php
}

if ( $totalPage > 1 ) {
    echo '<p class="paging">';
    for( $i=0; $i<$totalPage; $i++ ) { 
        $class = ($i+1) == $page ? 'pagenum-active' : 'pagenum';
        ?>
            <a href="<?php echo $actualLink.'&page='.($i + 1); ?>" class="<?=$class?>"><?php echo ($i + 1); ?></a>
        <?php 
    }
    echo '</p>';
}

    if( $number > 1 ){ ?>
    <input type="submit" name="cmdDelete" id="cmdDelete" value="Delete All"  />
    <input type="hidden" name="redirect" value="<?php echo urlencode($actualLink); ?>" />
    <?php } ?>
</form>
<script type="text/javascript">
    function submitForm(){
        var checkedValue = document.querySelector('.input-delete-record:checked');
        if ( checkedValue !== null ) {
            return true;
        } else {
            alert('Please choose your files, do you want to delete?');
        }
        return false;
    }
</script>
</body>
</html>
