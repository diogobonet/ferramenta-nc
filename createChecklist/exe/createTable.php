<?php
    require ("../../conn.php");

    criar($conn);

    function verificarInputs(){
        return( isset($_POST["input-checklist-name"]) && isset($_SESSION["email_logado"]) );
    }

    function criar($conn){
        session_start();

        if(verificarInputs()){
            $nome = $_POST["input-checklist-name"];
            $email = $_SESSION["email_logado"];
    
            $sql = "INSERT INTO checklist (FK_usuario_email, nome) VALUES ('$email', '$nome')";

            if(!$conn->query($sql)){
                echo "Algo deu errado! Por favor ligar para o ADM 💀";
                return;
            }
            $conn->close();
            header("location: ../index.php");
        }
        else{

            $conn->close();
            echo "Um dos campos é inválido!";
        }
    }
?>