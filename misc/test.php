<pre>
<?php
    class Test{
        public $arr;

        function maximumSum(){    
            $arr=[3,5,7,1,9];
            sort($arr);
            $count = sizeof($arr);
            $minSum = 0;
            for($i=1;$i<=$count-1;$i++)
            {
                $minSum+=$arr[$i];
            }
            echo $minSum;
        }
        function minimumSum(){    
            $arr=[3,5,7,1,9];
            rsort($arr);
            $count = sizeof($arr);
            $maxSum=0;
            for($i=1;$i<=$count-1;$i++)
            {
                $maxSum+=$arr[$i];
            }
            echo $maxSum;
        }
    }
    // $obj = new Test();
    // $obj->minimumSum();
    // echo "<br>";
    // $obj->maximumSum();

?>