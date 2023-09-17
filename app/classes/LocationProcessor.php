<?php

namespace app\classes;

class LocationProcessor extends DataProcessor
{
    public $cityName;
    public $latitude;
    public $longitude;

    public function __construct($cityName, $latitude = null, $longitude = null)
    {
        $this->cityName = $cityName;

        if ($latitude !== null && $longitude !== null) {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->setNameByCoordinates();
        } else {
            if (!empty($this->cityName)) {
                $this->setCoordinatesByName();
            } else {
                $this->latitude = 0;
                $this->longitude = 0;
            }
        }
    }

    public function setCoordinatesByName()
    {
        $geoUrl = "https://api.openweathermap.org/data/2.5/weather?q=$this->cityName&units=metric&appid=37cae92af4b42d8acfce79455b70c571";
        $json = file_get_contents($geoUrl);
        $geoData = json_decode($json, true);

        if (!isset($geoData['coord']['lat']) || !isset($geoData['coord']['lon'])) {

            $this->message = 'Unable to fetch coordinates for the specified city.';
        } else {
            $this->latitude = $geoData['coord']['lat'];
            $this->longitude = $geoData['coord']['lon'];
        }
    }

    public function getCityName()
    {
        return $this->cityName;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setNameByCoordinates()
    {
        if (!empty($this->latitude) && !empty($this->longitude)) {
            $reverseGeoUrl = "https://api.openweathermap.org/geo/1.0/reverse?lat=$this->latitude&lon=$this->longitude&limit=1&appid=37cae92af4b42d8acfce79455b70c571";

            $json = file_get_contents($reverseGeoUrl);
            $geoData = json_decode($json);

            if ($geoData !== null && !empty($geoData)) {
                $this->cityName = $geoData[0]->name;
                var_dump($this->cityName);
            } else {
                $this->message = 'Unable to fetch city name from coordinates.';
            }
        } else {
            $this->message = 'Latitude and longitude coordinates are not set.';
        }
    }
}