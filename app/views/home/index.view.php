<?php include base_path('app/views/partials/header.view.php'); ?>
    <div class="container mx-auto pt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php include base_path('app/views/partials/search.view.php'); ?>
            <div id="today" class="grid grid-rows-2 gap-6">
                <?php include base_path('app/views/partials/current.view.php'); ?>
                <?php include base_path('app/views/partials/hourly.view.php'); ?>
            </div>
            <?php include base_path('app/views/partials/weekly.view.php'); ?>
        </div>
    </div>
<?php include base_path('app/views/partials/footer.view.php'); ?>