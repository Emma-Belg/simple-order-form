<?php


namespace Model;


class EmailCheck
{
    private $email;
    private bool $dataCorrect = false;
    private int $correctCount = 0;

    function check_input($data) : string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function email()
    {
        if (isset($_POST["email"])) {
            $this->email::check_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
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