let arrLances = [26,2,18,25,4,0,5,33,33,9,7,29,8,0,1,1,6,11,25,5,21,36,6,20,36,15,16,36,16,26,15,30,31,9,32,14,14,32,28,16,31,31,11,34,2,36,1,12,19,24,7,22,12,31,4,8,36,5,4,5,23,28,4,28,18,26,30,26,25,15,33,30,25,8,29,13,35,23,25,14,30,33,13,35,8,6,29,33,18,4,22,29,33,14,5,5,24,0,26,28,24,30,7,32,35,25,33,28,33,1,17,19,3,18,31,6,3,7,33,16,9,21,26,8,10,26,10,28,26,6,36,34,29,20,34,27,3,30,33,3,26,25,13,22,26,12,35,31,33,33,9,36,0,31,31,20,27,23,22,21,7,14,19,17,10,15,35,18,9,35,28,31,13,20,32,1,7,13,23,3,10,2,29,26,30,11,6,10,25,31,4,11,24,12,32,29,31,14,12,6,20,35,3,8,5,17,2,3,5,16,3,33,21,15,15,14,28,28,35,20,26,14,17,36,13,24,9,16,6,23,24,33,8,17,9,14,26,13,34,0,30,33,0,17,12,7,5,22,25,20,5,7,28,8,29,1,1,21,33,8,2,18,14,34,2,10,6,25,28,16,4,32,9,6,0,35,11,11,14,4,0,14,32,6,20,21,30,10,8,4,8,17,18,33,10,0,2,14,32,2,2,10,0,6,20,2,0,15,8,23,29,19,30,34,17,19,9,2,31,23,14,7,16,32,22,12,5,36,29,9,2,3,12,18,32,15,12,33,34,27,26,2,5,11,16,1,19,3,16,32,2,23,18,25,32,8,3,4,10,7,4,7,30,31,3,16,7,17,30,6,27,12,28,25,14,25,16,10,7,30,26,7,13,26,4,27,14,1,3,10,17,33,25,19,30,12,9,10,1,9,34,22,12,36,16,27,28,21,10,18,26,2,20,15,14,28,16,16,6,21,18,26,34,1,31,9,28,20,24,8,8,14,21,36,33,20,36,16,35,30,15,19,34,35,21,2,27,6,8,10,15,12,34,9,18,1,23,14,34,16,31,23,22,20,31,22,25,17,30,18,12,23,23,28,11,2,30,18,10,25,36,27,6,5,23,9,3,21];

const valorFicha = 2.5;


document.querySelector('#inputWins').value = 0;
document.querySelector('#inputLosts').value = 0;
document.querySelector('#inputBalanco').value = 0;
document.querySelector('#inputTotalApostado').value = 0;
document.querySelector('#inputTotalArrecadado').value = 0;
document.querySelector('#contarVitoriasDerrotas').checked = true;

let regLances = {};
let count = 0;

for(let i = arrLances.length; i > 0 ; i--){
	let apostaAtual = [];
	document.querySelector('#divApostas').childNodes.forEach((i)=>{ apostaAtual.push(parseInt(i.innerText));});
	let objLog = {
		lanceAtual:arrLances[i],
		apostaAtual:apostaAtual,
		saldoInicial:document.querySelector('#inputBalanco').value
	};
	
	const lance = arrLances[i];
	document.querySelector('#novoLance').value = lance;
	addLance();
	const contarVitDer = document.querySelector('#contarVitoriasDerrotas').checked;
	if(contarVitDer == true){
		atualizarWinsLosts(valorFicha);
	}
	sugerirAposta();
	
	objLog.saldoFinal = document.querySelector('#inputBalanco').value;
	objLog.status = document.querySelector('#ultimoStatus').innerText;
	count++;
	regLances[count] = objLog;

};

console.log(regLances);


