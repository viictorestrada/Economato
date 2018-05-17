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

  $('#products').DataTable({
      destroy: true,
      scrollX: true,
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
        scrollX: true,
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

      $('#locations').DataTable({
          destroy: true,
          scrollX: true,
          responsive: true,
          processing: true,
          serverSide: true,
          language: {
            "url": '/DataTables/datatables-spanish.json'
          },
          ajax:'/locations/get',
          columns: [
          {data: 'complex_name', name: 'id_complex'},
          {data: 'location_name', name: 'location_name'},
          {data: 'program_name', name: 'id_program'},
          {data: 'status', name: 'status'},
          {data: 'action', name: 'action', orderable: false, searchable: true},
          ]
        });

        $('#programs').DataTable({
            destroy: true,
            scrollX: true,
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
              "url": '/DataTables/datatables-spanish.json'
            },
            ajax:'/locations/get',
            columns: [
            {data: 'program_name', name: 'program_name'},
            {data: 'program_version', name: 'program_version'},
            {data: 'program_description', name: 'program_description'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: true},
            ]
          });

          $('#measures').DataTable({
              destroy: true,
              scrollX: true,
              responsive: true,
              processing: true,
              serverSide: true,
              language: {
                "url": '/DataTables/datatables-spanish.json'
              },
              ajax:'/measures/get',
              columns: [
              {data: 'measure_name', name: 'measure_name'},
              {data: 'action', name: 'action', orderable: false, searchable: true},
              ]
            });
