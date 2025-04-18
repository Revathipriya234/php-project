<?php
$student_One=array("Maths"=>95,"Physics"=>90,
                   "Chemistry"=>96, "English"=>93);

$student_two["Maths"]=95;
$student_two["Physics"]=90;
$student_two["Chemistry"]=96;
$student_two["English"]=93;

echo "Marks for student one is:\n";
echo "Maths:".$student_two["Maths"],"\n";
echo "Physics:".$student_two["Physics"],"\n";
echo "Chemistry".$student_two["Chemistry"],"\n";
echo "English".$student_two["English"],"\n";
?>