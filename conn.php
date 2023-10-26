<?php
    const host = "localhost:3306"; const dbName = "db_nc";
    const user = "x";             const pass   = "x";

    $conn = new mysqli(host, user, pass, dbName);

    if(mysqli_connect_errno()){
        echo "ERRO: " .  mysqli_connect_error();
    }

?>