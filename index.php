<?php
/*Teemana on jälleen yksinkertaistettu versio verkkokaupasta.
Luo heti myös neljä uutta tiedostoa tuotteet.php, ostoskori.php, tilaus.php sekä palaute.php.
Ostoskorissa ja tilaussivulla ei tarvitse olla vielä sisältöä, mutta toteuta navigointi niin,
että voit selata sekä tuotesivun, ostoskorin että palautesivun välillä.*/

ini_set('default_charset', 'UTF-8');
require("db.php");

/*-Luo PHP-osion alkuun muuttuja ja hae sille arvo page-kohdasta (näkyy myös osoiterivillä):
-$page=isset($_GET['page'])?$_GET['page']:’etusivu';
lauseessa on IF – ELSE rakenne: IF page-data on asetetttu ? Annetaan muuttujalle arvo tästä page-kohdasta :  ELSE annetaan sille
arvo ’etusivu’ */
$page=isset($_GET['page'])?$_GET['page']:'frontPage';


?>

<!-- a. Luo sivu index.php, jossa header, nav, main ja footer-->
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="tyylit.css">
    <link href="https://fonts.googleapis.com/css?family=Stylish" rel="stylesheet">
</head>


<header>

<div id="kauppa">
        <img src="kuvat/kauppa.jpg" alt="KenkäKauppa" />
        </div>
    <h1>TuontiKengät Turunen</h1>
    <div style="clear: both"></div>
</header>

  <nav>
  <!--Voit käyttää yhteistä headeria ja footeria näillä sivuilla eli toteuta navigointi seuraavasti:
 -Lisää navigointiin määrittelyt, joissa asetetaan URL:iin tietokenttä esim.page ja sille dataa-->

    <a href="<?php echo "?page=index"; ?>"><?php echo "ETUSIVU"; ?></a>
    <a href="<?php echo "?page=products"; ?>"><?php echo "KENGÄT"; ?></a>
<!--     <a href="<?php echo "?page=tilaus"; ?>"><?php echo "TILAUS"; ?></a> -->
    <a href="<?php echo "?page=ostoskori"; ?>"><?php echo "OSTOSKORI"; ?></a>
    <a href="<?php echo "?page=palaute"; ?>"><?php echo "PALAUTE"; ?></a>    
  </nav>

  <main>
  <!-- -Tämän jälkeen voit iffitellä mainissa esim. container-divin sisällä, mikä sivuista näytetään:
 if ($page==”etusivu") { include(”tuotteet.php"); } -->

  <div id="container">
        <?php if($page=="index"){
            include("frontPage.php");
        }
        if($page=="products") {
          include("products.php");
      }
        if($page=="tilaus") {
            include("tilaus.php");
        }
        if($page=="ostoskori"){
          include("ostoskori.php");
        }
            if($page=="palaute"){
              include("palaute.php");
        } ?>
    </div>

  </main>
  <footer>
          <h3>TuontiKengät Turunen by </h3>
        <img src="kuvat/PianLogo.gif" alt="PiiPe"/>
    
  </footer>
 
</html>
 
 
 

<!-- c. Tee Palaute-sivulle formi, jossa pyydät etunimen, sukunimen ja tekstikentän,
    johon voi kirjoittaa vapaasti palautetta. Lisää myös lähetä-buttoni.
d. Tyylittele sivut kivannäköisiksi!!! */ -->

