<?php 
require_once("../../includes/config.inc.php");
// Show Edit Value

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "
	SELECT
					  a.mgroup_id,
					  a.menu_group_th,
					  a.menu_group_en,
					  c.id,
					  c.module_name,
					  a.icon_id,
					  a.menu_order,
					  b.icon_name
					FROM tbl_menu_group a,
					  tbl_icons b,
					  tbl_modules c
					WHERE a.icon_id = b.icon_id
						AND a.modules_id = c.id
						AND a.mgroup_id = '$id'
					ORDER BY a.menu_order	";
	$rs_edit = $db->GetRow($sql_edit);
}

// กำหนด Path ที่เก็บ Souce Code
$sql_module = "SELECT id,module_name FROM tbl_modules";
$rs_module = $db->GetAll($sql_module);

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
	
	//hover states on the static widgets
				$('#dialog_link').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				).click(function(){
					$('#showIcons').toggle();
							
				});
		
		$('#tblIcon td').css({ align: "center"});
		$('#showIcons').css( {cursor : 'pointer'});
		
		
		// ส่วนจัดการ Icons
		$('#tblIcon img').click(function(){
			var iPath = $(this).attr('src');
			var iconId = $(this).attr('id');
			$('#icon_id').val(iconId);
			
			$('#icons').attr({'src' : iPath}); // คลิกเปลี่ยนรูป
			$('#showIcons').fadeOut("slow"); // ซ่อนเมนู
			
		});
		// End ส่วนจัดการ Icons
		
});
</script>
<form id="form_<?=$_GET['pages']?>" name="form_<?=$_GET['pages']?>" method="post" action="">
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td width="5%">&nbsp;</td>
      <td><strong>*ชื่อกลุ่มเมนู (ไทย) : </strong><br />
        <span id="sprytextfield2">
        <label>
          <input name="menu_group_th" type="text" id="menu_group_th" size="30" value="<?=$rs_edit['menu_group_th']?>" />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td rowspan="6" valign="bottom"><div id="showIcons" style="display:none"> <br />
          <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ui-widget-content" align="center">
            <tr>
              <td><table width="100%" border="0" cellpadding="5" cellspacing="4" id="tblIcon">
                  <?php
			  $cols = 6;
		  		$sql_icon = "SELECT * FROM tbl_icons";
				$rs_icon = $db->GetAll($sql_icon);
				for($i=0;$i<count($rs_icon);$i++){
		  ?>
                  <tr>
                    <?php   for($j=1;$j<=$cols;$j++){  
					  if($i<count($rs_icon)){
							 echo "<td><img src='./images/menu_actions/".$rs_icon[$i]['icon_name']."' id='".$rs_icon[$i]['icon_id']."'></td>";
						$i++;
					  }	  				
				  } 
				  $i=$i-1;
				  ?>
                  </tr>
                  <?php } ?>
                </table></td>
            </tr>
          </table>
        </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>*ชื่อกลุ่มเมนู (อังกฤษ) : </strong><br />
        <span id="sprytextfield3">
        <label>
          <input name="menu_group_en" type="text" id="menu_group_en" size="30" value="<?=$rs_edit['menu_group_en']?>"  />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>โมดูล : </strong><br />
        <label for="modules_id"></label>
        <select name="modules_id" id="modules_id">
          <?php		
		  
		  genOptionSelect($rs_module,'id','module_name',$rs_edit['id']);
	
		?>
        </select></td>
    </tr>
    <tr>
      <td height="43">&nbsp;</td>
      <td><strong>ไอคอน :</strong> <img src="./images/menu_actions/<?=$rs_edit['icon_name']==""?"icon-keyin.gif":$rs_edit['icon_name']?>" align="absmiddle" id="icons" /> &nbsp;&nbsp;<a href="#" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-newwin"></span>เลือก</a>
      <input type="hidden" name="icon_id" id="icon_id" value="<?=$rs_edit['icon_id']?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>ลำดับเมนู :</strong><br />
        <label for="menu_order"></label>
        <span id="sprytextfield1">
        <input name="menu_order" type="text" id="menu_order" size="5" value="<?=$rs_edit['menu_order']?>" />
      <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {isRequired:false, validateOn:["blur"]});
//-->
</script> 
