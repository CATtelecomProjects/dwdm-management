<?php 
@session_start();
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/Auth.Class.php");
// Show Edit Value

$db->debug = 0;

if($_GET['doAction'] == "edit"){ 
	$id = $_GET['id'];
	$sql_edit = "SELECT * FROM tbl_knowledge WHERE  id = $id";
	$rs_edit = $db->GetRow($sql_edit);
	$cate_id = $rs_edit['cate_id'];
	
	$sql_count_file = "SELECT COUNT(*) as COUNT_FILES FROM tbl_knowledge_files WHERE kn_id = $id ";
	$rs_count_file = $db->GetRow($sql_count_file);
	
}else{
	$cate_id = $_GET['select_id'];
}


// หาค่ารายชื่อกลุ่ม 
//$sql_knowledge = "SELECT * FROM tbl_knowledge_cate  ORDER BY menu_order";
//$rs_knowledge = $db->GetAll($sql_knowledge);
$auth = new Auth();
$auth->db = $db;
$auth->user_id = $_SESSION['sess_user_id'];

$rs_knowledge =  $auth->getKnowledgeCate();

?>
<link type="text/css" rel="stylesheet" href="js/jQuery-TE/jquery-te-1.4.0.css">
<script type="text/javascript" src="js/jQuery-TE/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<script language="javascript">
$(function(){			
			
			$(".tooltips").tipsy({gravity: 's'});
			
			$("img").css({'cursor':'pointer'});
			
			//ajaxLoading();			
			
			<?php
			if($_GET['doAction'] == "edit"){ 
				echo "$( '#tabs' ).tabs();";
			
			}else{
				echo "$('#tabs' ).tabs({ disabled: [ 1] } );";	
			}
			?>
			
			//Button
				$('#btnReset ,#btnSave ,#upload').button();
				
					//doAction
				var actions = '<?=$_GET['doAction']?>';				
				//Modules
				var modules = '<?=$_GET['modules']?>';
				//Page
				var pages = '<?=$_GET['pages']?>';		
				
				//ID
				var id = '<?=$id?>';
					
				$.FormAction(actions ,modules  ,pages , id );
					
					
					
					// Upload File
					 var options2 = { 
						url : './modules/Knowledges/knowledge_manage_code.php',
						type : 'post',
						data : {doAction : 'Upload' , id : '<?=$id?>' , cate_id : $("#cate_id").val() },
						resetForm: true,
						beforeSubmit: function(formData, jqForm, options){
						if (Spry) { // checks if Spry is used in your page
							var r = Spry.Widget.Form.validate(jqForm[1]); // validates the form
							/*if (!r)
								return r;
						}
					},*/
					check_file();
					
					if($("#docs_filename").val() != '' && r == true){
								
									return true;
								
							}else{
								r = false;
								return false;	
							}		
						}
					},	
						success: function(data){	
						//alert(data);					
						//	$('#divMsgDiag').html(data).fadeIn();
							
							if(data == "2"){
							$('#msgUpload').html('มีไฟล์นี้แล้วในระบบ !!').fadeIn();
							}else{
							$('#msgUpload').html('อัพโหลดข้อมูลเรียบร้อย !!').fadeIn();	
							}
							
						},// post-submit callback 
						 complete: function(){
							$('#msgUpload').fadeOut(2000);							
							//setTimeout("window.location.reload(true)",2000);
							$.get("./modules/Knowledges/knowledge_manage_files.php", { id: $("#id").val() }, function(data){
									$("#div_list_file").html(data);
									// Set total file
									var total_file = $("#label_attach_b").text();									
									$("#label_attach_h").html(total_file) ;
								});	
							
								
							
							
						 }
					}; 
				 
					// bind to the form's submit event 
					$('#form_upload').submit(function() { 
					
						//var chkfile = $("#docs_filename").val();
						//if(chkfile != ""){
							$(this).ajaxSubmit(options2); 
						return false; 
						//}
					}); 
	
	
	
				//########################################
				// Load File to Div
				$.get("./modules/Knowledges/knowledge_manage_files.php", { id: $("#id").val() }, function(data){
						$("#div_list_file").html(data);
				});
				
				
				function check_file(){
					var file_val = $("#docs_filename").val();
					if(file_val == ""){
						$("#file_validate").html("A value is required.");
						$("#docs_filename").css({'background-color':'#FF9F9F'});
					}else{
						$("#file_validate").hide();
						$("#docs_filename").css({'background-color':'#B8F5B1'});
					}
				}
		
	//########################################
			// Editor
			$('.jqte-test').jqte();
			
			// settings of status
			var jqteStatus = true;
			$(".status").click(function()
			{
				jqteStatus = jqteStatus ? false : true;
				$('.jqte-test').jqte({"status" : jqteStatus})
			});
		//########################################
});
</script>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">บันทึกรายการ</a></li>
    <li><a href="#tabs-2" class="tab-disabled">ไฟล์แนบ (<span id="label_attach_h"><?=number_format($rs_count_file['COUNT_FILES']);?></span>)</a></li>

  </ul>
  <div id="tabs-1">
    <form action="" method="post" enctype="multipart/form-data" name="form_<?=$_GET['pages']?>" id="form_<?=$_GET['pages']?>">
  <table width="100%" border="0" cellspacing="2" cellpadding="3">
    <tr>
      <td>&nbsp;</td>
      <td width="98%" valign="top"><strong>หมวดหมู่ : </strong><br>
        <select name="cate_id" id="cate_id">
          <?php					  
					  genOptionSelect($rs_knowledge,'id','name',$cate_id);
		  ?>
        </select> <input type="hidden" name="cate_id_old" id="cate_id_old" value="<?=$cate_id;?>"></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><strong>*หัวข้อปัญหา :</strong><br />
        <span id="sprytextfield1">
        <label>
          <input name="issue_title" type="text" id="issue_title" size="100" value="<?=htmlspecialchars($rs_edit['issue_title'],ENT_QUOTES);?>" />
        </label>
        <br>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td valign="top"> <strong>*วิธีแก้ไข / ข้อเสนอแนะ :</strong><br>
        <span id="sprytextarea1">
          <label for="issue_desc"></label>
          <textarea name="issue_desc" id="issue_desc" cols="85" rows="9" class="jqte-test"><?=$rs_edit['issue_desc']?>
</textarea>
          <span class="textareaRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td height="40">&nbsp;</td>
      <td valign="middle"><strong>*ชื่อผู้บันทึก :</strong><br />
        <span id="sprytextfield2">
          <label>
            <input name="update_by" type="text" id="update_by" value="<?=$_GET['doAction'] == 'edit' ?   $rs_edit['update_by'] : $_SESSION['sess_name'];?>" size="40" />
            </label>
          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td height="40">&nbsp;</td>
      <td valign="middle"><strong>เผยแพร่ :</strong><br>
        <label for="publish"></label>
        <select name="publish" id="publish">
          <option value="Y" selected <?=$rs_edit['publish'] == "Y" ? "selected" : "";?> >Yes</option>
          <option value="N"  <?=$rs_edit['publish'] == "N" ? "selected" : "";?>>No</option>
        </select></td>
    </tr>
    <tr>
      <td height="47">&nbsp;</td>
      <td valign="middle"><?=MENU_SUBMIT?>
        <label for="docs_id"></label>
        <input name="id" type="hidden" id="id" value="<?=$rs_edit['id']?>"></td>
    </tr>
  </table>
</form>
  </div>
  <div id="tabs-2">
    <div id="div_list_file"></div>
<hr>
        <strong>เลือกไฟล์ :</strong><br />
  <form action="" method="post" enctype="multipart/form-data" name="form_upload" id="form_upload">
        <label for="fileupload"></label>
      <input name="docs_filename" type="file" class="required" id="docs_filename" size="50" />
      <span style="color:#3C0; font-size:11px"><i>* ขนาดไฟล์ไม่เกิน <strong><?php echo ini_get( 'upload_max_filesize' ); ?></strong></i></span>&nbsp;<span id="file_validate" style="color:#CC3333"> </span><p>
        
        <button name="upload" id="upload" type="submit" >Upload</button>&nbsp;<span id="msgUpload" style="color:#3C0; font-size:11px; font-weight:bold"></span>
       
    </form>
  </div>
 
</div>

<script type="text/javascript">
<!--
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});

//-->
</script> 
<span id="divMsgDiag"></span>