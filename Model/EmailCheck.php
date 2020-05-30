<?php

namespace Model;

use \Model\IsRequiredForm;
require_once "IsRequiredForm.php";

class EmailCheck extends \Model\IsRequiredForm
{
    private bool $dataCorrect = false;
    private int $correctCount = 0;

    static function check_input($data) : string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function email($email)
    {
        if (isset($_POST[$email])) {
            EmailCheck::check_input($_POST[$email]);
            // check if e-mail address is well-formed
            if (!filter_var($_POST[$email], FILTER_VALIDATE_EMAIL)) {
                $echo = "<div class=\"alert alert-danger\">invalid email format</div>";
            } else {
                $this->dataCorrect = true;
                $this->correctCount++;
                $echo = "<div class=\"alert alert-success\">Thank you</div>";
            }
            echo $echo;
            return $echo;
        }
    }

}