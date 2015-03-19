<?php
function readUsage(){
$date = date('Y-m-d');

$log_dir = "./uploads_dir/bdf_logs/";
$files_DI = "$log_dir/DI/$date.txt";
$files_BI = "$log_dir/BI/$date.txt";

// Read Files
$lines_DI = file($files_DI);
$lines_BI = file($files_BI);


// Loop through our array, show HTML source as HTML source; and line numbers too.
// DI Logs
foreach ($lines_DI as $line_num => $line) {
	$data_DI[] = explode(" ",$line);	
	//echo "Line #<b>{$line_num}</b> : " . $line . "<br />\n";
}

// BI Logs
foreach ($lines_BI as $line_num => $line) {
	$data_BI[] = explode(" ",$line);	
	//echo "Line #<b>{$line_num}</b> : " . $line . "<br />\n";
}

/*print "<pre>";
print_r($data_BI);
print "</pre>";*/

// #$data_DI[row_no][array_order]
//DI
$arrData['DI']['ftproot'] = trim(str_replace('%','',$data_DI[15][9])); 
$arrData['DI']['data'] 	  = trim(str_replace('%','',$data_DI[18][9]));
$arrData['DI']['data1']   = trim(str_replace('%','',$data_DI[17][9]));
$arrData['DI']['data2']   = trim(str_replace('%','',$data_DI[16][9]));
$arrData['DI']['work']    = trim(str_replace('%','',$data_DI[3][9]));
$arrData['DI']['archive'] = trim(str_replace('%','',$data_DI[20][9]));
$arrData['DI']['utilloc']  = trim(str_replace('%','',$data_DI[5][10]));
$arrData['DI']['var']      = trim(str_replace('%','',$data_DI[4][9]));
  
 //BI
$arrData['BI']['data']     =  trim(str_replace('%','',$data_BI[16][9])); 
$arrData['BI']['work']    =  trim(str_replace('%','',$data_BI[3][9]));
$arrData['BI']['utilloc']   =  trim(str_replace('%','',$data_BI[6][10]));
$arrData['BI']['var']       =  trim(str_replace('%','',$data_BI[5][9]));


return $arrData;

}


$a = readUsage();
print "<pre>";
print_r($a);
print "</pre>";
?>