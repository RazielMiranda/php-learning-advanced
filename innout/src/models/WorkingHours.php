<?php

class WorkingHours extends Model
{
    protected static $tableName = 'working_hours';
    protected static $columns = [
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'worked_time',
    ];

    public static function loadFromUserAndDate($userId, $workDate)
    {
        $registry = self::getOne(['user_id' => $userId, 'work_date' => $workDate]);
        
        if(!$registry){
            $registry = new WorkingHours([
                'user_id' => $userId,
                'work_date' => $workDate,
                'worked_time' => 0,
            ]);
        }

        return $registry;
    }

    public function getNextTime(){
        if(!$this->time1) return 'time1';
        if(!$this->time2) return 'time2';
        if(!$this->time3) return 'time3';
        if(!$this->time4) return 'time4';
        return null;
    }

    public function innout($time){
        $timeColumn = $this->getNextTime();
        if(!$timeColumn){
            throw new AppException("Voce já fez os 4 batimentos do dia!");
        }
        $this->$timeColumn = $time;
        if($this->id){
            $this->update();
        }else{
            $this->insert();
        }
    }

    function getLunchInterval(){
        [,$t2,$t3,] = $this->getTimes();
        $breakInterval = new DateInterval('PT0S');
        if($t2) $breakInterval = $t2->diff(new DateTime());
        if($t3) $breakInterval = $t3->diff($t2);
        
        return $breakInterval;
    }

    function getWorkedInterval(){
        [$t1,$t2,$t3,$t4] = $this->getTimes();

        $part1 = new DateInterval('PT0S');
        $part2 = new DateInterval('PT0S');

        if($t1) $part1 = $t1->diff(new DateTime());
        if($t2) $part1 = $t1->diff($t2);

        if($t3) $part2 = $t3->diff(new DateTime());
        if($t4) $part2 = $t3->diff($t4);

        return sumIntervals($part1, $part2);
    }

    private function getTimes(){
        $times = [];

        $this->time1 ? array_push($times, getDateFromString($this->time1)) : array_push($times, null);
        $this->time2 ? array_push($times, getDateFromString($this->time2)) : array_push($times, null);
        $this->time3 ? array_push($times, getDateFromString($this->time3)) : array_push($times, null);
        $this->time4 ? array_push($times, getDateFromString($this->time4)) : array_push($times, null);

        return $times;
    }

}

