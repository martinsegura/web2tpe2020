{include file="templates/head.tpl"}

<div class="nav-back">
    <a class="a-back" href="{BASE_URL}Shop">Volver</a>
</div>

<div class="shoe-container">
    <div class="shoe-item-image"> 
    
    </div>
       {foreach from=$zapatilla item=zapatilla_id}
            <div class="shoe-item-container">
                <h1>{$zapatilla_id->nombre}</h1>
                <p>{$zapatilla_id->talle}</p>
                <p>{$zapatilla_id->precio}</p>
                <p id="shoe-id">{$zapatilla_id->id}</p>
            </div>
        {/foreach}
</div>
    {if $sesion}
        <div class="shoe-container">
            <form id="comment-form">
                <input class="shoe-comment-input"type="text" name="text" maxlength="80">
               
                <select name="calificacion">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <button id="comment-submit" class="login-submit">Enviar</button>
            </form>
        </div>
    {/if}

    {include file="vue/comments.vue"}

<script src="js/comment.js"></script>
{include file="templates/footer.tpl"}