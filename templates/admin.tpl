{include file="head.tpl" assign=name var1=value}

<body>
    <main>
        <div class="nav-login">
            <ul>
                <li>
                    <a href="Logout">Logout</a>
                </li>
            </ul>
        </div>
        
        <h1>Zapatillas</h1>
        <h3>Nueva Zapatilla:</h3>
        <form action="AddShoe" method="GET">
            
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
            <button type="submit">Agregar</button>

        </form>

        <div>
            <ul>
                {foreach from=$zapatillas item=zapatillas_item}
                <li>
                        <p> {$zapatillas_item->nombre} | {$zapatillas_item->talle} | {$zapatillas_item->precio} | {$zapatillas_item->id_marca}</p>
                        <a href="AdminShoeEdit/{$zapatillas_item->id}">Editar</a>
                        <a href="DeleteShoe/{$zapatillas_item->id}">Eliminar</a>
                </li>
                {/foreach}
            </ul>
        </div>


        <h1>Marcas</h1>

        <h3>Nueva Marca:</h3>

        <form action="AddMarca" method="GET">
            
            <input type="text" name="nombre_marca">

            <button type="submit">Agregar</button>

        </form>

        <div>
            <ul>
                {foreach from=$marcas item=marcas_item}
                <li>
                        <p>{$marcas_item->nombre}</p>
                        <a href="AdminMarcaEdit/{$marcas_item->id_marca}">Editar</a>
                        <a href="DeleteMarca/{$marcas_item->id_marca}">Eliminar</a>
                </li>
                {/foreach}
            </ul>
        </div>
    </main>
</body>

