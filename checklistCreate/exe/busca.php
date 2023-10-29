<?php
    require ("../conn.php");

    function verificarInput(){
        return isset($_SESSION["email_logado"]);
    }

    function buscarPergunta($conn, $idchecklist) {
        if(verificarInput()){
            $sql = "SELECT * FROM itens WHERE FK_id_checklist = '$idchecklist';";
    
            $query = $conn->query($sql);
            if($query->num_rows > 0){
                $selectedSim = ""; $selectedNao = ""; $selectedNA = "";
                while($result = $query->fetch_assoc()){

                    if($result['resultado'] == "Sim") {
                        $selectedSim = "selected";
                    }
                    elseif($result['resultado'] == "Não") {
                        $selectedNao = "selected";
                    }
                    else {
                        $selectedNA = "selected";
                    }
                    
                    echo "<form action='exe/atualizar.php?idpergunta=" . $result['id'] . "&idchecklist=" . $result['FK_id_checklist'] .  "' class='perguntas-tr' method='POST'>
                        <td class='checkbox-td' style='width: 5%;'>
                            <h5> " . $result['id'] . "</h5>
                        </td>
                        <td style='width: 10%;'>
                            <textarea name='input-area' class='textarea-input' id='input-area' type='text'>" . $result['area'] . "</textarea>
                        </td>
                        <td style='width: 30%;'>
                            <textarea name='input-pergunta' class='textarea-input' id='input-pergunta' type='text'>" . $result['pergunta'] . "</textarea>
                        </td>
                        <td style='width: 5%;'>
                            <select name='input-resultado' id='input-resultado'>
                                <option value='Sim' $selectedSim>Sim</option>
                                <option value='Não' $selectedNao>Não</option>
                                <option value='N/A' $selectedNA>N/A</option>
                            </select>
                        </td>
                        <td style='width: 30%;'>
                            <textarea name='input-observacoes' class='textarea-input' id='input-observacoes' type='text'>" . $result['observacoes'] . "</textarea>
                        </td>
                        <td class='action-edit'>
                            <button>Salvar</button>
                            <a href='exe/excluir.php?idpergunta=" . $result['id'] . "&idchecklist=" . $result['FK_id_checklist'] . "'>Excluir</a>
                        </td>
                    </form>";
                }
            }else{
                echo "<h1>Nenhuma pergunta postada até agora!</h1>";
            }
        }
    }
?>