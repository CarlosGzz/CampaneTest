<!-- Flat DateTime Picker-->
	<script src="https://unpkg.com/flatpickr"></script>
	<script type="text/javascript">
		flatpickr(".flatpickr", {
		    altInput: true,
    		altFormat: "j, F, Y"
		});
	</script>

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
    <script src="/js/datatables/datatables.scroller.min.js"></script>
    <script src="/js/datatables/jszip.min.js"></script>
    <script src="/js/datatables/pdfmake.min.js"></script>
    <script src="/js/datatables/vfs_fonts.js"></script>
    <!-- Campamento -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#campamentos").length) {
            $("#campamentos").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/campamento') }}",
			        dataSrc: ''
			    },
			  columns: [{ data: 'id' },
			  			{ data: 'nombre' },
				        { data: 'fechaInicio' },
				        { data: 'fechaFinal' },
				        { data: 'actual' }],
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
              responsive: true,
              fnRowCallback: function( nRow, aData ) {
              		var id = aData['actual'];
					var $nRow = $(nRow);
					if (id == "1") { 
						$nRow.css({"background-color":"#00FFFF"})
						$('td:eq(4)', nRow).html( 'Si' );
					}else{
						$('td:eq(4)', nRow).html( 'No' );
					}
					return nRow
					}
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
    <script type="text/javascript">
	    $(document).ready(function() {
		    var table = $('#campamentos').DataTable();

		    $('#campamentos tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditCampamento(data['id']);
		    } );
		} );
    </script>
    <!-- Gaias -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#gaias").length) {
            $("#gaias").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/gaia') }}",
			        dataSrc: ''
			    },
			  columns: [{ data: 'id' },
			  			{ data: 'gaia' }],
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
              responsive: true,
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
    <script type="text/javascript">
	    $(document).ready(function() {
		    var table = $('#gaias').DataTable();

		    $('#gaias tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditGaia(data['id']);
		    } );
		} );
    </script>
    <!-- Puestos -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#puestos").length) {
            $("#puestos").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/puesto') }}",
			        dataSrc: ''
			    },
			  columns: [{ data: 'id' },
			  			{ data: 'puesto' }],
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
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
    <script type="text/javascript">
	    $(document).ready(function() {
		    var table = $('#puestos').DataTable();

		    $('#puestos tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditPuesto(data['id']);
		    } );
		} );
    </script>

    <!-- Users -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#user").length) {
            $("#user").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/user') }}",
			        dataSrc: ''
			    },
			  columns: [{ data: 'id' },
			  			{ data: 'name' },
			  			{ data: 'user' },
			  			{ data: 'email' },
			  			{ data: 'tipo' }],
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
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
    <script type="text/javascript">
	    $(document).ready(function() {
		    var table = $('#user').DataTable();

		    $('#user tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditUser(data['id']);
		    } );
		} );
    </script>
    <!-- Users -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#area").length) {
            $("#area").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
              url: "{{ url('/area') }}",
              dataSrc: ''
          },
        columns: [{ data: 'id' },
              { data: 'area' },
              { data: 'activa' },],
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
              fnRowCallback: function( nRow, aData ) {
                  var id = aData['activa'];
                  var $nRow = $(nRow);
                  if (id == "1") { 
                    $('td:eq(2)', nRow).html( 'Si' );
                  }else{
                    $('td:eq(2)', nRow).html( 'No' );
                    $nRow.css({"background-color":"#FF0000"})
                  }
                }
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
    <script type="text/javascript">
      $(document).ready(function() {
        var table = $('#area').DataTable();

        $('#area tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            showEditArea(data['id']);
        } );
    } );
    </script>
    <!-- /DATATABLES -->

    <!-- Ajax para desplegar el editor de campamento -->
	<script type="text/javascript">
		function showEditCampamento(obj){
			$.ajax({
		       url: "{{ url('/campamento/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarCampamento").empty();
		          	$("#editarEliminarCampamento").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
		       },error: function(){
		       		$("#editarEliminarCampamento").empty();
		       		$("#editarEliminarCampamento").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>
	<!-- Ajax para desplegar el editor de gaias -->
	<script type="text/javascript">
		function showEditGaia(obj){
			$.ajax({
		       url: "{{ url('/gaia/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarGaia").empty();
		          	$("#editarEliminarGaia").append(html);
		       },error: function(){
		       		$("#editarEliminarGaia").empty();
		       		$("#editarEliminarGaia").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Ajax para desplegar el editor de Puestos -->
	<script type="text/javascript">
		function showEditPuesto(obj){
			$.ajax({
		       url: "{{ url('/puesto/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarPuesto").empty();
		          	$("#editarEliminarPuesto").append(html);
		       },error: function(){
		       		$("#editarEliminarPuesto").empty();
		       		$("#editarEliminarPuesto").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Ajax para desplegar el editor de User -->
	<script type="text/javascript">
		function showEditUser(obj){
			$.ajax({
		       url: "{{ url('/user/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarUser").empty();
		          	$("#editarEliminarUser").append(html);
		       },error: function(){
		       		$("#editarEliminarUser").empty();
		       		$("#editarEliminarUser").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

  <!-- Ajax para desplegar el editor de User -->
  <script type="text/javascript">
    function showEditArea(obj){
      $.ajax({
           url: "{{ url('/area/edit') }}"+"/"+obj,
           success: function(html) {
              $("#editarEliminarArea").empty();
                $("#editarEliminarArea").append(html);
           },error: function(){
              $("#editarEliminarArea").empty();
              $("#editarEliminarArea").append("No se puede editar este elemento");
           }
        });
    }
  </script>

	<!-- Borrar-->
	<script>
		function borrar(obj) {
		    var r = confirm('Confirmar eliminacion de campamento');
		    if (r == true) {
		        window.location = $('#'+obj.id).data('route')
		    }
		}

		function cerrarCampamento() {
			$("#editarEliminarCampamento").empty();
		}
		function cerrarGaia() {
			$("#editarEliminarGaia").empty();
		}
		function cerrarPuesto() {
			$("#editarEliminarPuesto").empty();
		}
		function cerrarUser() {
			$("#editarEliminarUser").empty();
		}
    function cerrarArea() {
      $("#editarEliminarArea").empty();
    }
	</script>