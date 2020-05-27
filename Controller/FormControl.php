<?php

namespace Controller;

use Model\FormCheck;
use Model\EmailCheck;

class FormControl
{
    //private string $streetNumber = "streetnumber";
    private FormCheck $form;
    private $postData = "";


    function __construct()
    {
        $this->form = new FormCheck();
    }

        /**
         * @Route("/View", name="form-view")
         */

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

    public function render()
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
        return $renderArray;
    }


}