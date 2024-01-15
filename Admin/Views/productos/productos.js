// Aquí va a estar el código de usuarios.model.js

function init() {
  $("#frm_productos").on("submit", function (e) {
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
  $.get("../../Controllers/productos.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.CodigoReferencia}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Precio}</td>
                <td>${valor.Descripcion}</td>
                <td>${valor.Imagen}</td>
                <td>${valor.CategoriaID}</td>
                <td>${valor.FechaIngreso}</td>
                <td>${valor.Stock}</td>
                <td>
                  <button class='btn btn-success' onclick='editar(${valor.ProductoID})'>Editar</button>
                  <button class='btn btn-danger' onclick='eliminar(${valor.ProductoID})'>Eliminar</button>
                  <button class='btn btn-info' onclick='ver(${valor.ProductoID})'>Ver</button>
                </td>
              </tr>`;
    });
    $("#tabla_productos").html(html);
  });
};

// var guardaryeditar = (e) => {
//   e.preventDefault();
//   var dato = new FormData($("#frm_productoss")[0]);
//   var ruta = "";
//   // var ProductoID = $("#ProductoID").val(); // Corregido: Usar jQuery para obtener el valor
//   var ProductoID = document.getElementById("ProductoID").value;
//   if (ProductoID > 0) {
//     ruta = "../../Controllers/productos.controller.php?op=actualizar";
//   } else {
//     ruta = "../../Controllers/productos.controller.php?op=insertar";
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
//         Swal.fire("productos", "Registrado con éxito", "success");
//         todos();
//         limpia_Cajas();
//       } else {
//         Swal.fire("productos", "Error al guardar, inténtalo de nuevo más tarde", "error");
//       }
//     },
//   });
// };

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_productos")[0]);
  var ruta = "";
  var ProductoID = document.getElementById("ProductoID").value;

  if (ProductoID > 0) {
      ruta = "../../Controllers/productos.controller.php?op=actualizar";
  } else {
      ruta = "../../Controllers/productos.controller.php?op=insertar";
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
                  Swal.fire("productos", "Registrado con éxito", "success");
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

var cargaCategoria = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/categoria.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.CategoriaID}">${val.Nombre}</option>`;
      });
      $("#CategoriaID").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (ProductoID) => {
  await cargaCategoria();
  $.post(
    "../../Controllers/productos.controller.php?op=uno",
    { ProductoID: ProductoID },
    (res) => {
      res = JSON.parse(res);

      $("#ProductoID").val(res.ProductoID);
      $("#CategoriaID").val(res.CategoriaID);
      $("#Nombre_Producto").val(res.Nombre_Producto);
      $("#Cantidad").val(res.Cantidad);
      $("#Precio_Unitario").val(res.Precio_Unitario);
    }
  );
  $("#Modal_productos").modal("show");
};

var eliminar = (ProductoID) => {
  Swal.fire({
    title: "productos",
    text: "¿Estás seguro de eliminar la productos?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/productos.controller.php?op=eliminar",
        { ProductoID: ProductoID },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("productos", "productos Eliminado", "success");
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
  $("#ProductoID").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#CategoriaID").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#Nombre_Producto").val("");
  $("#Cantidad").val("");
  $("#Precio_Unitario").val("");

  $("#Modal_productos").modal("hide");
};

init();
