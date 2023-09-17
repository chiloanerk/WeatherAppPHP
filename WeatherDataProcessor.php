<?php

require_once 'WeatherAPI.php';

class WeatherDataProcessor extends WeatherAPI
{
    private $latitude;
    private $longitude;
    private $weatherData; // Store the weather data here

    public function __construct($apiKey, $latitude, $longitude) {
        parent::__construct($apiKey);
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        // Fetch weather data when the class is constructed
        $this->fetchWeatherData();
    }

    private function fetchWeatherData() {
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast?units=metric&lat={$this->latitude}&lon={$this->longitude}&appid={$this->apiKey}";
        var_dump($apiUrl);
        $json = file_get_contents($apiUrl);
        $this->weatherData = json_decode($json, true);
    }

    public function getCurrentWeather() {
        if (isset($this->weatherData['list'][0])) {
            return $this->weatherData['list'][0];
        } else {
            throw new Exception("Unable to fetch current weather data.");
        }
    }

    public function getHourlyWeather() {
        if (isset($this->weatherData['list'])) {
            $hourlyWeather = array();
            for ($i = 0; $i <= 5; $i++) {
                $hourlyWeather[] = $this->weatherData['list'][$i];
            }
            return $hourlyWeather;
        } else {
            throw new Exception("Unable to fetch hourly weather data.");
        }
    }

    public function getFiveDayDailyForecast() {
        if (isset($this->weatherData['list'])) {
            $fiveDayDailyForecast = array();
            $currentDay = '';
            $minTemp = null;
            $maxTemp = null;
            foreach ($this->weatherData['list'] as $entry) {
                $dateTime = strtotime($entry['dt_txt']);
                $day = date('l', $dateTime);

                // Check if the hour is 6 AM
                $hour = date('H', $dateTime);
                if ($hour == 6) {
                    $minTemp = $entry['main']['temp'];
                }

                // Check if the hour is 3 PM
                if ($hour == 15) {
                    $maxTemp = $entry['main']['temp'];
                }

                // If both minTemp and maxTemp have been set, add the data to the forecast
                if ($minTemp !== null && $maxTemp !== null) {
                    if ($day !== $currentDay) {
                        $currentDay = $day;
                        $dateFormatted = date('M d', $dateTime);
                        $fiveDayDailyForecast[$dateFormatted] = array(
                            'icon' => $entry['weather'][0]['icon'],
                            'description' => $entry['weather'][0]['description'],
                            'min_temp' => $minTemp,
                            'max_temp' => $maxTemp,
                        );
                    }
                    // Reset minTemp and maxTemp for the next day
                    $minTemp = null;
                    $maxTemp = null;
                }
            }
            return $fiveDayDailyForecast;
        } else {
            throw new Exception("Unable to fetch five-day daily weather forecast data.");
        }
    }
}
