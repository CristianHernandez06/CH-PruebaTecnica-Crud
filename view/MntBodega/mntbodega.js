var tabla;

function init() {
  $("#bodega_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}


$(document).ready(function () {
  // Select2
  $("#enc_id").select2({
    dropdownParent: $("#modalmantenimiento"),
  });

  $("#est_id").select2({
    dropdownParent: $("#modalmantenimiento"),
  });

  $.post("../../controller/encargado.php?op=combo", function (data) {
    $("#enc_id").html(data);
    console.log(data);
  });

  $.post("../../controller/estado.php?op=combo", function (data) {
    $("#est_id").html(data);
    console.log(data);
  });

  tabla = $("#bodega_data")
    .dataTable({
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../../controller/bodega.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10, //Por cada 10 registros hace una paginación
      order: [[0, "asc"]], //Ordenar (columna,orden)
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
});


function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#bodega_form")[0]);
  $.ajax({
    url: "../../controller/bodega.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      $("#bodega_form")[0].reset();
      $("#modalmantenimiento").modal("hide");
      $("#bodega_data").DataTable().ajax.reload();

      swal.fire("Registro!", "El registro correctamente.", "success");
    },
  });
}


function editar(bod_id) {
  $.post(
    "../../controller/bodega.php?op=mostrar",
    { bod_id: bod_id },
    function (data) {
      data = JSON.parse(data);
      $("#bod_id").val(data.bod_id);
      $("#enc_id").val(data.enc_id).trigger("change");
      $("#bod_cod").val(data.bod_cod);
      $("#bod_nom").val(data.bod_nom);
      $("#bod_direcc").val(data.bod_direcc);
      $("#bod_dot").val(data.bod_dot);
      $("#est_id").val(data.est_id).trigger("change");
    }
  );
  $("#mdltitulo").html("Editar Registro");
  $("#modalmantenimiento").modal("show");
}


function eliminar(bod_id) {
  swal
    .fire({
      title: "CRUD",
      text: "Desea Eliminar el Registro?",
      icon: "error",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../controller/bodega.php?op=eliminar",
          { bod_id: bod_id },
          function (data) {}
        );

        $("#bodega_data").DataTable().ajax.reload();

        swal.fire(
          "Eliminado!",
          "El registro se elimino correctamente.",
          "success"
        );
      }
    });
}


$(document).on("click", "#btnnuevo", function () {
  $("#bod_id").val("");
  $("#enc_id").val("").trigger("change");
  $("#est_id").val("").trigger("change");
  $("#bod_cod").val("");
  $("#bod_nom").val("");
  $("#bod_direcc").val("");
  $("#bod_dot").val("");
  $("#mdltitulo").html("Nuevo Registro");
  $("#modalmantenimiento").modal("show");
});

init();
