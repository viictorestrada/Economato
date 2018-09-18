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



document.addEventListener("DOMContentLoaded", function(event) {
  (function() {
  "use strict";
      let ctx = document.getElementById("pieChartTest");
      window.pieChartTest = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ["Label x","Label y","Label z"],
              datasets: [{"backgroundColor":["#FF6384","#36A2EB","#212529"],"hoverBackgroundColor":["#FF6384","#36A2EB","#212529"],
              "data":[69,59,40]}]
          },
                      });
  })();
});


document.addEventListener("DOMContentLoaded", function(event) {
  (function() {
  "use strict";
      let ctx = document.getElementById("lineChartTest");
      window.lineChartTest = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
              labels: ["January","February","March","April"],
              datasets: {"label":"January","0":"February","1":"March","2":"April","borderColor":"rgba(255, 159, 64, 1)","backgroundColor":"rgba(255, 159, 64, 0.2)",
              "fill":false,"strokecolor":"rgba(255, 159, 64, 0.2)",
              "data":[4998,4996,4994,3998]}
          },
                      });
  })();
});
