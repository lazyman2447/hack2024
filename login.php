
<?php
session_start();
require_once('connection.php');

// // Простой массив пользователей для примера
// $users = [
//     'user1' => 'password1',
//     'user2' => 'password2',
// ];

// $log_in = "SELECT * FROM users ";
// $result = $link->query($log_in);

// // Получение данных из формы
// $username = $_POST['username'] ?? '';
// $password = $_POST['password'] ?? '';

// // Проверка пользователя
// if (array_key_exists($username, $users) && $users[$username] === $password) {
//     $_SESSION['username'] = $username;
//     header('Location: test.php'); // Перенаправление на главную страницу
// } else {
//     echo "Неверные учетные данные.";
// }

$login = $_POST['login'];
$password = $_POST['password'];

$check_user = "SELECT * FROM users WHERE `login` = '$login' AND `password` = '$password'";
$result = mysqli_query($link, $check_user);

if (mysqli_num_rows($result)>0){
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "login" => $user['login'],
        "trackable_goods" => $user['trackable_goods']
    ];

    header('Location: test.php');

} else {
    echo "Неверные учетные данные.";
}


?>