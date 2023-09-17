<?php

require_once 'WeatherDataProcessor.php';
require_once 'UserLocation.php';

// Check if the user has submitted the form
if (!empty($_GET['city'])) {
    // Get the user's input for the city name
    $cityName = $_GET['city'];
    // Create a UserLocation instance based on the provided city name or coordinates
    $userLocation = new UserLocation($cityName);
    

    // Check if latitude and longitude are set in the form data

} elseif (isset($_GET['latitude']) && isset($_GET['longitude'])) {
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    // Create a UserLocation instance based on the provided city name or coordinates
$userLocation = new UserLocation($city = '', $latitude, $longitude);

$cityName = $userLocation->setCityNameByCoordinates(); // Get the city name
}
else {
    // If no city is submitted, set default
    $cityName = 'London';
}


// Echo the city name
echo "City Name: " . $cityName . '<br>';

// Initialize the WeatherDataProcessor with the API key
$weatherAPI = new WeatherDataProcessor($apiKey, $userLocation->getLatitude(), $userLocation->getLongitude());

try {
    // Use the user's location to get the current weather
    $displayData = $weatherAPI->getFiveDayDailyForecast();
    echo '<pre>';
    print_r($displayData);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
