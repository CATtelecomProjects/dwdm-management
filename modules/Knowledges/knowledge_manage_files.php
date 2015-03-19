<?php 
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/Auth.Class.php");
// Show Edit Value

$db->debug = 0;

$id = $_GET['id'];

?>
<script language="javascript">
$(function(){			
			
			$(".tooltips").tipsy({gravity: 's'});
			
			$("img").css({'cursor':'pointer'});
			
			$(".show_pics").colorbox({rel:'show_pics'});
			
			//ajaxLoading();			
			
			$(".img_delete").click(function(){
				if(confirm('ต้องการลบไฟล์ ใช่ หรือ ไม่ ?')){
					var iNum = $(this).attr("ref");			
					$.get('./modules/Knowledges/manage_knowledge_code.php'	,		
							{ doAction : 'delete_file' , id : iNum  },						
									function(data) {																								
										
								$.get("./modules/Knowledges/manage_knowledge_files.php", { id: $("#id").val() }, function(data){
									$("#div_list_file").html(data);
									// Set total file
									var total_file = $("#label_attach_b").text();									
									$("#label_attach_h").html(total_file) ;
								});	
											
													
									}
							)					
				
				}
			});
				
		

});
</script>

<table width="100%" border="0" cellspacing="1" cellpadding="2"  class="tbl_round">
          <?php
		
		$sql_list_file = "SELECT * FROM tbl_knowledge_files WHERE kn_id = $id ";
		$rs_list_file = $db->GetAll($sql_list_file);

	?>
          <tr >
            <th height="26" colspan="3" align="center">รายการไฟล์แนบ (<span id="label_attach_b"><?=count($rs_list_file);?></span>)</th>
          </tr>
          <tr>
            <th width="6%" align="center" bgcolor="#FFFFCC">ลำดับ</th>
            <th width="85%" bgcolor="#FFFFCC">รายชื่อไฟล์</th>
            <th width="9%" align="center" bgcolor="#FFFFCC">ลบ</th>
  </tr>
          <?php
		if(count($rs_list_file)>0){
			
			$img_ext = array('png','gif','jpg','jepg','bmp');
			
			for($i=0;$i<count($rs_list_file);$i++){
				
				$extension = @strtolower(end(explode('.', $rs_list_file[$i]['file_name'] )));
		
				if(in_array( $extension , $img_ext)){ 
					$class = "show_pics";
					$openBlank = "";
				}else{
					$class = "";
					$openBlank = "target='_blank' ";
				}
		?>
          
<tr>
            <td align="center" bgcolor="#FFFFFF"><?=($i+1);?></td>
    <td bgcolor="#FFFFFF"><a href="./modules/Knowledges/uploads_dir/<?=$rs_list_file[$i]['file_name']?>" class="<?=$class;?>" <?=$openBlank;?>><?=$rs_list_file[$i]['file_name']?></a></td>
<td align="center" bgcolor="#FFFFFF"><img src="./images/icons-delete.gif" class="img_delete" ref="<?=$rs_list_file[$i]['file_id']?>"></td>
          </tr>
          <?php
			}
		}
		?>
          <tr>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
</table>