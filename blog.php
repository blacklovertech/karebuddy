<?php
// Get all HTML files in the directory
$html_files = glob("*.{html,htm,jpg,png}", GLOB_BRACE);
$PORT=8080;
$url = $_SERVER['DOCUMENT_ROOT']. '/blog/';
echo $url;
// Print out each file as a link
foreach($html_files as $file) {
    $contents = file_get_contents($file);
    $start = strpos($contents, '<title>');
    if ($start !== false) {
         $end = strpos($contents, '</title>', $start);
         $line = substr($contents, $start + 7 , $end - $start - 7);
         echo  $_SERVER['HTTP_HOST'] ,"<center><a href=" . '"' . $url . $file . '"' . ">$line</a></center><br>\n";
    }
}


?>
