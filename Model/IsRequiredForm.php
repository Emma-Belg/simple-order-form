<?php


namespace Model;


class IsRequiredForm
{

    function isRequired($data)
    {
        if (empty($_POST[$data])) {
            return "<div class=\"alert alert-danger\">This field is required!</div>";
        }
    }

}