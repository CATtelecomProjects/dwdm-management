<?php
include('../../includes/config.inc.php');
//show_get();
$setModule = $_GET['setModule'];
$setPage = $_GET['setPage'];
$id = $_GET['id'];
// Get data
$sql = "SELECT
		  unlock_desc
		FROM tbl_dwdm_checklist
		WHERE check_id = $id";
$rs_data = $db->GetRow($sql);
?>

<form action="" method="post" name="form_unlocked" id="form_unlocked"><table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="91%"><span id="sprytextarea1">รายละเอียดการส่งแก้ไข :<br>
      <label for="unlock_desc"></label>
      <textarea name="unlock_desc" id="unlock_desc" cols="60" rows="6"><?=$rs_data['unlock_desc']?></textarea>
      <span class="textareaRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div class='button'> <button>ตกลง</button><button>ยกเลิก</button> </div></td>
    </tr>
  </table>
  
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});

$(function(){
	$(".button button:first").button({
				icons: {
					primary: 'ui-icon-check'
				}				
				}).next().button({
				icons: {
					primary: 'ui-icon-cancel'
				}				
				}).click( function() {
					$("#dialog-form-unlocked").dialog('close');
					return false;
				});
				
				
		var debug =false;
				
				 var options = { 
						url : './modules/<?=$setModule?>/<?=$setPage?>_unlocked_code.php',
						type : 'post',
					     data : {  doAction : 'set_status' ,id : <?=$_GET['id']?> , status : '<?=$_GET['status']?>' },
						//resetForm: true,
						//clearForm: true,
						beforeSubmit: function(formData, jqForm, options){
						if (Spry) { // checks if Spry is used in your page
							var r = Spry.Widget.Form.validate(jqForm[0]); // validates the form
							if (!r){
								return r;
								}else{
								  //if(debug != true){
									  if(confirm("ต้องการบันทึกข้อมูล ใช่ หรือ ไม่ ?")){		
											$.loading("load");
											return true;
										}else{
											return false;
										}	
								//	}
								
								}
						}
					},
						success: function(data){	
						if(debug != true){
							//alert(data);
														   
								$('#divMsg').html('บันทึกข้อมูลเรียบร้อย !!').fadeIn();
							
							}else{
								//$('#divMsgDiag').html(data).fadeIn();		
								console.log(data);			
							}
						},// post-submit callback 
						 complete: function(){
							  $.loading("unload");
							if(debug != true){								
								$('#divMsg').fadeOut(1000);		
									// on load call display data
								//	$.show_checklist(check_id);	
								$("#dialog-form-unlocked").dialog('close');
								 setTimeout("window.location.reload(true)",1000);	
								//$("#div_form_content").hide();
								//$("#td_calendar").width("100%");
								//$("#td_form").width("0%");
								//$("#img_status").attr({ src : "./images/icons-keyboard.png"});								
							}
						 }
					}; 
				 
					// bind to the form's submit event 
					$('#form_unlocked').submit(function() { 					 
						$(this).ajaxSubmit(options); 
						return false; 
					});		
});


</script>
