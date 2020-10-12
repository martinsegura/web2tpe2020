{include file="templates/head.tpl"}
{include file="header.tpl"}

    <div class='nav-marcas' >
        {foreach from=$marcas item=marca}
        <ul>
                <li>
                    <a href="{$marca->nombre}">{$marca->nombre}</a>
                </li>
            </ul>
        {/foreach}
    </div>