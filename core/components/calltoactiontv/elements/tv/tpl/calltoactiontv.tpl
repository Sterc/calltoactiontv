<input type="hidden" id="tv{$tv->id}" name="tv{$tv->id}" value="{$tv->value|escape}" />
<div id="ctatv{$tv->id}" style="width:100%;"></div>
<script type="text/javascript">

    myTV{$tv->id} = MODx.load{literal}({
           {/literal}
           xtype: 'ctatv-panel',
           renderTo: 'ctatv{$tv->id}',
           tvFieldId: 'tv{$tv->id}',
           tvId: '{$tv->id}',
           record: {
               link: "{$link}"
               ,text: "{$text}"
               ,label: "{$label}"
               ,target: "{$target}"
               ,btnclass: "{$btnclass}"
           }
           {literal}
       });
    {/literal}

</script>