<?php
require_once('connection.php');

// Получение поискового запроса
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Экранирование специальных символов для предотвращения SQL-инъекций
$query = $link->real_escape_string($query);

// Выполнение SQL-запроса
$sql = "SELECT * FROM drills WHERE name LIKE '%$query%'";
$result = $link->query($sql);

// Проверка и вывод результатов
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo 'Результат: ' . $row['name'] . '<br>';
        echo 'Цена' . $row['price']. '<br>';
    }
} else {
    echo "Нет результатов.";
}

$link->close();
?>