<?php

namespace Model;

//Q: difference between use, require and require_once
use \Model\IsRequiredForm;

require_once "IsRequiredForm.php";

class EmailCheck extends \Model\IsRequiredForm
{
    //private bool $dataCorrect = false;
    //static::$correctCount = 0;

    public static function getCorrectCount(): int
    {
        return IsRequiredForm::$correctCount;
    }

    public static function getSession(): ?string
    {
        return IsRequiredForm::$session;
    }

    static function check_input($data) : string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function email($email)
    {
        $echo = "";
        if (isset($_POST[$email])) {
            EmailCheck::check_input($_POST[$email]);
            // check if e-mail address is well-formed
            if (!filter_var($_POST[$email], FILTER_VALIDATE_EMAIL)) {
                $echo = "<div class=\"alert alert-danger\">invalid email format</div>";
            } else {
                $this->dataCorrect = true;
                IsRequiredForm::$correctCount++;
                $echo = "<div class=\"alert alert-success\">Thank you</div>";
            }
        } else {
            $echo = $this->isRequired($email);
        }
        return $echo;
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

}