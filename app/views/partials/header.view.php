<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather <?php if (isset($currentWeather['name'])) echo ' - ' . $currentWeather['name'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/geolocation.js" defer></script>
</head>
<body class="dark:bg-gray-700">