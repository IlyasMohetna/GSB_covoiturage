<?php

namespace App\Services;

class TimeService {
    public function for($time1, $time2){
        $diffInMinutes = $time1->diffInMinutes($time2);

        if ($diffInMinutes < 60) {
            return $diffInMinutes . ' minute' . ($diffInMinutes > 1 ? 's' : '');
        }

        $hours = intdiv($diffInMinutes, 60);
        $remainingMinutes = $diffInMinutes % 60;

        $result = $hours . ' heure' . ($hours > 1 ? 's' : '');

        if ($remainingMinutes > 0) {
            $result .= ' ' . $remainingMinutes . ' minute' . ($remainingMinutes > 1 ? 's' : '');
        }

        return $result;
    }
}
