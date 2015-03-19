<?php 
@session_start();
require_once("../../includes/config.inc.php");

// Show Edit Value
//show_get();

$db->debug = 0;


  $sql_cate = "SELECT
					  cate_id,
					  cate_name
					FROM tbl_dwdm_category
					WHERE active = 'Y'
					ORDER BY menu_order";
$rs_cate = $db->GetAll($sql_cate);

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT * FROM tbl_dwdm_problems WHERE  id = $id";
	$rs_edit = $db->GetRow($sql_edit);
	$problem_status = $rs_edit['problem_status'];

	$problem_date_start = date("d-m-Y H:i", strtotime($rs_edit['problem_date_start']));
	$problem_date_finish = date("d-m-Y H:i", strtotime($rs_edit['problem_date_finish']));
	
}else{
	$problem_status = "P";
	$problem_date_start  = date("d-m-Y H:i");
	$problem_date_finish  = date("d-m-Y H:i");
}



?>

<form action="" method="post" enctype="multipart/form-data" name="form_<?=$_GET['pages']?>" id="form_<?=$_GET['pages']?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td>&nbsp;</td>
      <td width="32%">สถานะการดำเนินการ : <br>
        <label>
          <select name="status" id="status">
            <option value="P" <?=$problem_status  == "P" ? "selected" : "";?>>กำลังดำเนินการ</option>
            <option value="S" <?=$problem_status  == "S" ? "selected" : "";?>>ดำเนินการเสร็จแล้ว</option>
          </select>
        </label></td>
      <td width="50%" valign="top"> หมวดหมู่ : <br>
        <label for="cate_id"></label>
        <select name="cate_id" id="cate_id">       
        <?php
          genOptionSelect($rs_cate,'cate_id','cate_name' , $rs_edit['cate_id']);
		
		?>        
        </select></td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>ปัญหา/สาเหตุ :</strong></td>
       <td colspan="2"><hr></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">*วันที่แจ้งปัญหา :<br>
        <span id="sprytextfield3">
        <label for="problem_date_start"></label>
        <input name="problem_date_start" type="text" id="problem_date_start" value="<?=$problem_date_start ?>" size="19">
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td width="4%" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">*หัวข้อปัญหา :<br />
        <span id="sprytextarea2">
        <textarea name="problem_topic" cols="100" rows="7" id="problem_topic"><?=htmlspecialchars($rs_edit['problem_topic'],ENT_QUOTES);?></textarea>
        <span class="textareaRequiredMsg">A value is required.</span></span></td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">*ชื่อผู้แจ้งปัญหา :<br />
        <span id="sprytextfield2">
        <label>
          <input name="problem_owner" type="text" id="problem_owner" value="<?=$_GET['doAction'] == 'edit' ?   $rs_edit['problem_owner'] : $_SESSION['sess_name'];?>" size="40" />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>แก้ไขปัญหา :</strong></td>
      <td colspan="2"><hr></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">วันที่ดำเนินการแล้วเสร็จ :<br>
        <label for="problem_finish"></label>
        <input name="problem_date_finish" type="text" id="problem_date_finish" value="<?=$problem_date_finish?>" size="19">
        <input type="hidden" name="problem_date_finish_dis" id="problem_date_finish_dis"  value="<?=$problem_date_finish?>" /></td>
      <td width="4%" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="14%">&nbsp;</td>
      <td colspan="2"> วิธีแก้ปัญหา :<br>
      <textarea name="problem_solution" id="problem_solution" cols="100" rows="8"><?=htmlspecialchars($rs_edit['problem_solution'],ENT_QUOTES);?></textarea><textarea name="problem_solution_dis" id="problem_solution_dis" cols="100" rows="8"><?=htmlspecialchars($rs_edit['problem_solution'],ENT_QUOTES);?></textarea></td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">ชื่อผู้แก้ไขปัญหา :<br />
      <input name="problem_by" type="text" id="problem_by" value="<?=$rs_edit['problem_by'];?>" size="40" /> <input type="hidden" name="problem_by_dis" id="problem_by_dis"  value="<?=$rs_edit['problem_by'];?>" /></td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr></td>
      <td valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td height="47">&nbsp;</td>
      <td colspan="2" valign="middle"><?=MENU_SUBMIT?>
        <label for="docs_id"></label>
        <input name="id" type="hidden" id="id" value="<?=$rs_edit['id']?>"></td>
      <td valign="middle">&nbsp;</td>
    </tr>
  </table>
</form>
<span id="divMsgDiag"></span> 
<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {validateOn:["blur", "change"]});
</script> 

<script language="javascript">
$(function(){			
			
			
			$('#problem_date_start,#problem_date_finish').css("text-align", "center");
			
			
			$('#problem_solution_dis').css("display", "none");
			
			
			$('#problem_date_start,#problem_date_finish').datetimepicker({				
				step:10,
				lang:'th',	
				//startDate:new Date(),			
				format:'d-m-Y H:i',			
				mask:true		
			});
	
						
					//doAction
				var actions = '<?=$_GET['doAction']?>';				
				//Modules
				var modules = '<?=$_GET['modules']?>';
				//Page
				var pages = '<?=$_GET['pages']?>';		
				
				//ID
				var id = '<?=$id?>';
					
				$.FormAction(actions ,modules  ,pages , id );
				
				
				
				$("#status").change(function(){
					setState($(this).val());			
				});
				
				
				
				var status = $("#status").val();
				
				setState(status);				
				
					
				function setState(status){
					if(status == "P"){
						$("#problem_date_finish,#problem_solution,#problem_by").prop("disabled", true);										
					}else{
						$("#problem_date_finish,#problem_solution,#problem_by").prop("disabled", false);
					}
				}
				
		
		
	
});
</script>