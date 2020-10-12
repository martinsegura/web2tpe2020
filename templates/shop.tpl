{include file="templates/head.tpl"}
<div>

    {foreach from=$zapatillas item=zapatilla}
    <div>
        <h1>{$zapatilla->nombre}</h1>
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
        <a href="Comprar/{$zapatilla->id}">Comprar</a>
    </div>
    {/foreach}
           
</div>

{include file="templates/footer.tpl"}
