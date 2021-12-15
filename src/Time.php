<?php
namespace MuriloPerosa\SuperPowers;

class Time {


    /**
     * Returns formatted execution time based on $start_time. Format HH:mm:ss .
     *
     * @param integer $start_time
     * @return string
     */
    public static function executionTime (int $start_time) : string
    {
        $duration = microtime(true) - $start_time;

        $hours   = (int)($duration / 60 / 60);
        $minutes = (int)($duration / 60) - $hours * 60;
        $seconds = (int)$duration - $hours * 60 * 60 - $minutes * 60;
        return ($hours == 0 ? "00":$hours) . ":" . ($minutes == 0 ? "00":($minutes < 10? "0".$minutes:$minutes)) . ":" . ($seconds == 0 ? "00":($seconds < 10? "0".$seconds:$seconds));
    }

}