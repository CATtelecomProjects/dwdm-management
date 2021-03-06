<?php

class dataTable {

    var $module;
    var $page;
    var $title;
    var $menu;
    var $id;
    var $order = 1;
    var $paging = true; // กำหนดค่ากำแสดง Paging true = แสดง / false = ซ่อน
    var $pagingLength = 25;  // กำหนดค่า Default ในการแสดงต่อหน้า
    var $pagingStart = 0;  // กำหนดค่าเริ่มต้นการแสดง Pag
    var $pagingEnd = 25;    // กำหนดค่าสิ้นสุดการแสดง
    var $orderType = "asc";
    var $saveState = false;

    function openTemplate() {
        echo "<style type='text/css' title='currentStyle'>\n";
//		echo "	@import './js/jquery.dataTables/css/jquery.dataTables.css';\n";
        /* echo "	@import './js/jquery.dataTables/css/jquery.dataTables_themeroller.css';\n"; */
        echo "	@import 'vendor/datatables/datatables/media/css/jquery.dataTables_themeroller.css';\n";
        //echo "	@import './js/jquery.dataTables/css/dataTables.jqueryui.css';\n";
        //echo "	@import './js/jquery.dataTables/css/page.css';\n";
        echo "</style>\n";
        /* echo "<script type='text/javascript' language='javascript' src='./js/jquery.dataTables/js/jquery.dataTables.min.js'></script>\n";		 */
        echo "<script type='text/javascript' language='javascript' src='vendor/datatables/datatables/media/js/jquery.dataTables.min.js'></script>\n";
        /* echo "<script type='text/javascript' src='./js/modules.core.js'></script>"; */
        /* 		echo "<script type='text/javascript' src='./modules/".$this->module."/".$this->page.".js'></script>"; */
        echo "<script type='text/javascript'>";
        echo "$(function(){";
        echo "	var oTable_" . $this->id . " = $('#" . $this->id . "').dataTable({";
        echo "				'bJQueryUI': true,";
        echo "				'bStateSave': '" . $this->saveState . "', ";
        echo "				'sPaginationType': 'full_numbers',";
        echo "               'bPaginate': '" . $this->paging . "', ";
        echo "               'iDisplayLength' : " . $this->pagingLength . " ,";
        echo "               'iDisplayStart': " . $this->pagingStart . " ,";
        echo "               'iDisplayEnd' : " . $this->pagingEnd . " ,";
        echo "				'aaSorting': [[ " . $this->order . ", '$this->orderType' ]],";
        echo "				'language': {";
        echo "				    'lengthMenu': 'แสดง _MENU_ เรคคอร์ดต่อหน้า', ";
        echo "				    'zeroRecords': 'ไม่พบข้อมูลที่ค้นหา', ";
        echo "				     'info': 'แสดงหน้าที่ _PAGE_ ถึง _PAGES_ ทั้งหมด _TOTAL_ เรคคอร์ด', ";
        echo "				     'sSearch': '<b>ค้นหา</b> :', ";
        echo "				     'infoEmpty': 'ไม่พบข้อมูล', ";
        echo "				     'infoFiltered': '(จากทั้งหมด _MAX_ เรคคอร์ด )',";
        echo "				     'sProcessing': '<img src=\"./images/loading-gear.gif\">',	";
        echo "				     'oPaginate':{sFirst:'&laquo;',sLast:'&raquo;',sNext:'&#8250;',sPrevious:'&#8249;'} ";
        echo "				} ";

        echo "				});";
        echo "});";
        echo "</script>";
        echo "	<div id='container'>\n";
        echo "	<div class='pages_jui'>\n";
    }

// End function";

    function openTable() {

        echo "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='ui-widget-content' id='tbl_content'>";
        echo "  <tr>";
        echo "  <td><table width='100%' border='0' cellspacing='1' cellpadding='2'>";
        echo "  <tr>";
        echo "  <td width='100%' align='right'><table width='100%' border='0' cellspacing='0' cellpadding='0'>";
        echo "  <tr>";
        echo "  <td align='left' valign='middle' height='20'><div class='txt_header' id='menuTitle'> <b>" . $this->title . "</b></div></td>";
        echo "  <td align='right' valign='top'>" . $this->menu . "</td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "  <td colspan='2' align='left' valign='middle' style='height:3px'></td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "  <td colspan='2' align='left' valign='middle'>";
        $this->openTemplate();
        echo "<div id='data_detail'>";
    }

// End Function

    function closeTable() {
        echo "     </div>";
        $this->closeTemplate();
        echo "</td>";
        echo "  </tr>";
        echo "</table></td>";
        echo "  </tr>";
        echo "</table></td>";
        echo "  </tr>";
        echo "</table>";
    }

// End Function

    function closeTemplate() {
        echo "</div>\n";
        echo "<div class='spacer'></div>\n";
        echo "</div>\n";
    }

// End function
}

// End Class
?>