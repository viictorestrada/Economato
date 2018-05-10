$('#users').DataTable({
    destroy: true,
    scrollX: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
      "url": '/DataTables/datatables-spanish.json'
    },
    ajax:'/users/get',
    columns: [
    {data: 'role', name: 'rol_id'},
    {data: 'name', name: 'name'},
    {data: 'last_name', name: 'last_name'},
    {data: 'email', name: 'email'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: true},
    ]
  });
