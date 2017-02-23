<?php
$user_id = $_SESSION['sess_user_id'];
// All JS call file js/main_index.js

$db->debug=false;

$auth = new Auth();
$auth->user_id = $_SESSION['sess_user_id'];
$auth->db = $db;

// ตรวจสอบว่าอยู่กลุ่ม Admin หรือไม่?
$isAdmin = $auth->checkUserAuth(1);
$isChief = $auth->checkUserAuth(4);
$isOper = $auth->checkUserAuth(3);


// What New!!
$sql_new = "SELECT id,content_desc FROM tbl_contents WHERE id = 3";
$rs_new = $db->GetRow($sql_new);

$sql_stat_yymm = "SELECT DISTINCT
							  years,
							  months
							FROM tbl_dwdm_monthly_stats
							ORDER BY years DESC,months DESC
							LIMIT 0,1";
$rs_stat_yymm = $db->GetRow($sql_stat_yymm);


if($isAdmin){
$sql_user = "SELECT
				  a.group_id,
				  a.group_name,
				  COUNT(b.group_id) AS counts
				FROM tbl_user_group a
				  LEFT JOIN tbl_user_auth b
					ON a.group_id = b.group_id
				GROUP BY b.group_id
				order by a.group_id";
$rs_user = $db->GetAll($sql_user);

########## Menu ###########################
$sql_menu = "SELECT
					  a.mgroup_id,
					  a.menu_group_th,
					  COUNT(b.mgroup_id) AS counts
					FROM tbl_menu_group a
					  LEFT JOIN tbl_menu b
						ON a.mgroup_id = b.mgroup_id
						WHERE b.menu_name_th <> '-'
					GROUP BY b.mgroup_id
					ORDER BY a.menu_order";
$rs_menu = $db->GetAll($sql_menu);
			   

}


if($isAdmin || $isChief){

########## Problem ###########################
$sqlProblem = "SELECT
					  a.p AS countP,
					  b.s AS countS
					FROM (SELECT
							COUNT(1)    P
						  FROM tbl_dwdm_problems
						  WHERE problem_status = 'P') a,
					  (SELECT
						 COUNT(1)    S
					   FROM tbl_dwdm_problems
					   WHERE problem_status = 'S') b";
$rsProblem = $db->GetRow($sqlProblem);			
}


########## Knowledge ###########################
$sql_cate ="SELECT
				  				  a.id,
								  a.name,
								  COUNT(b.cate_id)      AS counts
								FROM tbl_knowledge_cate a
								  LEFT JOIN tbl_knowledge b
									ON a.id = b.cate_id
								GROUP BY a.id";			
$rs_cate = $db->GetAll($sql_cate);


########## Checklist ###########################


if($isChief || $isOper){
		if($isChief){
			$sql_ext =  "  AND  a.check_status = 'S' ";
							
		}else if($isOper){
			$sql_ext  = " AND a.user_assign =  $user_id";
			
		}
		
		
		 $sql_check =  " SELECT
								  a.check_id,
								  a.user_assign,
								  b.user_desc,
								  DATE_FORMAT(a.date_start, '%d-%m-%Y') AS date_start,
								  DATE_FORMAT(a.date_finish, '%d-%m-%Y') AS date_finish,
								  a.check_status  ,
								  YEAR(a.date_start) AS years
								FROM tbl_dwdm_checklist a , tbl_users b
								WHERE  a.user_assign = b.user_id  $sql_ext 
								ORDER BY a.check_id DESC";
		
		// Case Operation users
		
							
		$rs_check	= $db->GetAll($sql_check);		
		
		$arrKeyin = array();
		$arrApprove = array();
		//$arrSend = array();
		
		for($i=0;$i<count($rs_check);$i++){			
				$check_id = $rs_check[$i]['check_id'];
				$date_start = $rs_check[$i]['date_start'];
				$date_finish = $rs_check[$i]['date_finish'];
				$check_status = $rs_check[$i]['check_status'];		
				$user_desc = $rs_check[$i]['user_desc'];		
				$years = $rs_check[$i]['years'];			
				$icon = $checklist_status[$check_status]['icon'];
				$title = $checklist_status[$check_status]['title'];
				
				 $img_status = "<img src='./images/$icon' class='tooltips' title='".$title."' align='absmiddle'>";				
				 $str_stauts = 	 " <li class='click_menu_checklist'> $img_status  <a href='?setModule=DWDM&setPage=dwdm_checklist&page=form&check_id=$check_id&years=$years' >".$date_start." - ".$date_finish." : ($user_desc) </a></li>";
				
				if($check_status == "A"){
					$arrApprove[] = $str_stauts;
				}else{
					$arrKeyin[] = $str_stauts;
				}	
								 
				} // End loop
				/*
				show_array($arrKeyin);
				show_array($arrApprove);
				show_array($arrSend);*/
		
}

?>
<script src="./js/highcharts/highcharts.js"></script>
<script src="./js/highcharts/highcharts-3d.js"></script>
<!--<script src="./js/highcharts/highcharts-3d.js"></script>-->
<script src="./js/highcharts/exporting.js"></script>
<script type="text/javascript">
			$(function(){
				// Accordion
				$("#accordion").accordion({ 									
									heightStyle: 'content'
									});
				
				/************************************/
				$('img').css('cursor','pointer');
				
				$('.view').tipsy({gravity: 's'});
				$('.manage').tipsy({gravity: 's'});	
				
				$('.click_menu_checklist').click(function(){
					$.get('./save_Stats.php?action=save_stat&program_id=34', function(data){						
				});
				});
				
				<?php
				if($isChief || $isOper || $isAdmin){
					?>
				/*
				$.get('./modules/DWDM/dwdm_monthly_reports_stats_graph_by_months.php?setModule=DWDM&setPage=dwdm_monthly_reports_stats&year=<?=$rs_stat_yymm['years']?>&month=<?=$rs_stat_yymm['months']?>&target=main', function(data){			
				*/
				$.get('./modules/SM/dwdm_sm_dashboard.php?'+$.now()+'&target=main', function(data){			
							
				
					$('#graph').html(data);
				});
				<?php } ?>
				
			});
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="2" class="ui-widget-content">
<?php
 if($isChief || $isOper || $isAdmin){
	 ?>
  <tr>
    <td valign="top"><div  id="what_new" class="ui-state-focus ui-corner-all" style="padding: 0 0 0 1em;font-size:10px"><?=$rs_new['content_desc']?></div></td>
  </tr>
  <?php } ?>
  <tr>
    <td valign="top"><div id="accordion">
    <?php
	
	if($isAdmin){
		
		?>
    
        <h3><a href="#">Administrator Dashboard</a></h3>
          <table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td width="23%" valign="top"><b>+ Groups &  Users (<?=count($rs_user);?>)</b>
                <ul type="square">
                  <?php
				 
					
			if(count($rs_user)>0){
				for($i=0;$i<count($rs_user);$i++){			
				$group_id = $rs_user[$i]['group_id'];
				 echo " <li><a href='?setModule=Admin&setPage=users&group_id=$group_id' >".$rs_user[$i]['group_name']."</a> (".$rs_user[$i]['counts'].")</li>";
				}
			}else{
				echo " <li><i>ไม่มีข้อมูล !!</i></li>";
			}
			?>
                </ul></td>
              <td width="27%" valign="top"><b>+ Menu  (<?=count($rs_menu);?>)</b>
                <ul type="square">
                  <?php			
			if(count($rs_menu)>0){
				for($i=0;$i<count($rs_menu);$i++){
					$mgroup_id = $rs_menu[$i]['mgroup_id'];
				 echo " <li><a href='?setModule=Admin&setPage=menu&mgroup_id=$mgroup_id'>".$rs_menu[$i]['menu_group_th']."</a> (".$rs_menu[$i]['counts'].")</li>";
				}
			}else{
				echo " <li><i>ไม่มีข้อมูล !!</i></li>";
			}
			?>
                </ul></td>
              <td width="50%" valign="top">&nbsp;</td>
            </tr>
          </table>
        
        <?php
		
	} // End Admin Dashboard 
	?>
      
      <?php
	 if($isChief || $isOper){
	 ?>   
        <h3><a href="#">รายการตรวจสอบระบบ DW/DM </a></h3>
          <table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td width="40%" valign="top">
              <b>+ <a href="?setModule=DWDM&setPage=dwdm_checklist">ไปยังหน้าแรกตรวจสอบระบบ DW/DM</a> </b>    
              <p>         
              
      <?php
		
			$str = $isChief ? "ขออนุมัติ" : "บันทึกข้อมูล";
			 // Case งานที่ต้องบันทึก / อนุมัติ
			  echo "<b>+ งานที่กำลัง$str (".count($arrKeyin).")</b>";
              echo " <ul type='square'>";
			if(count($arrKeyin)>0){
					 for($i=0;$i<10;$i++){
						 echo $arrKeyin[$i];
					 }
			}else{
				echo " <li><i>ไม่มีงานที่ต้องดำเนินการ !!</i></li>";
			}
			echo "</ul>";
			
		if($isOper){ //พนักงาน
			// Case งานที่บันทึกผ่านมาแล้ว
			  echo "<b>+ งานที่ดำเนินการเสร็จแล้ว (".count($arrApprove).")</b>";
              echo " <ul type='square'>";
			if(count($arrApprove)>0){
					 for($i=0;$i<10;$i++){
						 echo $arrApprove[$i];
					 }
			}else{
				echo " <li><i>ไม่มีงานที่ต้องดำเนินการ !!</i></li>";
			}
			echo "</ul>";
			
		} // End if
		
	
			?>
                
                </td>
              <td width="60%" valign="top"></td>
            </tr>
          </table>
        <?php
		
	 }
	 ?>
      
      
      <?php
	  if($isAdmin || $isChief){
		?> 		   
       <h3><a href="#">รายงานสรุปปัญหา DW/DM </a></h3>
         <ul type="square">
         	<li><a href="?setModule=DWDM&setPage=dwdm_problems">ทั้งหมด (<?=($rsProblem['countP']+$rsProblem['countS'])?>)</a></li>
            <li><a href="?setModule=DWDM&setPage=dwdm_problems&problem_status=P">กำลังดำเนินการ (<?=$rsProblem['countP']?>)</a></li>
            <li><a href="?setModule=DWDM&setPage=dwdm_problems&problem_status=S">ดำเนินการเสร็จแล้ว (<?=$rsProblem['countS']?>)</a></li>
         </ul>
       <?php
	  		} 
	  ?>

  <?php  
  if($isAdmin || $isChief || $isOper){
      ?>
        <h3><a href="#">บริหารจัดการองค์ความรู้</a></h3>
          <table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td width="50%" valign="top"><b>+ หมวดองค์ความรู้ (<?=count($rs_cate);?>)</b>
                <ul type="square">
                  <?php
				 
					
			if(count($rs_cate)>0){
				for($i=0;$i<count($rs_cate);$i++){			
				$cate_id = $rs_cate[$i]['id'];
				 echo " <li><a href='?setModule=Knowledges&setPage=knowledge_view&cate_id=$cate_id' >".$rs_cate[$i]['name']."</a> (".$rs_cate[$i]['counts'].")</li>";
				}
			}else{
				echo " <li><i>ไม่มีข้อมูล !!</i></li>";
			}
			?>
                </ul></td>
              <td width="50%" valign="top">&nbsp;</td>
            </tr>
          </table>
<?php
  }
  ?>
      </div></td>
  </tr>
</table>
<div id="graph" style="min-width: 250px; min-height: 180px; margin: 0 auto"></div>
