<?php
    require ("../../conn.php");

    function excluirChecklist($conn){
        if(isset($_GET['idchecklist']) ){
            $idchecklist = $_GET['idchecklist'];
            $sqlDel = "DELETE FROM checklist WHERE id = $idchecklist";
            $conn->query($sqlDel);
            header("location: ../index.php");
        } else{
            header("location: ../index.php?erro=NenhumIdPassadoNoGet");
        }
    }

    excluirChecklist($conn);
?>