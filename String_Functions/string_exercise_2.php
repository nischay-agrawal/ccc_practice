<?php
    
    //1
    /*
    $firstname = "nischay";
    $middlename = "ashwin";
    $lastname = "agrawal";
    echo ucwords("$firstname $middlename $lastname");
    */

    //2
    /*
    $text = "Hello, World! How are you doing?";
    echo strlen("$text");// 1 Length of string
    echo strtolower("$text"); // 2 String to Lowercase
    echo strtoupper("$text"); // 3 String to Uppercase
    echo str_replace($text,"Fine, thank you!",$text); // Replacing text to Fine, Thank You!
    echo substr($text,0,10); // Extracting first 10
    echo substr($text,8); // From 8th char to end
    */

    //3
    /*
    $sentence = "The quick brown fox jumps over the lazy dog";
    echo array_search("fox",(explode(" ",$sentence))); // ?? 1 Position of word fox in sentence 
    echo substr($sentence,0,20); //First 20 characters
    */

    //4
    /*
    $name = "John";
    echo str_pad($name,10,"_",STR_PAD_LEFT);
    echo str_pad($name,8,"*",STR_PAD_RIGHT);
    */

    //5
    /*
    $quote = "In three words I can sum up everything I've learned about life: it goes on.";
    echo str_word_count($quote);
    echo strtolower($quote);
    echo ucwords($quote);
    */
?>