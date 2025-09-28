<form method="post" action="">
    <input type="text" id="username" name="username" placeholder="username" required>
    <input type="password" id="password" name="password" placeholder="password" required>
    <label for="favourite_movies">Favourite Movies:</label>
    <input type="text" id="favourite_movies" name="favourite_movies" required>
    <input type="text" id="thesaurus" name="thesaurus" placeholder="a single word" required>
    <button type="submit" name="action" value="register">Register</button>
</form>
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>