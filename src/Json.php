<?php

namespace MuriloPerosa\SuperPowers;

class Json {


    /**
     * Check if the given string is an valid json.
     *
     * @param string $json
     * @return boolean
     */
    public static function isValid (string $json) : bool
    {
        try 
        {
            $data = json_decode($json, null, 512, JSON_THROW_ON_ERROR);
            return true;
        } 
        catch (\Exception $e) 
        {
            return false;
        }
    }

    /**
     * Returns value of json property.
     *
     * @param string $json
     * @param string $prop
     * @return mixed
     */
    public static function getProperty (string $json, string $prop)
    {
        $data = json_decode($json, true);
        return isset($data[$prop]) ? $data[$prop] : null;
    }

    /**
     * Set property on array. Returns full json string.
     *
     * @param string $json
     * @param string $prop
     * @param mixed $value
     * @return string
     */
    public static function setProperty (string $json, string $prop, $value) : string
    {
        $data = json_decode($json, true);
        $data[$prop] = $value;
        return json_encode($data);
    }
}