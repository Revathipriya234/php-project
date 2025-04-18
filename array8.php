<?php
function sort_array($a,$b){
    if($a==$b) return 0;
    return($a<$b)?-1:1;
}
$arr=array(
    "a"=>4,
    "b"=>2,
    "g"=>8,
    "d"=>6,
    "e"=>1,
    "f"=>9
);
uasort($arr,"sort_array");
print_r($arr);
?>