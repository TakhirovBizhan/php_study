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
// Получение данных из формы
$message = $_POST['message'];
$hashtag = $_POST['hashtag'];
$author = $_POST['author'];
$channel_id = $_POST['channel_id'];


include 'db.php';

// Проверка пользователя
$user_check_sql = "SELECT id FROM users WHERE username='$author'";
$user_check_result = $conn->query($user_check_sql);

if ($user_check_result->num_rows > 0) {
    $row = $user_check_result->fetch_assoc();
    $author_id = $row["id"];
} else {

    $add_user_sql = "INSERT INTO users (username) VALUES ('$author')";
    if ($conn->query($add_user_sql) === TRUE) {

        $author_id = $conn->insert_id;
    } else {
        echo "Ошибка при добавлении пользователя: " . $conn->error;
        exit();
    }
}


$sql = "INSERT INTO messages (message, hashtag, author_id, channel_id) VALUES ('$message', '$hashtag', '$author_id', '$channel_id')";


if ($conn->query($sql) === TRUE) {
    echo "Сообщение успешно добавлено";
} else {
    echo "Ошибка при добавлении сообщения: " . $conn->error;
}


$conn->close();
?>
        </div>

    </main>
    
</body>
</html>
