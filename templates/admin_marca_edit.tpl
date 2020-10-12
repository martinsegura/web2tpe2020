{include file="head.tpl" assign=name var1=value}
<body>
<a href="{BASE_URL}Admin">Volver</a>
    <div>  
       {foreach from=$marcas item=marcaforeach}
            
                    <p> {$marcaforeach->nombre}</p>
            
            {/foreach}
    </div>

    <h3>Editar por:</h3>
    <form action="EditMarca/{$marcaforeach->id_marca}" method="GET">
        <input type="text" name="nombre">

        <button type="submit">Editar</button>

    </form>

</body>