{include file="templates/head.tpl"}
<body>
<div class="nav-back">
    <a class="a-back" href="{BASE_URL}Admin">Volver</a>
</div>
    <div>  
       {foreach from=$marcas item=marcaforeach}
            
                    <h1 class="admin-shoe-title "> {$marcaforeach->nombre}</h1>
            
            {/foreach}
    </div>
    <div class="admin-shoe-edit-form">
    <h3 class="admin-shoe-subtitle">Editar por:</h3>
    <form action="AdminMarcaEdit/EditMarca/{$marcaforeach->id_marca}" method="GET">
        <input  class="admin-input"type="text" name="nombre" value="{$marcaforeach->nombre}">

        <button class="admin-submit"type="submit">Editar</button>

    </form>
    </div>
</body>