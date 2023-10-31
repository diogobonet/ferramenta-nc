<?php
    require ("../../conn.php");

    function atualizarPergunta($conn){
        if(verificarInputs()){
            
            $idchecklist       = $_GET['idchecklist'];
            $idnaoconformidade = $_GET['idnaoconformidade'];
            $projeto           = $_POST['input-projeto'];
            $artefato          = $_POST['input-artefato'];
            $ja_ocorreu        = $_POST['input-ja-ocorreu'];
            $classificacao     = $_POST['input-classificacao'];
            $acao_corretiva    = $_POST['input-acao-corretiva'];
            $concluido         = $_POST['input-concluido'];

            $sqlUp = "UPDATE nao_conformidades SET 
            projeto        = '$projeto',
            artefato       = '$artefato',
            ja_ocorreu     = '$ja_ocorreu',
            classificacao  = '$classificacao',
            acao_corretiva = '$acao_corretiva',
            concluido      = '$concluido'
            WHERE id = '$idnaoconformidade';";

            $conn->query($sqlUp);
            
            header("location: ../naoConformidades.php?idchecklist=" . $idchecklist);
            
        } else{
            if(isset($_GET['idchecklist'])){
                $idchecklist = $_GET['idchecklist'];
                header("location: ../naoConformidades.php?idchecklist=" . $idchecklist . "&erro=NemTodosOsInputsForamSetados");
            }
        }
        
    }

    function verificarInputs(){
        if(
            isset($_GET['idnaoconformidade']) &&
            isset($_POST['input-projeto']) &&
            isset($_POST['input-artefato']) &&
            isset($_POST['input-ja-ocorreu']) &&
            isset($_POST['input-classificacao']) &&
            isset($_POST['input-acao-corretiva']) && 
            isset($_POST['input-concluido'])
        ){return true;}
        return false;
    }

    atualizarPergunta($conn);
?>
