<?php

    //conectar com o bd
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_tecnicos_tel";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>