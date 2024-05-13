<?php
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\Flyweight\FontCssFactory;
$factory = new FontCssFactory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Zend Training: Flyweight Example</title>
<meta name="generator" content="Geany 1.38" />
</head>
<body>
<span style="<?= $factory->getFormat('Georgia, serif', '200%', 'bold')(); ?>">Story of the Fox</span>
<hr />
<p style="<?= $factory->getFormat('Arial, sans-serif')(); ?>">
The quick brown fox jumped over the fence.</p>
<hr />
<span style="<?= $factory->getFormat('Georgia, serif', '200%', 'bold')(); ?>">Conclusion</span>
<p style="<?= $factory->getFormat('Arial, sans-serif')(); ?>">
Using <i>var_dump()</i> to examine the factory instance:</p>
<pre>
<?php var_dump($factory); ?>
</pre>
</body>
</html>
