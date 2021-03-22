document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    const paises    = document.getElementById('country_id')
    const estado    = document.getElementById('state_id')
    const ciudades  = document.getElementById('city_id')
    
    if(paises)
    {
        console.log('hola')    
        paises.addEventListener('change',(e)=>
         {
           
            fetch('/selectState',
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
                var opciones ="<option value=''>Sin Estado</option>";
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
            fetch('/selectCities' , 
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
                var opciones ="<option value=''>Sin Ciudad</option>";
                for (let i in data.lista) {
                   opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].name+'</option>';
                }
                document.getElementById("city_id").innerHTML = opciones;
               
            })
        })
    }

   
  
  

})

 