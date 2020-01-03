<?php
$servername = 'localhost';
$database ='harjoituskauppa';
$username = 's1900570';
$password = 'Suomi_2018';
$server = 'Opetus1';
$port = 3306;
$connection = mysqli_connect($servername, $username, $password, $database);
if (mysqli_connect_error())
{
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_set_charset($connection, 'utf8');
