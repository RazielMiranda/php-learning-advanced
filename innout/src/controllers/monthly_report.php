<?php
session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];

$registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

$report = [];
$workday = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($currentDate)->format('d');

for ($day = 1; $day < $lastDay; $day++) { 
    $date = $currentDate->format('Y-m') . '-' . sprintf('%02d', $day);
    $registry = (in_array($date, $registries)) ? $registries[$date] : array();

    if (isPastWorkday($date)) $workday++;

    if($registry){
        $sumOfWorkedTime += $registry->worked_time;
        array_push(	$report, $registry);
    }else{
        array_push(	$report, new WorkingHours([
            'work_date' => $date,
            'worked_time' => 0
        ]));
    }
}

$expectedTime = $workday * DAILY_TIME;
$balance = $sumOfWorkedTime - $expectedTime;
$sign = ($sumOfWorkedTime >= $expectedTime) ? '+' : '-';

loadTemplateView('monthly_report', [
    'report' => $report,
    'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
    'balance' => "{$sign}{$balance}"
]);
