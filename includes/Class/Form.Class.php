<?php

require_once("./includes/Class/DataTable.Class.php");

class Web extends dataTable {

    var $selectOption = false;
    var $selectOption_label = "";
    var $selectOption_rs;
    var $selectOption_param = array();
    var $data = array();
    var $rs_data;
    var $key_id;

    public function ShowDataTable() {

        $this->openTable();

        $str = "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\">
					  <tr>
						<td align=\"left\" valign=\"middle\">";

        // case have selection		
        if ($this->selectOption) {

            $str .= "	 $this->selectOption_label : ";
            $str .= "	<select name='" . $this->selectOption_param[0] . "' id='" . $this->selectOption_param[0] . "' class='input'>";

            // Loop for display selection
            for ($i = 0; $i < count($this->selectOption_rs); $i++) {

                $sel = $this->selectOption_rs[$i][$this->selectOption_param[0]] == $this->selectOption_param[2] ? "selected" : "";

                $str .= "<option value='" . $this->selectOption_rs[$i][$this->selectOption_param[0]] . "' $sel>" . $this->selectOption_rs[$i][$this->selectOption_param[1]] . "</option>";
            }
            $str .= "	</select>";
        }
        $str .= "	</td>
						<td align=\"right\" valign=\"top\">" . MENU_ACTION . "</td>
					  </tr>
					</table>
					<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"display\" id=\"$this->id\">
					  <thead>
						<tr>";

        // loop for display header
        $i = 0;
        foreach ($this->data['header'] as $data) {
            //	  echo $data['label'];
            $str .= "<th width='" . $this->data['width'][$i] . "'  class='header_height'>" . $this->data['header'][$i] . "</th>";
            $i++;
        }
        $str .= "</tr>
					  </thead>
					  <tbody>";

        // loop for display rows data
        for ($i = 0; $i < count($this->rs_data); $i++) {

            $str .= "<tr>";

            //loop for display column data
            $j = 0;
            foreach ($this->data['header'] as $data) {
                $str .= "  <td align='" . $this->data['align'][$j] . "'>" . $this->data['data'][$i][$j] . "</td>";
                $j++;
            }

            $str .= "</tr>";
        }
        $str .= "
					  </tbody>
					</table>";

        echo $str;

        $this->closeTable();
        // Hidden section
        echo "<div id=\"dialog-form-$this->page\" title=\"$this->title\" style=\"display:none\"></div>";
        echo "<div id=\"dialog-confirm\" title=\"Comfirm!!\">ยืนยันการลบข้อมูล ?</div>";
        echo "<input type=\"hidden\" name=\"hidRadio\" id=\"hidRadio\" value=\"" . $this->rs_data[0][$this->key_id] . "\" />";
        echo "<input type=\"hidden\" name=\"modules\" id=\"modules\" value=\"$this->module\" />";
        echo "<input type=\"hidden\" name=\"setPage\" id=\"setPage\" value=\"$this->page\"/>";
        echo "<input type=\"hidden\" name=\"select_id\" id=\"select_id\" value=\"" . $this->selectOption_param[0] . "\"/>";
    }

}

// End Class
?>