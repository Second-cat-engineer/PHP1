<?php
$i=1;
$array = [];
while ($i < 10000) {
    $i++;
    $array [] = $i;
}

$timeStart1 = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    if (isset($array[5000])){
       break;
    }
}
$timeFinish1 = microtime(true) - $timeStart1;
var_dump($timeFinish1);
echo '<br>';
$timeStart2 = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
   if (in_array(5000, $array)){
       break;
   }
}
$timeFinish2 = microtime(true) - $timeStart2;
var_dump($timeFinish2);