<?php
// To demonstrate, from a terminal window:
// php -S localhost:9999 using_strategy_pattern.php
// Open a new terminal window and try these commands:
// (1) HTML: curl -X GET -H 'Accept: text/html' localhost:9999
// (2) JSON: curl -X GET -H 'Accept: application/json' localhost:9999
// (3) XML: curl -X GET -H 'Accept: application/xml' localhost:9999
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\Strategy\Render;

// grab Lorem Ipsum
$url = 'https://loripsum.net/api/5/short/paragraphs/plaintext';
$contents = file_get_contents($url);
$contents = str_replace("\n\n", "\n", $contents);
echo (new Render())->render($contents);
