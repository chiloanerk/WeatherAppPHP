<?php

namespace app\classes;

class DataProcessor extends WeatherAPI
{
    public $latitude;
    public $longitude;
    public $weatherData;
    public array $messages = [];

    public function __construct($apiKey, $latitude, $longitude)
    {
        parent::__construct($apiKey);
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $this->fetchWeatherData();
    }

    public function fetchWeatherData()
    {
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast?units=metric&lat={$this->latitude}&lon={$this->longitude}&appid={$this->apiKey}";

        $context = stream_context_create([
            'http' => [
                'ignore_errors' => true, // Ignore HTTP errors
            ],
        ]);

        $json = file_get_contents($apiUrl, false, $context);

        if ($json === false) {
            $errorData = error_get_last();
            if (strpos($errorData['message'], '404 Not Found') !== false) {
                $this->addMessage('City not found. Please check the city name and try again.');
            } elseif (strpos($errorData['message'], '400 Bad Request') !== false) {
                $this->addMessage('Bad request. Please verify your input and try again.');
            } else {
                $this->addMessage('Unable to connect to the weather service. Please try again later.');
            }
            return;
        }


        $this->weatherData = json_decode($json, true);
    }

    public function getCurrentWeather()
    {
        return $this->weatherData['list'][0] ?? $this->addMessage("Unable to fetch current weather data.");
    }

    public function getHourlyWeather()
    {
        if (!isset($this->weatherData['list'])) {
            return $this->addMessage("Unable to fetch hourly weather data.");
        } else {
            $hourlyWeather = array();
            for ($i = 0; $i <= 5; $i++) $hourlyWeather[] = $this->weatherData['list'][$i];
            return $hourlyWeather;
        }
    }

    public function getWeeklyForecast()
    {
        if (!isset($this->weatherData['list'])) {
            return $this->addMessage("Unable to fetch weekly weather forecast data.");
        } else {
            $weeklyForecast = array();
            $today = '';
            $minTemp = null;
            $maxTemp = null;

            foreach ($this->weatherData['list'] as $entry) {
                $dateTime = strtotime($entry['dt_txt']);
                $day = date('l', $dateTime);

                // 6AM check
                $hour = date('H', $dateTime);
                if ($hour == 6) $minTemp = $entry['main']['temp'];

                // 3PM check
                if ($hour == 15) $maxTemp = $entry['main']['temp'];

                if ($minTemp !== null && $maxTemp !== null) {
                    if ($day !== $today) {
                        $today = $day;
                        $dateFormatted = date('M d', $dateTime);
                        $weeklyForecast[$dateFormatted] = [
                            'icon' => $entry['weather'][0]['icon'],
                            'description' => $entry['weather'][0]['description'],
                            'min_temp' => $minTemp,
                            'max_temp' => $maxTemp
                        ];
                    }
                    // Reset
                    $minTemp = null;
                    $maxTemp = null;
                }
            }
            return $weeklyForecast;
        }
    }

    public function addMessage($messages)
    {
        $this->messages[] = $messages;
    }
}