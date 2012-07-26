<?php

class CurlWrapper
{
    /**
     * Basic cURL wrapper function for PHP
     * @link http://snipplr.com/view/51161/basic-curl-wrapper-function-for-php/
     * @param string $url URL to fetch
     * @param array $curlopt Array of options for curl_setopt_array
     * @throws CException
     * @return string
     */
    public static function getResult($url, $curlopt = array())
    {
        $ch = curl_init();
        $default_curlopt = array(
            CURLOPT_TIMEOUT => 2,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            //CURLOPT_PROXY => '127.0.0.1:3128'
            //CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.13) Gecko/20101203 AlexaToolbar/alxf-1.54 Firefox/3.6.13 GTB7.1"
        );
        $curlopt = array(CURLOPT_URL => $url) + $curlopt + $default_curlopt;
        curl_setopt_array($ch, $curlopt);
        $response = curl_exec($ch);
        if ($response === false) {
            throw new CException(curl_error($ch));
        }
        curl_close($ch);
        return $response;
    }
}