<?php
session_start();
include_once 'conn/database.php';
global $dbconn;
//afvangen formuliervelden...
if (isset($_POST['submit'])){
    $inlognaam = $_POST['inlognaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $_SESSION['ingelogd']=true;
}
else {
    //niet gepost...
    header('refresh: 1; _login.php');
    exit();
}
//select-query met 'WHERE email='' and wachtwoord='';
$query = "SELECT id, gebruikersnaam, wachtwoord FROM personeel
            WHERE gebruikersnaam='$inlognaam' and wachtwoord='$wachtwoord';";
$result= mysqli_query($dbconn, $query);

//aantal records bepalen mysqli_num_rows($result);
$aantal = mysqli_num_rows($result);
echo 'AANTAL: ' .  $aantal . '<br>';

//aantal=1 =>Programma.php...
if ($aantal==1) {
    header('refresh: 1; _programma.php');
    exit;
}
else {
    header('refresh: 1; _login.php');
    exit;
}
//als het niet lukt, laat het even weten!

?>
