<?php
    require ("../conn.php");

    function verificarInput(){
        return isset($_SESSION["email_logado"]);
    }

    function getChecklists($conn){

        if(verificarInput()){
            $email = $_SESSION["email_logado"];
    
            $sql = "SELECT * FROM checklist WHERE FK_usuario_email = '$email';";

            $query = $conn->query($sql);
            if($query->num_rows > 0){
                while($result = $query->fetch_assoc()){
                    echo "<tr class='perguntas-tr'>
                            <td class='checkbox-td'>
                                <h5>" . $result['id'] . "</h5>
                            </td>
                            <td>" . $result['nome'] . "</td>
                            <td class='action-edit'>
                                <a href='../checklistCreate/checklist.php?idchecklist=" . $result['id'] . "'>Abrir</a>
                                <a href=''>Editar</a>
                                <a href=''>Excluir</a>
                            </td>
                        </tr>";
                }
            }else{
                echo "<h1>Nenhuma checklist criada até agora!</h1>";
            }
        }
        $conn->close();
    }
?>