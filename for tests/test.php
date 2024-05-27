<?php
session_start();

if (!isset($_SESSION['first_entry_time'])) {
    $_SESSION['first_entry_time'] = time();
}

$firstEntryTime = $_SESSION['first_entry_time'];

$currentTime = time();

$secondsSinceFirstEntry = $currentTime - $firstEntryTime;

echo "Вы зашли на сайт $secondsSinceFirstEntry секунд назад.";

$_SESSION['first_entry_time'] = $currentTime;
?>
