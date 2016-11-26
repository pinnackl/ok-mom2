<?php

namespace AppBundle\Service;

use Carbon\Carbon;
use Carbon\CarbonInterval;

/**
 * 
 */
class Date
{
    /**
     * Generate the date range between to dates
     * @param  Carbon $start_date The date to start at
     * @param  Carbon $end_date   The date to end at
     * @return array              An of string formated dates
     */
    public function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];        
        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = Carbon::parse($date->format('Y-m-d h:i:s'));
        }

        return $dates;
    }

    public function getWeekStart(Carbon $date)
    {
        $dateStart = Carbon::parse($date->format('Y-m-d'));
        $weekStart = $dateStart->startOfWeek();

        return $weekStart;
    }

    public function getWeekEnd(Carbon $date)
    {
        $dateEnd = Carbon::parse($date->format('Y-m-d'));
        $weekEnd = $dateEnd->endOfWeek();

        return $weekEnd;
    }

    public function getNextWeek(Carbon $date)
    {
        $nextWeek = Carbon::parse($date->format('Y-m-d'));
        $nextWeek->next(carbon::MONDAY);

        return $nextWeek;
    }

    public function getPreviousWeek(Carbon $date)
    {
        $pastWeek = Carbon::parse($date->format('Y-m-d'));
        $pastWeek = $pastWeek->previous(carbon::MONDAY);

        return $pastWeek;
    }
}