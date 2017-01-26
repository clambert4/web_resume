<?php
//download.php
//content type
header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="christopher_lambert.pdf"');
//read from server and write to buffer
readfile('resume/christopher_lambert.pdf');
?>