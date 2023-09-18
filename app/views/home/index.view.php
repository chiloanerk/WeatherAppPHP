<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeatherApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/geolocation.js" defer></script>
</head>
<body>
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div id="current-weather-section"
             class="flex items-center justify-center rounded-xl p-2 bg-gray-100 md:col-span-2">
            <form method="get" action="/search" id="weatherForm">
                <input id="city" type="text" name="city" placeholder="City Name" required>
                <button type="submit" class="py-1 px-2 bg-green-400">Go</button>
                <button type="button" onclick="getLocation()" class="py-1 px-2 bg-blue-400">Current Location</button>
                <!-- Hidden input fields to store latitude and longitude -->
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
            </form>
        </div>
        <div id="today" class="grid grid-rows-2 gap-2">

            <div id="live-forecast" class="flex items-center justify-center rounded-xl p-2 bg-gray-100">
                <div>
                    <h1>Current Weather</h1>
                    <h1><?php foreach ($messages as $message) {
                            echo $message . "<br>";
                        } ?></h1>
                    <p>City: <?php echo $currentWeather['name']; ?></p>
                    <p>Temperature: <?php echo round($currentWeather['main']['temp']); ?> &#8451;</p>
                    <p>Weather: <?php echo $currentWeather['weather'][0]['description']; ?></p>
                </div>
            </div>

            <div id="hourly-forecast"
                 class="flex items-center justify-center rounded-xl p-2 bg-gray-100 grid grid-cols-6 gap-1">
                <?php
                foreach ($hourlyForecast as $data) {
                    echo '<div class="grid grid-rows-3">';
                    echo '<p>' . date('g:i A', $data['dt']) . '</p>';
                    echo '<img src="https://openweathermap.org/img/wn/' . $data['weather'][0]['icon'] . '.png" alt="weather-icon">';
                    echo '<p>Temp: ' . round($data['main']['temp']) . '°C' . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div id="weekly-forecast" class="rounded-xl p-2 bg-gray-100">
            <div class="grid grid-rows gap-2">
                <?php foreach ($weeklyForecast as $day => $weatherData): ?>
                    <div class="grid grid-cols-3 p-2">
                        <div class="flex items-center justify-start">
                            <?= $day; ?>
                        </div>
                        <div class="flex items-center justify-center">
                            <img src="https://openweathermap.org/img/wn/<?= $weatherData['icon']; ?>.png"
                                 alt="<?= $weatherData['description']; ?>">
                            <span><?= $weatherData['description']; ?></span>
                        </div>
                        <div class="flex items-center justify-end">
                            <?= $weatherData['min_temp'] . '/' . $weatherData['max_temp']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>