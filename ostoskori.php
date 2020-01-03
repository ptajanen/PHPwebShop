<div class="page" id="ostoskori">
    <?php
    require("db.php");

    echo "<h1> Ostoskorissa: </h1>";

    //luodaan taas query, jolla haetaan Tuotteet-taulukosta asioita
    $query = "SELECT id_tuote, tyyppi, hinta FROM TUOTE";
    //talletetaan $result-muuttujaan querylla löytynyt tulos
    $result = mysqli_query($connection, $query);
    //tehdään $tilatut-muuttujaan array $_POST:n avulla. Tässä tallella edellisellä sivulla klikkaillut tuotteet.
    $tilatut = array_keys($_POST);

    //luodaan toistaiseksi tyhjä Stringi.
    $tilatuteteenpain = "";

     print 	"<table><tr>" .
        "<th>Kenkä</th>" .
        "<th>Hinta</th>" .
        "</tr>";

        //käydään Tietokannasta haettu taulu läpi
        while ($row2 = mysqli_fetch_array($result)) {
            //käydään $tilatut-taulu läpi
            foreach ($tilatut as $row) {
                //vertaillaan, onko käsiteltävä numero sama kuin kannan taulussa läpikäytävä numero
                if($row == $row2['tyyppi']) {
                    //jos on, printtaillaan se
                    print	"<tr id=".$row2['tyyppi'].".>" .
                        "<td>{$row2['tyyppi']}</td>" .
                        "<td style='text-align: right'>{$row2['hinta']}€</td>" .
                        "</tr>";
                    //ja lisätään tyhjään Stringiin sen ID: ja pilkku
                    $tilatuteteenpain .= $row2['id_tuote'] . ",";
                }
            }
        }
    print "</table>";
            
    ?>

    <form action="?page=tilaus" method="POST">
        <?php
        //luodaan display:none -styleinen input-kenttä, johon laitetaan valueksi muodostettu String.
		$tilatuteteenpain = rtrim($tilatuteteenpain,',');
        echo "<input type='text' name='tilatut' value='" . $tilatuteteenpain . "' style='display:none'>"
        ?>
    <input type="text" name="etunimi" id="etuinmi" placeholder="etunimesi" class="buttonit" style="width:50%">
    <input type="text" name="sukunimi" id="sukunimi" placeholder="sukunimesi" class="buttonit" style="width:50%">
    <input type="text" name="osoite" id="osoite" placeholder="osoitteesi" class="buttonit" style="width:50%">
        <br><input type="submit" value="Lähetä tilaus">
    </form>

</div>