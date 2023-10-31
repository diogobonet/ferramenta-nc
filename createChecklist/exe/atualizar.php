<?php
    require ("../../conn.php");

    function atualizarChecklist($conn){
        if(verificarInputs()){
            
            $id   = $_GET['idchecklist'];
            $nome = $_POST['input-nome'];

            $sqlUp = "UPDATE checklist SET 
            nome = '$nome'
            WHERE id = '$id';";

            $conn->query($sqlUp);
            
            header("location: ../index.php");
            
        } else{
            header("location: ../checklist.php?erro=verificarInputsRetornouFalso");
        }
        
    }

    function verificarInputs(){
        if(
            isset($_GET['idchecklist']) &&
            isset($_POST['input-nome'])
        ){return true;}
        return false;
    }

    atualizarChecklist($conn);
?>