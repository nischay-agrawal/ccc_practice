<?php
    $array = [5,4,6,3,1,2];
    print_r($array);
    echo "<br>";
    for($j = 0; $j < count($array); $j++) {
        for($i = 0; $i < count($array)-1; $i++){
        if($array[$i]>$array[$i+1]){
             $max = $array[$i+1];
             $array[$i+1]=$array[$i];
             $array[$i] = $max;
        }
        }
    }
    print_r($array);
?>