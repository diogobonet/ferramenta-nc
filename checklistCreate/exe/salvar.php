<?php
    require ("../../conn.php");

    function excluirPergunta($conn){
        $idchecklist = $_GET['idchecklist'];

        if( isset($_GET['idpergunta']) && isset($_GET['idchecklist']) ){
            $id = $_GET['idpergunta']; $idchecklist = $_GET['idchecklist'];
            $sqlDel = "UPDATE itens
            SET area = valor1, pergunta = valor2, ...
            WHERE condição;";
            $conn->query($sqlDel);
            header("location: ../checklist.php?idchecklist=" . $idchecklist);
        } else{
            header("location: ../checklist.php?idchecklist=" . $idchecklist . "&erro=NaoTemEssaPergu");
        }
        
    }

    excluirPergunta($conn);
?>