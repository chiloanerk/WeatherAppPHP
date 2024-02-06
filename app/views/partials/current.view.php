<div id="current" class="grid grid-cols-3 gap-2 bg-blue-200 bg-opacity-70 backdrop-blur-lg rounded drop-shadow-lg">
    <div class="p-2 grid grid-rows-3">
        <div class="row-span-2 grid grid-rows-3">
            <p class="text-4xl row-span-2"><?=
            strlen($currentWeather['name']) > 25
                ? substr($currentWeather['name'], 0, 15) . '...'
                : $currentWeather['name'] ?>
            </p>
            <p class="text-gray-800"><?= $currentWeather['weather'][0]['description'] ?></p>
        </div>
        <div>
            <p class="text-3xl"><?= round($currentWeather['main']['temp']) ?> &#8451;</p>
        </div>
    </div>
    <div class="col-span-2 flex item-center justify-end p-2">
        <img src="http://openweathermap.org/img/wn/<?= $currentWeather['weather'][0]['icon']; ?>@2x.png" alt="<?= $currentWeather['weather'][0]['description'] ?> icon">
    </div>
</div>