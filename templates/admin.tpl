{include file="templates/head.tpl"}

<body>
    <main>
        <div class="nav-login">
            <ul>
                <li>
                    <a class="a-log" href="Home">Home</a>
                </li>
                <li>
                    <a class="a-log" href="Logout">Logout</a>
                </li>
            </ul>
        </div>

        <h1 class="admin-title">Zapatillas</h1>
        <div class="admin-shoe-form">
            <h3 class="admin-subtitle">Nueva Zapatilla:</h3>
            <form action="AddShoe" method="GET">

                <label>Nombre</label>
                <input class="admin-input" type="text" name="nombre">

                <label>Precio</label>
                <input class="admin-input" type="number" name="precio">

                <label>Talle</label>
                <input class="admin-input" type="number" name="talle">

                <label>Marca</label>
                <select name="marca">
                    {foreach from=$marcas item=marcas_item}
                    <option value="{$marcas_item->id_marca}">{$marcas_item->nombre}</option>
                    {/foreach}
                </select>
                <button class="admin-submit" type="submit">Agregar</button>

            </form>
        </div>
        <div class="shop-container">

            {foreach from=$zapatillas item=zapatillas_item}
            <div class="shop-item">
                <p> {$zapatillas_item->nombre} | {$zapatillas_item->talle} | {$zapatillas_item->precio} |
                    {$zapatillas_item->id_marca}</p>
                <a class="a-shop" href="AdminShoeEdit/{$zapatillas_item->id}">Editar</a>
                <a class="admin-deleteAdmin" href="DeleteShoe/{$zapatillas_item->id}">Eliminar</a>
            </div>
            {/foreach}

        </div>

        <h1 class="admin-title">Marcas</h1>

        <div class="admin-shoe-form">
            <h3 class="admin-subtitle">Nueva Marca:</h3>
            <form action="AddMarca" method="GET">
                <label>Nombre</label>
                <input class="admin-input" type="text" name="nombre_marca">

                <button class="admin-submit" type="submit">Agregar</button>

            </form>
        </div>

        <div class="shop-container">
            {foreach from=$marcas item=marcas_item}
            <div class="shop-item">
                <p>{$marcas_item->nombre}</p>
                <a class="a-shop" href="AdminMarcaEdit/{$marcas_item->id_marca}">Editar</a>
                <a class="admin-deleteAdmin" href="DeleteMarca/{$marcas_item->id_marca}">Eliminar</a>
            </div>
            {/foreach}
        </div>

        <h1 class="admin-title">Usuarios</h1>

        <div class="shop-container">
            {foreach from=$usersDB item=$users}
                <div class="shop-item">
                    <p>{$users->email}</p>
                    {if $users->admin == 0}
                    <a class="admin-addAdmin" href="AdminPermissions/{$users->id}/1">Dar Admin</a>
                    {/if}
                    {if $users->admin == 1}
                    <a class="admin-deleteAdmin" href="AdminPermissions/{$users->id}/0">Quitar Admin</a>
                    {/if}
                    <a class="a-shop" href="AdminDeleteUser/{$users->id}">Eliminar</a>
                </div>
            {/foreach}
        </div>

        
        <h1 class="admin-title">Comentarios</h1>

        {include file="vue/admin.comments.vue"}

    </main>

<script src="js/admin.comments.js"></script>
</body>

