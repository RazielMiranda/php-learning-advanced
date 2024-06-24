<?php

namespace Behavorial;

class Storage
{
    public function __construct(public string $tag)
    {
    }
}


class StorageFlyweightFactory
{
    public $flyweight = [];

    public function create(string $tag): Storage
    {
        if (!isset($this->flyweight[$tag])) {
            $this->flyweight[$tag] = new Storage($tag);

            return $this->flyweight[$tag];
        }

        return $this->flyweight[$tag];
    }
}

$factory = new StorageFlyweightFactory();

echo $factory->create('Raziel')->tag;
echo $factory->create('Jaiara')->tag;
echo $factory->create('Lisa')->tag;
echo $factory->create('Sergio')->tag;

echo $factory->create('Raziel')->tag;
echo $factory->create('Jaiara')->tag;
echo $factory->create('Lisa')->tag;
echo $factory->create('Sergio')->tag;

# Three objects, but called six times!
var_dump($factory->flyweight);

# Difference is minimal this scenario, but imagine with big objects!
echo memory_get_peak_usage();
