<?php
$date_file = $_GET['date_file'];
$file = $_GET['file'];


echo "<h4>Logs file date -> $date_file on $file</h4>";
echo "<iframe src=\"uploads_dir/bdf_logs/$file/$date_file.txt\" frameborder=\"0\" width=\"100%\" height=\"100%\"></iframe>";
?>