<!-- b. Luo formi ja sen sisälle taulukko (table) tuotteista tuotesivulle: Jälleen otsikot nimi, hinta ja kuvaus.
  Tee viimeiselle riville submit-button.
  Lisää lisäksi jokaiselle riville viimeiseksi checkbox. Voit lisätä MOCK-dataa, jos haluat tsekata tyylejä yms taulusta.*/ -->
  <head>
<link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="products.css">
    <link href="https://fonts.googleapis.com/css?family=Stylish" rel="stylesheet">

</head>

<body>
  <div class="page" id="products">

<?php
  require("db.php");
  $query ="SELECT id_tuote, tyyppi, kuvaus, hinta FROM TUOTE";

  $result= mysqli_query($connection, $query); 
      
          

          print "<form action=?page=ostoskori method='POST' >";

            print "<table><tr>
              <th>TuoteId</th>
              <th>Kenka</th>
              <th>Kuvaus</th>
              <th>Hinta</th>
              </tr>";
                while($row= mysqli_fetch_array($result)) {
                    print"<tr>" .
                    "<td>{$row['id_tuote']}</td>" .
                    "<td>{$row['tyyppi']}</td>" .
                    "<td>{$row['kuvaus']}</td>" .
                    "<td style='text-align: right'>{$row['hinta']}€</td>".
                    "<td><input type='checkbox' name='" .$row['tyyppi']. "' id='".$row['kuvaus']."' value='1'></td>".
                    "</tr>";
                }
            print "</table>";

              print "<input type=\"submit\" value=\"Siirrä tuotteet ostoskoriin\">";
          print "</form>";

?>
</body>

