
{include file="templates/head.tpl"}
<a href="{BASE_URL}Shop">Volver</a>

       {foreach from=$zapatilla item=zapatilla_id}
            <div>
                <h1>{$zapatilla_id->nombre}</h1>
                <p>{$zapatilla_id->talle}</p>
                <p>{$zapatilla_id->precio}</p>
            </div>
        {/foreach}

{include file="templates/footer.tpl"}