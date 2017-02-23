<?php
@session_start();
require_once("../../includes/config.inc.php");

if(!isset($_GET['rep_group_id'])) { exit; }

$rep_group_id = $_GET['rep_group_id'];

$sql = "SELECT
  o.org_name,
  o.org_short,
  m.emp_code,
  u.emp_name,
  u.emp_pos_desc,
  u.emp_pos_short,
  u.emp_email
FROM tbl_sm_mapping_user m
  JOIN tbl_sm_emp u
    ON m.emp_code = u.emp_code
  JOIN tbl_sm_org o
    ON u.org_code = o.org_code
WHERE m.rep_group_id =  $rep_group_id
ORDER BY u.org_code, u.emp_code";

$rs = $db-> GetAll($sql);

?>
<style type="text/css">
tr.group, tr.group:hover {
	background-color: #FFECD9 !important;
}
</style>
<script type="text/javascript" src="css/<?=THEMES?>/jquery-ui.min.js"></script>
<script src="./vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/datatables/media/js/dataTables.jqueryui.min.js"></script>
<link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/media/css/dataTables.jqueryui.min.css">
&nbsp;
<div>
<table id="tbl_report_group" class="display compact" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>รหัสพนักงาน</th>
      <th>ชื่อ - สกุล</th>
      <th>หน่วยงาน</th>
      <th>ตำแหน่ง</th>
      <th>อีเมล</th>
    </tr>
  </thead> 
  <tbody>
    <?php
	if(sizeof($rs)>0){
		for($i=0;$i<sizeof($rs);$i++){
				echo "<tr>\n";
				echo "<td>".$rs[$i]['emp_code']."</td>\n";
				echo "<td>".$rs[$i]['emp_name']."</td>\n";
				echo "<td>".$rs[$i]['org_name']." - ".$rs[$i]['org_short']."</td>\n";
				echo "<td>".$rs[$i]['emp_pos_desc']."</td>\n";
				echo "<td>".$rs[$i]['emp_email']."</td>\n";				
				echo "</tr>\n";
		}
	}

?>
  </tbody>
</table>

</div>
<script type="text/javascript">
    $(document).ready(function() {
		
		$.DataTableMerg('tbl_report_group' ,2 ,25 , 55 ,5 ); // table_id , target, Length , scrollY ,colspan
  /*
    var table = $('#tbl_report_group').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
		 "scrollY":        '55vh',
        "scrollCollapse": true,
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5"><strong>'+group+'</strong></td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#tbl_report_group tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
	*/
} );
</script>