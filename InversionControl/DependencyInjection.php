<?php

interface Calculation
{
    public function calculate($x, $y);
}

class Minus implements Calculation
{

    public function calculate($x, $y)
    {
        return $x - $y;
    }
}

class Sum implements Calculation
{

    public function calculate($x, $y)
    {
        return $x + $y;
    }
}

class NoDependecyInjection
{

    public function get()
    {
        $x = new Sum();
        return $x->calculate(2, 3);
    }
}

class DependecyInjection
{

    public function __construct(public Calculation $sum)
    {
    }

    public function get()
    {
        return $this->sum->calculate(2, 3);
    }
}


echo (new NoDependecyInjection())->get() . PHP_EOL;

echo (new DependecyInjection(new Sum))->get() . PHP_EOL;

echo (new DependecyInjection(new Minus))->get() . PHP_EOL;
