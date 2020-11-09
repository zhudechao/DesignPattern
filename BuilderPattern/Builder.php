<?php


namespace App\DesignPattern\Builder;

//产品
class Product{
    private $_parts;
    public function __construct()
    {
        $this->_parts = array();
    }

    public function add($part){
        return array_push($this->_parts,$part);
    }
}

//建造者模式抽象类
abstract class Builder
{
    public abstract function buildPart1();
    public abstract function buildPart2();
    public abstract function getResult();
}

//建造者实现
class ConcreteBuilder extends Builder{

    private $_product;

    public function __construct()
    {
        $this->_product = new Product();
    }

    public function buildPart1()
    {
        $this->_product->add("part1");
    }

    public function buildPart2()
    {
        $this->_product->add("part2");
    }

    public function getResult()
    {
        return $this->_product;
    }
}

//导演者
class Director{
    public function __construct(Builder $builder)
    {
        $builder->buildPart1();
        $builder->buildPart2();
    }
}

$builder = new ConcreteBuilder();
$director = new Director($builder);
$product = $builder->getResult();
print_r($product);
die();
