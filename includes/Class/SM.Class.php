<?php

class SM extends MainWeb {

    public function getSubModule($user_id) {
        $sql_sub_module = "SELECT
                                        sub_module_id,
                                        sub_module_name,
                                        module_name
                                      FROM tbl_sm_sub_module
                                      WHERE module_name IN(SELECT
                                                         module_name
                                                       FROM tbl_module_auth
                                                       WHERE user_id = $user_id)
                                      ORDER BY module_name,sub_module_name";
        return $rs_sub_module = $this->_db->GetAll($sql_sub_module);
    }

    public function listSubModule($idExt, $rs_module) {

        //$rs_module = $this->getAllTableData(null, "module_name, module_desc" , "tbl_sm_module");

        for ($i = 0; $i < count($rs_module); $i++) {
            $module_name = $rs_module[$i]['module_name'];
            $module_desc = $rs_module[$i]['module_desc'];

            // List Sub-Module	

            $rs_sub_module = $this->getAllTableData("module_name = '$module_name' ", "sub_module_id,  sub_module_name,  module_name", "tbl_sm_sub_module", "module_name,sub_module_name");

            //ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_name มา where
            $get_sub_module_id = $idExt;

            echo "<optgroup label=' " . $module_name . " : " . $module_desc . "'>";

            for ($j = 0; $j < count($rs_sub_module); $j++) {
                $sub_module_id = $rs_sub_module[$j]['sub_module_id'];
                $sub_module_name = $rs_sub_module[$j]['sub_module_name'];

                $sel = $sub_module_id == $get_sub_module_id ? "selected" : "";
                echo "<option value='$sub_module_id' $sel>$sub_module_name</option>";
            }// End j

            echo "</optgroup>";
        }
    }

// 

    public function listModules($sess_user_id) {

        $sql_module = "SELECT
                                module_name,
                                module_desc
                              FROM tbl_sm_module
                              WHERE module_name IN(SELECT
                                                                         module_name
                                                                       FROM tbl_module_auth
                                                                       WHERE user_id = $sess_user_id)
                              ORDER BY module_name";
        return $rs_module = $this->_db->GetAll($sql_module);
    }

}

?>				