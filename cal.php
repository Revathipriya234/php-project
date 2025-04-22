<?php
$num1=10;
$num2=5;
$operator='*';

echo "Number 1:$num1\n";
echo "Number 2:$num2\n";
echo "Operator:$operator\n";

switch($operator){
    case '+':
        $result=$num1+$num2;
        break;
    case '-':
        $result=$num1-$num2;
        break;
    case '*':
        $result=$num1*$num2;
        break;
    case '/':
        if($num2 !=0){
            $result=$num1/$num2;
        }else{
            $result="Error:Division by zero!";
        }
        break;
    default:
    $result="Error:Invalid operator!";
}
echo "Result:$result\n";
?>