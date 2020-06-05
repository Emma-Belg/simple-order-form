<?php


namespace Model;


class IsRequiredForm
{
    protected static int $correctCount = 0;
    protected bool $dataCorrect = false;
    //protected static ?string $session = "";
    /**
     * @var mixed|string|null
     */
    protected static $session = "";

    function isRequired($data)
    {
        $echo = "";
        if (empty($_POST[$data])) {
            $echo = "<div class=\"alert alert-danger\">This field is required!</div>";
        }
        return $echo;
    }

    function userInput($input){
        if($_POST || $_GET && $this->dataCorrect == true){
            //$this->session = $_SESSION[$input];
            self::$session = $_POST[$input];
            $_SESSION[$input] = $_POST[$input];
        } else{
            self::$session = "";
        }
        return self::$session;
    }

/*    function sessionData($data)
    {
        $_SESSION[$data] = $this->session;
        if ($this->dataCorrect == true) {
            $_SESSION[$data] = $_POST[$data];
            $_SESSION[$data];
        }
        return$_SESSION[$data];
    }*/

}