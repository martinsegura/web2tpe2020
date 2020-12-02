{literal}
<section id="app">

    <div v-for="comentario in comentarios" class="shoe-comments-container">
      <p class="shoe-p-comments">{{ comentario.texto }}</p><p v-bind:class="{'comment-5': comentario.calificacion == 5}">{{ comentario.calificacion }}★</p>  
    </div>
    
</section>
{/literal}