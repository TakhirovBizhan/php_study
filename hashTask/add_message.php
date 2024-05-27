<!DOCTYPE html>
<html>
<head>
    <title>Добавить сообщение</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
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

    main {
        margin-top: 50px;
        padding: 50px;
        border: 1px solid black;
        background-color: azure;
        width: fit-content;
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
<body>
    <header>
    <h2 style='margin:0;'>Добавление сообщения</h2>
    <nav>
    <a href="/php_study/hashTask/index.php">главная страница</a>
    <a href="/php_study/hashTask/add_channel.php">Добавить канал</a>
    </nav>
    </header>
    <main>
    <form action="add_message_process.php" method="post">
        <label>Сообщение:
        <input type="text" name="message" required>
        </label>
        <label>Хештег:
        <input type="text" name="hashtag" required>
        </label>
        <label>Автор:
        <input type="text" name="author" required>
        </label>
        <label>Канал:
        <select name="channel_id">
            <?php
            include 'db.php';

            // Запрос на получение списка каналов
            $sql = "SELECT * FROM channels";
            $result = $conn->query($sql);

            // Вывод списка каналов в форме выбора
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["channel_name"] . "</option>";
                }
            } else {
                echo "<option value=''>Нет каналов</option>";
            }
            ?>
        </select>
        </label>
        <input type="submit" value="Отправить">
    </form>
    </main>

</body>
</html>