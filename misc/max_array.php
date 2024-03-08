<?php
function maxNumber($arr)
{
    $max = $arr[0];
    foreach ($arr as $n) {
        if ($n > $max) {
            $max = $n;
        }
    }
    return $max;
}

$arr = [-10,-5,-7,-1000];
$max = maxNumber($arr);
echo $max;