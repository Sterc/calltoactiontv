<input id="tv{$tv->id}" type="hidden" class="textfield" value="{$tv->value|escape}" name="tv{$tv->id}">
<div id="modx-calltoactiontv-tv{$tv->id}"></div>

<script type="text/javascript">
    // <![CDATA[{literal}
    Ext.onReady(function () {
        MODx.load({{/literal}
            xtype: 'calltoactiontv-combo-calltoactiontv',
            tvId: '{$tv->id}',
            type: '{$type}',
            typeOptions: {$typeOptions},
            style: '{$style}',
            styleOptions: {$styleOptions},
            text: '{$text}',
            value: '{$value}',
            resource: '{$resource}',
            resourceOptions: {$resourceOptions},
            renderTo: 'modx-calltoactiontv-tv{$tv->id}'{literal}
        });
    });{/literal}
    // ]]>
</script>