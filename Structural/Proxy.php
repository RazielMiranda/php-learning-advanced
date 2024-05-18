<?php

namespace Structural;

include 'Decorator.php';

use ErrorException;
use Structural\NinjaKonoha;
use Structural\NinjaSand;
use Structural\NinjaStorm;
use Structural\NinjaStone;
use Structural\NinjaAddPowerDecorator;

echo PHP_EOL;
echo '== Proxy ==';
echo PHP_EOL;

foreach ([
    new NinjaKonoha,
    new NinjaKonoha,
    new NinjaSand,
    new NinjaSand,
    new NinjaStorm,
    new NinjaStone
] as $key => $value) {
    echo PHP_EOL;

    /** @var NinjaInterface $ninja */
    $ninja = (new NinjaPowerProxy($value, rand(1, 6)));
    echo $ninja()->superpower();
}

class NinjaPowerProxy
{

    public function __construct(
        private NinjaInterface $ninja,
        private string $password
    ) {
    }

    public function __invoke()
    {
        if (empty($this->password)) {
            throw new ErrorException('Password needs to be filled!', 403);
        }

        if ($this->password % 2 === 0) {
            return new NinjaAddPowerDecorator($this->ninja, 'special jutsu!');
        }

        return new NinjaAddPowerDecorator($this->ninja, 'normal jutsu!');
    }
}
