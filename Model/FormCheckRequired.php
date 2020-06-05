<?php

namespace Model;

use Model\IsRequiredForm;

require_once "IsRequiredForm.php";

class FormCheckRequired extends \Model\IsRequiredForm
{
    //private ?string $value = "";
    private string $echo = "";
    //private bool $dataCorrect = false;
    //private int $correctCount = 0;
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

    /**
 * @return int
 */public static function getCorrectCount(): int
    {
        return IsRequiredForm::$correctCount;
    }

    public static function getSession(): ?string
    {
        return IsRequiredForm::$session;
    }

    function numberOnly($data)
    {
        $this->echo = "no numbers entered";
        if(isset($_POST[$data])) {
            $number = $_POST[$data];

            if (isset($number)) {
                if (is_numeric($number)) {
                    $this->dataCorrect = true;
                    IsRequiredForm::$correctCount++;
                    $this->echo = "<div class=\"alert alert-success\">Thank you</div>";
                } else {
                    $this->dataCorrect = false;
                    $this->echo = "<div class=\"alert alert-danger\">Please enter only numbers.</div>";
                }
            }
        } else {
            $this->echo = $this->isRequired($data);
        }
        return $this->echo;
    }

    function lettersOnly($data)
    {
        $this->echo = "no letters entered";
        if(isset($_POST[$data])) {
            //if(!preg_match('/[^A-Za-z0-9]/', $_POST[$data]))
            //could also be done with this:
            if (ctype_alnum($_POST[$data])) {
                $this->dataCorrect = true;
                IsRequiredForm::$correctCount++;
                $this->echo = "<div class=\"alert alert-success\">Thank you</div>";
            } else {
                $this->dataCorrect = false;
                $this->echo = "<div class=\"alert alert-danger\">Please enter only letters.</div>";
            }
        } else {
            $this->echo = $this->isRequired($data);
        }
        return $this->echo;
    }

    function sessionData($data)
    {
        $_SESSION[$data] = self::getSession();
        if ($this->dataCorrect == true) {
            $_SESSION[$data] = $_POST[$data];
            $_SESSION[$data];
        }
        return$_SESSION[$data];
    }

    function sentMessage()
    {
        $this->echo = "sent message";
            if (self::getCorrectCount() == self::NUMBEROFREQUIREDINPUT) {
            $this->echo = ("<div class=\"alert alert-success\">Thank you. Your order is being processed</div>");
        } else {
            $this->echo =("<div class=\"alert alert-danger\">OH THERE IS A PROBLEM.</div>");
        }
        //IsRequiredForm::$correctCount = 0;
        return  $this->echo;
    }

    function clearForm(){


    }

}