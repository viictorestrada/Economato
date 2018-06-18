$(() => {

    $('#storages').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/storages/get',
        columns: [
            { data: 'storage_name', name: 'storage_name' },
            { data: 'storage_location', name: 'storage_location' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

});
