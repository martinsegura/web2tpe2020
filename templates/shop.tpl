{include file="templates/head.tpl"}
<h1 class="shop-title">Todos los calzados</h1>

{if !$zapatillas}
<h1 class="shop-title">No hay Zapatillas disponibles</h1>
{else}
<div  class="shop-container">
    {foreach from=$zapatillas item=zapatilla}
    <div class="shop-item">
        <div class="shoe-image"></div>
        <h2>{$zapatilla->nombre}</h2>
        <p>{$zapatilla->talle}</p>
        <p>{$zapatilla->precio}</p>
        {if $zapatilla->id_marca == 1}
        <p>Nike</p>
        {/if}

        {if $zapatilla->id_marca == 2}
        <p>Adidas</p>
        {/if}

        {if $zapatilla->id_marca == 3}
        <p>Puma</p>
        {/if}

        {if $zapatilla->id_marca == 4}
        <p>Fila</p>
        {/if}

        {if $zapatilla->id_marca == 5}
        <p>New balance</p>
        {/if}
        <a class="a-shop"href="Comprar/{$zapatilla->id}">Comprar</a>
    </div>
    {/foreach}    
</div>
{/if}
{include file="templates/footer.tpl"}
