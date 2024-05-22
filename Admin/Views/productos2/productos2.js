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
  $.get("../../Controllers/productos2.controller.php?op=todos1", (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
          html += `<tr>
          <td hidden>${index + 1}</td>
          <td>${valor.CodigoReferencia}</td>
          <td>${valor.Nombre}</td>
          <td>${valor.Precio}</td>
          <td>${valor.Descripcion}</td>
          <td><img src="${valor.Imagen}" class="card-img-top"></td>
          <td>${valor.NombreCategoria}</td> <!-- Mostrar el nombre de la categoría -->
          <td>${valor.FechaIngreso}</td>
          <td>${valor.Stock}</td>
          <td>${valor.PorcentajeIva}</td> <!-- Mostrar el porcentaje de IVA -->
          <td>
              <button class='btn btn-success' onclick='uno(${valor.ProductoID})'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.ProductoID})'>Eliminar</button>
          </td>
          </tr>`;
      });
      $("#tabla_productos").html(html);
  });
}
/***************************************************************************************** */

var guardaryeditar= (e) => {
  e.preventDefault();
var url = "";
var form_Data = new FormData($("#form_productos")[0]);
var ProductoID= document.getElementById("ProductoID").value;
if (ProductoID === undefined || ProductoID === "") {
  url = "../../Controllers/productos2.controller.php?op=insertar";
} else {
  url = "../../Controllers/productos2.controller.php?op=actualizar";
}
for (var pair of form_Data.entries()) {
  console.log(pair[0]+ ', ' + pair[1]); 
}
$.ajax({
  url: url,
  type: "POST",
  data: form_Data,
  processData: false,
  contentType: false,
  cache: false,
  success: (respuesta) => {
    try{
    respuesta = JSON.parse(respuesta);
    console.log(respuesta);
    if (respuesta == "ok") {
      Swal.fire('Productos', 'Se guardo con exito','success');
      limpia_Cajas();
      todos();
    } else {
      Swal.fire('Productos', 'Ocurrio un error','danger');
    }
  }catch(error){
    Swal.fire('Error', 'No se puede guardar el Producto porque ya se encuentra registrado', 'error');
  }
  },
});
};
/***************************************************************************************** */
// cagar productos
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

var cargaIva= () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/iva.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.id_iva}">${val.porcentaje}</option>`;
      });
      $("#Iva").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

/***************************************************************************************** */

var uno = (ProductoID) => {
  $.post('../../Controllers/productos2.controller.php?op=uno', {
    ProductoID: ProductoID
  }, (res) => {
      res = JSON.parse(res);
      console.log(res);
      // Resto de tu código...
      $("#ProductoID").val(res.ProductoID);
      $("#CodigoReferencia").val(res.CodigoReferencia);
      $("#Nombre").val(res.Nombre);
      $("#Precio").val(res.Precio);
      $("#Descripcion").val(res.Descripcion);
      $("#CategoriaID").val(res.CategoriaID);
      $("#FechaIngreso").val(res.FechaIngreso);
      $("#Iva").val(res.Iva);
      $("#Stock").val(res.Stock);
  })
  $('#Modal_productos').modal('show');
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
              Swal.fire("Error al Eliminar", res.message || "El producto esta registrado en una orden", "error");
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
  document.getElementById("CategoriaID").value = "";
  document.getElementById("FechaIngreso").value = "";
  document.getElementById("Stock").value = "";
  document.getElementById("Iva").value = "";

  $("#Modal_productos").modal("hide");
}



init();