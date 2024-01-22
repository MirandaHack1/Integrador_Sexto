// ***************************************************************************************************************************************************************************
function init() {
  //   $("#frm_palabras").on("submit", function (e) {
  //     guardaryeditar(e);
  //   });
}
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
$().ready(() => {
  todos();
});
// ***************************************************************************************************************************************************************************

var todos = () => {
  var html = "";
  $.get("../../Controllers/pagos.controller.php?op=todos", (res) => {
    try {
      res = JSON.parse(res);

      if (!Array.isArray(res)) {
        console.error("La respuesta no es un arreglo válido.");
        return;
      }

      $.each(res, (index, valor) => {
        // Definir clases CSS según el estado
        var estadoClass = "";
        switch (valor.status) {
          case "Completo":
            estadoClass = "text-danger"; // Texto en rojo
            break;
          case "Procesado":
            estadoClass = "text-warning"; // Texto en amarillo
            break;
          case "Enviado":
            estadoClass = "text-success"; // Texto en verde
            break;
          default:
            estadoClass = ""; // Otra clase o sin clase
        }

        html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.id_transaccion}</td>
                  <td>${valor.fecha}</td>
                  <td>${valor.email}</td>
                  <td>${valor.Nombre}</td>
                  <td>${valor.total}</td>
                  <td class="${estadoClass}">${valor.status}</td>
                  <td>
                </tr>`;
      });

      $("#tabla_pagos").html(html);
    } catch (error) {
      console.error("Error al analizar la respuesta JSON:", error);
    }
  });
};

// Llamada a la función todos
todos();

// Llamada a la función todos
todos();


// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
// var guardaryeditar = (e) => {
//   e.preventDefault();
//   var dato = new FormData($("#frm_palabras")[0]);
//   var ruta = "";
//   var codigo = document.getElementById("codigo").value;

//   if (codigo > 0) {
//     ruta = "../../Controllers/palabras.controller.php?op=actualizar";
//   } else {
//     ruta = "../../Controllers/palabras.controller.php?op=insertar";
//   }
//   $.ajax({
//     url: ruta,
//     type: "POST",
//     data: dato,
//     contentType: false,
//     processData: false,
//     success: function (res) {
//       res = JSON.parse(res);
//       if (res == "ok") {
//         Swal.fire("Productos", "Registrado con éxito", "success");
//         limpia_Cajas();
//         todos();

//       } else {
//         limpia_Cajas();
//         Swal.fire("Productos", "Error al guardo, intente mas tarde", "error");

//       }
//     },
//   });
// };

// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
// var editar = async (codigo) => {
//   $.post(
//     "../../Controllers/palabras.controller.php?op=uno",
//     { codigo: codigo },
//     (res) => {
//       res = JSON.parse(res);

//       $("#codigo").val(res.codigo);
//       $("#palabras").val(res.palabras);

//     }
//   );
//   $("#Modal_palabras").modal("show");
// };

// **********************************************************************************************************







// ***************************************************************************************************************************************************************************
// var eliminar = (codigo) => {
//   Swal.fire({
//     title: "palabras",
//     text: "¿Estás seguro de eliminar la palabras?",
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#d33",
//     cancelButtonColor: "#3085d6",
//     confirmButtonText: "Eliminar",
//   }).then((result) => {
//     if (result.isConfirmed) {
//       $.post(
//         "../../Controllers/palabras.controller.php?op=eliminar",
//         { codigo: codigo },
//         (res) => {
//           res = JSON.parse(res);
//           if (res === "ok") {
//             Swal.fire("palabras", "palabras Eliminado", "success");
//             todos();
//           } else {
//             Swal.fire("Error", res, "error"); // Mostrar mensaje de error
//           }
//         }
//       );
//     }
//   });

//   limpia_Cajas();
// };
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
// var limpia_Cajas = () => {
//   $("#codigo").val(""); // Corregido: Usar jQuery para establecer el valor
//   $("#palabras").val(""); // Corregido: Usar jQuery para establecer el valor

//   $("#Modal_palabras").modal("hide");
// };
// ***************************************************************************************************************************************************************************

init();
