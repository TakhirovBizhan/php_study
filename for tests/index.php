<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>для тестов</title>
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
    header("Location: test.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="country">Введите вашу страну:</label>
        <input type="text" id="country" name="country">
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
</body>
</html>