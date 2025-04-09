<?php
   
function logError($message) {
    $date = (new DateTime())->format('Y-m-d H:i:s');
    $entry = "[$date] $message" . PHP_EOL;
    file_put_contents('./logs/errors.log', $entry, FILE_APPEND);
}
?>