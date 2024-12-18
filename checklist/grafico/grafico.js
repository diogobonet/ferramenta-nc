let root  = document.querySelector(":root");

// let botaoN  = document.getElementById('nao-btn');  
// let botaoS  = document.getElementById('sim-btn'); 
// let botaoNA = document.getElementById('na-btn');  

function atualizarValores(valor, variavelCss){


	let naoValue = document.getElementById('nao-input').value;
	let simValue = document.getElementById('sim-input').value;
	let naValue  = document.getElementById('na-input').value;

	valor = parseFloat(valor) * 360;

	let novapc = valor / (parseFloat(naValue) + parseFloat(naoValue) + parseFloat(simValue)) ;

    if(parseFloat(valor) == 0){
        console.log("Valor 0 !");
        root.style.setProperty(`${variavelCss}Prox`, `0deg`);
    }

	console.log(`Novo valor -> [${variavelCss}]: ${novapc}deg`);
    console.log(`NA: ${naValue}, NAO: ${naoValue}, SIM: ${simValue}\n\n`);

	root.style.setProperty(`${variavelCss}`, `${novapc}deg`);

}

function atualizarGrafico(){
    atualizarValores(document.getElementById('nao-input').value, '--n');
    atualizarValores(document.getElementById('sim-input').value, '--s');
    atualizarValores(document.getElementById('na-input').value, '--na');
}

atualizarGrafico();


// botaoN.addEventListener('click',  () => { atualizarGrafico(document.getElementById('nao-input').value, '--n'); })
// botaoS.addEventListener('click',  () => { atualizarGrafico(document.getElementById('sim-input').value, '--s'); })
// botaoNA.addEventListener('click', () => { atualizarGrafico(document.getElementById('na-input').value, '--na'); })