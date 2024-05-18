<?php

namespace Structural;

# echo PHP_EOL;
# echo '== Decorator ==';
# echo PHP_EOL;

interface NinjaInterface
{
    public function superpower(): string;
}

class NinjaKonoha implements NinjaInterface
{
    public function superpower(): string
    {
        return "High chackra";
    }
}

class NinjaSand implements NinjaInterface
{
    public function superpower(): string
    {
        return "Sand resistency";
    }
}

class NinjaStorm implements NinjaInterface
{
    public function superpower(): string
    {
        return "Storm resistency";
    }
}

class NinjaStone implements NinjaInterface
{
    public function superpower(): string
    {
        return "Water resistency";
    }
}

class NinjaAddPowerDecorator implements NinjaInterface
{

    public function __construct(
        private NinjaInterface $ninja,
        private string $power = ''
    ) {
    }

    public function superpower(): string
    {
        return "{$this->ninja->superpower()} + {$this->power}";
    }
}

foreach ([
    new NinjaKonoha,
    new NinjaKonoha,
    new NinjaSand,
    new NinjaSand,
    new NinjaStorm,
    new NinjaStone
] as $key => $value) {
    # echo PHP_EOL;
    # echo (new NinjaAddPowerDecorator($value, 'fire jutsu!'))->superpower() . ' new behavior :o';
}

class NinjaSandExtraPower extends NinjaSand
{

    public function __construct(
        private string $power = ''
    ) {
    }

    public function extra(): string
    {
        return parent::superpower() . " + {$this->power}";
    }
}

class NinjaKonohaExtraPower extends NinjaKonoha
{

    public function __construct(
        private string $power = ''
    ) {
    }

    public function extra(): string
    {
        return parent::superpower() . " + {$this->power}";
    }
}

class NinjaStormExtraPower extends NinjaStorm
{

    public function __construct(
        private string $power = ''
    ) {
    }

    public function extra(): string
    {
        return parent::superpower() . " + {$this->power}";
    }
}

class NinjaStoneExtraPower extends NinjaStone
{

    public function __construct(
        private string $power = ''
    ) {
    }

    public function extra(): string
    {
        return parent::superpower() . " + {$this->power}";
    }
}

foreach ([
    new NinjaKonohaExtraPower('fire jutsu!'),
    new NinjaKonohaExtraPower('fire jutsu!'),
    new NinjaSandExtraPower('sand jutsu!'),
    new NinjaSandExtraPower('sand jutsu!'),
    new NinjaStormExtraPower('storm jutsu!'),
    new NinjaStoneExtraPower('stone jutsu!')
] as $key => $value) {
    # echo PHP_EOL;
    # echo $value->extra() . ' new behavior :o';
}
