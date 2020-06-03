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
}