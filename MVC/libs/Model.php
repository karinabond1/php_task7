<?php 

class Model
{ 
	private $forRender;
   public function __construct()
   {

   }
   	
	public function getArray()
   {	    
		return array('%TITLE%'=>'Contact Form', '%ERRORS%'=>'Empty field','%NAME%'=>'Name','%EMAIL%'=>'Email','%SELECT%'=>'Please, select','%TEXTAREA%'=>'Message');	
   }
	
	public function checkForm()
	{
		return true;			
	}
   
	public function sendEmail($mArray)
	{
		foreach($mArray as $key=>$val)
	   {
			$this->forRender[$key] = $val;
		}
		$str = implode($this->forRender);
		mail

	}		
}
