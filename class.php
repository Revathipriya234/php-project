<?php
class Car{
    public $color;
    public function setColor($c){
        $this->color=$c;
    }
    public function getColor(){
        return $this->color;
    }
}
$myCar=new Car();
$myCar->setColor('red');
echo $myCar->getColor();
?>