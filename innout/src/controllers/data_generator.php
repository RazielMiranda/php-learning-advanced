<?php


var_dump(Database::executeSQL('DELETE FROM working_hours'));

function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate){

    $regularDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME,
    ];

    $extraHourDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME + 3600,
    ];

    $LazyDayTemplate = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
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

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate){
    $currentDate = $initialDate;
    $yesterday = new DateTime();

    $columns = ['user_id' => $userId, 'work_date' => $currentDate];

    while (isBefore($currentDate, $yesterday)){
        if (!isWeekend($currentDate)){
            $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->insert();
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }

}
// $lastDayMonth = strtotime('first day of last month');
// populateWorkingHours(1, date('Y-m-L'), 70, 20, 10);
// populateWorkingHours(3, date('Y-m-d', $lastDayMonth), 20, 75, 5);
// populateWorkingHours(4, date('Y-m-d', $lastDayMonth), 20, 10, 70);

echo 'Tudo Certo!';