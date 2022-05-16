<?php
session_start();
include_once 'conn/database.php';
global $dbconn;
//afvangen formuliervelden...
if (isset($_POST['submit'])){
    //opdracht 4 - SQL-injection: mysqli_real_escape_string()
    $inlognaam = mysqli_real_escape_string($dbconn, $_POST['inlognaam']);
    $wachtwoord = mysqli_real_escape_string($dbconn, $_POST['wachtwoord']);
}
else {
    //niet gepost...
    header('refresh: 1; login.php');
    exit();
}
//select-query met 'WHERE email='' and wachtwoord='';
$query = "SELECT id, gebruikersnaam, wachtwoord FROM personeel
            WHERE gebruikersnaam='$inlognaam' and wachtwoord='$wachtwoord';";
$result= mysqli_query($dbconn, $query);
//aantal records bepalen mysqli_num_rows($result);
$aantal = mysqli_num_rows($result);


//aantal=1 =>Programma.php...
if ($aantal==1) {
    $user=mysqli_fetch_array($result);
    // extra toevoegen: password_verify waarbij je het ingegeven ww vergelijkt met dat wat in de database staat
    if (password_verify($wachtwoord, $user["wachtwoord"])) {
        $_SESSION['ingelogd']=true;
        header('refresh: 1; programma.php');
        exit;
    }
    else {
        $_SESSION['ingelogd']=false;
        header('refresh: 1; login.php');
        exit;
    }

}
else {
    header('refresh: 1; login.php');
    exit;
}
//als het niet lukt, laat het even weten!

?>
