<?php
function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate){

    $regularDayTemplate = [
        'time1' => '08:00:00',
        'time1' => '12:00:00',
        'time1' => '13:00:00',
        'time1' => '17:00:00',
        'worked_time' => DAILY_TIME,
    ];

    $extraHourDayTemplate = [
        'time1' => '08:00:00',
        'time1' => '12:00:00',
        'time1' => '13:00:00',
        'time1' => '17:00:00',
        'worked_time' => DAILY_TIME + 3600,
    ];

    $LazyDayTemplate = [
        'time1' => '08:30:00',
        'time1' => '12:00:00',
        'time1' => '13:00:00',
        'time1' => '17:00:00',
        'worked_time' => DAILY_TIME - 1800,
    ];

    $value = rand(0, 100);
    if($value <= $regularRate){
        return $regularDayTemplate;
    }else if($value <= $regularRate + $extraRate){
        return $extraHourDayTemplate;
    }else{
        return $LazyDayTemplate;
    }

}

print_r(getDayTemplateByOdds(33, 33, 34));
