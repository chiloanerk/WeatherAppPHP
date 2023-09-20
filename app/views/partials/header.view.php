<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather <?php if (isset($currentWeather['name'])) echo ' - ' . $currentWeather['name'] ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="WeatherOnClick">
    <meta name="application-name" content="WeatherOnClick">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="./css/styles.css" type="text/css">
<!--    <script src="https://cdn.tailwindcss.com"></script>-->
    <script src="js/geolocation.js" defer></script>
</head>
<body class="dark:bg-gray-700">