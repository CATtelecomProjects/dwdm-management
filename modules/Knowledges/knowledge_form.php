<?php 
require_once("../../includes/config.inc.php");
// Show Edit Value

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT * FROM tbl_knowledge_cate WHERE  id = $id";
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
      <td colspan="2">*ชื่อหมวดหมู่ :<br>
        <label for="name"></label>
        <span id="sprytextfield2">
        <input name="name" type="text" id="name" size="20"  value="<?=$rs_edit['name']?>" >
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">*รายละเอียดหมวดหมู่ :<br>
<span id="sprytextarea1">
      <label for="description"></label>
      <textarea name="description" id="description" cols="60" rows="3"><?=$rs_edit['description']?></textarea>
      <span class="textareaRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="34%">เผยแพร่ :<br>
        <label for="active"></label>
        <select name="active" id="active">
          <option value="Y" <?=$rs_edit['active'] == "Y" ? "selected" : "";?> >Yes</option>
          <option value="N"  <?=$rs_edit['active'] == "N" ? "selected" : "";?>>No</option>
        </select></td>
      <td width="61%" valign="top">ลำดับเมนู<br>
        <span id="sprytextfield3">
        <label for="menu_order"></label>
        <input name="menu_order" type="text" id="menu_order" size="5" value="<?=$rs_edit['menu_order']?>">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
//-->
</script>