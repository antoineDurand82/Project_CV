<?php

session_name();
session_start();


$login = $_POST['login'] ?? false;
$password = $_POST['password'] ?? false;

if ($login && $password)
{
    $database_host = 'localhost';
    $database_port = '3306';
    $database_dbname = 'cv';
    $database_user = 'root';
    $database_password = '';
    $database_charset = 'UTF8';

    $pdo = new PDO(
        'mysql:host=' . $database_host .
        ';port=' . $database_port .
        ';dbname=' . $database_dbname .
        ';charset=' . $database_charset,
        $database_user,
        $database_password
);

    $query = 'SELECT password, login FROM administrateur WHERE login = :login AND password = :password';
    $query = $pdo->prepare($query);
    $query->execute([
        'login' => $login,
        'password' => $password,
    ]);
    $user_exist = (bool) $query->fetchAll();
if ($user_exist)
{
$_SESSION['admin'] = true;
}
}
if (!empty($_SESSION['admin']))
{
header('Location: ./admin/index.php');
}

?>

<div class="main">
    <h1>Connexion administration</h1>
    <form method="POST" action="">
        <label>
            Login :<br/>
            <input type="text" name="login" />
        </label>
        <br/>
        <br/>
        <label>
            Password :<br/>
            <input type="password" name="password" />
        </label>
        <br/>
        <br/>
        <input type="submit" value="Connexion" />
    </form>
</div>

