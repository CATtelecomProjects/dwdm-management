<?php
#session_start();
$sess_user_id = $_SESSION['sess_user_id'];
$db->debug = 0;

?>
<!-- Add-On Core Code (Remove when not using any add-on's) -->
<style type="text/css">
.qmfv {
	visibility:visible !important;
}
.qmfh {
	visibility:hidden !important;
}
</style>
<link rel="stylesheet" type="text/css" href="css/<?=THEMES?>/menu.css" />
<script language="javascript" type="text/javascript"  src="./includes/menu/js/menu.js"></script>
<script type="text/javascript">
	$(function(){

			$("#signout").click(function(){
				if(confirm('ต้องการออกจากระบบ ใช่ หรือ ไม่ ?')){
					window.location = 'signout.php';
				}
			});
			

//Save Stats
		$(".menu_click").click(function(){		
				var program_id = $(this).attr("ref");
				var url = $(this).attr("rev");
				
				$.get('./save_Stats.php?action=save_stat&program_id='+program_id, function(data){
					window.location = url;
				});
			
		});
});
</script>
<!-- Starting Page Content [menu nests within] -->
    <?php

// Title Menu from : tbl_menu_group
if(LANGUAGE == "en"){
	$menu_group_lange = "menu_group_en";
	$menu_lange = "menu_name_en";	
}else{
	$menu_group_lange = "menu_group_th";
	$menu_lange = "menu_name_th";
}


 $sqlMenuGroup = "SELECT
									   b.mgroup_id,
									   b.menu_group_th,
									   b.menu_group_en,									
									   d.module_name,
									   b.menu_order,
									   c.icon_name
								  FROM tbl_menu a,
									   tbl_menu_group b,
									   tbl_icons c,
									   tbl_modules d
								  WHERE a.mgroup_id = b.mgroup_id
										 AND b.icon_id = c.icon_id
										 AND b.modules_id = d.id
										 AND menu_id IN(SELECT
															 menu_id
														FROM tbl_menu_auth
														WHERE group_id IN(SELECT
																			   group_id
																		  FROM tbl_user_auth
																		  WHERE user_id ='".$_SESSION['sess_user_id']."'))
								  GROUP BY a.mgroup_id
								  ORDER BY b.menu_order ASC";									
							
$rsMenuGroup = $db->GetAll($sqlMenuGroup);		


?>
<div class="ui-state-default" >
  <table cellpadding="0" cellspacing="0" style="width:100%;">
    <tr>
      <td width="83%" style="width:80%;" ><!-- QuickMenu Structure [Menu 0] -->
        
        <ul id="qm0" class="qmmc">
          <li><a href="./" title="หน้าหลัก"><img src="<?=$arr_icon['home']?>"  border="0" align="absmiddle" /> หน้าหลัก </a></li>
      <?php

for($i=0;$i<count($rsMenuGroup);$i++){
	?>
      <li><span class='qmdivider qmdividery' ></span></li>
          <li><a class="qmparent" href="javascript:void(0)"><img src="./images/menu_actions/<?=$rsMenuGroup[$i]['icon_name']?>"  border="0" align="absmiddle" />
            <?=$rsMenuGroup[$i][$menu_group_lange]?>
            &nbsp;&nbsp;<img src="images/menu_actions/icons-down.gif"  border="0" align="absmiddle" /> </a>
          
            <ul>
              <?php
		 $sqlMenu = "SELECT a.menu_id ,a.menu_name_th ,a.menu_name_en,a.menu_desc, a.menu_file,a.menu_param,a.mgroup_id , b.icon_name 
								FROM tbl_menu a , tbl_icons b
								WHERE  a.icon_id = b.icon_id 
								AND a.mgroup_id =".$rsMenuGroup[$i]['mgroup_id']."
								AND a.menu_id
										IN (		
													SELECT menu_id
													FROM tbl_menu_auth
													WHERE group_id
													IN (						
															SELECT group_id
															FROM tbl_user_auth
															WHERE user_id = '".$_SESSION['sess_user_id']."'
															)
										)
								ORDER BY a.menu_order";
		$rsMenu = $db->GetAll($sqlMenu);			
		  
		  	for($j = 0 ; $j<count($rsMenu); $j++){		
			
				if($rsMenu[$j]['menu_name_th'] == "-"){
					echo "<li><span class='qmdivider qmdividerx' ></span></li>";	
				}else{
								
				?>
                 
              <li><a class="menu_click tooltips2"  ref="<?=$rsMenu[$j]['menu_id']?>" rev="?setModule=<?=$rsMenuGroup[$i]['module_name']?>&setPage=<?=$rsMenu[$j]['menu_file']?><?=$rsMenu[$j]['menu_param']?>" href="javascript:void(0)" title="<?=$rsMenu[$j]['menu_desc']?>"><img src="./images/menu_actions/<?=$rsMenu[$j]['icon_name']?>"  border="0" align="absmiddle" /> <?=$rsMenu[$j][$menu_lange]?></a></li>
              <?php	
				}
			}

?>
            </ul>
            <?php
} 

			?>
              <li><span class='qmdivider qmdividery' ></span></li>
          <li ><a class="qmparent" href="javascript:void(0)" id="signout"><img src="<?=$arr_icon['logout']?>"  border="0" align="absmiddle" /> ออกจากระบบ</a>          
        </ul>
        
        <!-- Ending Page Content [menu nests within] --></td>
      <td width="17%" align="right" valign="middle" class="font-normal" >
     <label for="select">Welcome : </label> <?=isset($_SESSION['sess_bis_name']) ? $_SESSION['sess_bis_name'] : $_SESSION['sess_name'];?>
         <!--<select name="set_site_id" id="set_site_id">
        <?php
			// แสดงค่าไซต์งานที่สังกัด
			// genOptionSelect($rs_site,'site_id','site_name',$_SESSION['sess_site_id']);
		?>  
        </select>
        -->
        &nbsp;</td>
    </tr>
  </table>
</div>
<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click ('all', 'main' or 'lev2'), Right to Left, Horizontal Subs, Flush Left, Flush Top) --> 
<!--<script type="text/javascript">qm_create(0,false,0,200,true,false,false,false,false);</script> -->
<script type="text/javascript">qm_create(0,false,0,200,'main',false,false,false,false);</script> 
