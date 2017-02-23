<?php
@session_start();
require_once("../../includes/config.inc.php");
//show_get();

########### list user #####################
  $sql_users = "SELECT
					  a.user_id,
					  a.username,
					  a.user_desc
					FROM tbl_users a,
					  tbl_user_auth b
					WHERE a.user_id = b.user_id
						AND b.group_id = 3
					ORDER BY a.username";
		$rs_users = $db->GetAll($sql_users);

$sql_minxax = "SELECT
						  DATE_FORMAT(dateMin, '%d-%m-%Y') AS dateMin,
						  DATE_FORMAT(dateMax, '%d-%m-%Y') AS dateMax
						FROM (SELECT
								DATE_ADD(MAX(date_finish),INTERVAL 3 DAY) AS dateMin,
								DATE_ADD(MAX(date_finish),INTERVAL 7 DAY) AS dateMax
							  FROM tbl_dwdm_checklist) a";
$rs_minxax = $db->GetRow($sql_minxax);
 

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT
						  check_id,
						  user_assign, 
						  remarks,
						  check_status,
						  DATE_FORMAT(date_start, '%d-%m-%Y') AS date_start,
						  DATE_FORMAT(date_finish, '%d-%m-%Y') AS date_finish,
						  remarks
						FROM tbl_dwdm_checklist
						WHERE check_id = $id";
	$rs_edit = $db->GetRow($sql_edit);
	
	$date_start = $rs_edit['date_start'];
   $date_finish = $rs_edit['date_finish'];	 
   
	//$portlet = $rs_edit['portlet'];
}else{
	$date_start = $rs_minxax['dateMin'];
    $date_finish = $rs_minxax['dateMax'];	 
}

?>

<script type="text/javascript">
$(function(){
		
				var  url = '<?=$url?>';
				
					//doAction
				var actions = '<?=$_GET['doAction']?>';				
				//Modules
				var modules = '<?=$_GET['modules']?>';
				//Page
				var pages = '<?=$_GET['pages']?>';		
				
				//ID
				var id = '<?=$id?>';
					
				$.FormAction(actions ,modules  ,pages , id );
	
								
				$('#date_start,#date_finish').css("text-align", "center");
				$('#date_start').datetimepicker({								
						lang:'th',					
						format:'d-m-Y',			
						timepicker:false,
						closeOnDateSelect:true
						//,startDate:'<?=$date_start?>',formatDate:'d-m-Y'
				});
				
				$('#date_finish').datetimepicker({								
						lang:'th',					
						format:'d-m-Y',			
						timepicker:false,
						closeOnDateSelect:true
						//,startDate:'<?=$date_finish?>',formatDate:'d-m-Y'
				});
			
				
});

</script>

  <form id="form_<?=$_GET['pages']?>" name="form_<?=$_GET['pages']?>" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td valign="top">&nbsp;</td>
      <td colspan="2" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="98" valign="top">&nbsp;</td>
      <td colspan="2" align="left" valign="top">
        *ชื่อผู้รับผิดชอบ :<br>      
        <label for="user_assign"></label>
        <select name="user_assign" id="user_assign">
        <?php
          genOptionSelect($rs_users,'user_id','user_desc' , $rs_edit['user_assign']);
		
		?>
        
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="99"><p>*วันที่เริ่มต้น :<br>
        <span id="sprytextfield1">
        <input name="date_start" type="text" id="date_start" size="14" value="<?=$date_start?>">
        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span><br>
        <label for="date_start"></label>
</p></td>
      <td width="890"> &nbsp;*วันที่สิ้นสุด :<br />
        <label for="date_start2"></label>
        <span id="sprytextfield2">
        - 
        <input name="date_finish" type="text" id="date_finish" size="14" value="<?=$date_finish?>" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">หมายเหตุ :<br>
      <textarea name="remarks" id="remarks" cols="60" rows="5"><?=$rs_edit['remarks']?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><?=MENU_SUBMIT?></td>
    </tr>
  </table>
</form>

<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {validateOn:["blur", "change"], format:"dd-mm-yyyy"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {validateOn:["blur", "change"], format:"dd-mm-yyyy"});
</script>
