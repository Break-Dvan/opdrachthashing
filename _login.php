<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
</head>
<body>
<form action="_verwerken.php" method="POST">
    <label for="fInlog">Inlognaam:</label><input type="text" name="inlognaam" id="fInlog" size="45" placeholder="emailadres@xxxx.xx"><br>
    <label for="fWachtwoord">Wachtwoord: </label><input type="password" id="fWachtwoord" name="wachtwoord" size="50" placeholder="wachtwoord..."><br>
    <input type="submit" name="submit" value="login"><br>
</form>
<?php

?>

</body>
</html>

