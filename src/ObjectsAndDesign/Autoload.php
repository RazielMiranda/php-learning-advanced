<?php
namespace ObjectsAndDesign;
// autoloader
class Autoload
{
    public function __construct(string $path)
    {
        spl_autoload_register(
            function ($class)  use ($path) {
                $path = realpath($path);
                $fn = $path . '/' . str_replace('\\', '/', $class) . '.php';
                require $fn;
            });
    }
}
