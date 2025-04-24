<?php
class pi{
static $value=3.14159;
}

class x extends pi{
    public function xStatic(){
        return parent::$value;
    }
}

echo x::$value;
$x=new x();
echo $x->xStatic();
?>