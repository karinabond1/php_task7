<?php 

class Model
{ 
	private $forRender;
   public function __construct()
   {

   }
   	
	public function getArray()
   {	    
		return array('%TITLE%'=>'Contact Form', '%ERRORS%'=>' ','%NAME%'=>'Name','%EMAIL%'=>'Email','%SELECT%'=>'Please, select','%MESSAGE%'=>'Message','%NAME_VAL%'=>'','%EMAIL_VAL%'=>'','%MESSAGE_VAL%'=>'');	
	}
	
	public function getErrors()
	{
		return 'Empty field';
	}
	
	public function checkForm($arr)
	{
		$valEmail = filter_var($arr['%EMAIL_VAL%'], FILTER_VALIDATE_EMAIL);
		$valName = filter_var($arr['%NAME_VAL%'], FILTER_SANITIZE_STRING);
		$valMessage = filter_var($arr['%MESSAGE_VAL%'], FILTER_SANITIZE_STRING);
		$valSelect = filter_var($arr['%SELECT_VAL%'], FILTER_SANITIZE_STRING);
		if(!$valEmail || !$valName || !$valMessage || !$valSelect || $arr['%EMAIL_VAL%']="" || $arr['%NAME_VAL%']="" || $arr['%MESSAGE_VAL%']="" || $arr['%SELECT_VAL%']=""){
			return false;	
		} else {
			return true;
		}
				
	}
   
	public function sendEmail($arr)
	{
		$today = getdate();
		$date=$today['mday']."/".$today['mon']."/".$today['year']." ".$today['hours'].":".$today['minutes'];
		$headers = 'From: '.FROM. "\r\n" .
    	'Reply-To: ' .$arr['%EMAIL_VAL%']. "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		if(mail($arr['%EMAIL_VAL%'], $arr['%SELECT_VAL%'], $arr['%NAME_VAL%']."\n".$arr['%MESSAGE_VAL%']."\n".$date."\nIP: ".$_SERVER['REMOTE_ADDR'], $headers)){
			return true;
		}else{
			return false;
		}
	}		
}
