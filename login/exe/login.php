<?php
    require ("../../conn.php");

    login($conn);

    function verificarInputs(){
        return(isset( $_POST["email-input"]) && isset( $_POST["senha-input"]));
    }

    function login($conn){
        if(verificarInputs()){
            $email = $_POST["email-input"];
            $senha = $_POST["senha-input"];
    
            $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha';";
            
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                $result = $result->fetch_assoc();
                $nome = $result['nome'];
                $conn->close();

                session_start();
                $_SESSION["email_logado"] = $email;
                $_SESSION["nome_logado"] = $nome;

                header("location: ../../checklist/checklist.php");
            }else{
                $conn->close();
                header("location: ../index.html?erro=contaNaoEncontrada");
            }
        }else{
            $conn->close();
            echo "Um dos campos é inválido!";
        }
    }
?>