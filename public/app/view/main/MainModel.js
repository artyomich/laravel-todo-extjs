Ext.define('SampleApp.view.main.MainModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.main',
    requires: ['SampleApp.model.Todos'],

    stores: {
        todoStore: {
            model: 'SampleApp.model.Todos',
            autoLoad: true,
            autoSync: true
        }
    }
}
);