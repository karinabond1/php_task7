<?php

class Model
{
    private $forRender;

    public function __construct()
    {

    }

    public function getArray()
    {
        return array('%TITLE%' => 'Contact Form', '%ERRORS_NAME%' => ' ','%ERRORS_EMAIL%' => ' ','%ERRORS_SELECT%' => ' ','%ERRORS_MESSAGE%' => ' ', '%NAME%' => 'Name', '%EMAIL%' => 'Email', '%SELECT%' => 'Please, select','%SELECT_VAL%' => '', '%MESSAGE%' => 'Message', '%NAME_VAL%' => '', '%EMAIL_VAL%' => '', '%MESSAGE_VAL%' => '');
    }

    public function getErrors()
    {
        return 'Wrong filling, try again!';
    }

    public function checkForm($arr)
    {
        $res = array();
		foreach ($arr as $key=>$val) {
            if(!filter_var($val, FILTER_SANITIZE_STRING)|| $val=""){
                $res[$key]=$val;
            }
        }

        if(!filter_var($arr['%EMAIL_VAL%'], FILTER_VALIDATE_EMAIL )|| $arr['%EMAIL_VAL%']=""){
            $res['%EMAIL_VAL%']=$arr['%EMAIL_VAL%'];
        }

		if(count($res)>0){
		    return $res;
        }else{
		    return true;
        }
				
	}

	public function selectField($arr)
    {
        if($arr['%SELECT%']=="Feedback"){
            $arr['%SELECT_VAL_FEED%']="selected";
        }elseif ($arr['%SELECT%']=="Gratefulness"){
            $arr['%SELECT_VAL_GRAT%']="selected";
        }elseif ($arr['%SELECT%']=="Complain"){
            $arr['%SELECT_VAL_COM%']="selected";
        }
        return $arr;
    }

    public function sendEmail($arr)
    {
        $today = getdate();
        $date = $today['mday'] . "/" . $today['mon'] . "/" . $today['year'] . " " . $today['hours'] . ":" . $today['minutes'];
        $headers = 'From: ' . FROM . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        if (mail($arr['%EMAIL_VAL%'], $arr['%SELECT%'], $arr['%NAME_VAL%'] . "\n" . $arr['%MESSAGE_VAL%'] . "\n" . $date . "\nIP: " . $_SERVER['REMOTE_ADDR'], $headers)) {
            return true;
        } else {
            return false;
        }
    }
}
