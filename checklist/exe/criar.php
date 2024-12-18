<?php
    require ("../../conn.php");

    function verificarInputs(){
        return( isset($_POST["input-info"]) && isset($_SESSION["email_logado"]) );
    }

    function criarPergunta($conn){
        session_start();

        if(verificarInputs()){
            $pergunta    = $_POST["input-info"];
            $idchecklist = $_GET["idchecklist"];
    
            $sql = "INSERT INTO itens (area, pergunta, resultado, observacoes, FK_id_checklist) VALUES ('-', '$pergunta', 'Selecionar', '-', $idchecklist);";

            if(!$conn->query($sql)){
                echo "Algo deu errado! Por favor ligar para o ADM 💀";
                return;
            }
            
            $conn->close();
            header("location: ../checklist.php?idchecklist=" . $idchecklist);
        }
        else{

            $conn->close();
            echo "Um dos campos é inválido!";
            header("location: ../checklist.php?idchecklist=DEUPAU");
        }
    }

    criarPergunta($conn);
?>