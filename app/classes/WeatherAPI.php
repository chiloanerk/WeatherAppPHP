<?php

namespace app\classes;
class WeatherAPI
{
    public $apiKey = '37cae92af4b42d8acfce79455b70c571';

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

}