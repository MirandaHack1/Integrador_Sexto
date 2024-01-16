// Aquí va a estar el código de usuarios.model.js

function init() {
  $("#frm_inventario").on("submit", function (e) {
    guardaryeditar(e);
  });
}

// $(document).ready(() => {
//   todos();
// });
$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/inventario.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.proveedores}</td>
                <td>${valor.Nombre_Producto}</td>
                <td>${valor.Cantidad}</td>
                <td>${valor.Precio_Unitario}</td>
                <td>
                  <button class='btn btn-success' onclick='editar(${valor.ID_Producto})'>Editar</button>
                  <button class='btn btn-danger' onclick='eliminar(${valor.ID_Producto})'>Eliminar</button>
                  <button class='btn btn-info' onclick='ver(${valor.ID_Producto})'>Ver</button>
                </td>
              </tr>`;
    });
    $("#tabla_inventario").html(html);
  });
};

// var guardaryeditar = (e) => {
//   e.preventDefault();
//   var dato = new FormData($("#frm_inventario")[0]);
//   var ruta = "";
//   // var ID_Producto = $("#ID_Producto").val(); // Corregido: Usar jQuery para obtener el valor
//   var ID_Producto = document.getElementById("ID_Producto").value;
//   if (ID_Producto > 0) {
//     ruta = "../../Controllers/inventario.controller.php?op=actualizar";
//   } else {
//     ruta = "../../Controllers/inventario.controller.php?op=insertar";
//   }
//   $.ajax({
//     url: ruta,
//     type: "POST",
//     data: dato,
//     contentType: false,
//     processData: false,
//     success: function (res) {
//       res = JSON.parse(res);
//       if (res === "ok") { // Corregido: Verificar la propiedad status
//         Swal.fire("inventario", "Registrado con éxito", "success");
//         todos();
//         limpia_Cajas();
//       } else {
//         Swal.fire("inventario", "Error al guardar, inténtalo de nuevo más tarde", "error");
//       }
//     },
//   });
// };

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_inventario")[0]);
  var ruta = "";
  var ID_Producto = document.getElementById("ID_Producto").value;

  if (ID_Producto > 0) {
      ruta = "../../Controllers/inventario.controller.php?op=actualizar";
  } else {
      ruta = "../../Controllers/inventario.controller.php?op=insertar";
  }

  $.ajax({
      url: ruta,
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
          try {
              res = JSON.parse(res);
              if (res === "ok") {
                  Swal.fire("inventario", "Registrado con éxito", "success");
                  todos();
                  limpia_Cajas();
              } else {
                  Swal.fire("Error", res, "error"); // Mostrar mensaje de error al usuario
              }
          } catch (error) {
              console.error("Error al parsear la respuesta del servidor:", error);
              Swal.fire("Error", "Error inesperado, inténtalo de nuevo más tarde", "error");
          }
      },
      error: function (xhr, status, error) {
          console.error("Error en la solicitud AJAX:", error);
          Swal.fire("Error", "Error inesperado, inténtalo de nuevo más tarde", "error");
      }
  });
};

var cargaInventario = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/proveedores.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.ID_Provedores}">${val.Nombre}</option>`;
      });
      $("#ID_Provedores").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (ID_Producto) => {
  await cargaInventario();
  $.post(
    "../../Controllers/inventario.controller.php?op=uno",
    { ID_Producto: ID_Producto },
    (res) => {
      res = JSON.parse(res);

      $("#ID_Producto").val(res.ID_Producto);
      $("#ID_Provedores").val(res.ID_Provedores);
      $("#Nombre_Producto").val(res.Nombre_Producto);
      $("#Cantidad").val(res.Cantidad);
      $("#Precio_Unitario").val(res.Precio_Unitario);
    }
  );
  $("#Modal_inventario").modal("show");
};

var eliminar = (ID_Producto) => {
  Swal.fire({
    title: "inventario",
    text: "¿Estás seguro de eliminar la inventario?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/inventario.controller.php?op=eliminar",
        { ID_Producto: ID_Producto },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("inventario", "inventario Eliminado", "success");
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

var limpia_Cajas = () => {
  $("#ID_Producto").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#ID_Provedores").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#Nombre_Producto").val("");
  $("#Cantidad").val("");
  $("#Precio_Unitario").val("");

  $("#Modal_inventario").modal("hide");
};

init();
