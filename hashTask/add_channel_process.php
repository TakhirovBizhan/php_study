<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECK</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        margin: auto;
    }
    header {
        background-color:bisque;
        padding: 20px;
        display: flex;
        justify-content: space-between;
    }

    nav {
        display: flex;
        gap: 20px;
    }

    div {
        width: fit-content;
        margin: auto;
        margin-top: 50px;
        padding: 50px;
        border: 1px solid black;
        background-color: azure;
        width: fit-content;
        align-items:center;
        justify-content: center;
        font-size: 24px;
        font-weight: 600;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    form label {
        display: flex;
        justify-content: space-between; 
        gap: 5px;
    }

</style>
</head>
<body>
<header style="display: flex; justify-content:space-between; background-color:bisque;">
        <h1>Social Network</h1>
        <nav style="display: flex; gap: 20px; align-items:center;">
            <a href="/php_study/hashTask/add_message.php">Добавить сообщение</a>
            <a href="/php_study/hashTask/add_channel.php">Добавить канал</a>
            <a href="/php_study/hashTask/index.php">вернуться на главную</a>
        </nav>
    </header>
    <main>
        <div>
        <?php
        
include 'db.php';

$channel_name = $_POST['channel_name'];
$trusted = isset($_POST['trusted']) ? 1 : 0;

$sql = "INSERT INTO channels (channel_name, trusted) VALUES ('$channel_name', '$trusted')";

if ($conn->query($sql) === TRUE) {
    echo "Канал успешно добавлен";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
        </div>
    </main>
</body>
</html>

