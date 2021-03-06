<?php
// Title Menu from function.php
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/DataTable.Class.php");

$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->orderType = "desc";

$tbl->order = 0;

$tbl->id = "table_2";

     // List Menu Group
$sql_list = "SELECT
					 *
				FROM 01_view_stats_by_login	  ";
$rs_list = $db->GetAll($sql_list);

$tbl->openTemplate();
  ?>
   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?=$tbl->id?>">
      <thead>
        <tr>
          <th width="21%">Event Date</th>
          <th width="33%">User</th>
          <th width="26%">IP Address</th>
          <th width="20%">Hits</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0;$i<count($rs_list);$i++){ ?>
        <tr>
          <td align="center"><?=$rs_list[$i]['login_date']?></td>
          <td><?=$rs_list[$i]['users']?></td>
          <td><?=$rs_list[$i]['ip_address']?></td>
          <td align="center"><?=$rs_list[$i]['counts']?></td>
        </tr>
        <?php } // End For ?>
      </tbody>
    </table>
<?php
$tbl->closeTemplate();
?>