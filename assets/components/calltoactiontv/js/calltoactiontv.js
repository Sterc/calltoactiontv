ctaTv = {};

ctaTv.panel = function(config) {
    config = config || {};

    Ext.apply(config,{
        border:false
        ,width: '100%'
        ,listeners: {}
        ,items:[{
            xtype: 'container'
            ,cls: 'ctatv-wrapper'
            ,border: false
            ,layout: 'anchor'
            ,width:'100%'
            ,anchorSize: {width:'98%', height:'auto'}
            ,items: [{
                xtype: 'container'
                ,border: false
                ,layout: 'form'
                ,labelAlign: 'top'
                ,labelSeparator: ''
                ,width: '48%'
                ,anchor: 'left auto'
                ,style: 'float:left;'
                ,items: [{
                    xtype: 'textfield'
                    ,name: 'link'
                    ,id: 'ctatv'+config.tvId+'-link'
                    ,fieldLabel: _('calltoactiontv.link')
                    ,maxLength: 255
                    ,width:'98%'
                    ,cls: 'calltoactiontv'
                    ,value: config.record.link
                    ,listeners: {
                        'change': function(){
                            MODx.fireResourceFormChange();
                            config.record.link = this.getValue();
                            Ext.get('tv'+config.tvId).dom.value = JSON.stringify(config.record);
                        }
                    }
                },{
                    xtype: 'textfield'
                    ,name: 'text'
                    ,id: 'ctatv'+config.tvId+'-text'
                    ,fieldLabel: _('calltoactiontv.text')
                    ,maxLength: 25
                    ,width:'98%'
                    ,value: config.record.text
                    ,listeners: {
                        'change': function(){
                            MODx.fireResourceFormChange();
                            config.record.text = this.getValue();
                            Ext.get('tv'+config.tvId).dom.value = JSON.stringify(config.record);
                        }
                    }
                },{
                    xtype: 'textfield'
                    ,name: 'label'
                    ,id: 'ctatv'+config.tvId+'-label'
                    ,fieldLabel: _('calltoactiontv.label')
                    ,maxLength: 255
                    ,width:'98%'
                    ,value: config.record.label
                    ,listeners: {
                        'change': function(){
                            MODx.fireResourceFormChange();
                            config.record.label = this.getValue();
                            Ext.get('tv'+config.tvId).dom.value = JSON.stringify(config.record);
                        }
                    }
                }]
            },{
                xtype: 'container'
                ,border: false
                ,layout: 'form'
                ,labelAlign: 'top'
                ,labelSeparator: ''
                ,width: '48%'
                ,anchor: 'right auto'
                ,style: 'float:right; '
                ,items: [{
                    xtype: 'textfield'
                    ,name: 'target'
                    ,id: 'ctatv'+config.tvId+'-target'
                    ,fieldLabel: _('calltoactiontv.target')
                    ,maxLength: 255
                    ,width:'98%'
                    ,value: config.record.target
                    ,listeners: {
                        'change': function(){
                            MODx.fireResourceFormChange();
                            config.record.target = this.getValue();
                            Ext.get('tv'+config.tvId).dom.value = JSON.stringify(config.record);
                        }
                    }
                },{
                    xtype: 'textfield'
                    ,name: 'btnclass'
                    ,id: 'ctatv'+config.tvId+'-btnclass'
                    ,fieldLabel: _('calltoactiontv.btnclass')
                    ,maxLength: 255
                    ,width:'98%'
                    ,value: config.record.btnclass
                    ,listeners: {
                        'change': function(){
                            MODx.fireResourceFormChange();
                            config.record.btnclass = this.getValue();
                            Ext.get('tv'+config.tvId).dom.value = JSON.stringify(config.record);
                        }
                    }
                }]
            }]
        }, {
            xtype: 'container'
            ,style: 'clear:both;'
        }]
    });
    ctaTv.panel.superclass.constructor.call(this,config);
};

Ext.extend(ctaTv.panel,Ext.Container);
Ext.reg('ctatv-panel', ctaTv.panel);
