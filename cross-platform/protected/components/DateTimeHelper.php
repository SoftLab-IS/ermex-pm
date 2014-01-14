<?php
/**
 * DateTime Helper
 *
 * Date and Time functions and conversions.
 *
 * @author Aleksandar Panic
 */

class DateTimeHelper {

    /**
     * dateToUnix($serialOld)
     *
     * Transforms formatted european date into unix timestamp.
     *
     * @author Aleksandar Panic
     *
     * @param string $inputDate Formatted date string
     * @return integer New unix date
     */

    public static function dateToUnix($inputDate, $inputTime = null, $dateDelimiter = '.', $timeDelimiter = ':')
    {
        $dateArray = explode($dateDelimiter, $inputDate);
        $timeArray = explode($timeDelimiter, $inputTime);

        $hours = count($timeArray) > 0 ? (int)$timeArray[0] : 0;
        $minutes = count($timeArray) > 1 ? (int)$timeArray[1] : 0;
        $seconds = count($timeArray) > 2 ? (int)$timeArray[2] : 0;

        $day = count($dateArray) > 0 ? (int)$dateArray[0] : 0;
        $month = count($dateArray) > 1 ? (int)$dateArray[1] : 0;
        $year = count($dateArray) > 2 ? (int)$dateArray[2] : 0;

        return mktime($hours, $minutes, $seconds, $month, $day, $year);
    }

    public static function unixToDate($inputTimestamp)
    {

    }
} 