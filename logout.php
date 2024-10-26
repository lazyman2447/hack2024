<?php
session_start();
session_destroy(); // Удаляем сессию
header('Location: test.php'); // Перенаправление на главную страницу
?>