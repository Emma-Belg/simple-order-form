<?php
namespace Controller;

use Model\DeliveryTime;
use Model\FormCheckRequired;
use Model\EmailCheck;
use Model\IsRequiredForm;
use Model\OrderForm;
use Model\Products;
use Model\UserInputToSession;

include_once 'Model/FormCheckRequired.php';
include_once 'Model/EmailCheck.php';
include_once 'Model/DeliveryTime.php';
include_once 'Model/UserInputToSession.php';
include_once 'Model/Products.php';


class FormController
{
    //Error: Typed property Controller\FormController::$renderArray must not be accessed before initialization in /var/www/simple-order-form/View/form-view.php on line 58
    //atal error: Uncaught Error: Typed property Controller\FormController::$renderArray must not be accessed before initialization in /var/www/simple-order-form/View/form-view.php on line 58
     public function render()
    {
        $form = new FormCheckRequired;
        $inputSession = new FormCheckRequired;

        $email = new EmailCheck();

        $orderForm = new OrderForm($_SESSION['totalValue'] ?: 0);
        if (isset($_POST["normalOrder"]) || isset($_POST["expressOrder"])) {
            $orderForm->validate($email, $form);
        }

        $_SESSION['totalValue'] = $orderForm->getProductPrice();

        //refactor this so it is not needed anymore
        $renderArray = [
            'email' => $orderForm->getEmail(),
            'streetName' => $orderForm->getStreetName(),
            'streetNumber' => $orderForm->getStreetNumber(),
            'city' => $orderForm->getCity(),
            'postcode' => $orderForm->getPostcode(),
            'sendMessage' => $orderForm->getSendMessage(),
            'deliveryTime' => $orderForm->getDeliveryTime(),
            'productNames' => $orderForm->getProductNames(),//debatable if it should be in the form classes
            'productPrice' => $orderForm->getProductPrice()
        ];
        //end refactor

        $sessionArray = [
            'emailInput' => $inputSession->userInput("email"),
            'email'=> $email->sessionData("email"),
            'streetInput' => $inputSession->userInput("street"),
            'streetName' => $form->sessionData("street"),
            'streetNumberInput' => $inputSession->userInput("streetnumber"),
            'streetNumber' => $form->sessionData("streetnumber"),
            'cityInput' => $inputSession->userInput("city"),
            'city' => $form->sessionData("city"),
            'postcodeInput' => $inputSession->userInput("zipcode"),
            'postcode' => $form->sessionData("zipcode"),
        ];

/*        $sessionArray = [
            'email' => $inputSession->userInput("email"),
            'streetName' => $inputSession->userInput("street"),
            'streetNumber' => $inputSession->userInput("streetnumber"),
            'city' => $inputSession->userInput("city"),
            'postcode' => $inputSession->userInput("zipcode"),
        ];*/
        require_once 'View/form-view.php';
        //require 'View/form-view.html.twig';
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
