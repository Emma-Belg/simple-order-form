<?php


namespace Model;


class IsRequiredForm
{
    protected static int $correctCount = 0;
    protected bool $dataCorrect = false;
    private const NUMBEROFREQUIREDINPUT = 5;
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

    function sentMessage()
    {
        $echo = "sent message";
        if (self::$correctCount == self::NUMBEROFREQUIREDINPUT) {
            $echo = ("<div class=\"alert alert-success\">Thank you. Your order is being processed</div>");
        }
        elseif (isset($_POST) || !isset($_POST)){
            $echo = "";
        }
        else {
            $echo =("<div class=\"alert alert-danger\">OH THERE IS A PROBLEM.</div>");
        }
        //IsRequiredForm::$correctCount = 0;
        return $echo;
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