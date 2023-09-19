<div id="search"
     class="rounded-xl p-2 bg-gray-100 dark:bg-gray-500 md:col-span-2 <?php if (!empty($_SESSION['error_messages'])) echo 'h-24'; ?>">
    <div class="">
        <form id="weatherForm" class="flex items-center justify-center" action="/search">
            <button type="button" onclick="getLocation()"
                    class="p-2 mr-2 text-sm font-medium text-white bg-blue-500 border border-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="20"
                     height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"/>
                </svg>
                <!-- Hidden input fields to store latitude and longitude -->
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
            </button>
            <label for="city" class="sr-only">Search</label>
            <div class="relative w-full md:w-1/2">
                <input type="text" id="city" name="city"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search city name" required>
            </div>
            <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-500 border border-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </div>
    <?php if (!empty($_SESSION['error_messages'])) : ?>
    <div class="flex justify-center">
        <span class="text-red-500 text-xs">
            <?php echo $_SESSION['error_messages'][0]; ?>
            <?php unset($_SESSION['error_messages']) ?>
        </span>
    </div>
    <?php endif; ?>
</div>