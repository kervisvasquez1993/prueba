document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    const paises    = document.getElementById('country_id')
    const estado    = document.getElementById('state_id')
    const ciudades  = document.getElementById('city_id')
    
    if(paises)
    {
        console.log('hola')    
        paises.addEventListener('DOMContentLoaded',(e)=>
         {
           
            fetch('/selectpaises',
            {
                method : 'POST',
                body: JSON.stringify({texto : e.target.value}),
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
              .then(response => response.json())
              .then( data =>{
                var opciones ="<option value=''>Sin Categoria</option>";
                for (let i in data.lista) {
                   opciones+= `<option value="${data.lista[i].id}">${data.lista[i].name}</option>`;
                }
                document.getElementById("state_id").innerHTML = opciones;
               
            }).catch(error =>console.error(error)); 
        }) 
    }

    if(estado)
    {
        estado.addEventListener('change', (e) => 
        {
            fetch('/selectsubcategoria' , 
            {
                method  : 'POST',
                body    :  JSON.stringify({ texto : e.target.value}),
                headers : 
                {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then( response => response.json())
            .then( data => {
                var opciones ="<option value=''>Sin Sub Categoria</option>";
                for (let i in data.lista) {
                   opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].name+'</option>';
                }
                document.getElementById("_subcategoria").innerHTML = opciones;
               
            })
        })
    }

    if(ciudades)
    {
        ciudades.addEventListener('change', (e) =>
        {
            fetch('/selectsubmarca', 
            {
                method : 'POST',
                body: JSON.stringify({texto : e.target.value}),
                headers:
                {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
                
            })
            .then( response => response.json())
            .then(data => 
                {
                    var opciones ="<option value=''>Sin Sub Marca</option>";
                for (let i in data.lista) {
                   opciones+= `<option value="${data.lista[i].id}">${data.lista[i].name}</option>`;
                }
                document.getElementById("submarca").innerHTML = opciones;
                })

        })
    }
  
  

})

 