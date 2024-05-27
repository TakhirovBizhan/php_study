<?php
$servername = "localhost"; // Имя сервера базы данных (обычно localhost)
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных (оставьте пустым, если нет пароля)
$dbname = "socnetwork"; // Имя базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}