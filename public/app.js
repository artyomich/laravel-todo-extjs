Ext.require(['Ext.data.*', 'Ext.grid.*']);


// Создаем model
Ext.define('Tasks', {
    extend: 'Ext.data.Model',
    fields: [
        {   name: 'id', type: 'int', useNull: true  },
        {   name: 'name', type: 'string'    },
        {   name: 'complete', type: 'boolean'   }
    ]
});

Ext.onReady(function() {
    // Создаем хранилище store
    var store = Ext.create('Ext.data.Store', {
            model: 'Tasks',  //ссылка на модель
            proxy: {
                type: 'ajax',
                url: '/',
                api: {
                    create: 'todos',
                    read: 'todos',
                    update: 'todos',
                    destroy: 'todo'
                },
                reader: {
                    type: 'json',
                    rootProperty: 'todos',
                    successProperty : false
                },
                writer: {
                    type: 'json',
                    encode: true,
                    rootProperty: 'todos',
                    allowSingle: true,
                    writeAllFields: true,
                    root:'todos'
                },
                actionMethods: {
                    create: 'GET',
                    read: 'GET',
                    update: 'POST',
                    destroy: 'DESTROY'

                }
            },
            listeners: {
                write: function(store, operation) {
                    var record = operation.getRecords()[0],
                        name = Ext.String.capitalize(operation.action),
                        verb;


                    if (name == 'Destroy') {
                        verb = 'Destroyed';
                    } else {
                        verb = name + 'd';
                    }

                }
            },
            autoLoad: true,
            autoSync: true
        }
    );
    var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
        listeners: {
            cancelEdit: function(rowEditing, context) {
                // Отмена редактирования локальных данных, несохраненнная запись (фантом) удаляется
                if (context.record.phantom) {
                    store.remove(context.record);
                }
            }
        }
    });

    var grid = Ext.create('Ext.grid.Panel', {
        renderTo: document.body,
        plugins: [rowEditing],
        // Редактирование
        plugins: {
            ptype: 'cellediting',
            clicksToEdit: 1
        },
        frame: true,
        title: 'Tasks',
        store: store,
        iconCls: 'icon-user',
        columns: [{
            text: 'Id',
            flex: 1,
            sortable: true,
            dataIndex: 'id',
            renderer: function(v, meta, rec) {
                return rec.phantom ? '' : v;
            }
        }, {
            text: 'name',
            header: 'Задание',
            flex: 6,
            sortable: true,
            dataIndex: 'name',
            //editor: 'textfield',
            field: {
                xtype: 'textfield'
            }
        }, {
            text: 'complete',
            header: 'Статус',
            flex: 2,
            dataIndex: 'complete',
            field: {
                    xtype: 'checkbox'
            }
        },
            {
                header: 'Дата',
                width: 70,
                sortable: true,
                dataIndex: 'date',
                renderer: Ext.util.Format.dateRenderer('d/m/Y'),
                editor: {
                    completeOnEnter: false,
                    field: {
                        xtype: 'datefield',
                        dateFormat: 'd/m/Y',
                        allowBlank: false
                    }
                }
            },
            {
                header: 'Время начала',
                width: 120,
                sortable: true,
                dataIndex: 'time_start',
                //format: 'H:i',
                // Нужно для верного отображеия времени после редактирования в таблице
                renderer: Ext.util.Format.dateRenderer('H:i'),
                editor: {
                    completeOnEnter: false,
                    field: {
                        xtype: 'timefield',
                        format: 'H:i',
                        //name: 'timeStart1',
                        //fieldLabel: 'Time In',
                        minValue: '8:00',
                        maxValue: '20:00',
                        increment: 30,
                        anchor: '100%',
                        allowBlank: false
                    }
                }
            }

        ],
        dockedItems: [{
            xtype: 'toolbar',
            items: [{
                text: 'Add',
                iconCls: 'icon-add',
                handler: function() {
                    // Создаем новую задачу


                    var rec = new Tasks(),
                        rowEditing = grid.findPlugin('rowediting'),
                        idArr = grid.store.data.items;

                    // Для корректной работы с БД нужно задать ID новой строки, равной +1 от последней ID из таблицы.
                    var maxId = Math.max.apply(Math, idArr.map(function(o) { return o.id; }));
                    rec.id = maxId + 1;
                    rec.data.id = maxId + 1;

                    //console.log(rec.id);

                    rec.date = Ext.Date.format(new Date(), 'Y-m-d');
                    rec.data.date = Ext.Date.format(new Date(), 'Y-m-d');

                    rec.time_start = Ext.Date.format(new Date(), '2019-01-01\\TH:i:s');
                    rec.data.time_start = Ext.Date.format(new Date(), '2019-01-01\\TH:i:s');

                    store.insert(0, rec);

                    rowEditing.startEdit(rec, 0);
                    //store.add(rec);
                    grid.getView().refresh();
                }
            }, '-', {
                itemId: 'delete',
                text: 'Delete',
                iconCls: 'icon-delete',
                disabled: false,
                handler: function() {
                    var selection = grid.getView().getSelectionModel().getSelection()[0];
                    if (confirm('Вы действительно хотите удалить задачу №' + selection.id + " ?")) {
                        // Удаляем
                        if (selection) {
                            store.remove(selection);
                        }
                    }
                }
            }]
        }]
    });
    grid.getSelectionModel().on('selectionchange', function(selModel, selections){
        grid.down('#delete').setDisabled(selections.length === 0);
    });
});