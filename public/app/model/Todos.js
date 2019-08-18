Ext.define('SampleApp.model.Todos', {
    extend: 'Ext.data.Model',
    fields: [
        {   name: 'id', type: 'integer'  },
        {   name: 'name', type: 'string'    },
        {   name: 'complete', type: 'boolean'   }
    ],

    proxy: {
        type: 'ajax',
            url: 'todos',
            reader: {
            type: 'json',
            rootProperty: 'todos'
        }
    }
});