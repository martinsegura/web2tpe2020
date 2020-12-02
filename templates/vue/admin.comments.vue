{literal}
<section class="shop-container" id="app">
    <div class="shop-item" v-for="comentario in comentarios">
        <p> {{  comentario.texto  }}  |  {{  comentario.calificacion  }} </p>
        <a class="admin-deleteAdmin" v-on:click="remove(comentario.id_comentario)">Eliminar</a>
    </div>
</section>
{/literal}