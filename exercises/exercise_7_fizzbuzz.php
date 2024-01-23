<?php
    for($i=1;$i<=100;$i++)
    {
        if($i%3==0)
        {
            if($i%5==0)
            {
                echo "FizzBuzz"."<br>";
            }
            else{
            echo "Fizz"."<br>";
            }
        }
        elseif($i%5==0)
        {
            echo "Buzz"."<br>";
        }
        else
        {
            echo $i."<br>";
        }
    }
?>