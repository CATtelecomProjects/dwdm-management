<?php
// Title Menu from function.php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
//$tbl->orderType = "desc";

$db->debug = 0;

$tbl->openTable();

$web = new MainWeb();

$auth = new Auth();
$auth->db = $db;
$auth->user_id = $_SESSION['sess_user_id'];

$rs_knowledge =  $auth->getKnowledgeCate();


// หาค่ารายชื่อหมวดหมู่ 
//$sql_knowledge = "SELECT * FROM tbl_knowledge_cate ORDER BY menu_order";
//$rs_knowledge = $db->GetAll($sql_knowledge);

//ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_id มา where
$get_knowledge = $_GET['cate_id'] ? $_GET['cate_id'] : $rs_knowledge[0]['id'];


// List User 
/* $sql_list = "SELECT user_id ,username, passwords, emp_code, first_name, last_name, email, gender, telephone, prefix_id, position_id
				FROM tbl_users ";*/
				
// เงื่อนไขการแสดง
if( $get_knowledge <> "All"){
	$str_query	= " AND  a.cate_id = $get_knowledge";
}else{
	$str_query = "";
}
 $sql_list = "SELECT a.* ,b.name
				FROM tbl_knowledge a , tbl_knowledge_cate b
				WHERE a.cate_id =b.id 
				AND a.publish = 'Y'
				$str_query	
				ORDER BY a.update_time DESC ";			
$rs_list = $db->GetAll($sql_list);

?>
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td align="left" valign="middle">หมวดหมู่ :
      <label>
        <select name="sel_cate_id" id="sel_cate_id">
        <option value="All">แสดงทั้งหมด</option>
          <?php					  
					  genOptionSelect($rs_knowledge,'id','name',$get_knowledge);
		  ?>          
        </select>
      </label></td>
    <td align="right" valign="top">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="<?=$tbl->id;?>">
  <thead>
    <tr>
      <th width="7%"  class="header_height">ลำดับ</th>
      <th width="58%">หัวข้อปัญหา</th>
      <th width="17%">หมวดหมู่</th>
      <th width="18%">วันที่ปรับปรุงล่าสุด</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i=0;$i<count($rs_list);$i++){ ?>
    <tr>
      <td align="center"><?=($i+1)?></td>
      <td align="left"><a href="#" class="link" ref="<?=$rs_list[$i]['id']?>"><?=$rs_list[$i]['issue_title']?></a></td>
      <td><?=$rs_list[$i]['name']?></td>
      <td align="center"><?=showdateTimeThai($rs_list[$i]['update_time']);?></td>
    </tr>
    <?php } // End for ?>
  </tbody>
</table>
<?php 
	$tbl->closeTable(); 
?>
<div id="dialog-knowledge_view" title="<?=$tbl->title?>" style="display:block"></div>