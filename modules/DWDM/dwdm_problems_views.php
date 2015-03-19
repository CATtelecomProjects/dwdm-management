<?php 
@session_start();
require_once("../../includes/config.inc.php");

// Show Edit Value
//show_get();

$db->debug = 0;


	$id = $_GET['id'];
	$sql_edit = "SELECT
						  a.*,
						  b.cate_name
						FROM tbl_dwdm_problems a,
						  tbl_dwdm_category b
						WHERE a.cate_id = b.cate_id
							AND a.id =  $id";
	$rs_edit = $db->GetRow($sql_edit);
	$problem_status = $rs_edit['problem_status'];

	$problem_date_start = date("d-m-Y H:i", strtotime($rs_edit['problem_date_start']));
	$problem_date_finish = date("d-m-Y H:i", strtotime($rs_edit['problem_date_finish']));
	


?>

<form action="" method="post" enctype="multipart/form-data" name="form_<?=$_GET['pages']?>" id="form_<?=$_GET['pages']?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td>&nbsp;</td>
      <td width="37%"><strong>สถานะการดำเนินการ :</strong>
        <label>          
           <?=$problem_status  == "P" ? "กำลังดำเนินการ" : "ดำเนินการเสร็จแล้ว";?>
      </label></td>
      <td width="45%" valign="top"> <strong>หมวดหมู่ :</strong>
        <label for="cate_id"><?=$rs_edit['cate_name']?></label>
        </td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>ปัญหา/สาเหตุ :</strong></td>
       <td colspan="2"><hr></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>วันที่แจ้งปัญหา :</strong>
        <label for="problem_date_start"></label>
        <?=$problem_date_start ?></td>
      <td width="3%" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>หัวข้อปัญหา :</strong><br />
        <? //=htmlspecialchars($rs_edit['problem_topic'],ENT_QUOTES);?>
        <textarea name="problem_topic" cols="110" rows="10" id="problem_topic" readonly style="background-color:#efefef"><?=htmlspecialchars($rs_edit['problem_topic'],ENT_QUOTES);?></textarea>
        </td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>ชื่อผู้แจ้งปัญหา :</strong>
        <label>
          <?=$rs_edit['problem_owner']?>
        </label>
        </td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>แก้ไขปัญหา :</strong></td>
      <td colspan="2"><hr></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>วันที่ดำเนินการแล้วเสร็จ :</strong>
        <label for="problem_finish"></label>
        <?=$problem_date_finish?></td>
      <td width="3%" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="15%">&nbsp;</td>
      <td colspan="2"> <strong>วิธีแก้ปัญหา :</strong><br>
       <textarea name="problem_solution" cols="110" rows="12" id="problem_solution" readonly style="background-color:#efefef"><?=htmlspecialchars($rs_edit['problem_solution'],ENT_QUOTES);?></textarea><? //=htmlspecialchars($rs_edit['problem_solution'],ENT_QUOTES);?></td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>ชื่อผู้แก้ไขปัญหา :</strong>
      <?=$rs_edit['problem_by'];?></td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr></td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td height="47">&nbsp;</td>
      <td colspan="2" valign="middle">
        <label for="docs_id"><span class="action"><button>ปิดหน้าต่าง</button></span></label></td>
      <td valign="middle">&nbsp;</td>
    </tr>
  </table>
</form>
<span id="divMsgDiag"></span> 

<script language="javascript">
$(function(){			
			
			
			$('#problem_date_start,#problem_date_finish').css("text-align", "center");
			
			
			$('#problem_solution_dis').css("display", "none");
			
			
			//Close Button
				$(".action button:first").button({
				icons: {
					primary: 'ui-icon-close'
				}				
				}).click( function() {		
					$("#dialog-form-<?=$_GET['setPage']?>").dialog('close');	
					return false;
				});
		
	
});
</script>