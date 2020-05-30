<?php

namespace Model;

use Model\IsRequiredForm;

require_once "IsRequiredForm.php";

class FormCheckRequired extends \Model\IsRequiredForm
{
    //private string $data = "";
    private bool $dataCorrect = false;
    private int $correctCount = 0;
    private const NUMBEROFREQUIREDINPUT = 5;

////////////////////////
/// ///////////////////
/// Consider using isRequired in a parent class that this class can extend from... or just in the constructor???
/// //
/// Probably use the USerInputToSession as an Interface?

    /*    function __construct($data)
        {
            return $this->isRequired($data);
        }*/


    function numberOnly($data)
    {
        if(!isset($_POST[$data])) {
            $data = 0;
            $number = $_POST[$data];

            //if (isset($number)) {
                if (is_numeric($number)) {
                    $this->dataCorrect = true;
                    $this->correctCount++;
                    $echo = "<div class=\"alert alert-success\">Thank you</div>";
                } else {
                    $this->dataCorrect = false;
                    $echo = "<div class=\"alert alert-danger\">Please enter only numbers.</div>";
                }
                echo $echo;
                return $echo;
            }
        //}
    }

    function lettersOnly($data)
    {
        if(!isset($_POST[$data])) {
            $data = "test";
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
            echo $echo;
            return $echo;
        }
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
        if ($this->dataCorrect == self::NUMBEROFREQUIREDINPUT) {
            echo("<div class=\"alert alert-success\">Thank you. Your order is being processed</div>");
        } else {
            echo("<div class=\"alert alert-danger\">OH THERE IS A PROBLEM.</div>");
        }
    }

}