function loadJSON(url){
    return fetch(url)
      .then((response)=>{
        return response.json();
      });
} 

inputNovoLance.addEventListener('keydown',(event)=>{
    if(event.key == 'Enter'){
      const contarVitDer = document.querySelector('#contarVitoriasDerrotas').checked;
      addLance();
        // Verifica se o a aposta é vencedora, então adicioa win ou lost.
        if(contarVitDer == true){
          try{
              const lastNum = parseInt(document.querySelector('#divLances').firstChild.firstChild.innerHTML);
              const inputWins = document.querySelector('#inputWins');
              const inputLosts = document.querySelector('#inputLosts');
    
              if(verificarAposta(lastNum) == true){
                  wins = parseInt(inputWins.value)+1;
                  inputWins.value = wins;
              }else{
                  losts = parseInt(inputLosts.value)+1;
                  inputLosts.value = losts;
      
              }
          }catch(err){
              console.log('Erro ao verificar vitória/derrota: '+err);
          }
  
        }
    }
  });
  
  document.addEventListener('click',()=>{
    sugerirAposta();
  });
  document.addEventListener('keyup',()=>{
    sugerirAposta();
  });
  


function addComando(prompt){
    const divComandos = document.querySelector('[id="divComandos"]');
    const comando = document.createElement('div');

    comando.id = "comando";
    comando.innerText = prompt;

    divComandos.appendChild(comando);
}

function verificarAposta(newNum){
    const divApostas = document.querySelector('#divApostas');
    const apostas = divApostas.childNodes;
    let arrApostas = [];
    apostas.forEach((aposta)=>{
        arrApostas.push(parseInt(aposta.innerHTML));
    });
    console.log(arrApostas);
    console.log(newNum);
    console.log(arrApostas.find((aposta)=>aposta == newNum));

    if(arrApostas.find((aposta)=>aposta == newNum) == newNum){
        return true;
    }else{
        return false;
    }
}

function addLance(){
    const divLances = document.querySelector('[id="divLances"]');
    const divNovoLance = document.createElement('div');
    const numNovoLance = document.createElement('p');
    const clsBtn = document.createElement('input');

    const num = document.querySelector('[id="novoLance"]').value;

    if(num == ''){
        alert('digite algum valor');
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
    if(divLances.childElementCount > 10){
        divLances.lastChild.remove();
    }

    document.querySelector('[id="novoLance"]').value = '';
    

}


// ################################################INCLUIR getConfig() aqui###############################


async function sugerirAposta(){
    const lancesGuide = await loadJSON('http://localhost/_BotRoleta/data/json/lancesGuide.json');
    const config = await loadJSON('http://localhost/_BotRoleta/data/json/config.json');



    async function carregarTabelaNumeros(numerosAtivos = []){
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
    
    async function sugestao(){
        const divLances = document.querySelector('[id="divLances"]');
        const childrens = divLances.childNodes;
        let arrLances = [];
        let count = 0;
    
        // inclue os últimos n lances na arrLances
        childrens.forEach((lance)=>{
            count++;
            if(count<=config.bot.leitura){
                arrLances.push(parseInt(lance.firstChild.innerText));
            }
        });
        
        // utiliza os dados da arrLances para adicionar as sugestões de aposta dentro da arrTemp considerando os parâmetros configurados
        // arrTemp será uma grande array que concatena todas as sugestões dos últimos 3 números
        let arrTemp = [];
        arrLances.forEach((lance)=>{
            config.bot.params.forEach((param)=>{
                arrTemp = arrTemp.concat(lancesGuide[lance][param]);
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

    arrAposta = await sugestao();
    
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
