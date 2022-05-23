<?php
session_start();
include_once 'conn/database.php';
global $dbconn;
//afvangen formuliervelden...
if (isset($_POST['submit'])){
    $inlognaam = mysqli_real_escape_string($dbconn, $_POST['inlognaam']);
    $wachtwoord = mysqli_real_escape_string($dbconn, $_POST['wachtwoord']);
    $_SESSION['ingelogd']=true;
}
else {
    //niet gepost...
    header('refresh: 1; login.php');
    exit();
}
//select-query met 'WHERE email='' and wachtwoord='';
$query = "SELECT id, gebruikersnaam, ww_hash FROM personeel
            WHERE gebruikersnaam='$inlognaam';";
$result= mysqli_query($dbconn, $query);

//aantal records bepalen mysqli_num_rows($result);
$aantal = mysqli_num_rows($result);
echo 'AANTAL: ' .  $aantal . '<br>';

//aantal=1 =>Programma.php...
if ($aantal==1) {
    // nieuw: gehashed ww koppelen
    $user=mysqli_fetch_array($result);
    // ingevoerde ww vergelijken met de hash uit de database
    if (password_verify($wachtwoord, $user["ww_hash"])) {
        $_SESSION['ingelogd'] =true;
        header('refresh: 1; programma.php');
        exit;
    }
    else {
        $_SESSION['ingelogd'] =false;
        header('refresh: 1; login.php');
        exit;
    }
}
else { // zelfde als eerst
    header('refresh: 1; login.php');
    exit;
}
//als het niet lukt, laat het even weten!

?>
