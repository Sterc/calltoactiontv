CallToActionTV.combo.CallToActionTV = function (config) {
    config = config || {};

    MODx.combo.CallToActionTVResource = function(config) {
        config = config || {};

        Ext.applyIf(config, {
            displayField: 'pagetitle',
            valueField: 'id',
            pageSize: 20,
            fields: ['id', 'pagetitle'], //Make field name
            tpl: new Ext.XTemplate('<tpl for="."><div class="x-combo-list-item"><span style="font-weight: bold">{pagetitle:htmlEncode}</span></div></tpl>'),
            editable    : true,
            typeAhead   : true,
            enableKeyEvents : true,
            url: CallToActionTV.config.connector_url,
            allowBlank: true
        });

        MODx.combo.CallToActionTVResource.superclass.constructor.call(this, config);
    };
    Ext.extend(MODx.combo.CallToActionTVResource, MODx.combo.ComboBox);
    Ext.reg('modx-combo-calltoactiontvresource', MODx.combo.CallToActionTVResource);

    Ext.applyIf(config, {
        xtype: 'panel',
        layout: 'column',
        autoHeight: true,
        border: false,
        width: 800,
        items: [{
            xtype: 'panel',
            autoWidth: true,
            layout: 'form',
            labelAlign: 'top',
            labelSeparator: '',
            border: false,
            items: [
                new Ext.form.ComboBox({
                    labelStyle: 'padding-top:5px',
                    fieldLabel: _('calltoactiontv.type'),
                    name: 'tv' + config.tvId + '-type',
                    id: 'tv' + config.tvId + '-type',
                    value: config.type,
                    triggerAction: 'all',
                    mode: 'local',
                    store: new Ext.data.ArrayStore({
                        id: 0,
                        fields: [
                            'value',
                            'text'
                        ],
                        data: config.typeOptions
                    }),
                    valueField: 'value',
                    displayField: 'text',
                    listeners: {
                        change: {
                            fn: this.ctaTypeOnChange,
                            scope: this
                        }
                    }
                })
            ]
        }, {
            xtype: 'panel',
            autoWidth: true,
            layout: 'form',
            labelAlign: 'top',
            labelSeparator: '',
            border: false,
            items: [
                {
                    xtype: 'modx-combo-calltoactiontvresource',
                    id: 'tv' + config.tvId + '-resource',
                    name: 'tv' + config.tvId + '-resource',
                    value: config.resource,
                    labelStyle: 'padding-top:5px',
                    fieldLabel: _('calltoactiontv.value'),
                    autoWidth: true,
                    width: 200,
                    baseParams: {
                        action: 'Sterc\\CallToActionTV\\Processors\\Resource\\GetList',
                        tvId: config.ctaTvId,
                        resourceId: MODx.request.id,
                        selectedResourceId: config.resource
                    },
                    listeners: {
                        change: {
                            fn: this.ctaOnChange,
                            scope: this
                        }
                    }
                }
            ]
        }, {
            xtype: 'panel',
            autoWidth: true,
            layout: 'form',
            labelAlign: 'top',
            labelSeparator: '',
            border: false,
            items: [
                {
                    xtype: 'textfield',
                    id: 'tv' + config.tvId + '-query_params',
                    name: 'tv' + config.tvId + '-query_params',
                    value: config.query_params,
                    labelStyle: 'padding-top:5px',
                    fieldLabel: _('calltoactiontv.query_params'),
                    autoWidth: true,
                    listeners: {
                        change: {
                            fn: this.ctaOnChange,
                            scope: this
                        }
                    }
                }, {
                    id: 'tv' + config.tvId + '-query_params-help',
                    cls: 'calltoactiontv-help',
                    html: _('calltoactiontv.query_params_placeholder'),
                    xtype: 'panel',
                    autoWidth: true
                }
            ]
        }, {
            xtype: 'panel',
            autoWidth: true,
            layout: 'form',
            labelAlign: 'top',
            labelSeparator: '',
            border: false,
            items: [
                new Ext.form.TextField({
                    labelStyle: 'padding-top:5px',
                    fieldLabel: _('calltoactiontv.value'),
                    name: 'tv' + config.tvId + '-value',
                    id: 'tv' + config.tvId + '-value',
                    value: config.value,
                    listeners: {
                        change: {
                            fn: this.ctaOnChange,
                            scope: this
                        }
                    }
                }),
                {
                    id: 'tv' + config.tvId + '-value-help',
                    cls: 'calltoactiontv-help',
                    html: _('calltoactiontv.external_placeholder'),
                    xtype: 'panel',
                    autoWidth: true
                }
            ]
        }, {
            xtype: 'panel',
            autoWidth: true,
            layout: 'form',
            labelAlign: 'top',
            labelSeparator: '',
            border: false,
            items: [
                new Ext.form.TextField({
                    labelStyle: 'padding-top:5px',
                    fieldLabel: _('calltoactiontv.text'),
                    name: 'tv' + config.tvId + '-text',
                    id: 'tv' + config.tvId + '-text',
                    value: config.text,
                    listeners: {
                        change: {
                            fn: this.ctaOnChange,
                            scope: this
                        }
                    }
                }),
                {
                    id: 'tv' + config.tvId + '-text-help',
                    cls: 'calltoactiontv-help',
                    html: _('calltoactiontv.text_placeholder'),
                    xtype: 'panel',
                    autoWidth: true
                }
            ]
        }, {
            xtype: 'panel',
            autoWidth: true,
            layout: 'form',
            labelAlign: 'top',
            labelSeparator: '',
            border: false,
            items: [
                new Ext.form.ComboBox({
                    labelStyle: 'padding-top:5px',
                    fieldLabel: _('calltoactiontv.style'),
                    name: 'tv' + config.tvId + '-style',
                    id: 'tv' + config.tvId + '-style',
                    value: config.style,
                    triggerAction: 'all',
                    mode: 'local',
                    store: new Ext.data.ArrayStore({
                        id: 0,
                        fields: [
                            'value',
                            'text'
                        ],
                        data: config.styleOptions
                    }),
                    valueField: 'value',
                    displayField: 'text',
                    listeners: {
                        beforerender: {
                            fn: this.ctaBeforeRender,
                            scope: this
                        },
                        change: {
                            fn: this.ctaOnChange,
                            scope: this
                        },
                        afterrender: {
                            fn: this.ctaAfterRender,
                            scope: this
                        }
                    }
                })
            ]
        }]
    });

    CallToActionTV.combo.CallToActionTV.superclass.constructor.call(this, config);
};

Ext.extend(CallToActionTV.combo.CallToActionTV, MODx.Panel, {
    ctaTypeOnChange: function() {
        Ext.getCmp('tv' + this.tvId + '-value').setValue('');

        this.ctaOnChange();
    },

    ctaOnChange: function() {
        this.setTVValue();
        this.ctaToggle();

        MODx.fireResourceFormChange();
    },

    ctaAfterRender: function() {
        this.setTVValue();
    },

    setTVValue: function() {
        var data = {
            type: Ext.getCmp('tv' + this.tvId + '-type').getValue(),
            value: Ext.getCmp('tv' + this.tvId + '-value').getValue(),
            style: Ext.getCmp('tv' + this.tvId + '-style').getValue(),
            text: Ext.getCmp('tv' + this.tvId + '-text').getValue(),
            resource: Ext.getCmp('tv' + this.tvId + '-resource').getValue(),
            query_params: Ext.getCmp('tv' + this.tvId + '-query_params').getValue()
        };

        Ext.get('tv' + this.tvId).set({
            value: Ext.encode(data)
        });
    },

    ctaBeforeRender: function() {
        if (this.styleOptions.length === 0) {
            Ext.getCmp('tv' + this.tvId + '-style').hide();
        }

        if (this.displayQueryParams === 'false') {
            Ext.getCmp('tv' + this.tvId + '-query_params').hide();
            Ext.getCmp('tv' + this.tvId + '-query_params-help').hide();
        }

        this.ctaToggle();
    },

    ctaToggle: function() {
        var typeValue       = Ext.getCmp('tv' + this.tvId + '-type').getValue();
        var value           = Ext.getCmp('tv' + this.tvId + '-value');
        var valueHelp       = Ext.getCmp('tv' + this.tvId + '-value-help');
        var resource        = Ext.getCmp('tv' + this.tvId + '-resource');
        var queryParams     = Ext.getCmp('tv' + this.tvId + '-query_params');
        var queryParamsHelp = Ext.getCmp('tv' + this.tvId + '-query_params-help');

        if (typeValue === 'resource') {
            value.hide();
            valueHelp.hide();
            resource.show();

            if (this.displayQueryParams !== 'false') {
                queryParams.show();
                queryParamsHelp.show();
            }
        }

        if (typeValue === 'external') {
            value.show();
            valueHelp.show();
            resource.hide();
            queryParams.hide();
            queryParamsHelp.hide();

            valueHelp.update(_('calltoactiontv.external_placeholder'));
        }

        if (typeValue === 'mailto') {
            value.show();
            valueHelp.show();
            resource.hide();
            queryParams.hide();
            queryParamsHelp.hide();

            valueHelp.update(_('calltoactiontv.mailto_placeholder'));
        }

        if (typeValue === 'tel') {
            value.show();
            valueHelp.show();
            resource.hide();
            queryParams.hide();
            queryParamsHelp.hide();

            valueHelp.update(_('calltoactiontv.tel_placeholder'));
        }
    }
});

Ext.reg('calltoactiontv-combo-calltoactiontv', CallToActionTV.combo.CallToActionTV);
