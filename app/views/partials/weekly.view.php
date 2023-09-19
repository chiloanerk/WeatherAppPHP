<div id="weekly-forecast" class="rounded-xl p-2 bg-blue-200">
    <div class="grid grid-rows gap-2">
        <?php foreach ($weeklyForecast as $day => $weatherData): ?>
            <div class="grid grid-cols-3 p-2">
                <div class="flex items-center justify-start">
                    <?= $day; ?>
                </div>
                <div class="flex items-center justify-start">
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