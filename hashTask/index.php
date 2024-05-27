<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>

        nav a {

        }

        header {
            padding: 10px;
        }
        body {
            margin: 0;
            padding: 0;
        }
        main {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        section {
            width:300px;
            padding: 20px;
            border: 1px solid black;
            background-color: azure;
            display:flex;
            flex-direction: column;
            gap: 20px;
        }

        section div {
            padding: 12px;
            background-color: white;
            border:1px solid black;
            border-radius: 30px;

        }
    </style>
</head>
<body>
    <header style="display: flex; justify-content:space-between; background-color:bisque;">
        <h1>Social Network</h1>
        <nav style="display: flex; gap: 20px; align-items:center;">
            <a href="/php_study/hashTask/add_message.php">Добавить сообщение</a>
            <a href="/php_study/hashTask/add_channel.php">Добавить канал</a>
        </nav>
    </header>
    <main>
    <?php
// Подключение к базе данных
include 'db.php';

// Массив секций и их соответствующих хештегов
$sections = array(
    "Кулинария" => array("#кулинария", "#готовка", "#еда", "#вкусно"),
    "Кинематограф" => array("#кинематограф", "#актер", "#фильм", "#мультфильм"),
    "Искусство" => array("#искусство", "#картина", "#живопись", "#красота"),
    "Игры" => array("#игры", "#компьютер", "#телефон")
);

// Добавляем еще одну секцию для вывода всех сообщений
$sections["Все сообщения"] = array();

// Вывод сообщений для каждой секции
foreach ($sections as $section_name => $hashtags) {
    echo "<section>";
    echo "<h2>$section_name</h2>";
    

    $condition = "";
    if ($section_name !== "Все сообщения") {
        foreach ($hashtags as $index => $hashtag) {
            if ($index > 0) {
                $condition .= " OR ";
            }
            $condition .= "messages.hashtag='$hashtag'";
        }
    }
    
    // SQL запрос для выбора сообщений по хештегам
    $sql = "SELECT messages.message, users.username, channels.channel_name, channels.trusted
            FROM messages
            INNER JOIN users ON messages.author_id = users.id
            INNER JOIN channels ON messages.channel_id = channels.id";
    // Если есть условие, добавляем его к запросу
    if (!empty($condition)) {
        $sql .= " WHERE $condition";
    }
    
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Вывод информации о сообщении
            echo "<div>";
            echo "<p><strong>Сообщение:</strong> " . $row["message"] . "</p>";
            echo "<p><strong>Автор:</strong> " . $row["username"] . "</p>";
            echo "<p><strong>Канал:</strong> " . $row["channel_name"];
            if ($row["trusted"] == 1) {
                echo " (Доверенный)";
            } else {
                echo " (Не доверенный)";
            }
            echo "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Нет сообщений</p>";
    }
    echo "</section>";
}
?>
</main>
<footer></footer>
</body>
</html>