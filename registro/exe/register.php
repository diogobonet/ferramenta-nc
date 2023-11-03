<?php
    require ("../../conn.php");

    registrar($conn);

    function verificarInputs(){
        return(isset($_POST["nome-input"]) && isset( $_POST["email-input"]) && isset( $_POST["senha-input"]));
    }

    function registrar($conn){
        if(verificarInputs()){
            $nome = $_POST["nome-input"];
            $email = $_POST["email-input"];
            $senha = $_POST["senha-input"];
    
            $sql = "INSERT INTO usuario (email, senha, nome) VALUES ('$email', '$senha', '$nome')";
            if(!$conn->query($sql)){
                echo "Algo deu errado! Por favor ligar para o ADM 💀";
                return;
            }
            $conn->close();
            header("location: ../../login/index.html");
        }
        else{
            $conn->close();
            echo "Um dos campos é inválido!";
        }
    }
?>