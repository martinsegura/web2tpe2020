{include file="templates/head.tpl"}
<body>
<div class="nav-back">
    <a class="a-back" href="{BASE_URL}Admin">Volver</a>
</div>
    <div>
        <ul>
            {foreach from=$zapatillas item=zapatillas_item}
            <li>
                    <h1 class="admin-shoe-title"> {$zapatillas_item->nombre} | {$zapatillas_item->precio} | {$zapatillas_item->talle} | {$zapatillas_item->id_marca}</h1>
            </li>
            {/foreach}
        </ul>
    </div>

    <div class="admin-shoe-edit-form">
    <h3 class="admin-shoe-subtitle">Editar por:</h3>
    <form action="AdminShoeEdit/EditShoe/{$zapatillas_item->id}" method="GET">
        
        <label>Nombre</label>
        <input class="admin-input"type="text" name="nombre" value="{$zapatillas_item->nombre}">

        <label>Precio</label>
        <input class="admin-input"type="number" name="precio" value="{$zapatillas_item->precio}">

        <label>Talle</label>
        <input class="admin-input"type="number" name="talle" value="{$zapatillas_item->talle}">

        <label>Marca</label>
        <select name="marca">
        {foreach from=$marcas item=marcas_item}
            <option  value="{$marcas_item->id_marca}">{$marcas_item->nombre}</option>
        {/foreach}
        </select>
        <button class="admin-submit" type="submit">Editar</button>

    </form>
</div>
</body>

