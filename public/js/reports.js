$(document).ready(function(){
 var table= $('#productsReports').dataTable({
    destroy:true,
    responsive:true,
    processing:true,
    serverSide:true,
    language: {
      "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/panel/reports',
    columns:[
      { data:'product_name', name:'product_name' },
      { data:'quantity', name:'quantity' },
      { data:'quantity_agreed', name:'quantity_agreed' },
      { data:'action', name:'action' }
    ]
  });
});
