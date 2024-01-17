// ***************************************************************************************************************************************************************************
function init() {
  $("#frm_orden").on("submit", function (e) {
    guardaryeditar(e);
  });
}
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
$().ready(() => {
  todos();
});
// ***************************************************************************************************************************************************************************
// var todos = () => {
//   var html = "";
//   $.get("../../Controllers/orden.controller.php?op=todos", (res) => {
//     console.log(res);
//     res = JSON.parse(res);
//     $.each(res, (index, valor) => {
//       html += `<tr>
//                 <td>${index + 1}</td>
//                 <td>${valor.Nombre}</td>
//                 <td>${valor.Telefono}</td>
//                 <td>${valor.Ciudad}</td>
//                 <td>${valor.Pais}</td>
//                 <td>${valor.DireccionEnvio}</td>
//                 <td>${valor.FechaOrden}</td>
//                 <td>${valor.FormaEnvio}</td>
//                 <td>${valor.Total}</td>
//                 <td>${valor.Estado}</td>
//                 <td>

//                   <button class='btn btn-success' onclick='editar(${valor.OrdenID})'>Editar</button>
//                   <button class='btn btn-danger' onclick='eliminar(${valor.OrdenID})'>Eliminar</button>
//                   <button class='btn btn-info' onclick='ver(${valor.OrdenID})'>Ver</button>
//                 </td>
//               </tr>`;
//     });
//     $("#tabla_orden").html(html);
//   });
// };

var todos = () => {
  var html = "";
  $.get("../../Controllers/orden.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      // Definir clases CSS según el estado
      var estadoClass = "";
      if (valor.Estado === "Pendiente") {
        estadoClass = "text-danger"; // Texto en rojo
      } else if (valor.Estado === "Procesado") {
        estadoClass = "text-warning"; // Texto en amarillo
      } else if (valor.Estado === "Enviado") {
        estadoClass = "text-success"; // Texto en verde
      }
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Telefono}</td>
                <td>${valor.Ciudad}</td>
                <td>${valor.Pais}</td>
                <td>${valor.DireccionEnvio}</td>
                <td>${valor.FechaOrden}</td>
                <td>${valor.FormaEnvio}</td>
                <td>${valor.Total}</td>
                <td class="${estadoClass}">${valor.Estado}</td>
                <td>
                  <button class='btn btn-success' onclick='editar(${valor.OrdenID})'>Editar</button>
                 
                  <button class='btn btn-info' onclick='ver(${valor.OrdenID})'>Ver</button>
                </td>
              </tr>`;
    });
    $("#tabla_orden").html(html);
  });
};


// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************


// var guardaryeditar = (e) => {
//   e.preventDefault();
//   var dato = new FormData($("#frm_orden")[0]);
//   var ruta = "";
//   // var OrdenID = $("#OrdenID").val(); // Corregido: Usar jQuery para obtener el valor
//   var OrdenID = document.getElementById("OrdenID").value;
//   if (OrdenID > 0) {
//     ruta = "../../Controllers/orden.controller.php?op=actualizar";
//   } else {
//     ruta = "../../Controllers/orden.controller.php?op=insertar";
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
//         Swal.fire("orden", "Registrado con éxito", "success");
//         todos();
//         limpia_Cajas();
//       } else {
//         Swal.fire("orden", "Error al guardar, inténtalo de nuevo más tarde", "error");
//       }
//     },
//   });
// };

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_orden")[0]);
  var ruta = "";
  var OrdenID = document.getElementById("OrdenID").value;

  if (OrdenID > 0) {
    ruta = "../../Controllers/orden.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/orden.controller.php?op=insertar";
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
          Swal.fire("orden", "Registrado con éxito", "success");
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
// ***************************************************************************************************************************************************************************
var cargaclientes = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/clientes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.ClienteID}">${val.Nombre}</option>`;
      });
      $("#ClienteID").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};
// ***************************************************************************************************************************************************************************
// ***************************************************************************************************************************************************************************
var editar = async (OrdenID) => {
  await cargaclientes();
  $.post(
    "../../Controllers/orden.controller.php?op=uno",
    { OrdenID: OrdenID },
    (res) => {
      res = JSON.parse(res);

      $("#OrdenID").val(res.OrdenID);
      $("#ClienteID").val(res.ClienteID);
      $("#FormaEnvio").val(res.FormaEnvio);
      $("#DireccionEnvio").val(res.DireccionEnvio);
      $("#FechaOrden").val(res.FechaOrden);
      $("#Total").val(res.Total);
      $("#Estado").val(res.Estado);

    }
  );
  $("#Modal_orden").modal("show");
};

// **********************************************************************************************************
// var ver = async (OrdenID) => {
//   $.post(
//       "../../Controllers/orden.controller.php?op=unover",
//       { OrdenID: OrdenID },
//       (res) => {
//           res = JSON.parse(res);



//           // Obtén la referencia a la lista de productos en el modal
//           var listaProductos = $("#lista_productos");

//           // Limpiar la lista antes de agregar nuevos elementos
//           listaProductos.empty();

//           // Itera sobre los productos y agrega cada uno como un elemento de lista
//           res.Productos.forEach(function(producto) {
//               var listItem = $("<li>").text(producto.Nombre);
//               listaProductos.append(listItem);
//           });
//       }
//   );
//   $("#Modal_productoso").modal("show");
// };
var ver = async (OrdenID) => {
  $.post(
    "../../Controllers/orden.controller.php?op=unover",
    { OrdenID: OrdenID },
    (res) => {
  
      // res = JSON.parse(res);
      res = JSON.parse(res);

      // Obtén la referencia a la lista de productos en el modal
      var listaProductos = $("#lista_productos");

      // Limpiar la lista antes de agregar nuevos elementos
      listaProductos.empty();

      // Itera sobre los productos y agrega cada uno como un elemento de lista
      res.forEach(function (producto) {
        var listItem = $("<li>").text(producto.Nombre);
        listaProductos.append(listItem);
      });
    }
  );
  $("#Modal_productoso").modal("show");
};






// ***************************************************************************************************************************************************************************
// var eliminar = (OrdenID) => {
//   Swal.fire({
//     title: "orden",
//     text: "¿Estás seguro de eliminar la orden?",
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#d33",
//     cancelButtonColor: "#3085d6",
//     confirmButtonText: "Eliminar",
//   }).then((result) => {
//     if (result.isConfirmed) {
//       $.post(
//         "../../Controllers/orden.controller.php?op=eliminar",
//         { OrdenID: OrdenID },
//         (res) => {
//           res = JSON.parse(res);
//           if (res === "ok") {
//             Swal.fire("orden", "orden Eliminado", "success");
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
var limpia_Cajas = () => {
  $("#OrdenID").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#ID_Provedores").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#Nombre_Producto").val("");
  $("#Cantidad").val("");
  $("#Precio_Unitario").val("");

  $("#Modal_orden").modal("hide");
};
// ***************************************************************************************************************************************************************************

init();
