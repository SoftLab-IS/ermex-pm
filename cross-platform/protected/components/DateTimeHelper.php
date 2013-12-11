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

    public static function dateToUnix($inputDate, $delimiter = '.')
    {
        $dateArray = explode($delimiter, $inputDate);

        $day = count($dateArray) > 0 ? (int)$dateArray[0] : 0;
        $month = count($dateArray) > 1 ? (int)$dateArray[1] : 0;
        $year = count($dateArray) > 2 ? (int)$dateArray[2] : 0;

        return mktime(0, 0, 0, $month, $day, $year);
    }
} 