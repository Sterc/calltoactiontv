<div id="tv-input-properties-form{$tv}"></div>

<script type="text/javascript">
    // <![CDATA[{literal}
    var params = {
        {/literal}{foreach from=$params key=k item=v name='p'}
        '{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last}, {/if}
        {/foreach}{literal}
    };

    var oc = {
        'change': {
            fn: function () {
                Ext.getCmp('modx-panel-tv').markDirty();
            }, scope: this
        },
        'beforerender': {
            fn: function () {
                if (Ext.getCmp('modx-tv-elements').getValue() === '') {
                    // Set the default value.
                    Ext.getCmp('modx-tv-elements').setValue('@SELECT CONCAT(`pagetitle`, \' (\', `id`, \')\') AS `name`,`id` FROM `[[+PREFIX]]site_content` WHERE `published` = 1 AND `deleted` = 0 AND `context_key` = \'[[+context_key]]\'');
                }
            }, scope: this
        }
    };

    MODx.load({
        xtype: 'panel',
        layout: 'form',
        autoHeight: true,
        cls: 'form-with-labels',
        border: false,
        labelAlign: 'top',
        items: [{
            xtype: 'textfield',
            fieldLabel: _('calltoactiontv.inopt_types'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_types_desc'),
            name: 'inopt_types',
            id: 'inopt_types{/literal}{$tv}{literal}',
            value: params['types'] || 'resource||external||tel||mailto',
            allowBlank: false,
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_types{/literal}{$tv}{literal}',
            html: _('calltoactiontv.inopt_types_desc'),
            cls: 'desc-under'
        }, {
            xtype: 'textfield',
            fieldLabel: _('calltoactiontv.inopt_styles'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_styles_desc'),
            name: 'inopt_styles',
            id: 'inopt_styles{/literal}{$tv}{literal}',
            value: params['styles'] || '',
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_styles{/literal}{$tv}{literal}',
            html: _('calltoactiontv.inopt_styles_desc'),
            cls: 'desc-under'
        }],
        renderTo: 'tv-input-properties-form{/literal}{$tv}{literal}'
    });
    // ]]>
</script>
{/literal}
