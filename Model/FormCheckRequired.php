<?php

namespace Model;

use Model\IsRequiredForm;

require_once "IsRequiredForm.php";

class FormCheckRequired extends \Model\IsRequiredForm
{


    private string $echo = "";
    //private bool $dataCorrect = false;
    //private int $correctCount = 0;


////////////////////////
////
/// Probably use the UserInputToSession as an Interface?
///


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

    public static function resetSession(): ?string
    {
        IsRequiredForm::$session = "";
    }

    function numberOnly($data)
    {
        $this->echo = "no numbers entered";
        if(!empty($_POST[$data])) {
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
        } elseif (isset($_POST["normalOrder"]) || isset($_POST["expressOrder"])){
            $this->echo = $this->isRequired($data);
        } else {
            $this->echo = "";
        }
        return $this->echo;
    }

    function lettersOnly($data)
    {
        $this->echo = "no letters entered";
        if(!empty($_POST[$data])) {
            //These could be used for postcodes with numbers and letters:
            //if(ctype_alnum($_POST[$data]))
            //if(!preg_match('/[^A-Za-z0-9]/', $_POST[$data]))
            if (!preg_match('/[^A-Za-z]/', $_POST[$data])) {
                $this->dataCorrect = true;
                IsRequiredForm::$correctCount++;
                $this->echo = "<div class=\"alert alert-success\">Thank you</div>";
            } else {
                $this->dataCorrect = false;
                $this->echo = "<div class=\"alert alert-danger\">Please enter only letters.</div>";
                self::resetSession();
            }
        } elseif (isset($_POST["normalOrder"]) || isset($_POST["expressOrder"])){
            $this->echo = $this->isRequired($data);
        } else {
            $this->echo = "";
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


    function clearForm(){

    }
}