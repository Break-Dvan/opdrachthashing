<?php
session_start();
include_once 'conn/database.php';
$ingelogd=isset($_SESSION['ingelogd']) ? $_SESSION['ingelogd'] : false;
if (!$ingelogd) {
    header('refresh=1; login.php');
}
global $dbconn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klantgegevens</title>
</head>
<body>
<?php

$query = "SELECT id, achternaam, email, postcode, straat, voornaam, woonplaats FROM klant;";
$result= mysqli_query($dbconn, $query);
//gegevens naar scherm...
echo "<h2>Klantgegevens</h2>";
?>

<table border="1">
    <!-- kop van je tabel...-->
    <tr>
        <th>id</th>
        <th>voornaam</th>
        <th>achternaam</th>
        <th>postcode</th>
        <th>straat</th>
        <th>woonplaats</th>
        <th>email</th>
    </tr>
    <?php
    while ($row=mysqli_fetch_array($result)) {
        //tr/td van je tabel...
        //echo 'Klant: '.$row['voornaam']. ' - ' . $row['achternaam']. ' Woont in: ' . $row['woonplaats'].'<br>';
        echo '<tr>
               <td>'.$row['id'].'</td>
               <td>'.$row['voornaam'].'</td>
               <td>'.$row['achternaam'].'</td>
               <td>'.$row['postcode'].'</td>
               <td>'.$row['straat'].'</td>
               <td>'.$row['woonplaats'].'</td>
               <td>'.$row['email'].'</td>
            </tr>';
    }
    //sluiten databaseconnectie
    mysqli_close($dbconn)
    or die('Sluiten MysQL-db niet gelukt...');
    ?>
</table>
</body>
</html>

