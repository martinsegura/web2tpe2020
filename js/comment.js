"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], // esto es como un assign de smarty
    }, 
});

let comments_submit = document.querySelector("#comment-submit");



document.addEventListener('DOMContentLoaded', e => {
    getCommentsByZapatilla();
});

comments_submit.addEventListener('click', e => {
    e.preventDefault();
    addComment();
});

//Trae todos los comentarios de una zapatilla en particular
async function getCommentsByZapatilla(){
    let comments_id=document.querySelector('#shoe-id').innerHTML;
    let url = 'api/comentarios/'+comments_id;
    try{
        let response = await fetch(url);
        let comments = await response.json();
        
        if(!response.ok){
            console.log("no anda perricola");
        }else{
            app.comentarios = comments ;
        }
    }
    catch (e) {
        console.log(e);
    }
}

//Añade un comentario
async function addComment(){
    let comentario = {
        texto: document.querySelector('input[name=text]').value,
        calificacion: document.querySelector('select[name=calificacion]').value,
        id_zapatilla: document.querySelector('#shoe-id').innerHTML,
        id_comentario: null
    }
    try {
        let response = await fetch('api/comentarios', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(comentario)
        });

        getCommentsByZapatilla();
        resetCommentForm();

    } catch (e) {
        console.log(e);
    }
}

//Resetea los inputs
function resetCommentForm(){
    document.querySelector('input[name=text]').value = "";
    document.querySelector('select[name=calificacion]').value = 1;
}