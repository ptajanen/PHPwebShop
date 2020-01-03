<h1>Olet tilannut seuraavat tuotteet:</h1>

<?php
require("db.php");

//haetaan postauksen kentistä (namena etunimi, sukunimi, osoite...) arvot
$etunimi = $_POST["etunimi"];
$sukunimi = $_POST["sukunimi"];
$osoite = $_POST["osoite"];

//muodostetaan tilatut(ed. sivulla valuena $tilatuteteenpain)-Stringistä taulukko
$tilatut = explode(",", $_POST["tilatut"]);


//haetaan kannasta asiakkaan etunimi ja sukunimi
$query = "SELECT id_asiakas, etunimi, sukunimi FROM ASIAKAS";
//talletetaan $result-muuttujaan querylla löytynyt tulos
$asiakkaat = mysqli_query($connection, $query);

$asiakasid = NULL;
$viimeisinID = 0;

//napataan asiakasid tämänhetkisestä ajasta
while ($row = mysqli_fetch_array($asiakkaat)) {
    if($row['etunimi'] == $etunimi && $row['sukunimi'] == $sukunimi) {
        $asiakasid = $row['id_asiakas'];
    }
    $viimeisinID = $row['id_asiakas'];
}

if ($asiakasid == NULL) {
    $asiakasid = $viimeisinID;
    $asiakasid++;

//Lisätään asiakas-kantaan uusi asiakas
$sql = "INSERT INTO asiakas (id_asiakas, etunimi, sukunimi, email) VALUES ('$asiakasid', '$etunimi', '$sukunimi', '$osoite')";
if(mysqli_query($connection, $sql)){
    echo "Asiakas lisätty.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
}

//lisätään tilatut tuotteet kantaan
foreach ($tilatut as $ID_KENKA) {
    $sql2 = "INSERT INTO tilaus (id_asiakas, id_tuote) VALUES ('$asiakasid', '$ID_KENKA')";
    if(mysqli_query($connection, $sql2)){
        echo "<h2>Kengät koodilla 00$ID_KENKA</h2> ";
    } else{
        echo "ERROR: Could not able to execute $sql2. " . mysqli_error($connection);
    }
}

mysqli_close($connection);

echo "<h1> Kiitos tilauksestasi! </h1>";