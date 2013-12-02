<?php
/**
 * SerialGenerator
 *
 * Working with Serials. Helper class.
 *
 * @author Igor Golub
 */

class SerialGenerator {

    /**
     * Generates new Serials
     *
     * @author Igor Golub
     *
     * @param string $serialOld String of last serial in database.
     * @return string New serial code.
     */

    public function generateSerial($serialOld)
    {
        $type = substr($serialOld, 0, 2);
        $serialOld = substr($serialOld, 2);
        $serial = explode("-", $serialOld);
        $number = (int)$serial[0];
        $date = $serial[1];

        if($date == date("m/Y"))
            $number++;
        else
        {
            $number = 1;
            $date = date("m/Y");
        }
        return $type.$number.'-'.$date;
    }
} 