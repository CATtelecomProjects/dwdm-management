<?php 
require_once("../../includes/config.inc.php");
// Show Edit Value

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT * FROM tbl_user_group WHERE group_id = '$id';";
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
        <td width="95%" valign="top">*ชื่อกลุ่มผู้ใช้งาน :<br />
          <span id="sprytextfield1">
          <label>
            <input name="group_name" type="text" id="group_name" size="40" value="<?=$rs_edit['group_name']?>" />
          </label>
          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?=MENU_SUBMIT?></td>
      </tr>
    </table>
  </form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
//-->
</script>