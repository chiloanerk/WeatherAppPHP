<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeatherApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="geolocation.js" defer></script>
</head>
<body>
<div class="container mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="flex justify-center border-2 border-gray-300 rounded-xl p-2 bg-gray-100">
        <?php include 'views/search.php'; ?>
    </div>
    <div class="flex justify-center text-6xl border-2 border-gray-300 rounded-xl p-6 bg-gray-100">2</div>
    <div class="flex justify-center text-6xl border-2 border-gray-300 rounded-xl p-6 bg-gray-100">3</div>
    <div class="flex justify-center text-6xl border-2 border-gray-300 rounded-xl p-6 bg-gray-100">4</div>
  </div>
</div>
</body>
</html>