{include file="templates/head.tpl"}
{include file="header.tpl"}

<div class='nav-marcas' >
    {foreach from=$marcas item=marca}
        <ul>
            <li>
                <a class="a-marcas" href="Shop/{$marca->id_marca}">{$marca->nombre}</a>
            </li>
        </ul>
    {/foreach}
</div>