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
        <div id="current-weather-section" class="flex items-center justify-center rounded-xl p-2 bg-gray-100">
            <form method="get" action="controller.php" id="weatherForm">
                <input id="city" type="text" name="city" placeholder="City Name" required>
                <button type="submit" class="py-1 px-2 bg-green-400">Go</button>
                <button type="button" onclick="getLocation()" class="py-1 px-2 bg-blue-400">Current Location</button>
                <!-- Hidden input fields to store latitude and longitude -->
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
            </form>
        </div>
        <div class="flex items-center justify-center rounded-xl p-2 bg-gray-100">
            <div>
                <h1>Current Weather</h1>
                <?php if ($currentWeather): ?>
                    <p>City: <?php echo $cityName; ?></p>
                    <p>Temperature: <?php echo $currentWeather['main']['temp']; ?> &#8451;</p>
                    <p>Weather: <?php echo $currentWeather['weather'][0]['description']; ?></p>
                <?php else: ?>
                    <p>No weather data available.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex items-center justify-center rounded-xl p-2 bg-gray-100">3</div>
        <div class="flex items-center justify-center rounded-xl p-2 bg-gray-100">4</div>
    </div>
</div>
</body>
</html>