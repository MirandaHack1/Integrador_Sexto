var init = () => {
  $("#frm_productos").on("submit", (e) => {
    guardaryeditar(e);
  });

  $("#frm_productos_imagen").on("submit", (e) => {
    editar_imagen(e);
  });
};
$().ready(() => {
  todos();
});

var editar_imagen = (e)=>{
    e.preventDefault();
    var dato = new FormData($("#frm_productos_imagen")[0]);
    $.ajax({
        url: "../../Controllers/productos.controller.php?op=actualizar_imagen",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res);
            res = JSON.parse(res);
            if(res == "ok"){
                Swal.fire("Actualizado Correctamente");
                $("#modal_productos_imagen").modal("hide");
                todos();
            }else{
                Swal.fire("Error al Actualizar");
            }
        },
    });

}
var todos = () => {
  var html = "";
  $.get("../../Controllers/productos.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);

    $.each(res, (index, valor) => {
      html += `<tr>
            <td>${index + 1} </td>
            <td><img src="${valor.Imagen}" class="card-img-top"></td>
            <td>${valor.Nombre}</td>
            <td>${valor.Precio_Venta}</td>
            <td>${valor.cantidad}</td>
            <td>${valor.Unidad_Medida}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.ProductoId
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.ProductoId
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.ProductoId
            })'>Actualizar Imagen</button>
            </td></tr>
                `;
    });

    $("#tabla_productos").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_productos")[0]);
  var ruta = "";
  var ProductoId = document.getElementById("ProductoId").value;
  if (ProductoId > 0) {
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
        console.log(res);
      
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Paises", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("usuarios", "Error al guardo, intente mas rtarde", "error");
      }
    },
  });
};

var editar = (ProductoId) => {
  $.post(
    "../../Controllers/productos.controller.php?op=uno",
    { ProductoId: ProductoId },
    (res) => {
        console.log(res);
      res = JSON.parse(res);
      $("#ProductoId").val(res.ProductoId);
      $("#Nombre").val(res.Nombre);
      document.getElementById("Precio_Compra").value = res.Precio_Compra;
      document.getElementById("Precio_Venta").value = res.Precio_Venta;
      document.getElementById("Iva").value = res.Iva;
      document.getElementById("cantidad").value = res.cantidad;
      document.getElementById("Unidad_Medida").value = res.Unidad_Medida;
      
      document.getElementById("img_producto").src = res.Imagen;
      document.getElementById("Fecha").value = res.Fecha;
      $("#img_producto").removeClass("d-none");
    }
  );
  $("#Modal_producto").modal("show");
};

var limpia_Cajas = () => {
  document.getElementById("ProductoId").value = "";
  document.getElementById("Nombre").value = "";
  document.getElementById("Precio_Compra").value = "";
  document.getElementById("Precio_Venta").value = "";
  document.getElementById("Iva").value = "";
  document.getElementById("cantidad").value = "";
  document.getElementById("Unidad_Medida").value = "";
  document.getElementById("Imagen").value = "";
  document.getElementById("Fecha").value = "";
  $("#img_producto").addClass("d-none");
  $("#Modal_producto").modal("hide");
};

var ver = (ProductoId) => {
  
      document.getElementById("ProductoId2").value = ProductoId;
  $("#Modal_producto_imagen").modal("show");   
}

init();
