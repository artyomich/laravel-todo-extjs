Ext.define('ToDo.ToDoList.ToDoListModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.todoList',
    stores: {
        todos: {
            fields: [
                {   name: 'id', type: 'string'  },
                {   name: 'name', type: 'string'    },
                {   name: 'user_id', type: 'string'    },
                {   name: 'complete', type: 'boolean'   }
            ],
            autoLoad: true,
            sorters: [{
                property: 'done',
                direction: 'ASC'
            }],
            proxy: {
                type: 'rest',
                url: 'todo',
                reader: {
                    type: 'json',
                },
                writer: {
                    type: 'json'
                }
            }
        }
    }
});
