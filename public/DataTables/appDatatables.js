$(() => {

    $('#regions').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/regions/get',
        columns: [
            { data: 'region_name', name: 'region_name' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    $('#locations').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/locations/get',
        columns: [
            { data: 'complex_name', name: 'id_complex' },
            { data: 'location_name', name: 'location_name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    $('#programs').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/programs/get',
        columns: [
            { data: 'location_name', name: 'location_id' },
            { data: 'program_name', name: 'program_name' },
            { data: 'program_version', name: 'program_version' },
            { data: 'program_description', name: 'program_description' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

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


    $('#product_types').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/product_types/get',
        columns: [
            { data: 'product_type_name', name: 'product_type_name' },
            { data: 'description', name: 'description' },
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


    $('#competences').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/competences/get',
        columns: [
            { data: 'program_name', name: 'id_program' },
            { data: 'competence_name', name: 'competence_name' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    $('#learning_results').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/learning_results/get',
        columns: [
            { data: 'competence_name', name: 'id_competence' },
            { data: 'learning_result', name: 'learning_result' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    $('#presentations').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/presentations/get',
        columns: [
            { data: 'presentation', name: 'presentation' },
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

    $('#complex').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/complex/get',
        columns: [
            { data: 'region_name', name: 'id_region' },
            { data: 'complex_name', name: 'complex_name' },
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