<?php
@session_start();
require_once("../../includes/config.inc.php");

if (!isset($_GET['module'])) {
    exit;
}

$module = $_GET['module'];


$strSQL = $module <> "ALL" ? "WHERE r.module_name = '$module'" : "";

$sql = "SELECT
            e.*,
            o.org_name,
            o.org_short
          FROM tbl_sm_mapping_user m
            JOIN tbl_sm_report_group r
                  ON m.rep_group_id = r.rep_group_id
            JOIN tbl_sm_emp e
                  ON m.emp_code = e.emp_code
            JOIN tbl_sm_org o
                  ON e.org_code = o.org_code
      AND e.actived = 'Y'
	$strSQL
GROUP BY e.emp_code";

$rs = $db->GetAll($sql);
?>
<style type="text/css">
    tr.group, tr.group:hover {
        background-color: #FFECD9 !important;
    }
</style>
<script type="text/javascript" src="css/<?= THEMES ?>/jquery-ui.min.js"></script>
<script src="./vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/datatables/media/js/dataTables.jqueryui.min.js"></script>
<link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/media/css/dataTables.jqueryui.min.css">
&nbsp;
<div>
    <table id="tbl_list_user" class="display compact" cellspacing="0" width="100%">
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
            if (sizeof($rs) > 0) {
                for ($i = 0; $i < sizeof($rs); $i++) {
                    echo "<tr>\n";
                    echo "<td>" . $rs[$i]['emp_code'] . "</td>\n";
                    echo "<td>" . $rs[$i]['emp_name'] . "</td>\n";
                    echo "<td>" . $rs[$i]['org_name'] . " - " . $rs[$i]['org_short'] . "</td>\n";
                    echo "<td>" . $rs[$i]['emp_pos_desc'] . "</td>\n";
                    echo "<td>" . $rs[$i]['emp_email'] . "</td>\n";
                    echo "</tr>\n";
                }
            }
            ?>
        </tbody>
    </table>

</div>
<script type="text/javascript">
    $(document).ready(function () {

        $.DataTableMerg('tbl_list_user', 2, 25, 60, 5); // table_id , target, Length , scrollY ,colspan
        /*var table = $('#tbl_list_user').DataTable({
         "columnDefs": [
         { "visible": false, "targets": 2 }
         ],
         "order": [[ 2, 'asc' ]],
         "scrollY":        '70vh',
         "scrollCollapse": true,
         "displayLength": 25,		
         'language': {
         'lengthMenu': 'แสดง _MENU_ เรคคอร์ดต่อหน้า', 
         'zeroRecords': 'ไม่พบข้อมูลที่ค้นหา', 
         'info': 'แสดงหน้าที่ _PAGE_ ถึง _PAGES_ ทั้งหมด _TOTAL_ เรคคอร์ด ',
         'sSearch': '<b>ค้นหา</b> :', 
         'infoEmpty': 'ไม่พบข้อมูล',
         'sProcessing': '<img src=\"./images/loading-gear.gif\">',
         'infoFiltered': '(จากทั้งหมด _MAX_ เรคคอร์ด )',	
         'oPaginate':{sFirst:'&laquo;',sLast:'&raquo;',sNext:'&#8250;',sPrevious:'&#8249;'}
         } ,	
         
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
         $('#tbl_list_user tbody').on( 'click', 'tr.group', function () {
         var currentOrder = table.order()[0];
         if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
         table.order( [ 2, 'desc' ] ).draw();
         }
         else {
         table.order( [ 2, 'asc' ] ).draw();
         }
         } );*/
    });
</script>