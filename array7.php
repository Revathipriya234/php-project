<?php
$student_one=array("Maths"=>95,"Physics"=>90,
                   "Chemistry"=>96,"English"=>93);
echo "Looping using foreach:\n";
foreach($student_one as $subject=>$marks){
    echo "student one got".$marks."in".$subject."\n";
}
echo "\nLooping using for:\n";
$subject=array_keys($student_one);
$marks=count($student_one);
for($i=0;$i<$marks;++$i){
    echo $subject[$i].''.$student_one[$subject[$i]]."\n";
}
?>