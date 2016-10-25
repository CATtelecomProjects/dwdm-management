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
								FROM tbl_sm_report
								WHERE report_id =  $id";
	$rs_edit = $db->GetRow($sql_edit);
	
	$set_sub_module_id = $rs_edit['sub_module_id'];
	
}else{
	$set_sub_module_id = $_GET['select_id'];
}

// กำหนด Path ที่เก็บ Souce Code
$sess_user_id = $_SESSION['sess_user_id'];
$rs_module = $SM->listModules($sess_user_id);

?>
<script language="javascript">

$(function(){			
	
				$(window).keydown(function(event){
					if(event.keyCode == 13) {
					  event.preventDefault();
					  return false;
					}
				  });
				  
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
<script src="./js/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
<link rel="stylesheet" type="text/css" href="./js/jQuery-tagEditor/jquery.tag-editor.css">

<form id="form_<?=$_GET['pages']?>" name="form_<?=$_GET['pages']?>" method="post" action="">
  <table width="100%" border="0" cellspacing="2" cellpadding="5">
    <tr>
      <td>&nbsp;</td>
      <td>*<strong>Sub-Module : </strong><br />
        <label>
          <select name="sub_module_id" id="sub_module_id" class="input">
            <?php	
				// List Module
				//ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_name มา where
				$get_sub_module_id = isset($_GET['sub_module_id']) ? $_GET['sub_module_id'] : $set_sub_module_id;
				$SM->listSubModule($set_sub_module_id , $rs_module);				
		  ?>
          </select>
        </label></td>
    <tr>
      <td width="6%">&nbsp;</td>
      <td>*<strong>Report Name :</strong><br />
        <span id="sprytextfield2">
        <label>
          <input name="report_name" type="text" id="report_name" value="<?=$rs_edit['report_name']?>" size="70" maxlength="60" />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Report Description :<br>
        <label for="report_desc"></label>
        <textarea name="report_desc" cols="100" rows="3" id="report_desc"><?=$rs_edit['report_desc']?></textarea>
        </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Report Keyword :<br>
        </strong>
        <textarea name="report_keyword" id="report_keyword"  cols="100" rows="3"><?=$rs_edit['report_keyword']?></textarea>
        <small>* เช่น รายได้, ลูกค้า, พนักงาน, ขาย, CDR</small></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Report Owner :<br>
        <input name="report_owner" type="text" id="report_owner" value="<?=$rs_edit['report_owner']?>" size="70" maxlength="100" />
        </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong> Source :<br>
        <input name="report_source" type="text" id="report_source" value="<?=$rs_edit['report_source']?>" size="70" maxlength="100" />
        </strong><small>* เช่น TBOSS, CRM, BILLING</small></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Report URL :<br>
        <input name="report_url" type="url" id="report_url" value="<?=$rs_edit['report_url']?>" size="100" maxlength="250" />
        </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>Report Type :<br>
        <select name="report_type" id="report_type">
          <option value="R" <?=$rs_edit['report_type']=="R" ? "selected" : "";?>>SAS Report</option>
          <option value="D" <?=$rs_edit['report_type']=="D" ? "selected" : "";?>>Direct URL</option>
        </select>
        </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <?php
	  	$arrDataType = array("R"=>"R=Read",
										"W"=>"W=Write",
										"A"=>"A=Analytics",
										"X"=>"X=Admin");
	  ?>
      <td width="94%"><strong>Actived :</strong> <br>
        
        <!-- Switch -->
        
        <div class="switch">
          <input type="checkbox" name="actived" id="actived" <?=setCheckBox($rs_edit['actived'] , 'Y');?> value="Y">
        </div></td>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
//-->

$(function(){			
	
				$('#report_keyword').tagEditor({
					clickDelete: true,		
					delimiter: ',', /* space and comma */			
					placeholder: 'Enter tags ...'	,		
					forceLowercase: false,
					removeDuplicates: true,						
					sortable: true // jQuery UI sortable
					
				});

      
});
</script> 
