<style type="text/css">
body{font-family: Aria, Tahoma; line-height:160%; }
.paging{ width: 100%; text-align: right; }
.paging .pagenum{ padding: 5px 7px; color: #333; margin: 2px; background: #DFDFDF; font-weight: bold; }
.paging .pagenum-active{ padding: 5px 7px; color: #333; margin: 2px; background: #666; color:#FFF; font-weight: bold; }
.item-record{ font-size:16px; text-transform: capitalize; color:#333; clear: both; text-decoration: none;}
.item-record:hover{ text-decoration: underline; }
</style>
<?php

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
$limit = 10;
$intDatetime = validateDate($date.' '.$time) ? strtotime($date.' '.$time) : strtotime('-15 day');

$files = array();
$dir   = '/home/pi/html';
$path  = '.';

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if(strpos($file,('.mp4'))!=false && $file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin" && is_file($file)) {
                if ( file_exists($file)) {
                    $filetime = filemtime($file);
                    if ( $filetime >= $intDatetime ){
                        $files[$filetime] = array(
                            'index'    => $filetime,
                            'filename' => mb_basename($file),
                            'path'        => $path.'/'.$file,
                            'datetime' => date('h:i A, m/d/Y', $filetime)
                        );
                    }
                }
            }
        }
        closedir($dh);
    }
}

krsort($files); //for desc [ksort] for asc
$totalVideo = count($files);
$totalPage  = 0;
if ( $totalVideo > 0 ){
    $pagingData = $files;
    if( $totalVideo > $limit ) {
        $extractData = array_chunk($files, $limit);
        $pagingData  = isset($extractData[$page - 1]) ? $extractData[$page - 1] : array();
        $totalPage   = count($extractData);
    }
    //listing and paging data video
    $number = 1;
    foreach( $pagingData as $key=>$value ): ?>
        <a href="<?php echo $value['path']; ?>" target="_blank" class="item-record"><strong><?=$number?></strong>. <?php echo $value['filename']; ?> (<?php echo $value['datetime']; ?>) </a><br>
    <?php
    $number ++;
    endforeach;
} else {
    
}

if ( $totalPage > 1 ) {
    $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/test_path.php";
    echo '<p class="paging">';
    $actualLink .= '?date='.(isset($_GET['date']) ? $_GET['date'] : '');
    $actualLink .= '&time='.(isset($_GET['time']) ? $_GET['time'] : '');
    for( $i=0; $i<$totalPage; $i++ ) { 
        $class = ($i+1) == $page ? 'pagenum-active' : 'pagenum';
        ?>
            <a href="<?php echo $actualLink.'&page='.($i + 1); ?>" class="<?=$class?>"><?php echo ($i + 1); ?></a>
        <?php 
    }
    echo '</p>';
}
?>