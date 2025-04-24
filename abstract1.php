<?php
abstract class ParentClass{
    abstract protected function prefixName($name);
}
class childClass extends ParentClass{
    public function prefixName($name,$separator=".",$greet="Dear"){
        if($name=="John Doe"){
            $prefix="Mr";
        }elseif($name=="Jane Doe"){
            $prefix="Mrs";
        }
        return "{$greet} {$prefix} {$separator} {$name}";
    }
}

$class=new ChildClass;
echo $class->prefixName("John Doe");
echo "\n";
echo $class->prefixName("Jane Doe");
?>