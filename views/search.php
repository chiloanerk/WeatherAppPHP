
<div class="">
<form method="get" action="controller.php" id="weatherForm">
    <input id="city" type="text" name="city" placeholder="City Name" required>
    <button type="submit" class="py-1 px-2 bg-green-400">Go</button>
    <button type="button" onclick="getLocation()" class="py-1 px-2 bg-blue-400">Current Location</button>
    <!-- Hidden input fields to store latitude and longitude -->
    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">
</form>
</div>