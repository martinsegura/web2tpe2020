{include file="head.tpl" assign=name var1=value}
<body>
<a href="{BASE_URL}Admin">Volver</a>
    <div>
        <ul>
            {foreach from=$zapatillas item=zapatillas_item}
            <li>
                    <p> {$zapatillas_item->nombre} | {$zapatillas_item->precio} | {$zapatillas_item->talle} | {$zapatillas_item->id_marca}</p>
            </li>
            {/foreach}
        </ul>
    </div>

    <h3>Editar por:</h3>
    <form action="EditShoe/{$zapatillas_item->id}" method="GET">
        
        <label>Nombre</label>
        <input type="text" name="nombre">

        <label>Precio</label>
        <input type="number" name="precio">

        <label>Talle</label>
        <input type="number" name="talle">

        <label>Marca</label>
        <select name="marca">
        {foreach from=$marcas item=marcas_item}
            <option value="{$marcas_item->id_marca}">{$marcas_item->nombre}</option>
        {/foreach}
        </select>
        <button type="submit">Editar</button>

    </form>

</body>

