<?php
@session_start();
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');


$tmp = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
$term = iconv('TIS620', 'UTF8', $tmp);

$sql = "SELECT EMP_ID,FULLNAME FROM m_tbluser WHERE EMP_ID LIKE '%".$term."%'  AND YEARS = '".$_SESSION['years']."' AND MONTHS = '".$_SESSION['months']."' AND  ROWNUM<=10";
$rs = $db->GetAll($sql);
for($i=0;$i<count($rs);$i++){	
		$json_data[]=array(  
									'id'=>  iconv('TIS620', 'UTF8', $rs[$i]['FULLNAME']),
									'value' => $rs[$i]['EMP_ID']
									);
		
}
echo json_encode($json_data);

?>

	$( "#searchID" ).autocomplete({
					source: "KPIs/Search/search_emp_code.php",
					minLength: 2,
					select: function( event, ui ) {
						$("#searchName").val(ui.item.id);
					}

		});



	$( "#searchName" ).autocomplete({
			source: "KPIs/Search/search_emp_name.php",
			minLength: 2,
					select: function( event, ui ) {
						$("#searchID").val(ui.item.id);
					}
	});