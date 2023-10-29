<?php
    require ("../../conn.php");

    function atualizarPergunta($conn){
        if(verificarInputs()){
            
            $id          = $_GET['idpergunta'];
            $idchecklist = $_GET['idchecklist'];
            $area        = $_POST['input-area'];
            $pergunta    = $_POST['input-pergunta'];
            $resultado   = $_POST['input-resultado'];
            $observacoes = $_POST['input-observacoes'];

            $sqlUp = "UPDATE itens SET 
            area = '$area',
            pergunta = '$pergunta',
            resultado = '$resultado',
            observacoes = '$observacoes'
            WHERE id = '$id';";

            $conn->query($sqlUp);
            
            header("location: ../checklist.php?idchecklist=" . $idchecklist);
            
        } else{
            if(isset($_GET['idchecklist'])){
                $idchecklist = $_GET['idchecklist'];
                header("location: ../checklist.php?idchecklist=" . $idchecklist . "&erro=NaoTemEssaPergu");
            }
        }
        
    }

    function verificarInputs(){
        if(
            isset($_GET['idchecklist']) &&
            isset($_POST['input-area']) &&
            isset($_POST['input-pergunta']) &&
            isset($_POST['input-resultado']) &&
            isset($_POST['input-observacoes'])
        ){return true;}
        return false;
    }

    atualizarPergunta($conn);
?>