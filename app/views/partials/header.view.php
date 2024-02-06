<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8XJGEZ7NVH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8XJGEZ7NVH');
    </script>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Rubik:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css" type="text/css">
<!--    <script src="https://cdn.tailwindcss.com"></script>-->
    <script src="js/geolocation.js" defer></script>
</head>
<body class="font-lato text-gray-900 flex items-center justify-center h-screen bg-gradient-to-t from-violet-600 to-cyan-400 dark:from-violet-900 dark:to-cyan-800">