<form method="post" action="/controllers/register__controller.php">
    <input type="text" id="email" name="email" placeholder="email" required>
    <br>
    <input type="password" id="password" name="password" placeholder="password" required>
    <br>
    <button type="submit">Register</button>
</form>
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>