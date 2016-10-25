<?php 
@session_start();

require_once("../../includes/config.inc.php");
include "../../includes/Class/Main.Class.php";
include "../../includes/Class/SM.Class.php";

$db->debug=0;

$SM = new SM();
$SM->_db = $db;
// Show Edit Value

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT sub_module_id , sub_module_name , module_name , update_time
								FROM tbl_sm_sub_module
								WHERE sub_module_id =  $id";
	$rs_edit = $db->GetRow($sql_edit);
	
	$module_name = $rs_edit['module_name'];
	
}else{
	$module_name = $_GET['select_id'];
}

// กำหนด Path ที่เก็บ Souce Code
$sess_user_id = $_SESSION['sess_user_id'];
// List Module
$rs_module = $SM->listModules($sess_user_id);

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
  <table width="100%" border="0" cellspacing="1" cellpadding="5">
    <tr>
      <td>&nbsp;</td>
      <td><strong>*Module :</strong> <br />
        <label for="module_name"></label>
        <select name="module_name" id="module_name">
          <?php		
		  
		  genOptionSelect($rs_module,'module_name','module_name',$module_name,'','module_desc');
	
		?>
        </select></td>
    <tr>
      <td width="5%">&nbsp;</td>
      <td><strong>*Sub-Module Name :</strong> <br />
        <span id="sprytextfield2">
        <label>
          <input name="sub_module_name" type="text" id="sub_module_name" size="60" value="<?=$rs_edit['sub_module_name']?>" />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?=MENU_SUBMIT?></td>
  </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
//-->
</script> 
