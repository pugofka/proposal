<?php

namespace App\Helpers;

class Helper
{
    /**
     * Format float value
     *
     * @param $value
     * @return string
     */
    public static function formatNumber($value, $n_decimals = 2)
    {
        return ((floor($value) == round($value, $n_decimals)) ?
            number_format($value, 0, '.', '') :
            number_format($value, $n_decimals, '.', ''));
    }
}