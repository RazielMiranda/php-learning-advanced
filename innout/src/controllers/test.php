<?php

echo 'teste!';


$i1 = DateInterval::createFromDateString('9 hours');
$i2 = DateInterval::createFromDateString('12 hours');
var_dump(getDateFromInterval(sumIntervals($i1, $i2)));

$r1 = DateInterval::createFromDateString('9 hours');
$r2 = DateInterval::createFromDateString('7 hours');
var_dump(getDateFromInterval(subtractIntervals($r1, $r2)));
