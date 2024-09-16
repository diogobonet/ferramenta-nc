<?php
    require ("../../conn.php");

    function verificarSession(){
        return isset($_SESSION["email_logado"]);
    }

    function gerarNaoConformidades($conn) {
        session_start();
        
        if(verificarSession()){
            $idchecklist = $_GET['idchecklist'];
            $sql = "SELECT * FROM itens WHERE FK_id_checklist = '$idchecklist' AND resultado = 'Não';";
            
            $query = $conn->query($sql);
            if($query->num_rows > 0){

                while($result = $query->fetch_assoc()){

                    $sql = "INSERT INTO nao_conformidades (FK_id_checklist_nc, projeto, artefato, ja_ocorreu, classificacao, acao_corretiva, FK_id_pergunta, concluido) 
                    VALUES (" . $result['FK_id_checklist'] . ",  '-', '-', 'Selecionar', 'Selecionar', '-', " . $result['id'] . ", 'Não');";
                    
                    if(!$conn->query($sql)){
                        echo "Algo deu errado! Por favor ligar para o ADM 💀";
                        return;
                    }
                }

                $conn->close();
                header("location: ../../naoConformidadeTable/naoConformidades.php?idchecklist=" . $idchecklist);
            }
            else {
                echo "<h1>Nenhuma pergunta postada até agora!</h1>";
            }
        }
    }

    gerarNaoConformidades($conn);
?>
