<?php

    $text = "Hello, World! How are you doing?";
    echo strlen("$text");// 1 Length of string
    echo strtolower("$text"); // 2 String to Lowercase
    echo strtoupper("$text"); // 3 String to Uppercase
    echo str_replace($text,"Fine, thank you!",$text); // Replacing text to Fine, Thank You!
    echo substr($text,0,10); // Extracting first 10
    echo substr($text,8); // From 8th char to end
    
?>