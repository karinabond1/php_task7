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
        $this->arr = array('%TITLE%' => 'Contact Form', '%ERRORS_NAME%' => ' ','%ERRORS_EMAIL%' => ' ','%ERRORS_SELECT%' => ' ','%ERRORS_MESSAGE%' => ' ','%NAME_VAL%' => $_POST['name'], '%EMAIL_VAL%' => $_POST['email'], '%SELECT%' => $_POST['select'],'%SELECT_VAL%' => $_POST['select'], '%MESSAGE_VAL%' => $_POST['message'], '%NAME%' => 'Name', '%EMAIL%' => 'Email', '%MESSAGE%' => 'Message',);


        if (isset($_POST['btn'])) {
            $this->pageSendMail();
        } else {
            $this->pageDefault();
        }

        $this->view->templateRender();
    }

    private function pageSendMail()
    {
        if ($this->model->checkForm($this->arr) === true) {
            if ($this->model->sendEmail($this->arr)) {
                $this->view->show("Your message was sent!");
                $this->arr = $this->model->getArray();
                $this->view->addToReplace($this->arr);

            } else {
                $this->view->show("Your message was NOT sent!");
            }
        } else {
            $array_error = $this->model->checkForm($this->arr);
            $this->arr=$this->model->selectField($this->arr);

            foreach ($array_error as $key=>$error) {
                switch ($key) {
                    case '%NAME_VAL%':
                        {
                            $this->arr['%ERRORS_NAME%'] = $this->model->getErrors();
                            break;
                        }
                    case '%EMAIL_VAL%':
                        {
                            $this->arr['%ERRORS_EMAIL%'] = $this->model->getErrors();
                            break;
                        }
                    case '%SELECT_VAL%':
                        {
                            $this->arr['%ERRORS_SELECT%'] = $this->model->getErrors();
                            break;
                        }
                    case '%MESSAGE_VAL%':
                        {
                            $this->arr['%ERRORS_MESSAGE%'] = $this->model->getErrors();
                            break;
                        }
                }
            }
            $this->view->addToReplace($this->arr);
        }
    }

    private function pageDefault()
    {
        $mArray = $this->model->getArray();
        $this->view->addToReplace($mArray);
    }
}
