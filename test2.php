
<!DOCTYPE HTML>
<html lang="th-th">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
DW/DM  Back-Office Management</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="css/ui.lightness-theme/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/modules.core.js"></script>
<link type="text/css" href="css/main.css" rel="stylesheet" />
<link type="text/css" href="css/ui.lightness-theme/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="css/tipsy.css" type="text/css" />


<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<!--<script type="text/javascript" src="js/jquery.ui.datepicker-th.js"></script>-->
<script type="text/javascript" src="js/main_index.js"></script>

<link rel="stylesheet" href="js/lightbox/colorbox.css" />
<script src="js/lightbox/jquery.colorbox.js"></script>

<script src="./includes/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="./includes/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="./includes/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="./includes/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="./includes/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="./includes/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="./images/favicon.ico" />
</head>
<body>
<div id="page">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="4px"></td>
    </tr>
  </table>
  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr  class="ui-state-active">
            <td height="39" align="left">&nbsp;<span style="font-size:22px;font-weight:bold">DW/DM  Back-Office Management</span></td>
          </tr>
          <tr>
            <td align="left"><!-- Add-On Core Code (Remove when not using any add-on's) -->
<style type="text/css">
.qmfv {
	visibility:visible !important;
}
.qmfh {
	visibility:hidden !important;
}
</style>
<link rel="stylesheet" type="text/css" href="css/ui.lightness-theme/menu.css" />
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
    <div class="ui-state-default">
  <table cellpadding="0" cellspacing="0" style="width:100%;">
    <tr>
      <td width="83%" style="width:80%;"><!-- QuickMenu Structure [Menu 0] -->
        
        <ul id="qm0" class="qmmc">
          <li><a href="index.php" title="หน้าหลัก"><img src="./images/menu_actions/icon-home.png"  border="0" align="absmiddle" /> หน้าหลัก </a></li>
            <li><span class='qmdivider qmdividery' ></span></li>
          <li><a class="qmparent" href="javascript:void(0)"><img src="./images/menu_actions/icon-config.png"  border="0" align="absmiddle" />
            ผู้ดูแลระบบ            &nbsp;&nbsp;<img src="images/menu_actions/icons-down.gif"  border="0" align="absmiddle" /> </a>
          
            <ul>
                               
              <li><a class="menu_click"  ref="1" rev="?setModule=Admin&setPage=config" href="javascript:void(0)"><img src="./images/menu_actions/icon-config.png"  border="0" align="absmiddle" /> จัดการเว็บไซต์</a></li>

                               
              <li><a class="menu_click"  ref="26" rev="?setModule=Admin&setPage=modules" href="javascript:void(0)"><img src="./images/menu_actions/icon-menu.gif"  border="0" align="absmiddle" /> จัดการโมดูล</a></li>

                               
              <li><a class="menu_click"  ref="13" rev="?setModule=Admin&setPage=menu_group" href="javascript:void(0)"><img src="./images/menu_actions/icon-menu.gif"  border="0" align="absmiddle" /> กลุ่มเมนูระบบ</a></li>

                                
              <li><a class="menu_click"  ref="14" rev="?setModule=Admin&setPage=menu" href="javascript:void(0)"><img src="./images/menu_actions/icon-menu.gif"  border="0" align="absmiddle" /> เมนูระบบ</a></li>

                  
              <li><a class="menu_click"  ref="17" rev="?setModule=Admin&setPage=menu_auth" href="javascript:void(0)"><img src="./images/menu_actions/icon-permission.png"  border="0" align="absmiddle" /> สิทธิ์เมนูใช้งาน</a></li>

                   <li><span class='qmdivider qmdividerx' ></span></li>                         
              <li><a class="menu_click"  ref="11" rev="?setModule=Admin&setPage=user_group" href="javascript:void(0)"><img src="./images/menu_actions/icon-group.png"  border="0" align="absmiddle" /> กลุ่มผู้ใช้งาน</a></li>

                               
              <li><a class="menu_click"  ref="10" rev="?setModule=Admin&setPage=users" href="javascript:void(0)"><img src="./images/menu_actions/icon-user.png"  border="0" align="absmiddle" /> ผู้ใช้งานระบบ</a></li>

                                   <li><span class='qmdivider qmdividerx' ></span></li>         
              <li><a class="menu_click"  ref="25" rev="?setModule=Admin&setPage=web_contents" href="javascript:void(0)"><img src="./images/menu_actions/icon-form.png"  border="0" align="absmiddle" /> จัดการเนื้อหาเว็บไซต์</a></li>

                               
              <li><a class="menu_click"  ref="28" rev="?setModule=Admin&setPage=web_stats" href="javascript:void(0)"><img src="./images/menu_actions/icon-report.png"  border="0" align="absmiddle" /> สถิติการใช้งาน</a></li>

                          </ul>
                  <li><span class='qmdivider qmdividery' ></span></li>
          <li><a class="qmparent" href="javascript:void(0)"><img src="./images/menu_actions/icon-profile.gif"  border="0" align="absmiddle" />
            ข้อมูลส่วนตัว            &nbsp;&nbsp;<img src="images/menu_actions/icons-down.gif"  border="0" align="absmiddle" /> </a>
          
            <ul>
                               
              <li><a class="menu_click"  ref="3" rev="?setModule=Master&setPage=profile" href="javascript:void(0)"><img src="./images/menu_actions/icon-profile.gif"  border="0" align="absmiddle" /> เปลี่ยนรหัสผ่าน</a></li>

                          </ul>
                  <li><span class='qmdivider qmdividery' ></span></li>
          <li><a class="qmparent" href="javascript:void(0)"><img src="./images/menu_actions/icon-db.png"  border="0" align="absmiddle" />
            บริหารจัดองค์ความรู้            &nbsp;&nbsp;<img src="images/menu_actions/icons-down.gif"  border="0" align="absmiddle" /> </a>
          
            <ul>
                               
              <li><a class="menu_click"  ref="18" rev="?setModule=Knowledges&setPage=knowledge" href="javascript:void(0)"><img src="./images/menu_actions/icon-menu.gif"  border="0" align="absmiddle" /> จัดการหมวดหมู่</a></li>

                               
              <li><a class="menu_click"  ref="19" rev="?setModule=Knowledges&setPage=knowledge_auth" href="javascript:void(0)"><img src="./images/menu_actions/icon-permission.png"  border="0" align="absmiddle" /> สิทธิ์กลุ่มองค์ความรู้</a></li>

                               
              <li><a class="menu_click"  ref="20" rev="?setModule=Knowledges&setPage=knowledge_manage" href="javascript:void(0)"><img src="./images/menu_actions/icon-keyin.gif"  border="0" align="absmiddle" /> บันทึก/แก้ไข องค์ความรู้</a></li>

                               
              <li><a class="menu_click"  ref="22" rev="?setModule=Knowledges&setPage=knowledge_view" href="javascript:void(0)"><img src="./images/menu_actions/icon-db.png"  border="0" align="absmiddle" /> แสดงรายการองค์ความรู้</a></li>

                          </ul>
                  <li><span class='qmdivider qmdividery' ></span></li>
          <li><a class="qmparent" href="javascript:void(0)"><img src="./images/menu_actions/icon-form.png"  border="0" align="absmiddle" />
            DW/DM            &nbsp;&nbsp;<img src="images/menu_actions/icons-down.gif"  border="0" align="absmiddle" /> </a>
          
            <ul>
                               
              <li><a class="menu_click"  ref="23" rev="?setModule=DWDM&setPage=dwdm_portlet" href="javascript:void(0)"><img src="./images/menu_actions/icon-form.png"  border="0" align="absmiddle" /> จัดการประกาศหน้า Portal</a></li>

                          </ul>
                  <li><span class='qmdivider qmdividery' ></span></li>
          <li><a class="qmparent" href="javascript:void(0)"><img src="./images/menu_actions/icon-manual.png"  border="0" align="absmiddle" />
            คู่มือการใช้งาน            &nbsp;&nbsp;<img src="images/menu_actions/icons-down.gif"  border="0" align="absmiddle" /> </a>
          
            <ul>
                               
              <li><a class="menu_click"  ref="7" rev="?setModule=Contents&setPage=contents&name=about" href="javascript:void(0)"><img src="./images/menu_actions/icon-aboutus.gif"  border="0" align="absmiddle" /> เกี่ยวกับโปรแกรม</a></li>

                               
              <li><a class="menu_click"  ref="16" rev="?setModule=Contents&setPage=contents&name=manual" href="javascript:void(0)"><img src="./images/menu_actions/icon-manual.png"  border="0" align="absmiddle" /> คู่มือการใช้งาน</a></li>

                          </ul>
                          <li><span class='qmdivider qmdividery' ></span></li>
          <li ><a class="qmparent" href="javascript:void(0)" id="signout"><img src="./images/menu_actions/icon-logout.png"  border="0" align="absmiddle" /> ออกจากระบบ</a>          
        </ul>
        
        <!-- Ending Page Content [menu nests within] --></td>
      <td width="17%" align="right" valign="middle" class="font-normal" >
     <label for="select">Welcome : </label> Administrator         <!--<select name="set_site_id" id="set_site_id">
          
        </select>
        -->
        &nbsp;</td>
    </tr>
  </table>
</div>
<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click ('all', 'main' or 'lev2'), Right to Left, Horizontal Subs, Flush Left, Flush Top) --> 
<!--<script type="text/javascript">qm_create(0,false,0,200,true,false,false,false,false);</script> -->
<script type="text/javascript">qm_create(0,false,0,200,'all',false,false,false,false);</script> 
</td>
          </tr>
        </table>
    
<input name="chkMenuAuth" id="chkMenuAuth" type="hidden" value="1">
</body>
</html>
