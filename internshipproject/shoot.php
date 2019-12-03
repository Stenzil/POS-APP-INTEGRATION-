<?php
$com=escapeshellcmd('sudo python3 cookieVideo.py &');
$out=shell_exec($com);
echo "hi";
echo $out;
?>