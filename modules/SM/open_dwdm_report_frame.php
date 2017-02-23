<?php
session_start();
$reportURL = urlencode($_GET['reportURL']);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>DW/DM Report</title>
</head>

  <script src="../../vendor/components/jquery/jquery.min.js"></script>
<style type="text/css">
body { margin:0px; }

</style>
<body>
<iframe name="frmReport" id="frmReport" src="open_dwdm_report.php?reportURL=<?=$reportURL?>" frameborder="0" marginheight="0" marginwidth="0"  width="100%" height="860"></iframe>
</body>
<script type="text/javascript">
$(function(){
	var h = $( window ).height()-30;
	var w = $( window ).width()-20;
	$('iframe').attr('width' , w);
	$('iframe').attr('height' , h);
});
</script>
</html>
