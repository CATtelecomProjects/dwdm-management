<?php 
require_once("../../includes/config.inc.php");
// Show Edit Value

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT
					 a.menu_id,
					 a.menu_name_th,
					 a.menu_name_en,
					 a.menu_file,
					 a.menu_param,
					 a.mgroup_id,
					 a.menu_order,
					 a.icon_id,
					 b.icon_name
				FROM tbl_menu AS a
					 LEFT JOIN tbl_icons b
					   ON a.icon_id = b.icon_id
					WHERE menu_id = '$id';";
	$rs_edit = $db->GetRow($sql_edit);
	$mgroup_id = $rs_edit['mgroup_id'];
	
}else{
	$mgroup_id = $_GET['select_id'];
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
        <td>&nbsp;</td>
        <td valign="top">กลุ่มเมนู :<br />
          <select name="mgroup_id" id="mgroup_id" class="input">
          <?php
		  $sql_mgroup = "SELECT * FROM tbl_menu_group ORDER BY mgroup_id";
		  $rs_mgroup = $db->GetAll($sql_mgroup);
		  genOptionSelect($rs_mgroup,'mgroup_id','menu_group_th',$mgroup_id);
		  ?>
        </select></td>
        <td rowspan="6" align="left" valign="bottom"><div id="showIcons" style="display:none"> <br />
          <table width="100%" border="0" cellpadding="0" cellspacing="1" class="ui-widget-content" align="center">
            <tr>
              <td><table width="100%" border="0" cellpadding="4" cellspacing="4" id="tblIcon">
                  <?php
			  $cols = 6;
		  		$sql_icon = "SELECT * FROM tbl_icons";
				$rs_icon = $db->GetAll($sql_icon);
				for($i=0;$i<count($rs_icon);$i++){
		  ?>
                  <tr>
                    <?php   for($j=1;$j<=$cols;$j++){  
					  if($i<count($rs_icon)){
							 echo "<td><img src='./images/menu_actions/".$rs_icon[$i]['icon_name']."' id='".$rs_icon[$i]['icon_id']."' title='".$rs_icon[$i]['icon_name']."'></td>";
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
        <td width="5%">&nbsp;</td>
        <td valign="top">*ชื่อเมนู(ไทย) :<br />
          <span id="sprytextfield1">
          <label>
            <input name="menu_name_th" type="text" id="menu_name_th" size="30" value="<?=$rs_edit['menu_name_th']?>" />
          </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>*ชื่อเมนู(อังกฤษ) :<br />
          <span id="sprytextfield2">
          <label>
            <input name="menu_name_en" type="text" id="menu_name_en" size="30" value="<?=$rs_edit['menu_name_en']?>" />
          </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>*ชื่อไฟล์เมนู :<br />
          <span id="sprytextfield3">
          <label>
            <input name="menu_file" type="text" id="menu_file" size="30" value="<?=$rs_edit['menu_file']?>"  />
          </label>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      </tr>
      <tr>
        <td height="43">&nbsp;</td>
        <td valign="top">Parameter (Optional) :<br>
          <label for="menu_param"></label>
        <input name="menu_param" type="text" id="menu_param" size="30" value="<?=$rs_edit['menu_param']?>" ></td>
      </tr>
      <tr>
      <td height="43">&nbsp;</td>
      <td>ไอคอน : 
      <?php
	  	 if($rs_edit['icon_name']==""){
			$icon_name =	"icon-keyin.gif";
			$icon_id = "3";
		 }else{
			 $icon_name = $rs_edit['icon_name'];
			 $icon_id = $rs_edit['icon_id'];
		 }
	  ?>
      <img src="./images/menu_actions/<?=$icon_name;?>" align="absmiddle" id="icons" /> &nbsp;&nbsp;<a href="#" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-newwin"></span>เลือก</a>
        <input type="hidden" name="icon_id" id="icon_id" value="<?=$icon_id?>" /></td>
    </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">ลำดับเมนู :<br />
          <span id="sprytextfield4">
          <input name="menu_order" type="text" id="menu_order" size="5" value="<?=$rs_edit['menu_order']?>" />
        <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
      <tr>
        <td height="47">&nbsp;</td>
        <td colspan="2" valign="middle"><?=MENU_SUBMIT?></td>
      </tr>
    </table>
  </form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {isRequired:false, validateOn:["blur"]});
//-->
</script> 
