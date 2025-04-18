<?php
$marks=array(
    "Ankit"=>array(
        "C"=>95,
        "DCO"=>85,
        "FOL"=>74,
    ),
    "Ram"=>array(
        "C"=>78,
        "DCO"=>98,
        "FOL"=>46,
    ),
    "Anoop"=>array(
        "C"=>88,
        "DCO"=>46,
        "FOL"=>99,
    ),
);
echo $marks['Ankit']['C']."\n";
foreach($marks as $mark){
    echo $mark['C']." ".$mark['DCO']." ".$mark['FOL']."\n";
}
?>