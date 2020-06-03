<?php


namespace Model;


class IsRequiredForm
{
    protected static int $correctCount = 0;

    function isRequired($data)
    {
        $echo = "";
        if (empty($_POST[$data])) {
            $echo = "<div class=\"alert alert-danger\">This field is required!</div>";
        }
        return $echo;
    }

    function userInput($input){
        $session = "";
        if($_POST || $_GET){
            $session = $_SESSION[$input];
        }
        return $session;
    }

}