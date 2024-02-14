
xhttp = new XMLHttpRequest();

xhttp.onload = function(){
    const data = JSON.parse(this.responseText);
    const tBody = document.getElementById("tBodyUsuarios");
    

    data.forEach(element => {
        const tr = document.createElement('tr');
        const tdNome = document.createElement('td');
        const tdEmail = document.createElement('td');
        const tdActions = document.createElement('td');
        const divButtons = document.createElement('div');
        const btnAceitar = document.createElement('div');
        const btnNegar = document.createElement('div');
    
        
        btnAceitar.className = "tbl-btn green"
        btnAceitar.onclick = "";
        btnAceitar.innerHTML = '<i class="fa-solid fa-check"></i>';
        
        btnNegar.className = "tbl-btn red"
        btnNegar.innerHTML = '<i class="fa-solid fa-trash"></i>';
        
        divButtons.className = "tbl-cell";
        divButtons.appendChild(btnAceitar);
        divButtons.appendChild(btnNegar);
        
        tdActions.appendChild(divButtons);
        tdNome.innerText = element['nome'];
        tdEmail.innerText = element['email'];
        
        tr.append(tdNome);
        tr.append(tdEmail);
        tr.append(tdActions);
        
        tBody.append(tr);

    });

}

document.cookie = 'popup-1-green=Usuario aprovado; path=/';

xhttp.open('POST', 'http://localhost/admin/scripts/loadCadastros.php');
xhttp.send();





