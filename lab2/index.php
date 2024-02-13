<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2</title>
</head>
<body>
<header style="height: 100px; border: solid black 1px;display:flex; gap: 300px;">
        <img src="../1234.png" alt="Политех">
        <h1>Лабораторная работа №2</h1>
    </header>
    <main>
        <?php
    $sample = "4 * X = 36";
    $arr = explode(" ", $sample);
    $first = $arr[0];
    $second = $arr[2];
    $result = $arr[4];
    switch ($arr[1]) {
        case "+":
            $output_x = $result - $first;
            break;
        case "-":
            $output_x = $first - $result;
            break;
        case "/":
            $output_x = $first / $result;
            break;
        case "*":
            $output_x = $result / $first;
            break;
        default:
            $output_x = NAN;
    }
    echo "$output_x";  
    ?>

    </main>
    <footer></footer>
    
</body>
</html>