var callToActionTV = function (config) {
    config = config || {};
    callToActionTV.superclass.constructor.call(this, config);
};

Ext.extend(callToActionTV, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, jquery: {}, form: {}
});
Ext.reg('calltoactiontv', callToActionTV);

CallToActionTV = new callToActionTV();
