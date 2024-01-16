//aqui va a estar el codigo de usuarios.model.js
/***************************************************************************************** */
function init() {
  $("#form_productos").on("submit", function (e) {
    guardaryeditar(e);
  });
}
/***************************************************************************************** */
$().ready(() => {
  todos();
});
/***************************************************************************************** */
var todos = () => {
  var html = "";
  $.get("../../Controllers/productos2.controller.php?op=todos", (res) => {
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
      <td>${index + 1}</td>
      <td>${valor.CodigoReferencia}</td>
      <td>${valor.Nombre}</td>
      <td>${valor.Precio}</td>
      <td>${valor.Descripcion}</td>
      <td><img src="${valor.Imagen}" class="card-img-top"></td>
      <td>${valor.CategoriaID}</td>
      <td>${valor.FechaIngreso}</td>
      <td>${valor.Stock}</td>
      <td>${valor.Iva}</td>
      
  <td>
  <button class='btn btn-success' onclick='editar(${valor.ProductoID
        })'>Editar</button>
  <button class='btn btn-danger' onclick='eliminar(${valor.ProductoID
        })'>Eliminar</button>
  </td></tr>
      `;
    });
    $("#tabla_productos").html(html);
  });
}
/***************************************************************************************** */
var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#form_productos")[0]);
  var ruta = "";
  var ProductoID = document.getElementById("ProductoID").value;
  if (ProductoID > 0) {
    ruta = "../../Controllers/productos2.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/productos2.controller.php?op=insertar";
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
/***************************************************************************************** */
// cagar categoira  
/***************************************************************************************** */
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
/***************************************************************************************** */
var editar = async (ProductoID) => {
  await cargaCategoria();
  $.post(
    "../../Controllers/productos2.controller.php?op=uno",
    { ProductoID: ProductoID },
    (res) => {
      res = JSON.parse(res);
      $("#ProductoID").val(res.ProductoID);

      $("#CodigoReferencia").val(res.CodigoReferencia);

      $("#Nombre").val(res.Nombre);

      $("#Precio").val(res.Precio);

      $("#Descripcion").val(res.Descripcion);

      $("#Imagen").val(res.Imagen);

      $("#CategoriaID").val(res.CategoriaID);

      $("#FechaIngreso").val(res.FechaIngreso);

      $("#Stock").val(res.Stock);

      $("#Iva").val(res.Iva);
    }
  );
  $("#Modal_productos").modal("show");

  limpia_Cajas();
  
};


/***************************************************************************************** */
var eliminar = (ProductoID) => {
  Swal.fire({
    title: "Empleado",
    text: "¿Estás seguro de eliminar el empleado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/productos2.controller.php?op=eliminar",
        { ProductoID: ProductoID },
        (res) => {
          try {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("productos", "productos Eliminado", "success");
              todos();
            } else {
              Swal.fire("Error al Eliminar", res.message || "El productos esta registrado en un proyecto", "error");
            }
          } catch (error) {
            console.error("Error al parsear la respuesta JSON:", error);
            Swal.fire("Error", "Error al procesar la respuesta del servidor", "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
};

/***************************************************************************************** */


var limpia_Cajas = () => {

  document.getElementById("ProductoID").value = "";
  document.getElementById("CodigoReferencia").value = "";
  document.getElementById("Nombre").value = "";
  document.getElementById("Precio").value = "";
  document.getElementById("Descripcion").value = "";
  document.getElementById("Imagen").value = "";
  document.getElementById("CategoriaID ").value = "";
  document.getElementById("FechaIngreso").value = "";
  document.getElementById("Stock").value = "";
  document.getElementById("Iva").value = "";

  $("#Modal_productos").modal("hide");
}



init();