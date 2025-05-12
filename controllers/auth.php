<?php
include 'config.php';

$action = $_GET['action'] ?? '';

if ($action == 'signup' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        header("Location: ../signup.php?error=exists");
    } else {
        mysqli_query($connect, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        header("Location: ../login.php?success=registered");
    }
}

if ($action == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        if ($username == 'admin' && $password == 'admin') {
            header("Location: ../admin.php");
        } else {
            header("Location: ../member.php");
        }
    } else {
        header("Location: ../login.php?error=invalid");
    }
}

if ($action == 'logout') {
    session_destroy();
    header("Location: ../login.php?message=loggedout");
}
