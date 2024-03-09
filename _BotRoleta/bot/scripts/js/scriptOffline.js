function loadJSON(url){
    return fetch(url)
      .then((response)=>{
        return response.json();
      });
} 

const inputNovoLance = document.querySelector('#novoLance');
const inputLeitura = document.querySelector('#leitura');

inputNovoLance.addEventListener('keydown',(event)=>{
  if(event.key == 'Enter'){
    const contarVitDer = document.querySelector('#contarVitoriasDerrotas').checked;
    addLance();
    if(contarVitDer == true){
      atualizarWinsLosts();

    }
  }
});

document.addEventListener('click',()=>{
  sugerirAposta();
});
document.addEventListener('keyup',()=>{
  sugerirAposta();
});

// Verifica se o a aposta é vencedora, então adicioa win ou lost.
function atualizarWinsLosts(valorFicha = 2.5){
  const divApostas = document.querySelector('#divApostas');
  const apostas = divApostas.childNodes;
  let arrApostas = [];
  apostas.forEach((aposta)=>{
      arrApostas.push(parseInt(aposta.innerHTML));
  });

  function verificarAposta(newNum){
    if(arrApostas.find((aposta)=>aposta == newNum) == newNum){
        return true;
    }else{
        return false;
    }
  }
  try{
    const lastNum = parseInt(document.querySelector('#divLances').firstChild.firstChild.innerHTML);
    const inputWins = document.querySelector('#inputWins');
    const inputLosts = document.querySelector('#inputLosts');
    
    const inputUltimoStatus = document.querySelector('#ultimoStatus');
    
    const inputBalanco = document.querySelector('#inputBalanco');
    let inputBalancoValue = parseInt(inputBalanco.value);
    
    const totalApostado = document.querySelector('#inputTotalApostado');
    let totalApostadoSaldoValue = parseInt(totalApostado.value);
    const totalArrecadado = document.querySelector('#inputTotalArrecadado');
    let totalArrecadadoSaldoValue = parseInt(totalArrecadado.value);
  
    inputBalancoValue -= valorFicha*arrApostas.length;
    totalApostadoSaldoValue -= valorFicha*arrApostas.length;
    

    if(verificarAposta(lastNum) == true){
        wins = parseInt(inputWins.value)+1;
        inputWins.value = wins;
        inputBalancoValue += valorFicha*36;
        totalArrecadadoSaldoValue += valorFicha*36;
        inputUltimoStatus.innerText = 'win';
      }else if(arrLances.length > 0){
        losts = parseInt(inputLosts.value)+1;
        inputLosts.value = losts;
        inputUltimoStatus.innerText = 'lost';

    }

    inputBalanco.value = inputBalancoValue;
    totalApostado.value = totalApostadoSaldoValue;
    totalArrecadado.value = totalArrecadadoSaldoValue;



  }catch(err){
    console.log('Erro ao verificar vitória/derrota');
    console.error(err);
  }
}


function addComando(prompt){
    const divComandos = document.querySelector('[id="divComandos"]');
    const comando = document.createElement('div');

    comando.id = "comando";
    comando.innerText = prompt;

    divComandos.appendChild(comando);
}

function addLance(){
    const divLances = document.querySelector('[id="divLances"]');
    const divNovoLance = document.createElement('div');
    const numNovoLance = document.createElement('p');
    const clsBtn = document.createElement('input');

    const num = document.querySelector('[id="novoLance"]').value;

    if(num == ''){
        return;
    }

    numNovoLance.innerText = num;

    clsBtn.setAttribute("onclick",'this.parentNode.remove(); sugerirAposta();')
    clsBtn.setAttribute("type",'button')
    clsBtn.setAttribute("value",'x')
    clsBtn.style.height = '17px';
    clsBtn.style.width = '17px';
    clsBtn.style.border = 'none';
    clsBtn.style.borderRadius = '4px';
    clsBtn.style.backgroundColor = 'light-gray';

    divNovoLance.append(numNovoLance);
    divNovoLance.append(clsBtn);
    divNovoLance.style.display = 'flex';

    divLances.insertBefore(divNovoLance, divLances.firstChild);
    // if(divLances.childElementCount > 10){
    //     divLances.lastChild.remove();
    // }

    document.querySelector('[id="novoLance"]').value = '';
    

}

// ------------------------------------config------------------------------------ //


function getConfig(){
  let leitura = document.querySelector('#leitura').value;
  const opostos = document.querySelector('#opostos').checked;
  const mesmoFinal = document.querySelector('#mesmoFinal').checked;
  const cavalos = document.querySelector('#cavalos').checked;
  const vizinhos = parseInt(document.querySelector('#vizinhos').value);

  if(leitura ==  ''){
    leitura = 0;
  }

  let param = [];

  if(opostos==true){
    param.push('"opostos"');
  }
  if(mesmoFinal==true){
    param.push('"mesmoFinal"');
  }
  if(cavalos==true){
    param.push('"cavalos"');
  }
  if(vizinhos>0){
    param.push(`"vizinhos"`);
  }

  param = '['+param.toString()+']';


  return JSON.parse(`{
      "user":{
          "username": "daniellunatec@gmail.com",
          "password": "Da10203040"
      },
      "bot":{
          "leitura":${parseInt(leitura)},
          "vizinhos":${parseInt(vizinhos)},
          "params":${param}
      },
      "paths": {
          "botUrl": "http://localhost/_BotRoleta/bot",
          "gameUrl": "https://blaze-7.com/pt/games/immersive-roulette/"
      }
    }`);

}


// ------------------------------------------------------------------------------ //

function sugerirAposta(){
    // const lancesGuide = await loadJSON('http://localhost/_BotRoleta/data/json/lancesGuide.json');
    // const config = await loadJSON('http://localhost/_BotRoleta/data/json/config.json');
    
    const lancesGuide = JSON.parse(`{
        "ordem": {
          "1":0,
          "3":15,
          "2":32,
          "4":19,
          "5":4,
          "6":21,
          "7":2,
          "8":25,
          "9":17,
          "10":34,
          "11":6,
          "12":27,
          "13":13,
          "14":36,
          "15":11,
          "16":30,
          "17":8,
          "18":23,
          "19":10,
          "20":5,
          "21":24,
          "22":16,
          "23":33,
          "24":1,
          "25":20,
          "26":14,
          "27":31,
          "28":9,
          "29":22,
          "30":18,
          "31":29,
          "32":7,
          "33":28,
          "34":12,
          "35":35,
          "36":3,
          "37":26
        },
        "0": {
           "cor": "verde",
           "pos": 1,
           "opostos": [5],
           "mesmoFinal": [0,10,20,30]
        },
        "1": {
          "cor": "vermelho",
          "pos": 24,
           "opostos": [3],
           "mesmoFinal": [1,11,21,31]
        },
        "2": {
          "cor": "preto",
          "pos": 7,
           "opostos": [8],
           "mesmoFinal": [2,12,22,32]
        },
        "3": {
          "cor": "vermelho",
          "pos": 36,
           "opostos": [1],
           "mesmoFinal": [3,13,23,33]
        },
        "4": {
          "cor": "preto",
          "pos": 5,
           "opostos": [6],
           "mesmoFinal": [4,14,24,34]
        },
        "5": {
          "cor": "vermelho",
          "pos": 20,
           "opostos": [0,11],
           "mesmoFinal": [5,15,25,35]
        },
        "6": {
          "cor": "preto",
          "pos": 11,
           "opostos": [4],
           "mesmoFinal": [6,16,26,36]
        },
        "7": {
          "cor": "vermelho",
          "pos": 32,
           "opostos": [9],
           "mesmoFinal": [7,17,27]
        },
        "8": {
          "cor": "preto",
          "pos": 17,
           "opostos": [2,14],
           "mesmoFinal": [8,18,28]
        },
        "9": {
          "cor": "vermelho",
          "pos": 28,
           "opostos": [7],
           "mesmoFinal": [9,19,29]
        },
        "10": {
          "cor": "preto",
          "pos": 19,
           "opostos": [12],
           "mesmoFinal": [0,10,20,30]
        },
        "11": {
          "cor": "preto",
          "pos": 15,
           "opostos": [5,17],
           "mesmoFinal": [1,11,21,31]
        },
        "12": {
          "cor": "vermelho",
          "pos": 34,
           "opostos": [10],
           "mesmoFinal": [2,12,22,32]
        },
        "13": {
          "cor": "preto",
          "pos": 13,
           "opostos": [15],
           "mesmoFinal": [3,13,23,33]
        },
        "14": {
          "cor": "vermelho",
          "pos": 26,
           "opostos": [8,20],
           "mesmoFinal": [4,14,24,34]
        },
        "15": {
          "cor": "preto",
          "pos": 3,
           "opostos": [13],
           "mesmoFinal": [5,15,25,35]
        },
        "16": {
          "cor": "vermelho",
          "pos": 22,
           "opostos": [18],
           "mesmoFinal": [6,16,26,36]
        },
        "17": {
          "cor": "preto",
          "pos": 9,
           "opostos": [11,23],
           "mesmoFinal": [7,17,27]
        },
        "18": {
          "cor": "vermelho",
          "pos": 30,
           "opostos": [16],
           "mesmoFinal": [8,18,28]
        },
        "19": {
          "cor": "vermelho",
          "pos": 4,
           "opostos": [21],
           "mesmoFinal": [9,19,29]
        },
        "20": {
          "cor": "preto",
          "pos": 25,
           "opostos": [14,26],
           "mesmoFinal": [0,10,20,30]
        },
        "21": {
          "cor": "vermelho",
          "pos": 6,
           "opostos": [1],
           "mesmoFinal": [1,11,21,31]
        },
        "22": {
          "cor": "preto",
          "pos": 29,
           "opostos": [2],
           "mesmoFinal": [2,12,22,32]
        },
        "23": {
          "cor": "vermelho",
          "pos": 18,
           "opostos": [17,29],
           "mesmoFinal": [3,13,23,33]
        },
        "24": {
          "cor": "preto",
          "pos": 21,
           "opostos": [22],
           "mesmoFinal": [4,14,24,34]
        },
        "25": {
          "cor": "vermelho",
          "pos": 8,
           "opostos": [27],
           "mesmoFinal": [5,15,25,35]
        },
        "26": {
          "cor": "preto",
          "pos": 37,
           "opostos": [20,32],
           "mesmoFinal": [6,16,26,36]
        },
        "27": {
          "cor": "vermelho",
          "pos": 12,
           "opostos": [25],
           "mesmoFinal": [7,17,27]
        },
        "28": {
          "cor": "preto",
          "pos": 33,
           "opostos": [30],
           "mesmoFinal": [8,18,28]
        },
        "29": {
          "cor": "preto",
          "pos": 31,
           "opostos": [23,35],
           "mesmoFinal": [9,19,29]
        },
        "30": {
          "cor": "vermelho",
          "pos": 16,
           "opostos": [28],
           "mesmoFinal": [0,10,20,30]
        },
        "31": {
          "cor": "preto",
          "pos": 27,
           "opostos": [33],
           "mesmoFinal": [1,11,21,31]
        },
        "32": {
          "cor": "vermelho",
          "pos": 2,
           "opostos": [26],
           "mesmoFinal": [2,12,22,32]
        },
        "33": {
          "cor": "preto",
          "pos": 23,
           "opostos": [31],
           "mesmoFinal": [3,13,23,33]
        },
        "34": {
          "cor": "vermelho",
          "pos": 10,
           "opostos": [36],
           "mesmoFinal": [4,14,24,34]
        },
        "35": {
          "cor": "preto",
          "pos": 35,
           "opostos": [29],
           "mesmoFinal": [5,15,25,35]
        },
        "36": {
          "cor": "vermelho",
          "pos": 14,
           "opostos": [34],
           "mesmoFinal": [6,16,26,36]
        }
     }`);
    const config = getConfig();




    function carregarTabelaNumeros(numerosAtivos = []){
        const divTabela = document.querySelector('[id=tabela]');
        const divZero = document.createElement('div');
        const pZero = document.createElement('p');
        let divCol = document.createElement('div');
        
        divTabela.innerHTML = '';
        
        pZero.innerText = '0';
        divZero.appendChild(pZero);
        
        divZero.classList.add("zero");
        if(numerosAtivos.find((i)=>i == 0) == 0){
            divZero.classList.add(lancesGuide[0].cor);
            }else{
                divZero.classList.add("cinza");
        }
        
        divCol.classList.add("col");
        divCol.appendChild(divZero);
        
        divTabela.appendChild(divCol);
        
        
        
        let count = 0;
        for(let col = 0; col < 12; col++){
            let divCol = document.createElement('div');
            let divNumContainer = document.createElement('div');
            
            for(let num = 0; num <3; num++){
                let divNum = document.createElement('div');
                let pNum = document.createElement('p');
        
                count++;
        
                pNum.innerText = count;
                divNum.appendChild(pNum);
        
                divNum.classList.add("num");
                if(numerosAtivos.find((i)=>i == count) == count){
                    divNum.classList.add(lancesGuide[count].cor);
                }else{
                    divNum.classList.add("cinza");
                }
        
                divNumContainer.insertBefore(divNum, divNumContainer.firstChild);
        
            }
            divCol.appendChild(divNumContainer);
            divTabela.appendChild(divCol);
        
        }
        
    
    }
    
    function sugestao(){
        const divLances = document.querySelector('[id="divLances"]');
        const childrens = divLances.childNodes;
        let arrLances = [];
        let count = 0;
    
        // inclue os últimos lances na arrLances de acotdo com o parâmetro de 'leitura' do bot
        childrens.forEach((lance)=>{
            count++;
            if(count<=config.bot.leitura){
                arrLances.push(parseInt(lance.firstChild.innerText));
            }
        });
        

        // arrTemp será uma grande array que concatena todas as sugestões dos últimos 3 números
        let arrTemp = [];
        
        // essasa funções são análises mais complexas que não estão no lancesGuide
        // function getCavalos(){

        //   if(arrLances.length < config.bot.leitura){
        //     return [];
        //   }

        //   let tabCavalos = [[0,3],[1,4],[2,5],[3,6],[7,0],[8,1],[9,2],[4,7],[5,8],[6,9]];
        //   let arrCavalos = tabCavalos;
          
        //   tabCavalos.forEach((cavalo)=>{
        //     arrLances.forEach((lance)=>{
        //       let mesmoFinalLance = lancesGuide[lance]['mesmoFinal'].toString();
        //       let mesmoFinalCavalo0 = lancesGuide[cavalo[0]]['mesmoFinal'].toString();
        //       let mesmoFinalCavalo1 = lancesGuide[cavalo[1]]['mesmoFinal'].toString();
        //       if(mesmoFinalLance !== mesmoFinalCavalo0 && mesmoFinalLance !== mesmoFinalCavalo1){
        //         arrCavalos = arrCavalos.filter((x)=>{return x !== cavalo});
        //       }
        //     });
        //   });
          
        //   arrCavalos.forEach((cavalo, index)=>{
        //     cavalo.forEach((x,i)=>{
        //       arrCavalos[index][i] = lancesGuide[x]['mesmoFinal']
        //     });
        //   });       
          
        //   let arrFinal = [];
        //   arrCavalos.forEach((cavalo)=>{
        //     cavalo.forEach((x)=>{
        //       arrFinal = arrFinal.concat(x);
        //     });
        //   });    


        //   return arrFinal;
        // }

        function getVizinhos(lance){
          let arrVizinhos = [];
          for(let vizinho = -config.bot.vizinhos; vizinho <= config.bot.vizinhos; vizinho++){
            let pos = parseInt(lancesGuide[lance]['pos']) + vizinho;
            if(pos <=0){
              pos += 37;
            }
            if(pos >37){
              pos -= 37;
            }
            arrVizinhos.push(lancesGuide.ordem[pos]);                    
            
          }
          return arrVizinhos;
        }


        // esse loop utiliza os dados da arrLances para adicionar as sugestões de aposta dentro da arrTemp considerando os parâmetros configurados
        arrLances.forEach((lance)=>{
            config.bot.params.forEach((param)=>{
              switch(param){
                default:
                  arrTemp = arrTemp.concat(lancesGuide[lance][param]);
                case 'vizinhos':
                    if(getVizinhos(lance) !== undefined){
                      arrTemp = arrTemp.concat(getVizinhos(lance));
                    }
                case 'cavalos':
                  if(getCavalos() !== undefined){
                    arrTemp = arrTemp.concat(getCavalos());                
                  }
              }
            });
        });
        
        // passa por todas as sugestões e adiciona para "arrFinal" apenas os valores únicos
        let arrFinal = [];
        arrTemp.forEach((i)=>{
            if(arrFinal.find((numAtual)=> numAtual == i) == undefined){
                arrFinal.push(i);
            }
        })

        return arrFinal;

    }

    arrAposta = sugestao();
    
    const divAposta = document.querySelector('[id="divApostas"]');
    divAposta.innerHTML = '';
    
    arrAposta.forEach((num)=>{
        let numAposta = document.createElement('div');
        numAposta.innerHTML = num;
        divAposta.appendChild(numAposta);
    });
    
    const pQntApostas = document.querySelector('[id="qntApostas"]');
    pQntApostas.innerText = arrAposta.length;

    carregarTabelaNumeros(arrAposta);

}

sugerirAposta();
