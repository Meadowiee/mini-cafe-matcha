<?php
// just the form
?>
<form method="POST" action="controllers/auth.php?action=login">
    <h2>Login</h2>
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <button type="submit">Login</button>
</form>

<?php
if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
    echo "<p style='color:red;'>Invalid username or password.</p>";
} elseif (isset($_GET['success']) && $_GET['success'] == 'registered') {
    echo "<p style='color:green;'>Account created. Please login.</p>";
} elseif (isset($_GET['message']) && $_GET['message'] == 'loggedout') {
    echo "<p>You have been logged out.</p>";
}
?>