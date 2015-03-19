<?php 
require_once("../../includes/config.inc.php");
// Show Edit Value
//show_get();
if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT * FROM tbl_modules WHERE  id = $id";
	$rs_edit = $db->GetRow($sql_edit);
}
?>
<script language="javascript">
$(function(){			

			ajaxLoading();			
			
			
				//doAction
				var actions = '<?=$_GET['doAction']?>';				
				//Modules
				var modules = '<?=$_GET['modules']?>';
				//Page
				var pages = '<?=$_GET['pages']?>';		
				
				//ID
				var id = '<?=$id?>';
					
				$.FormAction(actions ,modules  ,pages , id );
		
});
</script>

<form id="form_<?=$_GET['pages']?>" name="form_<?=$_GET['pages']?>" method="post" action="">
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td width="5%">&nbsp;</td>
      <td width="95%" colspan="2">*ชื่อโมดูล :<br>
        <label for="name"></label>
        <span id="sprytextfield2">
        <input name="module_name" type="text" id="module_name" size="20"  value="<?=$rs_edit['module_name']?>" >
        <span class="textfieldRequiredMsg">A value is required.</span></span><span class="font-small">*ระบบจะสร้างโฟล์เดอร์ตามนี้</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">รายละเอียด :<br>
        <span id="sprytextfield1">
        <label for="description"></label>
        <textarea name="module_desc" cols="80" id="module_desc"><?=$rs_edit['module_desc']?></textarea>
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><?=MENU_SUBMIT?></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
//-->
</script>