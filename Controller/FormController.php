<?php
namespace Controller;

use Model\FormCheckRequired;
use Model\EmailCheck;

include 'Model/FormCheckRequired.php';
include 'Model/EmailCheck.php';

//var_dump(file_exists('/var/www/simple-order-form/Model/FormCheckRequired.php'));

class FormController
{
    private array $renderArray = [];
    //Error: Typed property Controller\FormController::$renderArray must not be accessed before initialization in /var/www/simple-order-form/View/form-view.php on line 58
    //atal error: Uncaught Error: Typed property Controller\FormController::$renderArray must not be accessed before initialization in /var/www/simple-order-form/View/form-view.php on line 58
     public function render()
    {
        $form = new FormCheckRequired();
        $email = new EmailCheck();
        $renderArray = [
            'email' => $email->email("email"),
            'streetName' => $form->lettersOnly("street"),
            'streetNumber' => $form->numberOnly("streetnumber"),
            'city' => $form->lettersOnly("city"),
            'postcode' => $form->numberOnly("zipcode"),
        ];
        require 'View/form-view.php';
    }

/*    function index(){
        $email = new EmailCheck();
        //$this->form->email();
        //$this->form->check_input($this->postData);
        $this->form->isRequired($this->postData);
        $this->form->numberOnly($this->postData);
        $this->form->lettersOnly($this->postData);

        return $this->render('View/form-view.php', [
            //'emailCheckInput' => $this->form->check_input("email"),
            //'emailIsRequired' => $this->form->isRequired(),
            'email' => $email->email(),
            'streetName' => $this->form->lettersOnly("street"),
            'streetNumber' => $this->form->numberOnly("streetnumber"),
            'city' => $this->form->lettersOnly("city"),
            'postcode' => $this->form->numberOnly("zipcode"),
        ]);
    }*/

/*    public function render($view, $data)
    {
        require $view;
        return $data;
    }
    public function testrender()
    {
        $email = new EmailCheck();
        $renderArray = [
            'email' => $email->email(),
            'streetName' => $this->form->lettersOnly("street"),
            'streetNumber' => $this->form->numberOnly("streetnumber"),
            'city' => $this->form->lettersOnly("city"),
            'postcode' => $this->form->numberOnly("zipcode"),
        ];
        require 'View/form-view.php';
        $this->render('View/form-view.php', $renderArray);
    }*/

}
