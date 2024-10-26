<?php
session_start(); // Запускаем сессии
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #333;
            color: #fff;
            padding: 50px 60px;
            position: relative;
        }
        #auth-container {
            position: absolute;
            top: 10px;
            right: 20px;
        }
        #auth-button, #close-modal {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        #auth-button:hover, #close-modal:hover {
            background-color: #218838;
        }
        #login-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
            border-radius: 8px;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <form action="search.php" method="GET" style="display:inline;">
        <input type="text" name="query" placeholder="Поиск..." style="padding: 5px;">
        <input type="submit" value="Найти" style="padding: 5px;">
    </form>
    <div id="auth-container">
        <?php if (isset($_SESSION['user'])): ?>
            <span>Добро пожаловать, <?= htmlspecialchars($_SESSION['user']['name']) ?>!</span>
            <a href="logout.php" style="color:white; margin-left:10px;">Выйти</a>
        <?php else: ?>
            <button id="auth-button">Авторизоваться</button>
        <?php endif; ?>
    </div>
</header>

<div id="login-modal">
    <form action="login.php" method="POST">
        <input type="text" name="login" placeholder="Имя пользователя" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" value="Войти">
        <button type="button" id="close-modal">Закрыть</button>
    </form>
</div>

<script>
    const authButton = document.getElementById('auth-button');
    const loginModal = document.getElementById('login-modal');
    const closeModal = document.getElementById('close-modal');

    authButton.addEventListener('click', () => {
        loginModal.style.display = 'block';
    });

    closeModal.addEventListener('click', () => {
        loginModal.style.display = 'none';
    });

</script>

<?php

if (isset($_SESSION['user'])){
    $separator = " ";
    $string = $_SESSION['user']['trackable_goods'];

    echo"Отслеживаемые товары: ";
    //$array = explode($separator,$string);
    $array = explode($separator,$string);

    $placeholders = implode(',', array_fill(0, count($array), '?'));

    $stmt = $link->prepare("SELECT id, name, price FROM drills WHERE id IN ($placeholders)");

        // Связываем параметры
        $stmt->bind_param(str_repeat('i', count($array)), ...$array);

        // Выполняем запрос
        $stmt->execute();
        
        // Получаем результат
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['price']) . " руб.</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Нет отслеживаемых товаров.</p>";
        }
    
        // Закрываем подготовленный запрос
        $stmt->close();
}

//     // Очищаем массив
// foreach ($array as $i => $value) {
//     unset($array[$i]);
// }

?>

</body>
</html>