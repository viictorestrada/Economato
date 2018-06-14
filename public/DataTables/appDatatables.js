$(() => {


    $('#measures').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/measures/get',
        columns: [
            { data: 'measure_name', name: 'measure_name' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });



    $('#document_types').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/document_types/get',
        columns: [
            { data: 'type_document', name: 'type_document' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    $('#roles').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/roles/get',
        columns: [
            { data: 'role', name: 'role' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });



    $('#characterizations').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/characterizations/get',
        columns: [
            { data: 'characterization_name', name: 'characterization_name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

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
