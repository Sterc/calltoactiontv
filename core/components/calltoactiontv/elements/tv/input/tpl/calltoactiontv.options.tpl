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
        }, {
            xtype: 'modx-combo-boolean',
            fieldLabel: _('calltoactiontv.inopt_display_resource_id'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_display_resource_id_desc'),
            hiddenName: 'inopt_display_resource_id',
            id: 'inopt_display_resource_id{/literal}{$tv}{literal}',
            value: params['display_resource_id'] || true,
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_display_resource_id{/literal}{$tv}{literal}',
            html: _('calltoactiontv.inopt_display_resource_id_desc'),
            cls: 'desc-under'
        }, {
            xtype: 'modx-combo-boolean',
            fieldLabel: _('calltoactiontv.inopt_display_query_params'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_display_query_params_desc'),
            hiddenName: 'inopt_display_query_params',
            id: 'inopt_display_query_params{/literal}{$tv}{literal}',
            value: params['display_query_params'] || true,
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_display_query_params{/literal}{$tv}{literal}',
            html: _('calltoactiontv.inopt_display_query_params_desc'),
            cls: 'desc-under'
        }, {
            xtype: 'modx-combo-boolean',
            fieldLabel: _('calltoactiontv.inopt_limit_related_ctx'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_limit_related_ctx_desc'),
            hiddenName: 'inopt_limit_related_ctx',
            id: 'inopt_limit_related_ctx{/literal}{$tv}{literal}',
            value: params['limit_related_ctx'] || '',
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_limit_related_ctx{/literal}{$tv}{literal}',
            html: _('calltoactiontv.inopt_limit_related_ctx_desc'),
            cls: 'desc-under'
        }, {
            xtype: 'textarea',
            fieldLabel: _('calltoactiontv.inopt_where_conditions'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_where_conditions_desc'),
            name: 'inopt_where_conditions',
            id: 'inopt_where_conditions{/literal}{$tv}{literal}',
            value: params['where_conditions'] || '',
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_where_conditions{/literal}{$tv}{literal}',
            html: _('calltoactiontv.inopt_where_conditions_desc'),
            cls: 'desc-under'
        }],
        renderTo: 'tv-input-properties-form{/literal}{$tv}{literal}'
    });
    // ]]>
</script>
{/literal}
