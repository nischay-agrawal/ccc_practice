<?php
    $num=11;
    $flag= true;
    if($num<=1)
    {
        echo "Neither Prime nor Compiosite";
    }
    else
    {
        for($i=2;$i<=sqrt($num);$i++)
        {
            if($num%$i==0)
            {
                $flag=false;
                break;
            }
        }
        if($flag==false)
        {
            echo "Not Prime";
        }
        else
        {
            echo "Prime";
        }
    }
?>