<?php
    
    // var_dump(5);
    // var_dump("Nischay");
    // var_dump(3.14);
    // var_dump(true);
    // var_dump([1, 2, 3]);
    // var_dump(NULL);

    // $a = 5;      
    // $b = 5.34;   
    // $c = "hello";
    // $d = true;   
    // $e = NULL;   

    // $a = (string) $a;
    // $b = (string) $b;
    // $c = (string) $c;
    // $d = (string) $d;
    // $e = (string) $e;

    // $a = (int) $a;
    // $b = (int) $b;
    // $c = (int) $c;
    // $d = (int) $d;
    // $e = (int) $e;

    // $a = (float) $a;
    // $b = (float) $b;
    // $c = (float) $c;
    // $d = (float) $d;
    // $e = (float) $e;

    // $a = (bool) $a;
    // $b = (bool) $b;
    // $c = (bool) $c;
    // $d = (bool) $d;
    // $e = (bool) $e;

    // $a = (array) $a;
    // $b = (array) $b;
    // $c = (array) $c;
    // $d = (array) $d;
    // $e = (array) $e;

    // $a = (unset) $a;
    // $b = (unset) $b;
    // $c = (unset) $c;
    // $d = (unset) $d;
    // $e = (unset) $e;

    // echo abs(-12.5);
    // echo ceil(87.9); //round number up
    // echo floor(87.9); // round number down
    // echo round(4.129097,2);

    // echo pow(5,3);
    // echo sqrt(25);

    // echo rand(99,999);

    //echo number_format("10000","2",".",",");

    
    // $num1 = 10;
    // $num2 = 5;
    
    //Arithmetic Operators  
    //echo $num1 + $num2 ;
    //echo $num1 - $num2 ;
    //echo $num1 * $num2 ;
    //echo $num1 / $num2 ;
    //echo $num1 % $num2 ;
    //echo `$num1  $num2`;

    // Assignment Operators  
    // $num1=$num2 ;
    // echo "$num1 $num2";
    // $num1+=$num2 ;
    // echo "$num1 $num2";
    //$num1-=$num2 ;
    //echo "$num1 $num2";
    // $num1*=$num2 ;
    // echo "$num1 $num2";
    // $num1/=$num2 ;
    // echo "$num1 $num2";
    // $num1%=$num2 ;
    // echo "$num1 $num2";

    // Comparision Operators
    // var_dump($num1==$num2);
    // var_dump($num1===$num2);
    // var_dump($num!=$num2);
    // var_dump($num1!==$num2);
    // var_dump($num1>$num2);
    // var_dump($num1<$num2);
    // var_dump($num1>=$num2);
    // var_dump($num1<=$num2);

    //Logical Operators
    // echo $num1 && $num2 ;
    // echo $num1 || $num2 ;
    // echo !$num1 ;

    // Increment Decrement
    //$num1++;
    //echo $num1++; //10
    //echo ++$num1; /11

    //$num2--;
    //echo $num2--; //5
    //echo --$num2; //4

    // if ($num1>0) {
    //     echo "Positive";
    // }

    // if ($num1>0) {
    //     echo "Positive";
    // } else {
    //     echo "Negative";
    // }

    // if ($num1 > 0) {
    //     echo "Positive";
    // } elseif ($num1 < 0) {
    //     echo "Negative";
    // } else {
    //     echo "Zero";
    // }

    // if ($num1>0) {
    //     if ($num2>0) {
    //         echo "Both Positive";
    //     } else {
    //         echo "Num 2 Negative";
    //     }
    // } else {
    //     echo "Num 1 Negative";
    // }

    // $dayOfWeek = "Monday";
    // switch ($dayOfWeek) {
    //     case "Monday":
    //         echo "It's the start of the week!";
    //         break;
    //     case "Tuesday":
    //     case "Wednesday":
    //     case "Thursday":
    //         echo "It's a weekday.";
    //         break;

    //     case "Friday":
    //         echo "TGIF! It's Friday!";
    //         break;

    //     case "Saturday":
    //     case "Sunday":
    //         echo "It's the weekend!";
    //         break;

    //     default:
    //         echo "Invalid day of the week.";
    // }

    // for ($i = 1; $i <= 5; $i++) {
    //     echo $i . " ";
    // }

    // $i = 1;
    //     while ($i <= 5) {
    //         echo $i . " ";
    //         $i++;
    //     }

    // $colors = array("Red", "Green", "Blue");
    // foreach ($colors as $color) {
    //     echo $color . " ";
    // }

    $colors1 = array("Red", "Green", "Blue");
    $colors2 = array("Cyan", "Magenta", "Yellow");
    $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");

    // print_r(array_merge($colors1, $colors2));
    // print_r(array_combine($colors1, $colors2));
    // print_r(range(0,100,10));

    // array_push($colors2,"K");
    // print_r($colors2);

    // array_pop($colors2);
    // print_r($colors2);

    // array_unshift($colors2,"K");
    // print_r($colors2);
    
    // array_shift($colors2);
    // print_r($colors2);

    // array_splice($colors1,0,2,$colors2);
    // print_r($colors1);

    // print_r(count($colors1));
    // print_r(sizeof($colors1));
    // print_r(array_values($colors1));
    // echo array_key_exists("Peter",$age);
    // print_r(array_keys($age));
    // print_r(array_values($age));


    // print_r(in_array("Cyan",$colors2)); // 1 : True
    // print_r(array_search("Cyan",$colors2)); // Position : 0
    // print_r(array_reverse($colors2));

    // sort($colors2);
    // sort($colors1);
    // print_r($colors1);        
    // print_r($colors2);     
   
    // rsort($colors2);
    // rsort($colors1);
    // print_r($colors1);        
    // print_r($colors2);     
    
    // asort($age);
    // print_r($age);      

    // ksort($age);
    // print_r($age);       

    // arsort($age);
    // print_r($age);     

    // krsort($age);
    // print_r($age);        
    
?>