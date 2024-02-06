<div id="hourly"
     class="flex items-center justify-center bg-blue-200 bg-opacity-70 backdrop-blur-lg rounded drop-shadow-lg grid grid-cols-6 gap-1">
    <?php
    foreach ($hourlyForecast as $data) : ?>
        <div class="grid grid-rows-3 h-full">
            <div class="flex items-center justify-center"><?= date('g A', $data['dt']); ?></div>
            <div class="flex items-center justify-center">
                <img src="https://openweathermap.org/img/wn/<?= $data['weather'][0]['icon']; ?>.png"
                     alt="<?= $data['weather'][0]['description']; ?>">
            </div>
            <div class="flex items-center justify-center"><?= round($data['main']['temp']) . '°C'; ?></div>
        </div>
    <?php endforeach; ?>
</div>