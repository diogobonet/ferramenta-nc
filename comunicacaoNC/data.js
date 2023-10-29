const dataSolicitacaoDiv = document.getElementById("data-solicitacao");
const dataPrazo = document.getElementById("data-prazo");
const data = new Date();

dataSolicitacaoDiv.innerHTML = `${data.getDate()}/${data.getMonth()+1}/${data.getFullYear()}`;

function calcularPrazo(dias){
    if(dias.includes('2')) dias = 2;
    else if(dias.includes('3')) dias = 3;
    else dias = 4;
    data.setDate(data.getDate() + dias);
    dataPrazo.innerHTML = `${data.getDate()}/${data.getMonth()+1}/${data.getFullYear()}`;
}