<?php

class Controller
{
		private $model;
		private $view;
		private $arr;

		public function __construct()
		{		
		    $this->model = new Model();
			$this->view = new View(TEMPLATE);
			$this->arr = array('%NAME_VAL%'=>$_POST['name'],'%EMAIL_VAL%'=>$_POST['email'],'%SELECT%'=>$_POST['select'],'%MESSAGE_VAL%'=>$_POST['message']);	
			print_r($this->arr);
				
			if(isset($_POST['btn']))
			{	
				$this->pageSendMail();
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageSendMail()
		{
			if($this->model->checkForm($this->arr) === true)
			{
				//print_r($this->arr);
				if($this->model->sendEmail($this->arr)){
					$this->view->show("Your message was sent!");
					$this->arr = $this->model->getArray();		
	        		$this->view->addToReplace($this->arr);

				} else {
					$this->view->show("Your message was NOT sent!");
				}
			}else{
				$this->arr['%ERRORS%']=$this->model->getErrors();
				var_dump($this->arr);
				$this->view->addToReplace($this->arr);
			}
			//$this->arr = $this->model->getArray();		
	        //$this->view->addToReplace($this->arr);	
		}	
			    
		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
	       $this->view->addToReplace($mArray);			   
		}				
}
