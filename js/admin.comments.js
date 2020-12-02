"use strict"
const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], // esto es como un assign de smarty
    }, 
    methods: {
        //Elimina un comentario 
        remove: async function(id){
            console.log('api/comentarios/'+id);
            try{
                let url = 'api/comentarios/'+id;
                let response = await fetch(url, {
                    "method": "delete"
                });
                if(!response.ok){
                    console.log("Fallo el fetch");
                }else{
                    getAll();
                }
            }
            catch(e){
                console.log(e);
            }
        }
    }
});

document.addEventListener('DOMContentLoaded',getAll());

//Trae todos los comentarios
async function getAll(){
    try{
        let response = await fetch('api/comentarios');
        let comments = await response.json();
        
        if(!response.ok){
            console.log("Fallo el fetch");
        }else{
            app.comentarios = comments ;
        }
    }
    catch (e) {
        console.log(e);
    }
}
