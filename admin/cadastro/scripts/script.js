
xhttp = new XMLHttpRequest();

xhttp.onload = function(){loadTable("tBodyUsuarios", JSON.parse(this.responseText));};


xhttp.open('POST', 'http://localhost/api/users/data');
xhttp.send();





