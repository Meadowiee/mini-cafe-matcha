<?php
// just the form
?>
<form method="POST" action="controllers/auth.php?action=signup">
    <h2>Sign Up</h2>
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <button type="submit">Register</button>
</form>

<?php
if (isset($_GET['error']) && $_GET['error'] == 'exists') {
    echo "<p style='color:red;'>Username already taken.</p>";
}
?>
