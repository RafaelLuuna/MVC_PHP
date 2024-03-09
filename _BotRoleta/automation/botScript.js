const exec = require('child_process').exec;
const puppeteer = require('puppeteer');

(async () => {
  function loadJSON(url){
    return fetch(url)
      .then((response)=>{
        return response.json();
      });
  } 
  const numPosition = await loadJSON('http://localhost/_BotRoleta/data/json/numPosition.json');
  let config = await loadJSON('http://localhost/_BotRoleta/data/json/config.json');


                       
  //----------Inicia o browser do game----------//
  const browser = await puppeteer.launch({headless: false, args: ['--window-size=1000,800'] , defaultViewport: {width:800,height:650}});
  const page = await browser.newPage();
  
  await page.goto(config.paths.gameUrl+'/fun?modal=auth&tab=login');

  await page.waitForSelector('[name="username"]');
  await page.type('[name="username"]', config.user.username);
  await page.type('[name="password"]', config.user.password);
  await page.click('.submit');
  
  await page.waitForSelector('#game_wrapper > iframe');
  await page.mouse.click(770,30);
  setTimeout(() => {
    page.mouse.click(75,520);
  }, 10000);
  
  //----------Inicia o browser do bot----------//
  
  const browserBot = await puppeteer.launch({headless: false, args: ['--window-size=500,800'] , defaultViewport: {width:500,height:650}});
  const pageBot = await browserBot.newPage();
  
  await pageBot.goto(config.paths.botUrl);
  
  //----------Começa a rotina do bot----------//
  
  let run = true;

  for(let run = true; run == true;){

      await pageBot.waitForSelector('[id="comando"]',{timeout:0})
      .then(()=>{
        // puxa todos os comandos encontrados e a array de números para apostar
        pageBot.evaluate(()=>{
          const divComandos = document.querySelector('[id="divComandos"]');
          const divAposta = document.querySelector('[id="divApostas"]');
          const comandos = divComandos.childNodes;
          let comando = '';
          let arrAposta = [];
          comandos.forEach((element)=>{
            if(element.id == 'comando'){
              comando = element.innerHTML;
              element.remove();
            }
          });
          
          if(comando == 'apostar'){
            divAposta.childNodes.forEach((lance)=>{
              arrAposta.push(lance.innerHTML);
            });
          }
          
          return [comando, arrAposta];
        })
        .then((response)=>{
          const comando = response[0];
          const arrAposta = response[1];

          switch(comando){
            case 'encerrar':
              browser.close();
              browserBot.close();
            case 'apostar':
              arrAposta.forEach((num)=>{
                  page.mouse.click(numPosition[num].x,numPosition[num].y)

              });
          }

        });
      });


  }




})();
