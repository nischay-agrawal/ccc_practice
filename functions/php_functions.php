<?php

    function postData($key){
        return $_POST[$key];
    }

    function getData($key){
        return $_GET[$key];
    }

    function requestData($key){
        return $_REQUEST[$key];
    }
        
?>