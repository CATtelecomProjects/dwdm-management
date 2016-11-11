<?php
header("Content-type:text/html; charset=utf8");
include('../../includes/dbConnect.php');
//print_r($_GET);
$org_code = $_GET['org_code'];
?>
<style>
    /*#tbl_mapping tr.hover:hover {
            background-color:#FFFFD9;	
            
    }
    
     .mouse-over {

background-color: #D9FFD9;
}
.mouse-out {   
background-color: '';
}*/


    .list_data {
        padding:3px;	
        cursor:pointer;
    }
</style>
<script>
    $(function () {
        var icons = {
            header: "ui-icon-circle-arrow-e",
            activeHeader: "ui-icon-circle-arrow-s"
        };
        $("#accordion").accordion({heightStyle: 'content', icons: icons});

        // Step 1 Click Org to Show Mapping data
        $('.list_data').click(function () {
            $('#view_save').show('fade');
            var list = $(this).attr('rel');//.split('|');

            $.loading("load");

            $.get('./modules/<?= $_GET['setModule'] ?>/dwdm_sm_mapping_position_listing.php?' + $.now(), {setModule: '<?= $_GET['setModule'] ?>', setPage: '<?= $_GET['setPage'] ?>', org_data: list, }, function (data) {

                $('#list_mapping').html(data);
                $.loading("unload");
            });


        });


        $('.hover').hover(function () {
            $(this).toggleClass("ui-state-highlight", 0, "");
        });

        $('.hover').click(function () {
            $(this).toggleClass("ui-state-highlight", 0, "");
        });


        $(".tooltips").tipsy({html: true, trigger: "hover", gravity: "w"});

        $('.tooltips').css("cursor", "pointer");


    });
</script>

<table width="100%" border="0" cellspacing="1" cellpadding="1" id="tbl_mapping">
    <tr class="ui-state-focus">
        <th align="left" height="20"><img src="./images/1_step.png" align="absmiddle" > List of Oranizations  &#8250; <?= $_GET['org_data'] ?></th>
    </tr>      
    <?php
    $sql_org = "SELECT
                    a.org_code,
                    a.org_name,
                    a.org_short,
                    a.org_parent,
                    a.org_level,
                    a.actived,
                    a.default_auth,
                    b.emp_admin_code,
                    b.emp_pos_short,
                    b.emp_pos_desc
                  FROM tbl_sm_org a
                    LEFT JOIN tbl_sm_emp b
                          ON a.org_code = b.org_code
                  WHERE a.org_code = '$org_code' 					 
                          AND b.emp_admin_code IN (SELECT admin_code FROM tbl_sm_admin_code WHERE admin_code NOT IN ('อ','ฬ') )
                  GROUP BY b.emp_admin_code";
    $rs_org = $db->GetAll($sql_org);
    for ($i = 0; $i < count($rs_org); $i++) {

        $org_code = $rs_org[$i]['org_code'];
        $org_name = $rs_org[$i]['org_name'];
        $org_short = $rs_org[$i]['org_short'];
        $org_parent = $rs_org[$i]['org_parent'];
        $org_level = $rs_org[$i]['org_level'];
        $emp_admin_code = $rs_org[$i]['emp_admin_code'];
        $emp_pos_short = $rs_org[$i]['emp_pos_short'];
        $emp_pos_desc = $rs_org[$i]['emp_pos_desc'];


        $sql_emp = "SELECT
                            emp_code,
                            emp_name,
                            emp_email
                          FROM tbl_sm_emp
                          WHERE org_code = '$org_code'
                                AND actived = 'Y'  
                                  AND emp_admin_code = '$emp_admin_code'";
        $rs_emp = $db->GetAll($sql_emp);

//echo json_encode($json_data);
        ?>


        <tr class="hover" id="row_<?= $org_code ?>_<?= $org_code ?>">
            <td width="69%" align="left" ><label><div id="<?= $org_code ?>" class="list_data ui-state-default" rel="<?= $org_code ?>|<?= $org_name ?>|<?= $org_short ?>|<?= $emp_admin_code ?>|<?= $emp_pos_short ?>|<?= $emp_pos_desc ?>"><?= $org_code . " : " . $org_name . " &#8250; " . $emp_pos_desc ?> (<?= $org_short ?>) &raquo;</div></label>
                        <?php
                        if (count($rs_emp) > 0) {
                            echo "<ul type='square'>";
                            for ($j = 0; $j < count($rs_emp); $j++) {
                                $emp_code = $rs_emp[$j]['emp_code'];
                                $emp_name = $rs_emp[$j]['emp_name'];
                                $emp_email = $rs_emp[$j]['emp_email'];

                                $img = "<img src='https://intranet.cattelecom.com/web_data/profile/$emp_code.jpg'>";
                                $status = " <img src='images/my-profile.png' class='tooltips' align='absmiddle' title=\"$img\">";

                                echo "<li>$status $emp_code : $emp_name  &#8250; $emp_email </li>";
                            }
                            echo "</ul>";
                        }
                        ?>

            </td>
        </tr>
        <?php
    } // End Report Loop
    ?>
</table>



