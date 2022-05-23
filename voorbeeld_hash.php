<?php
// even een voorbeeld hoe je een wachtwoord kan hashen. Zoiets heb j nodig bij het opslaan van een nieuw wachtwoord.
$password = 'geheim';
$ww_hash = password_hash($password, PASSWORD_DEFAULT);
echo 'Password_hash: ' . $ww_hash . '<br>';

echo 'Lengte: ' . strlen($ww_hash) . '<br>';

?>