<?php
namespace MuriloPerosa\SuperPowers;

class Url {


    /**
     * Return if URL is valid
     *
     * @param string $url
     * @return boolean
     */
    public static function isValid (string $url) : bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Sets param on URL
     *
     * @param string $url
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public static function setParam (string $url, string $key, $value = null) : string
    {
        $query = parse_url($url, PHP_URL_QUERY);

        if (!empty($query))
        {
            parse_str($query, $queryParams);
            $queryParams[$key] = $value;
            return  str_replace("?$query", '?' . http_build_query($queryParams), $url);
        }
        
        $url .= '?' . urlencode($key) . '=' . urlencode($value);
        return $url;
    }

    /**
     * Returns URL param
     *
     * @param string $url
     * @param string $key
     * @return string|null
     */
    public static function getParam (string $url, string $key) : ?string
    {
        $url_components = parse_url($url);
        
        if (!empty($url_components) && isset($url_components['query']))
        {
            parse_str($url_components['query'], $params);

            if (!empty($params))
            {
                return isset($params[$key]) ? $params[$key] : null;
            }
        }
            
        return null;
    }
}