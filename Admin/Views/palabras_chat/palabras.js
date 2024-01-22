// ***************************************************************************************************************************************************************************
function init() {
  $("#frm_palabras").on("submit", function (e) {
    guardaryeditar(e);
  });
}
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
$().ready(() => {
  todos();
});
// ***************************************************************************************************************************************************************************

var todos = () => {
  var html = "";
  $.get("../../Controllers/palabras.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      // // Definir clases CSS según el estado
      // var estadoClass = "";
      // if (valor.Estado === "Pendiente") {
      //   estadoClass = "text-danger"; // Texto en rojo
      // } else if (valor.Estado === "Procesado") {
      //   estadoClass = "text-warning"; // Texto en amarillo
      // } else if (valor.Estado === "Enviado") {
      //   estadoClass = "text-success"; // Texto en verde
      // }
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.palabras}</td>
                <td>
                  <button class='btn btn-success' onclick='editar(${valor.codigo})'>Editar</button>
                 
                  <button class='btn btn-info' onclick='eliminar(${valor.codigo})'>Eliminar</button>
                </td>
              </tr>`;
    });
    $("#tabla_palabras").html(html);
  });
};


// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_palabras")[0]);
  var ruta = "";
  var codigo = document.getElementById("codigo").value;
  
  if (codigo > 0) {
    ruta = "../../Controllers/palabras.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/palabras.controller.php?op=insertar";
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Productos", "Registrado con éxito", "success");
        limpia_Cajas();
        todos();
        
      } else {
        limpia_Cajas();
        Swal.fire("Productos", "Error al guardo, intente mas tarde", "error");
      
      }
    },
  });
};

// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
var editar = async (codigo) => {
  $.post(
    "../../Controllers/palabras.controller.php?op=uno",
    { codigo: codigo },
    (res) => {
      res = JSON.parse(res);

      $("#codigo").val(res.codigo);
      $("#palabras").val(res.palabras);

    }
  );
  $("#Modal_palabras").modal("show");
};

// **********************************************************************************************************







// ***************************************************************************************************************************************************************************
var eliminar = (codigo) => {
  Swal.fire({
    title: "palabras",
    text: "¿Estás seguro de eliminar la palabras?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/palabras.controller.php?op=eliminar",
        { codigo: codigo },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("palabras", "palabras Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error"); // Mostrar mensaje de error
          }
        }
      );
    }
  });

  limpia_Cajas();
};
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
var limpia_Cajas = () => {
  $("#codigo").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#palabras").val(""); // Corregido: Usar jQuery para establecer el valor

  $("#Modal_palabras").modal("hide");
};
// ***************************************************************************************************************************************************************************

init();
