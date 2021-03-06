$(document).ready(function() {
  var table = $("#productsReports").dataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
      url: "/DataTables/datatables-spanish.json"
    },
    ajax: "/panel/reports",
    columns: [
      { data: "product_name", name: "product_name" },
      { data: "quantity", name: "quantity" },
      { data: "measure_name", name: "measure_name" },
      { data: "quantity_agreed", name: "quantity_agreed" },
      { data: "action", name: "action" }
    ]
  });
  $("#productsByCharacterizations").dataTable({
    language: {
      url: "/DataTables/datatables-spanish.json"
    }
  });
});

function reportBycharacterization(id) {
  if (id != "") {
    var url = "";
    if (id == 1 || id == 3 || id == 5 || id == 4) {
      url = "productsBycharacterizations/" + id;
    } else if (id == 2) {
      url = "productsBySpecialCharacterizations/" + id;
    }
    var table = $("#productsByCharacterizations").dataTable({
      destroy: true,
      responsive: true,
      processing: true,
      serverSide: true,
      language: {
        url: "/DataTables/datatables-spanish.json"
      },
      ajax: url,
      columns: [
        { data: "product_name", name: "product_name" },
        { data: "sum", name: "sum" },
        { data: "measure_name", name: "measure_name" },
        { data: "quantity_agreed", name: "quantity_agreed" },
        { data: "action", name: "action" }
      ]
    });
  } else {
    swal("Opción incorrecta.", "seleccione una opción valida", "info");
  }
}
