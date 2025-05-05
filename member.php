<?php
include 'controllers/config.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<p>This page is only accessible to logged-in users.</p>
<a href="controllers/auth.php?action=logout">Logout</a>
