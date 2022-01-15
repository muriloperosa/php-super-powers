<?php

namespace MuriloPerosa\SuperPowers;

class Arrays {

    /**
     * Remove duplicate elements of array recursively
     *
     * @param array $array
     * @return array
     */
    public static function uniqueRecursive ($array) : array
    {
        $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

        foreach ($result as $key => $value)
        {
            if(is_array($value))
            {
                $result[$key] = self::uniqueRecursive($value);
            }
        }

        return $result;
    }


    /**
     * Removes all empty or null values from array
     * @param  array $array
     * @return array
     */
    public static function removeEmptyValues ($array) : array
    {
        if (empty($array) || !is_array($array))
        {
            return [];
        }
        
        $array = array_map(function($val){
            return trim($val);
        }, $array);

        $array = array_filter($array);
        return $array;
    }
} 