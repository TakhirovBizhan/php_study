<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>для тестов</title>
</head>
<body>
<?php
$filePath = __DIR__ . '/test.txt';

$fileContent = file_get_contents($filePath);

if ($fileContent !== false) {
    $updatedContent = $fileContent . '!';

    file_put_contents($filePath, $updatedContent);

    echo 'Файл успешно обновлен.';
} else {
    echo 'Ошибка чтения файла.';
}
?>
</body>
</html>