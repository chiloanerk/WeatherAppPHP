<?php

require_once 'config.php';

class WeatherAPI
{
    public $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }
}