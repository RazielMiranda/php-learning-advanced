<?php
namespace ObjectsAndDesign\Strategy;

class Render
{
    public function render(string $contents)
    {
        return match (strtolower($_SERVER['HTTP_ACCEPT'] ?? '')) {
            'text/html' => (new HtmlStrategy())($contents),
            'application/json' => (new JsonStrategy())($contents),
            'application/xml' => (new XmlStrategy())($contents),
            default => $contents
        };
    }
}
