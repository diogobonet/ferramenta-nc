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
                            <form action='exe/atualizar.php?idchecklist=" . $result['id'] .  "' method='POST'>
                                <td class='checkbox-td'>
                                    <h5>" . $result['id'] . "</h5>
                                </td>
                                <td style='width: 50%;'>
                                    <textarea name='input-nome' class='textarea-input' id='input-nome' type='text'>" . $result['nome'] . "</textarea>
                                </td>
                                <td class='action-edit'>
                                    <a href='../checklist/checklist.php?idchecklist=" . $result['id'] . "'>Abrir</a>
                                    <button class='button-save'>Salvar</button>
                                    <a href='exe/excluir.php?idchecklist=". $result['id'] ."'>Excluir</a>
                                </td>
                            </form>                            
                        </tr>";
                }
            }else{
                echo "<h1>Nenhuma checklist criada até agora!</h1>";
            }
        }
        $conn->close();
    }
?>