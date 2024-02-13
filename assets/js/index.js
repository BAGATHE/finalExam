requestDataBase();


function sendData(form) {
  var xhr; 
  try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
  catch (e) 
  {
      try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
      catch (e2) 
      {
         try {  xhr = new XMLHttpRequest();  }
         catch (e3) {  xhr = false;   }
       }
  }
    // Liez l'objet FormData et l'élément form
    var formData = new FormData(form);
    // Configurez la requête
    xhr.open("POST","../../pages/traitement/form.php");
    // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
    xhr.send(formData);

  xhr.onreadystatechange = ()=>{
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            var retour = xhr.responseText;
            if (retour==="success") {
              alert("insertion reussi");
            }
        }else{
           // h1.innerHTML = "error" + xhr.status;
        }
    }
    }
}

window.addEventListener("load", function () {
    var form = document.getElementById("produit");
    // … et prenez en charge l'événement submit.
    form.addEventListener("submit", function (event) {
      event.preventDefault(); // évite de faire le submit par défa
      sendData(form);
      location.reload();      
    });
  });
  

  function requestDataBase(){
    var tbody = document.querySelector('.tbd');
    var xhr;
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
  catch (e) {
    try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
  catch (e2) {
   try {  xhr = new XMLHttpRequest();  }
   catch (e3) {  xhr = false;   }
 }
}

xhr.open("GET", "../../pages/traitement/getData.php",true); 
xhr.send(null);


xhr.onreadystatechange = ()=>{
if (xhr.readyState == 4) {
    if (xhr.status == 200) {
        var retour = JSON.parse(xhr.responseText);
        console.log(retour);       
        for (let index = 0; index < retour.length; index++) {
          var tr = document.createElement('tr');
           var nom = document.createElement('td'); nom.textContent = retour[index].nomProduit;
           var qtt = document.createElement('td'); qtt.textContent = retour[index].quantite;
           var date = document.createElement('td'); date.textContent = retour[index].date;
           tr.append(nom); tr.append(qtt); tr.append(date);
           tbody.append(tr);
        }
    }
}
};
 
}
 

