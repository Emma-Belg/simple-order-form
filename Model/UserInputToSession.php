<?php


namespace Model;


class UserInputToSession
{
    function UserInput($input){
        return $_SESSION[$input];
    }
}