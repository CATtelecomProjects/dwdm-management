<?php
@session_start();

require_once("../../includes/config.inc.php");
$modules = "DWDM";
$url = "http://dw-webreport.cattelecom.com/dwdm-management/modules/DWDM/dwdm_portlet_view.php?portlet=";


if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT * FROM tbl_dwdm_portlet WHERE id = '$id'";
	$rs_edit = $db->GetRow($sql_edit);
	$portlet = $rs_edit['portlet'];
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
					
				$.FormAction(actions ,modules  ,pages , id ,false);
				
					$("#portlet").keyup(function(){
							$("#url").val(url+$(this).val());
					});
		
});

</script>
<link type="text/css" rel="stylesheet" href="./modules/<?=$modules;?>/style.css">
<link type="text/css" rel="stylesheet" href="js/jQuery-TE/jquery-te-1.4.0.css">

<script type="text/javascript" src="js/jQuery-TE/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<!------------------------------------------------------------ Toggle jQTE Button ------------------------------------------------------------>


<form action="" id="form_dwdm_portlet" name="form_dwdm_portlet">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="21" align="left" valign="top">&nbsp;</td>
    <td width="146" valign="top">*ชื่อ Portlet :</td>
    <td width="792" align="left" valign="top"><span id="sprytextfield3">
      <label for="portlet"></label>
      <input name="portlet" type="text" id="portlet" placeholder="ชื่อของ Portlet  (ภาษาอังกฤษ)" value="<?=$rs_edit['portlet']?>" size="40">
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span id="sprytextarea1">
      <textarea name="desc" rows="15" class="jqte-test" id="desc"><?=$rs_edit['description'];?></textarea>
      <span class="textareaRequiredMsg">A value is required.</span></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>*ปรับปรุงล่าสุดโดย :</td>
    <td><span id="sprytextfield2">
      <label for="update_by"></label>
      <input name="update_by" type="text" id="update_by" size="40" value="<?=$_GET['doAction']  == "new" ? $_SESSION['sess_name'] :  $rs_edit['update_by'];?>">
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>วันที่ปรับปรุงล่าสุด : </td>
    <td><?=$_GET['doAction'] == "edit" ? showdateTimeThai($rs_edit['update_time']) : "N/A";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>URL :</td>
    <td><label for="url"></label>
      <input name="url" type="text" id="url" size="120" readonly="readonly" value="<?=$url;?><?=$portlet?>" class="textfieldValidState"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?=MENU_SUBMIT?></td>
    </tr>
</table>
</form>
<!------------------------------------------------------------ jQUERY TEXT EDITOR ------------------------------------------------------------><script>
$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
</script>

<!------------------------------------------------------------ jQUERY TEXT EDITOR ------------------------------------------------------------>
