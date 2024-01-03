class Categoria_model {
  constructor(
    CategoriaID,
    Nombre,
    Descripcion,
    Estado,
    Ruta
  ) {
    this.CategoriaID = CategoriaID;
    this.Nombre = Nombre;
    this.Descripcion = Descripcion;
    this.Estado = Estado;
    this.Ruta = Ruta;

  }
  // todos() {
  //   var html = "";
  //   $.get("../../Controllers/categoria.controller.php?op=" + this.Ruta, (res) => {
  //     res = JSON.parse(res);
  //     $.each(res, (index, valor) => {
  //     var fondo;
  //     if (valor.Estado == "Publicar") fondo = "bg-primary";
  //     else if (valor.Estado == "No_Publicar") fondo = "bg-success";

  //       html += `<tr>
  //                           <td>${index + 1}</td>
  //                           <td>${valor.Nombre}</td>
  //                           <td>${valor.Descripcion}</td>
  //                           <td><div class="d-flex align-items-center gap-2">
  //                           <span class="badge ${fondo} rounded-3 fw-semibold">${
  //                             valor.Estado }</span>
  //           </div></td>
  //           <td>
  //           <button class='btn btn-success' onclick='editar(${valor.CategoriaID
  //         })'>Editar</button>
  //           <button class='btn btn-danger' onclick='eliminar(${valor.CategoriaID
  //         })'>Eliminar</button>
  //           <button class='btn btn-info' onclick='ver(${valor.CategoriaID
  //         })'>Ver</button>
  //           </td></tr>
  //               `;
  //     });
  //     $("#tabla_categoria").html(html);
  //   });
  //   return html;

  // }
  todos() {
    var html = "";
    $.get("../../Controllers/categoria.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        var fondo;
        var textColor; // Variable para definir el color del texto

        if (valor.Estado == "Publicar") {
          fondo = "bg-success"; // Fondo verde
          textColor = "text-white"; // Texto blanco para destacar
        } else if (valor.Estado == "No_Publicar") {
          fondo = "bg-danger"; // Fondo rojo
          textColor = "text-white"; // Texto blanco para destacar
        }

        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Descripcion}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge ${fondo} rounded-3 fw-semibold ${textColor}">
                            ${valor.Estado}
                        </span>
                    </div>
                </td>
                <td>
                    <button class='btn btn-success' onclick='editar(${valor.CategoriaID})'>Editar</button>
                    <button class='btn btn-danger' onclick='eliminar(${valor.CategoriaID})'>Eliminar</button>
                    <button class='btn btn-info' onclick='ver(${valor.CategoriaID})'>Ver</button>
                </td>
            </tr>`;
      });

      $("#tabla_categoria").html(html);
    });
    return html;

  }


  insertar() {
    var dato = new FormData();
    dato = this.Estado;
    $.ajax({
      url: "../../Controllers/categoria.controller.php?op=insertar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("categoria", "categoria Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }


  uno() {
    var CategoriaID = this.CategoriaID;
    $.post(
      "../../Controllers/categoria.controller.php?op=uno",
      { CategoriaID: CategoriaID },
      (res) => {
        console.log(res);
        res = JSON.parse(res);
        $("#CategoriaID").val(res.CategoriaID);
        $("#Nombre").val(res.Nombre);
        $("#Descripcion").val(res.Descripcion);
        document.getElementById("Estado").value = res.Estado; //asiganr al select el valor

      }
    );
    $("#Modal_categoria").modal("show");
  }

  editar() {
    var dato = new FormData();
    dato = this.Estado;
    $.ajax({
      url: "../../Controllers/categoria.controller.php?op=actualizar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("Categoria", "Categoria Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  eliminar() {
    var CategoriaID = this.CategoriaID;

    Swal.fire({
      title: "empleado",
      text: "Esta seguro de eliminar la Categoria",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/categoria.controller.php?op=eliminar",
          { CategoriaID: CategoriaID },
          (res) => {
            console.log(res);

            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("Categoria", "Categoria Eliminado", "success");
              todos_controlador();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });

    this.limpia_Cajas();
  }

  limpia_Cajas() {
    // document.getElementById("Nombre").value = "";
    // document.getElementById("frm_empleado").value = "";
    // document.getElementById("frm_fecha_nacimiento").value = "";
    // document.getElementById("frm_celular").value = "";
    document.getElementById("Nombre").value = "";
    document.getElementById("Descripcion").value = "";
    document.getElementById("Estado").value = "";
    $("#CategoriaID").val("");

    $("#Modal_categoria").modal("hide");
  }
}