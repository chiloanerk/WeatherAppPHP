<?php
$message = 'Page not found. Click here to go back to the weather:';
view('pages/404.view.php', [
    'message' => $message
]);