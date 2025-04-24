<?php
abstract class Car{
  public $name;
  public function __construct($name){
    $this->name=$name;
  }
  abstract public function intro():string;
}
class Audi extends Car{
  public function intro():string{
    return "Choose German quality! I'm a $this->name!";
  }
}
class Volvo extends Car{
  public function intro():string{
    return "Proud to be Swedish! I'm a $this->name!";
  }
}
class Citroen extends Car{
  public function intro():string{
    return "French extravagance! I'm a $this->name!";
  }
}
$audi=new audi("Audi");
echo $audi->intro();
echo "\n";

$volvo=new volvo("Volvo");
echo $volvo->intro();
echo "\n";

$citroen=new citroen("Citroen");
echo $citroen->intro();
?>