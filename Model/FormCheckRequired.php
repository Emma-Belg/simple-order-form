<?php

namespace Model;

use Model\IsRequiredForm;

require_once "IsRequiredForm.php";

class FormCheckRequired extends \Model\IsRequiredForm
{
    //private ?string $value = "";
    private bool $dataCorrect = false;
    private int $correctCount = 0;
    private const NUMBEROFREQUIREDINPUT = 5;

////////////////////////
////
/// Probably use the UserInputToSession as an Interface?
///

    /*    function __construct($data)
        {
            return $this->isRequired($data);
        }*/

/*    private function checkValues($postValue)
    {
        $this->value = "";
        if(isset($_POST[$postValue])){
            $this->value = $_POST[$postValue];
        }
    }*/

    function numberOnly($data)
    {
        $echo = "uh oh numbers";
        //$this->value = $this->checkValues($data);
        if(empty($_POST[$data])) {
            $value = $_POST[$data];

            //if (isset($number)) {
                if (is_numeric($value)) {
                    $this->dataCorrect = true;
                    $this->correctCount++;
                    $echo = "<div class=\"alert alert-success\">Thank you</div>";
                } else {
                    $this->dataCorrect = false;
                    $echo = "<div class=\"alert alert-danger\">Please enter only numbers.</div>";
                }
            }
        //}
        echo $echo;
        return $echo;
    }

    function lettersOnly($data)
    {
        $echo = "uh oh letters";
        if(!isset($_POST[$data])) {
            //$data = "";
            //if(!preg_match('/[^A-Za-z0-9]/', $_POST[$data]))
            //could also be done with this:
            if (ctype_alnum($_POST[$data])) {
                $this->dataCorrect = true;
                $this->correctCount++;
                $echo = "<div class=\"alert alert-success\">Thank you</div>";
            } else {
                $this->dataCorrect = false;
                $echo = "<div class=\"alert alert-danger\">Please enter only letters.</div>";
            }
        }
        echo $echo;
        return $echo;
    }

    function sessionData($data)
    {
        if ($this->dataCorrect == true) {
            $_SESSION[$data] = $_POST[$data];
            echo $_SESSION[$data];
        } else {
            $_SESSION[$data] = "";
        }
    }

    function sentMessage()
    {
        $echo = "sent message";
        if ($this->dataCorrect == self::NUMBEROFREQUIREDINPUT) {
            $echo = ("<div class=\"alert alert-success\">Thank you. Your order is being processed</div>");
        } else {
            $echo =("<div class=\"alert alert-danger\">OH THERE IS A PROBLEM.</div>");
        }
        echo $echo;
        return $echo;
    }

}