	<!-- DATATABLES -->
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/dataTables.bootstrap.js"></script>*
    <script src="/js/datatables/dataTables.buttons.min.js"></script>
    <script src="/js/datatables/buttons.bootstrap.min.js"></script>
    <script src="/js/datatables/buttons.flash.min.js"></script>*
    <script src="/js/datatables/buttons.html5.min.js"></script>
    <script src="/js/datatables/buttons.print.min.js"></script>
    <script src="/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/js/datatables/dataTables.keyTable.min.js"></script>
    <script src="/js/datatables/dataTables.responsive.min.js"></script>
    <script src="/js/datatables/responsive.bootstrap.min.js"></script>*
    <script src="/js/datatables/dataTables.scroller.min.js"></script>
    <script src="/js/datatables/jszip.min.js"></script>
    <script src="/js/datatables/pdfmake.min.js"></script>
    <script src="/js/datatables/vfs_fonts.js"></script>
    <!-- Viviente Registrado -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#encuestas").length) {
            $("#encuestas").DataTable({
              	dom: "Bfrtip",
              	keys: true,
              	ajax: {
			        url: "{{ url('/vivientes/encuestasTabla') }}",
			        dataSrc: ''
			    },
			  	columns: [
			  		{ data: 'viviente' },
			  		{ data: 'quimera' },
			  		{ data: 'lycan' },
			  		{ data: 'draco' },
			  		{ data: 'fenix' },
			  		{ data: 'unicornio' },
			  		{ data: 'personalidad' },
			  		{ data: 'mismo' },
			  		{ data: 'cualidades' },
			  		{ data: 'defectos' },
			  		{ data: 'fiesta' },
			  		{ data: 'cualidades1' },
			  		{ data: 'cualidades2' },
			  		{ data: 'cualidades3' },
			  		{ data: 'cualidades4' },
			  		{ data: 'cualidades5' }
			  		],
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              scrollX: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();
      });
    </script>
    <!-- /DATATABLES -->