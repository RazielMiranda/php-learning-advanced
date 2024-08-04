<?php

class Minus
{

    public function calculate($x, $y)
    {
        return $x - $y;
    }
}

class Sum
{

    public function calculate($x, $y)
    {
        return $x + $y;
    }
}

class ServiceLocator
{
    public function get($name)
    {
        return match ($name) {
            'sum' => new Sum(),
            'minus' => new Minus(),
        };
    }
}

class Main
{

    public function __construct(public ServiceLocator $serviceLocator)
    {
    }

    public function run($name)
    {
        $service = $this->serviceLocator->get($name);
        return $service->calculate(10, 2);
    }
}


echo (new Main(new ServiceLocator))->run('sum') . PHP_EOL;
echo (new Main(new ServiceLocator))->run('minus') . PHP_EOL;
