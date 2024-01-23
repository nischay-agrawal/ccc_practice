<?php
    
    $num= 11;
    if($num%2==0)
    {
        evenPattern($num);
    }
    else
    {
        oddPattern($num);
    }
    
    function evenPattern($e_num)
    {
    echo "EVEN NUMBER<br><br>";
    // $e_num=10;
    for($i=1;$i<=($e_num/2);$i++)
    {
        for($j=1;$j<=($e_num);$j++)
        {
            if($i>$j)
            {
                echo "&nbsp - &nbsp";
            }
            elseif($j>($e_num+1)-$i)
            {
                echo "&nbsp - &nbsp";
            }
            else {
                echo "&nbsp $j &nbsp";   
            }
        }
        echo "<br>";
    }
    for($i=($e_num/2)-1;$i>=1;$i--)
    {
        for($j=1;$j<=$e_num;$j++)
        {
            if($i>$j)
            {
                echo "&nbsp - &nbsp";
            }
            elseif($j>($e_num+1)-$i)
            {
                echo "&nbsp - &nbsp";
            }
            else {
                echo "&nbsp $j &nbsp";   
            }
        }
        echo "<br>";
    }
    }
    function oddPattern($o_num)
    {
    echo "ODD NUMBER<br><br>";
    //$o_num = 11;
    for($i=1;$i<=(($o_num+1)/2);$i++)
    {
        for($j=1;$j<=$o_num;$j++)
        {
            if($i>$j)
            {
                echo "&nbsp - &nbsp";
            }
            elseif($j>(($o_num+1)-$i))
            {
                echo "&nbsp - &nbsp";
            }
            else {
                echo "&nbsp $j &nbsp";   
            }
        }
        echo "<br>";
    }
    for($i=(($o_num+1)/2)-1;$i>=1;$i--)
    {
        for($j=1;$j<=$o_num;$j++)
        {
            if($i>$j)
            {
                echo "&nbsp - &nbsp";
            }
            elseif($j>(($o_num+1)-$i))
            {
                echo "&nbsp - &nbsp";
            }
            else {
                echo "&nbsp $j &nbsp";   
            }
        }
        echo "<br>";
    }
    }

?>