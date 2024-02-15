<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаба 3</title>
</head>
<body>
    <header style="height: 100px; border: solid black 1px;display:flex; gap: 300px;">
        <img src="../1234.png" alt="Политех">
        <h1>Лабораторная работа №3</h1>
    </header>
    <main style="display:flex; justify-content:center; margin-top: 100px;">
    
<?php
    $response = get_headers("http://localhost/php_study/lab3/index.html");

    foreach ($response as $elem){
        echo $elem . "<br>";
    }
    ?>

<a href="index.html">Перейти на 1 страницу</a>

    </main>
    <footer></footer>
</body>
</html>