<?php

class MainWeb {

	var $isActive;
	var $IconPath = "./images/";
	var $_db;
	
	public function ShowActiveIcon($status){
			if($status == "Y"){
				$img = "<img src='".$this->IconPath."/on.gif'>";
			}else{
				$img = "<img src='".$this->IconPath."/off.gif'>";				
			}
			
			return $img;
	}

	public function getTableData($input,$output,$table){
			$sql = "SELECT $output FROM $table WHERE $input";	
			$rs = $this->_db->GetRow($sql);
			return $rs[$output];
	}
	
	
		 //#######################################################
	// �ѧ��ѹ㹡�����ҧ Radom ����ѡ�õ���ӹǹ����к���
	public function random_gen($length){
	  $random= "";
	  srand((double)microtime()*1000000);
	  $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	  $char_list .= "abcdefghijklmnopqrstuvwxyz";
	  $char_list .= "1234567890";
	  // Add the special characters to $char_list if needed
	
	  for($i = 0; $i < $length; $i++)  { 
		$random .= substr($char_list,(rand()%(strlen($char_list))), 1);
	  }
	  return $random;
	} 

//echo $random_string = random_gen(30); //This will return a random 10 character string


	 //#######################################################
	// �ѧ��ѹ㹡�� Substring ����ӹǹ�����к��� �ҡ�Թ ������ ...
	public function subString($tring , $length){
	  
	  return $random;
	} 

//echo $random_string = random_gen(30); //This will return a random 10 character string
	
}


?>