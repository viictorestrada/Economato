<<<<<<< HEAD
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
=======
$(()=>


$('#files').DataTable({
  destroy: true,
  scrollX: true,
  responsive: true,
  processing: true,
  serverSide: true,
  language: {
    "url": '/DataTables/datatables-spanish.json'
  },
  ajax:'/files/get',
  columns: [
    {data: 'program_name', name: 'program_id'},
    {data: 'characterization_name', name: 'characterization_id'},
    {data: 'file_number', name: 'file_number'},
    {data: 'file_route', name: 'file_route'},
    {data: 'apprentices', name: 'apprentices'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: true},
    ]
  });

  $('#users').DataTable({
    destroy: true,
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

  $('#products').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
      "url": '/DataTables/datatables-spanish.json'
    },
    ajax:'/products/get',
    columns: [
      {data: 'product_code', name: 'product_code'},
      {data: 'product_type_name', name: 'id_product_type'},
      {data: 'product_name', name: 'product_name'},
      {data: 'measure_name', name: 'id_measure_unit'},
      {data: 'presentation', name: 'presentation'},
      {data: 'quantity', name: 'quantity'},
      {data: 'due_date', name: 'due_date'},
      {data: 'unit_price', name: 'unit_price'},
      {data: 'stock', name: 'Stock'},
      {data: 'status', name: 'status'},
      {data: 'action', name: 'action', orderable: false, searchable: true},
    ]
  });

  $('#regions').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
      "url": '/DataTables/datatables-spanish.json'
    },
    ajax:'/regions/get',
    columns: [
      {data: 'region_name', name: 'region_name'},
      {data: 'action', name: 'action', orderable: false, searchable: true},
    ]
  });
>>>>>>> d3a072c5db65fe72b0dd8b88b57b2188b3610a58

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
            { data: 'program_name', name: 'id_program' },
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
        ajax: '/locations/get',
        columns: [
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
<<<<<<< HEAD
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

});
=======
      destroy: true,
      responsive: true,
      processing: true,
      serverSide: true,
      language: {
        "url": '/DataTables/datatables-spanish.json'
      },
      ajax:'/presentations/get',
      columns: [
        {data: 'presentation', name: 'presentation'},
        {data: 'action', name: 'action', orderable: false, searchable: true},
      ]
    }
});
>>>>>>> d3a072c5db65fe72b0dd8b88b57b2188b3610a58
