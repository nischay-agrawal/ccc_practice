<?php

    $sentence = "The quick brown fox jumps over the lazy dog";
    echo array_search("fox",(explode(" ",$sentence))); // ?? 1 Position of word fox in sentence 
    echo substr($sentence,0,20); //First 20 characters

?>