   
    function getproduit(){
        //je creer une requette http;
            var xhr;
            try {
                xhr= new XMLHttpRequest();
            } catch (error) {
                xhr=null;
            }

            xhr.open("GET","../../pages/traitement/produit.php",true);
            xhr.send(null);
        
        
            xhr.onreadystatechange = ()=>{
                if (xhr.readyState==4 && xhr.status==200) {
                    $produit = JSON.parse(xhr.responseText);
                    var select = document.querySelector("#product");
                    $produit.forEach(element => {
                        select.appendChild(insertOption(element.id,element.nomProduit));
                    });
                    
                }
            }
        }

function insertOption(metaData,textValue){
    var option = document.createElement('option');
    option.value=metaData;
    option.textContent=textValue;
    return option;
}

      
    

window.addEventListener("load",()=>{
    getproduit();
});



