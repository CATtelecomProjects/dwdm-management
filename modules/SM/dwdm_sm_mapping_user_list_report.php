<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
//print_r($_GET);

$rep_group_id =$_GET['id'];
$name =$_GET['name'];

 $sql_sub_module = "SELECT
                                a.sub_module_id,
                                a.sub_module_name,
                                COUNT(b.report_id) AS count_report_tatal,
                                d.rep_group_type
                              FROM tbl_sm_sub_module a
                                JOIN tbl_sm_report b
                                      ON a.sub_module_id = b.sub_module_id
                                JOIN tbl_sm_mapping_report c
                                      ON (b.report_id = c.report_id
                                              AND c.rep_group_id = $rep_group_id)
                                JOIN tbl_sm_report_group d
                                      ON c.rep_group_id = d.rep_group_id
                              GROUP BY a.sub_module_id";
$rs_sub_module = $db->GetAll($sql_sub_module);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5" id="tbl_list">
  <tr>
    <td class="ui-state-default">Display report : <?=$name?></td>
  </tr>
  <tr>
    <td>
      <div id="accordion_report">
        <?php
	for($i=0;$i<count($rs_sub_module);$i++){	
	
			$sub_module_id = $rs_sub_module[$i]['sub_module_id'];
			$sub_module_name = $rs_sub_module[$i]['sub_module_name'];
			$count_report_tatal = $rs_sub_module[$i]['count_report_tatal'];
			$rep_group_type = $rs_sub_module[$i]['rep_group_type'];
			
//echo json_encode($json_data);
?>
        <h4> <?=$sub_module_name?> [<?=$rep_group_type?>] (<strong><?=$count_report_tatal?></strong> Reports)</h4>
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <?php
  	$sql_report = "SELECT
                                        a.report_id,
                                        b.report_id   AS report_id_map,
                                        a.report_name							 
                                      FROM tbl_sm_report a
                                        LEFT JOIN tbl_sm_mapping_report b
                                              ON (a.report_id = b.report_id
                                                AND b.rep_group_id = $rep_group_id)
                                      WHERE a.sub_module_id = $sub_module_id";
  
    $rs_report = $db->GetAll($sql_report);
	
	for($j=0;$j<count($rs_report);$j++){
		$report_id = $rs_report[$j]['report_id'];
		$report_id_map = $rs_report[$j]['report_id_map'];
		$report_name = $rs_report[$j]['report_name'];
		
		$class = $report_id == $report_id_map ? 'ui-state-focus' : '';
  ?>
          <tr class="<?=$class?>">
            <td><?=($j+1)?>) <?=$report_name?></td>
          </tr>
          <?php 
	} // End Report Loop
?>
        </table>
        <?php
	}
	?>
      </div></td>
  </tr>
</table>
	<script>     
 $(function() {
	 var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
	
	$( "#accordion_report" ).accordion({ heightStyle:'content',   icons: icons    });   

  });
  </script>