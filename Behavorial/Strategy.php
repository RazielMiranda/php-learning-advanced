<?php

namespace Behavorial;

interface FormatStategy
{
    public function render(mixed $content): string;
}

class FormatJson implements FormatStategy
{

    public function render(mixed $content): string
    {
        return json_encode([$content => $content]);
    }
}

class FormatArray implements FormatStategy
{
    public function render(mixed $content): string
    {
        return print_r([$content => $content], true);
    }
}

# Using polymorphism
class FormatPolymorphism
{

    public function format(string $content, FormatStategy $format): void
    {
        echo $format->render($content);
    }
}

(new FormatPolymorphism())->format('Raziel...', new FormatArray());
(new FormatPolymorphism())->format('Raziel...',  new FormatJson);

# Delegating for a structure of control
class FormatDelegating
{

    public function format(string $content, string $format): void
    {
        echo match ($format) {
            'json' => (new FormatJson)->render($content),
            'array' => (new FormatArray)->render($content),
        };
    }
}

(new FormatDelegating())->format('Raziel...', 'json');
(new FormatDelegating())->format('Raziel...', 'array');
