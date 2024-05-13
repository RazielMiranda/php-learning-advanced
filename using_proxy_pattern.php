<?php
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\Proxy\ImageProxy;
$authCode = (int) ($_GET['auth_code'] ?? 0);
$filename = 'leaning_tower.png';
$img_path = __DIR__ . '/images/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Zend Training: Proxy Pattern</title>
<meta name="generator" content="Geany 1.38" />
</head>
<body>
<h1>Zend Training: Proxy Pattern</h1>
<hr />
<?= ImageProxy::display($authCode, $filename, $img_path); ?>
</body>
</html>


