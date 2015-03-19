<?php
@session_start();
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/ReadDir.Class.php");
$db->debug=0;
// List Menu Group
$check_id = $_GET['check_id'];
$check_date = $_GET['date'];

$setModule = $_GET['modules'];
$setPage = $_GET['pages'];

$check_date_ex = explode("-",$check_date);
$check_date_str =  (int) $check_date_ex[0]."/".(int) $check_date_ex[1]."/".($check_date_ex[2]+543);

//show_session();

$error['min'] = "ค่าที่ระบุต้องมากกว่า 0";
$error['max'] = "ค่าที่ระบุต้องน้อยกว่า 100";
$error['format'] = "รูปแบบไม่ถูกต้อง";



// Function set checkbox
function setChecked($data){
	return $data == "Y" ? "checked":"";
	
}


// Function set backgroud highlight
function setHighlightColor($data){
	if($data > 90){
		$color = "#ff6a6a";	
	}else if($data>80){
		$color = "#ffff99";
	}else{
		$color = "#ffffff";		
	}
	return $color;
}


//show_get();
$sql_check = "SELECT
					 id
					FROM tbl_dwdm_checklist_detail
					WHERE check_id = $check_id
						AND check_date = STR_TO_DATE('$check_date', '%d-%m-%Y')";
$rs_check = $db->GetAll($sql_check);

// Existing data => Get  data

if(count($rs_check)>0){




$sql_edit = "SELECT
						  a.id,
						  a.check_id,
						  DATE_FORMAT(a.check_date, '%d-%m-%Y') AS check_date,
						  DATE_FORMAT(a.check_time, '%H:%i') AS check_time,
						  a.check_by,
						  b.user_desc,
						  a.datasets,
						  a.problems,
						  a.solutions,
						  a.remarks,
						  a.holiday,
						  a.update_time
						FROM tbl_dwdm_checklist_detail a , tbl_users b
						WHERE a.check_by = b.user_id
								AND a.check_id = $check_id
								AND a.check_date = str_to_date('$check_date', '%d-%m-%Y')";
$rs_edit = $db->GetRow($sql_edit);
		$id = $rs_edit['id'];
		$check_time = $rs_edit['check_time'];
		$check_by = $rs_edit['user_desc'];
		$arrData = json_decode($rs_edit['datasets'], true);
		$update_time = $rs_edit['update_time'];
		
		$DI_ftproot = $arrData['hw']['di']['ftproot']['value'];
		$DI_data = $arrData['hw']['di']['data']['value'];
		$DI_data1 = $arrData['hw']['di']['data1']['value'];
		$DI_data2 = $arrData['hw']['di']['data2']['value'];
		$DI_work = $arrData['hw']['di']['work']['value'];
		$DI_archive = $arrData['hw']['di']['archive']['value'];
		$DI_utilloc = $arrData['hw']['di']['utilloc']['value'];
		$DI_var = $arrData['hw']['di']['var']['value'];
		
		$BI_data = $arrData['hw']['bi']['data']['value'];
		$BI_work =$arrData['hw']['bi']['work']['value'];
		$BI_utilloc = $arrData['hw']['bi']['utilloc']['value'];
		$BI_var = $arrData['hw']['bi']['var']['value'];
		
		// Check box
		$DI_ftproot_chk = $arrData['hw']['di']['ftproot']['item'];
		$DI_data_chk = $arrData['hw']['di']['data']['item'];
		$DI_data1_chk = $arrData['hw']['di']['data1']['item'];
		$DI_data2_chk = $arrData['hw']['di']['data2']['item'];
		$DI_work_chk = $arrData['hw']['di']['work']['item'];
		$DI_archive_chk = $arrData['hw']['di']['archive']['item'];
		$DI_utilloc_chk = $arrData['hw']['di']['utilloc']['item'];
		$DI_var_chk = $arrData['hw']['di']['var']['item'];
		
		$BI_data_chk = $arrData['hw']['bi']['data']['item'];
		$BI_work_chk =$arrData['hw']['bi']['work']['item'];
		$BI_utilloc_chk = $arrData['hw']['bi']['utilloc']['item'];
		$BI_var_chk = $arrData['hw']['bi']['var']['item'];
		
		
}else{
	
	// Get data From bdf command on Server DI & BI
$readUsage = new ReadDir();
$UsageData  = $readUsage->readUsage($check_date);

	
	if ($UsageData != false){
		$DI_ftproot = $UsageData['DI']['ftproot'];
		$DI_data = $UsageData['DI']['data'];
		$DI_data1 = $UsageData['DI']['data1'];
		$DI_data2 = $UsageData['DI']['data2'];
		$DI_work = $UsageData['DI']['work'];
		$DI_archive = $UsageData['DI']['archive'];
		$DI_utilloc = $UsageData['DI']['utilloc'];
		$DI_var = $UsageData['DI']['var'];
		
		$BI_data = $UsageData['BI']['data'];
		$BI_work = $UsageData['BI']['work'];
		$BI_utilloc = $UsageData['BI']['utilloc'];
		$BI_var = $UsageData['BI']['var'];
		
		// Check box
		$DI_ftproot_chk =  'Y';
		$DI_data_chk = 'Y';
		$DI_data1_chk = 'Y';
		$DI_data2_chk = 'Y';
		$DI_work_chk = 'Y';
		$DI_archive_chk = 'Y';
		$DI_utilloc_chk = 'Y';
		$DI_var_chk = 'Y';
		
		$BI_data_chk = 'Y';
		$BI_work_chk ='Y';
		$BI_utilloc_chk = 'Y';
		$BI_var_chk ='Y';
	}
		$check_time = date("H:i");
		$check_by =$_SESSION['sess_name'];
}
//show_array($rs_edit);
$key_status = $id <> "" ? "<img src='./images/on.gif' style='cursor:help' class='tooltips' title='บันทึกข้อมูลแล้ว <br>$update_time'>" : "<img src='./images/off.gif' class='tooltips' title='ยังไม่การบันทึกข้อมูล' style='cursor:help'>";

?>
<style type="text/css">
	.tborder  tr td {
		border:1px solid #DADADA;					
	}
</style>
<form id="form_checklist" name="form_checklist" method="post" action="">
  <table width="100%" border="0" cellpadding="3" cellspacing="0" class="tborder" id="table_form" style="border-collapse:collapse;background-color:#FFF">         
    <tr class="ui-widget-header">
      <th width="15%" height="17">วันที่</th>
      <th colspan="3">รายการ</th>
      <th width="20%">ปัญหา / อาการ    -  แก้ไข</th>
      <th width="14%">หมายเหตุ</th>
      </tr>
    <tr>
      <td rowspan="8"><input name="holiday" type="checkbox" id="holiday" value="Y" <?=$rs_edit['holiday']=="Y"?"checked":""?> />
        <label for="holiday">วันหยุด</label>
        <br />        
        <strong>&nbsp;วันที่ : </strong> &nbsp;<u><?=$check_date_str?></u> <?=$key_status?><br />
        &nbsp;<strong>เวลา :</strong>   <u><?=$check_time?></u>     <strong>น.</strong><br />
        &nbsp;<strong>ผู้รับผิดชอบ</strong> :<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><?=$check_by?></u></td>
      <td colspan="3" align="left" class="ui-state-default"> <strong>Software</strong></td>
      <td align="left"  class="ui-state-default"><strong> ปัญหา / อาการ :</strong></td>
      <td rowspan="8" align="center" valign="top"><textarea name="remarks" id="remarks" cols="28" rows="9"><?=$rs_edit['remarks']?></textarea></td>
    </tr>
    <tr>
      <td width="17%" align="left"><label for="arrData[sw][portal]"><input name="arrData[sw][portal]" type="checkbox" id="arrData[sw][portal]" value="Y" <?=setChecked($arrData['sw']['portal']);?> />  BI Report (Web Portal)
</label></td>
      <td width="17%" align="left"><label for="arrData[sw][webrep]"><input name="arrData[sw][webrep]" type="checkbox" id="arrData[sw][webrep]" value="Y"  <?=setChecked($arrData['sw']['webrep']);?> />
      Web Report Studio</label></td>
      <td width="17%" align="left"><label for="arrData[sw][sasdi]"><input name="arrData[sw][sasdi]" type="checkbox" id="arrData[sw][sasdi]" value="Y"  <?=setChecked($arrData['sw']['sasdi']);?> />
      SAS Data Integration</label></td>
      <td rowspan="2" align="center" valign="top"><label for="problems"></label>
        <textarea name="problems" id="problems" cols="40" rows="3"><?=$rs_edit['problems']?></textarea></td>
      </tr>
    <tr>
      <td colspan="3" align="left"  class="ui-state-default" > <strong>Hardware</strong>  <span class="font-small">(% Disk Usage ต้องไม่เกิน 90%) </span> <span class="tooltips" style="cursor:help;font-size:14px" title="ระบบจะดึงข้อมูลอัตโนมัติจาก Server CATEDI & CATEBI) ช่วงเวลา 8.00 น.">?</span></td>
      </tr>
    <tr  class="ui-state-default">
      <td colspan="2" ><strong>&nbsp;CATEDI1</strong></td>
      <td  class="ui-state-default"><strong>CATEBI1</strong></td>
      <td align="left"  class="ui-state-default"><strong> แก้ไข :</strong></td>
      </tr>
    <tr>
      <td align="left" bgcolor="<?=setHighlightColor($DI_ftproot)?>"><label for="arrData[hw][di][ftproot][item]"><input name="arrData[hw][di][ftproot][item]" type="checkbox" id="arrData[hw][di][ftproot][item]" value="Y"  <?=setChecked($DI_ftproot_chk);?> />
        /ftproot</label>
          <span id="sprytextfield1">
          <input name="arrData[hw][di][ftproot][value]" type="text" id="arrData[hw][di][ftproot][value]" size="2" value="<?=$DI_ftproot?>"/>
      <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span> %</td>
      <td align="left" bgcolor="<?=setHighlightColor($DI_work)?>"><label for="arrData[hw][di][work][item]"><input name="arrData[hw][di][work][item]" type="checkbox" id="arrData[hw][di][work][item]" value="Y"  <?=setChecked($DI_work_chk);?> />
        /work</label>
          <span id="sprytextfield2">
          <input name="arrData[hw][di][work][value]" type="text" id="arrData[hw][di][work][value]" size="2"  value="<?=$DI_work?>"/>
      <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span> %</td>
      <td align="left" bgcolor="<?=setHighlightColor($BI_data)?>"><label for="arrData[hw][bi][data][item]"><input name="arrData[hw][bi][data][item]" type="checkbox" id="arrData[hw][bi][data][item]" value="Y"  <?=setChecked($BI_data_chk);?> />
        /data</label>
          <span id="sprytextfield3">
          <input name="arrData[hw][bi][data][value]" type="text" id="arrData[hw][bi][data][value]" size="2"  value="<?=$BI_data?>"/>
     <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span> %</td>
      <td rowspan="4" align="center" valign="top"><textarea name="solutions" id="solutions" cols="40" rows="7"><?=$rs_edit['solutions']?></textarea></td>
      </tr>
    <tr>
      <td align="left" bgcolor="<?=setHighlightColor($DI_data)?>"><label for="arrData[hw][di][data][item]"><input name="arrData[hw][di][data][item]" type="checkbox" id="arrData[hw][di][data][item]" value="Y"  <?=setChecked($DI_data_chk);?> />
        /data</label>
          <span id="sprytextfield4">
          <input name="arrData[hw][di][data][value]" type="text" id="arrData[hw][di][data][value]" size="2"  value="<?=$DI_data?>"/>
      <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      <td align="left" bgcolor="<?=setHighlightColor($DI_archive)?>"><label for="arrData[hw][di][archive][item]"><input name="arrData[hw][di][archive][item]" type="checkbox" id="arrData[hw][di][archive][item]" value="Y"  <?=setChecked($DI_archive_chk);?> />
        /archive</label>
          <span id="sprytextfield5">
          <input name="arrData[hw][di][archive][value]" type="text" id="arrData[hw][di][archive][value]" size="2"  value="<?=$DI_archive?>"/>
       <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      <td align="left" bgcolor="<?=setHighlightColor($BI_work)?>"><label for="arrData[hw][bi][work][item]"><input name="arrData[hw][bi][work][item]" type="checkbox" id="arrData[hw][bi][work][item]" value="Y"  <?=setChecked($BI_work_chk);?> />
        /work</label>
          <span id="sprytextfield6">
          <input name="arrData[hw][bi][work][value]" type="text" id="arrData[hw][bi][work][value]" size="2"  value="<?=$BI_work?>"/>
       <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      </tr>
    <tr>
      <td align="left" bgcolor="<?=setHighlightColor($DI_data1)?>"><label for="arrData[hw][di][data1][item]"><input name="arrData[hw][di][data1][item]" type="checkbox" id="arrData[hw][di][data1][item]" value="Y"  <?=setChecked($DI_data1_chk);?> />
        /data1</label>
          <span id="sprytextfield7">
          <input name="arrData[hw][di][data1][value]" type="text" id="arrData[hw][di][data1][value]" size="2" value="<?=$DI_data1?>"/>
      <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      <td align="left" bgcolor="<?=setHighlightColor($DI_utilloc)?>"><label for="arrData[hw][di][utilloc][item]"><input name="arrData[hw][di][utilloc][item]" type="checkbox" id="arrData[hw][di][utilloc][item]" value="Y" <?=setChecked($DI_utilloc_chk);?>  />
        /utilloc</label>
          <span id="sprytextfield8">
          <input name="arrData[hw][di][utilloc][value]" type="text" id="arrData[hw][di][utilloc][value]" size="2"  value="<?=$DI_utilloc?>"/>
       <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      <td align="left" bgcolor="<?=setHighlightColor($BI_utilloc)?>"><label for="arrData[hw][bi][utilloc][item]"><input name="arrData[hw][bi][utilloc][item]" type="checkbox" id="arrData[hw][bi][utilloc][item]" value="Y"  <?=setChecked($BI_utilloc_chk);?> />
        /utilloc</label>
          <span id="sprytextfield9">
          <input name="arrData[hw][bi][utilloc][value]" type="text" id="arrData[hw][bi][utilloc][value]" size="2"  value="<?=$BI_utilloc?>"/>
      <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      </tr>
    <tr>
      <td align="left" bgcolor="<?=setHighlightColor($DI_data2)?>"><label for="arrData[hw][di][data2][item]"><input name="arrData[hw][di][data2][item]" type="checkbox" id="arrData[hw][di][data2][item]" value="Y"  <?=setChecked($DI_data2_chk);?> />
        /data2</label>
          <span id="sprytextfield10">
          <input name="arrData[hw][di][data2][value]" type="text" id="arrData[hw][di][data2][value]" size="2"  value="<?=$DI_data2?>"/>
      <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      <td align="left" bgcolor="<?=setHighlightColor($DI_var)?>"><label for="arrData[hw][di][var][item]"><input name="arrData[hw][di][var][item]" type="checkbox" id="arrData[hw][di][var][item]" value="Y"  <?=setChecked($DI_var_chk);?> />
        /var</label>
          <span id="sprytextfield11">
          <input name="arrData[hw][di][var][value]" type="text" id="arrData[hw][di][var][value]" size="2"  value="<?=$DI_var?>"/>
       <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      <td align="left" bgcolor="<?=setHighlightColor($BI_var)?>"><label for="arrData[hw][bi][var][item]"><input name="arrData[hw][bi][var][item]" type="checkbox" id="arrData[hw][bi][var][item]" value="Y"  <?=setChecked($BI_var_chk);?> />
        /var</label>
          <span id="sprytextfield12">
          <input name="arrData[hw][bi][var][value]" type="text" id="arrData[hw][bi][var][value]" size="2"  value="<?=$BI_var?>"/>
       <span class="textfieldInvalidFormatMsg"><?=$error['format']?></span><span class="textfieldMinValueMsg"><?=$error['min']?></span><span class="textfieldMaxValueMsg"><?=$error['max']?></span></span>  %</td>
      </tr>
    <tr class="ui-widget-content">
      <td colspan="6" align="center"><div class='button'> <button>บันทึก</button> <button>ยกเลิก</button></div></td>
      </tr>
    </table>
<input name="id" id="id" type="hidden" value="<?=$rs_edit['id']?>"/>
<input name="check_id" id="check_id" type="hidden" value="<?=$check_id;?>"/>
<input name="check_date" id="check_date" type="hidden" value="<?=$check_date?>"/>
<input name="check_time" id="check_time" type="hidden" value="<?=$check_time?>" />
</form>
<script type="text/javascript">
<?php
	for($i=1;$i<=12;$i++){
		echo "var sprytextfield$i = new Spry.Widget.ValidationTextField('sprytextfield$i', 'integer', {isRequired:false,minValue:0, maxValue:100, validateOn:['blur", "change']});";
	}
?>
</script>
<script type="text/javascript">
	$(function(){
	
	$(".tooltips").tipsy({html: true ,gravity: 's' });
		
	$("input[name^='arrData']").css("text-align", "center");
	
	//$("input:checkbox").prop("checked", true);				
	
	
	$("#holiday").click(function(){
 		 if($(this).is(':checked')){
			  alert("กรอกวันหยุดในช่องหมายเหตุ เช่น วันหยุดปิยะมหาราช");
			  $("#remarks").focus();
		 }
	});
	
	// Set focus on click checkbox
	$( "input[id*='item']" ).click(function(){
		if($(this).is(':checked')){
			var strNewString = $(this).attr('id').replace('item','value');		
			$( "input[id*='"+strNewString+"']" ).focus();
		}
	});
	
	// Set check on checkbox  on click textbox
	$( "input[id*='value']" ).keyup(function(){		
		var strNewString = $(this).attr('id').replace('value','item');		
		if($(this).val() != ""){			
			$( "input[id*='"+strNewString+"']" ).prop("checked" , true);
		}else{
			$( "input[id*='"+strNewString+"']" ).prop("checked" , false);
		}
	});
	
	
	var check_id =$("#check_id").val();	
	
	$(".button button:first").button({
				icons: {
					primary: 'ui-icon-disk'
				}				
				}).next().button({
				icons: {
					primary: 'ui-icon-cancel'
				}				
				}).click( function() {
					window.location = "?setModule=<?=$setModule?>&setPage=<?=$setPage?>&page=form&check_id=<?=$check_id?>";
					return false;
				});
				
				/*
					
					// Function to Dislplay data
					$.show_checklist = function (check_id){
						$.loading('load');
						$.get('./modules/<?=$setModule?>/<?=$setPage?>_view.php?check_id='+check_id,	
								function(data){
											$("#div_display").html(data);										
											$.loading('unload');
								});		
						
					}
					
				*/
				
				var debug =false;
				
				 var options = { 
						url : './modules/<?=$setModule?>/<?=$setPage?>_keyin_code.php',
						type : 'post',
					//data : { check_id : <?=$check_id?> , check_date : '<?=$check_date?>' },
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
									$.show_checklist(check_id);	
								// setTimeout("window.location.reload(true)",1000);	
								$("#div_form_content").hide();
								$("#td_calendar").width("100%");
								$("#td_form").width("0%");
								$("#img_status").attr({ src : "./images/icons-keyboard.png"});								
							}
						 }
					}; 
				 
					// bind to the form's submit event 
					$('#form_checklist').submit(function() { 					 
						$(this).ajaxSubmit(options); 
						return false; 
					}); 
					
	});
</script>