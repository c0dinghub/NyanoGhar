<?php

if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        if ($price >= 10000000) {
            // Convert to crores
            return round($price / 10000000, 2) . 'cr';
        } elseif ($price >= 100000) {
            // Convert to lakhs
            return round($price / 100000, 2) . 'lakhs';
        } elseif ($price >= 1000) {
            // Convert to thousands
            return round($price / 1000, 2) . 'k';
        } else {
            // Display the price as it is
            return number_format($price);
        }
    }
}
