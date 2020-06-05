<?php


namespace Model;


class UserInputToSession
{
    function userInput($input){
        $session = "";
        if($_POST){
            $session = $_SESSION[$input];
        }
        return $session;
    }

    function sessionData($data)
    {
        $_SESSION[$data] = "";
        if ($this->dataCorrect == true) {
            $_SESSION[$data] = $_POST[$data];
            $_SESSION[$data];
        }
        return$_SESSION[$data];
    }
}