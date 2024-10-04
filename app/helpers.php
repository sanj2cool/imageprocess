<?php

if (!function_exists('getPSTTime')) {
    function getPSTTime()
    {
        // Get the current UTC time
        $currentDate = new DateTime("now", new DateTimeZone('UTC'));

        // Create a new DateTime object for PST (UTC-8)
        $pstDate = $currentDate->setTimezone(new DateTimeZone('America/Denver')); // PST

        // Format the time as HH:mm:ss
        return $pstDate->format('H:i:s');
    }
}
