<?php

class ReadDir {

    var $dir;
    var $years;
    var $img_ext = array('png', 'gif', 'jpg', 'jepg', 'bmp');

#=====================================================

    function get_year() {

        $dir_year = scandir($this->dir, 1);

        foreach ($dir_year as $year) {

            $chk_dir = is_dir($this->dir . '/' . $year);
            if ($chk_dir === true && $year != "." && $year != "..") {
                $arrYear[] = $year;
            }
        }
        return $arrYear;
    }

#=====================================================

    function scan_Dir() {
        $path = $this->dir . '/' . $this->years;
        $arrfiles = array();
        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                chdir($path);
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        if (is_dir($file)) {
                            $arr = $this->scan_Dir($file);
                            foreach ($arr as $value) {
                                $arrfiles[] = $path . "/" . $value;
                            }
                        } else {
                            $arrfiles[] = $path . "/" . $file;
                        }
                    }
                }
                chdir("../");
            }
            closedir($handle);
        }
        return $arrfiles;
    }

#=====================================================
// Function For get Disk Usage from Server DI & BI

    function readUsage($Date) {
//$date = date('Y-m-d');
        $tmpDate = explode('-', $Date); // Convert dd-mm-yyyy  -> yyyy-mm-dd
        $setDate = $tmpDate[2] . "-" . $tmpDate[1] . "-" . $tmpDate[0];
//$setDate =  "2015-03-11";
        $log_dir = "../../uploads_dir/bdf_logs";
        $files_DI = "$log_dir/DI/$setDate.txt";
        $files_BI = "$log_dir/BI/$setDate.txt";


        if (!file_exists($files_DI) && !file_exists($files_BI))
            return false;

        if (file_exists($files_DI)) { // &&  !file_exists($files_BI)  ) return false;
// Read Files
            $lines_DI = @file($files_DI);



            // Loop through our array, show HTML source as HTML source; and line numbers too.
            // DI Logs
            foreach ($lines_DI as $line_num => $line) {
                $data_DI[] = explode(" ", $line);
                //echo "Line #<b>{$line_num}</b> : " . $line . "<br />\n";
            }
        }

        if (file_exists($files_BI)) { // &&  !file_exists($files_BI)  ) return false;
            $lines_BI = @file($files_BI);

// BI Logs

            foreach ($lines_BI as $line_num => $line) {
                $data_BI[] = explode(" ", $line);
                //echo "Line #<b>{$line_num}</b> : " . $line . "<br />\n";
            }
        }


//         print "<pre>";
//          print_r($data_DI);
//          print "</pre>"; 


// #$data_DI[row_no][array_order]
//DI
        $arrData['DI']['ftproot'] = trim(str_replace('%', '', $data_DI[15][0]));
        $arrData['DI']['data'] = trim(str_replace('%', '', $data_DI[18][0]));
        $arrData['DI']['data1'] = trim(str_replace('%', '', $data_DI[17][0]));        
        $arrData['DI']['data2'] =  trim(str_replace('%', '', $data_DI[16][0]));
        $arrData['DI']['work'] = trim(str_replace('%', '', $data_DI[3][0]));
        $arrData['DI']['archive'] = trim(str_replace('%', '', $data_DI[20][0]));       
        $arrData['DI']['utilloc'] = trim(str_replace('%', '', $data_DI[5][0]));
        $arrData['DI']['var'] = trim(str_replace('%', '', $data_DI[4][0]));

        //BI      
        $arrData['BI']['data'] = trim(str_replace('%', '', $data_BI[16][0]));       
        $arrData['BI']['work'] = trim(str_replace('%', '', $data_BI[3][0]));
        $arrData['BI']['utilloc'] = trim(str_replace('%', '', $data_BI[6][0]));
        $arrData['BI']['var'] = trim(str_replace('%', '', $data_BI[5][0]));

        return $arrData;
    }

}

// End Class
?>