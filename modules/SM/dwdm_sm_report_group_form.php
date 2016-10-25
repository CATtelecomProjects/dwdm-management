<?php 
@session_start();
require_once("../../includes/config.inc.php");
include "../../includes/Class/Main.Class.php";
include "../../includes/Class/SM.Class.php";

$SM = new SM();
$SM->_db = $db;

// Show Edit Value
//show_get();
if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT *
								FROM tbl_sm_report_group
								WHERE rep_group_id =  $id";
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
					
				$.FormAction(actions ,modules  ,pages , id  );

      
});
</script>
  
<form id="form_<?=$_GET['pages']?>" name="form_<?=$_GET['pages']?>" method="post" action="">
  <table width="100%" border="0" cellspacing="2" cellpadding="5">
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">*<strong>Module</strong> : <br />
        <label for="module_name"></label>
        <select name="module_name" id="module_name">
          <?php		
		  
		  genOptionSelect($rs_module,'module_name','module_name',$module_name,'','module_desc');
	
		?>
        </select></td>
    <tr>
      <td width="5%">&nbsp;</td>
      <td colspan="3"><strong>*Report Group Name</strong><br />
        <span id="sprytextfield2">
        <label>
          <input name="rep_group_name" type="text" id="rep_group_name" value="<?=$rs_edit['rep_group_name']?>" size="70" maxlength="60" />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <?php
	  	$arrDataType = array("R"=>"R=Read",
										"W"=>"W=Write",
										"A"=>"A=Analytics",
										"X"=>"X=Admin");
	  ?>
      <td width="27%"><strong>*Group Type :</strong><br>
        <label for="rep_group_type"></label>
        <select name="rep_group_type" id="rep_group_type">
          <?php  listComboBox($arrDataType , $rs_edit['rep_group_type']); ?>          
        
      </select><br></td>
      <td width="29%"><strong>Module Order :</strong><br>
        <label for="rep_group_orders"></label>
      <input name="rep_group_orders" type="number" id="rep_group_orders"  value="<?=$rs_edit['rep_group_orders']?>" style="width:35px;text-align:center"></td>
      <td width="39%"><strong>Actived :</strong> <br>
       
        <!-- Switch -->
  <div class="switch">
     <input type="checkbox" name="rep_group_used" id="rep_group_used" <?=setCheckBox($rs_edit['rep_group_used'] , 'Y');?> value="Y">
  </div></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="4"><?=MENU_SUBMIT?></td>
  </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
//-->
</script> 
