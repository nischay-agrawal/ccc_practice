<?php

    $name = "John";
    echo str_pad($name,10,"_",STR_PAD_LEFT); //1 left pad _ to make 10
    echo str_pad($name,8,"*",STR_PAD_RIGHT); //2 right pad * to make 8

?>