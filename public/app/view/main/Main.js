Ext.define('SampleApp.view.main.Main', {

    extend: 'Ext.grid.Panel',
    requires: ['SampleApp.view.main.MainModel'],
    viewModel :'main',

    title: 'To do List',

    bind: '{todoStore}',


    columns: [{
        text: 'Id',
        dataIndex: 'id',
        flex: 1
    }, {
        text: 'Task name',
        dataIndex: 'name',
        flex: 6,
        editor: 'textfield'
    }, {
        text: 'Completed',
        dataIndex: 'complete',
        flex: 2,
        editor: 'textfield'
    }],
    dockedItems: [{
        xtype: 'toolbar',
        items: [{
            text: 'Добавить',
            handler: function(){
                // empty record
                store.insert(0, new Person());
                rowEditing.startEdit(0, 0);
            }
        }, '-', {
            itemId: 'delete',
            text: 'Удалить',
            disabled: true,
            handler: function(){
                var selection = grid.getView().getSelectionModel().getSelection()[0];
                if (selection) {
                    store.remove(selection);
                }
            }
        }]
    }],

    selModel: 'rowmodel',
    plugins: {
        ptype: 'rowediting',
        clicksToEdit: 1
    }
});