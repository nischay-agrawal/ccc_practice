<?php
    $num=10;
    $num1=0;
    $num2=1;
    echo $num1."<br>".$num2."<br>";
    for($i=0;$i<$num;$i++)
    {
        $num3=$num1+$num2;
        echo $num3."<br>";
        $num1=$num2;
        $num2=$num3;
    }
?>