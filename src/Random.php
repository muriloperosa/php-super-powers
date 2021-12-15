<?php

namespace MuriloPerosa\SuperPowers;

class Random {

    /**
     * Returns random bool val.
     *
     * @param float $probability
     * @param integer $length
     * @return boolean
     */
    public static function boolVal (float $probability = 0.1, int $length = 10000) : bool
    {
        $test = mt_rand(1, $length);
        return $test <= $probability * $length;
    }

    /**
     * Returns randomic item from given array.
     *
     * @param array $items
     * @return mixed
     */
    public static function arrayItem (array $items)
    {
        return $items[array_rand($items)];
    }

    /**
     * Returns randomic number sequence.
     *
     * @param integer $required_length
     * @param integer $highest_digit
     * @return string
     */
    public static function numberSequence (int $required_length = 9, int $highest_digit = 9) : string
    {
        $sequence = '';
        for ($i = 0; $i < $required_length; ++$i) 
        {
            $sequence .= mt_rand(0, $highest_digit);
        }

        return $sequence;
    }
}