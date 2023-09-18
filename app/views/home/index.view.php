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
<div class="container mx-auto pt-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div id="current-weather-section"
             class="rounded-xl p-2 bg-gray-100 md:col-span-2">

            <form id="weatherForm" class="flex items-center justify-center" action="/search">
                <button type="button" onclick="getLocation()" class="p-2 mr-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                    <!-- Hidden input fields to store latitude and longitude -->
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                </button>
                <label for="city" class="sr-only">Search</label>
                <div class="relative w-full md:w-1/2">
                    <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search city name" required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>


        </div>
        <div id="today" class="grid grid-rows-2 gap-2">

            <div id="live-forecast" class="grid grid-cols-3 gap-2 rounded-xl bg-blue-200">
                <div class="p-2">
                    <p class="text-3xl"><?php echo $currentWeather['name']; ?></p>
                    <p class=""><?php echo $currentWeather['weather'][0]['description']; ?></p>
                    <p class="text-2xl"><?php echo round($currentWeather['main']['temp']); ?> &#8451;</p>

                    <p><?php foreach ($messages as $message) {
                            echo $message . "<br>";
                        } ?></p>
                </div>
                <div class="col-span-2 flex item-center justify-end p-2">
                    <img src="http://openweathermap.org/img/wn/<?= $currentWeather['weather'][0]['icon']; ?>@2x.png" alt="">
                </div>
            </div>

            <div id="hourly-forecast"
                 class="flex items-center justify-center rounded-xl p-2 bg-blue-200 grid grid-cols-6 gap-1">
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

        <div id="weekly-forecast" class="rounded-xl p-2 bg-blue-200">
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