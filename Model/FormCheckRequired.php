<?php

namespace Model;

use Model\IsRequiredForm;

require_once "IsRequiredForm.php";

class FormCheckRequired extends \Model\IsRequiredForm
{
    //private ?string $value = "";
    private string $required = "";
    private bool $dataCorrect = false;
    private int $correctCount = 0;
    private const NUMBEROFREQUIREDINPUT = 5;

////////////////////////
////
/// Probably use the UserInputToSession as an Interface?
///

/*    private function checkValues($postValue)
    {
        $this->value = "";
        if(isset($_POST[$postValue])){
            $this->value = $_POST[$postValue];
        }
    }*/

    function numberOnly($data)
    {
        $echo = "no numbers entered";
        //$this->value = $this->checkValues($data);
        if(isset($_POST[$data])) {
            $number = $_POST[$data];

            if (isset($number)) {
                if (is_numeric($number)) {
                    $this->dataCorrect = true;
                    $this->correctCount++;
                    $echo = "<div class=\"alert alert-success\">Thank you</div>";
                } else {
                    $this->dataCorrect = false;
                    $echo = "<div class=\"alert alert-danger\">Please enter only numbers.</div>";
                }
            }
        } else {
            $this->required = $this->isRequired($data);
        }
        echo $echo;
        echo $this->required;
    }

    function lettersOnly($data)
    {
        $echo = "no letters entered";
        if(isset($_POST[$data])) {
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
        } else {
            $this->required = $this->isRequired($data);
        }
        echo $echo;
        echo $this->required;
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