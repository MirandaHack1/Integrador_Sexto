// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
class Palabras_Model {
  constructor(
    id,
    palabras,
    Ruta
  ) {
    this.id = id;
    this.palabras = palabras;
    this.Ruta = Ruta;
  }
// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
  todos() {
    var html = "";
    $.get("../../Controllers/palabras.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        var fondo;
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.palabras}</td>
  
                <td>
                <button class='btn btn-success' onclick='editar(${valor.id
                      })'>Editar</button>
                <button class='btn btn-danger' onclick='eliminar(${valor.id
                      })'>Eliminar</button>
                </td></tr>
                    `;
                  });
      $("#tabla_palabras").html(html);
    });
  }
  
//   todos() {
//     var html = "";
//     $.get("../../Controllers/palabras.Controllers.php?op=" + this.Ruta, (res) => {
//         res = JSON.parse(res);
//         $.each(res, (index, valor) => {
//             html += `<tr>
//                         <td>${index + 1}</td>
//                         <td>${valor.palabras}</td>
//                         <td>
//                             <button class='btn btn-success' onclick='editar(${valor.id})'>Editar</button>
//                             <button class='btn btn-danger' onclick='eliminar(${valor.id})'>Eliminar</button>
//                             <button class='btn btn-info' onclick='ver(${valor.id})'>Ver</button>
//                         </td>
//                     </tr>`;
//         });
//         $("#tabla_palabras").html(html);
//     });
// }

// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
  insertar() {
    var dato = new FormData();
    dato = this.palabras;
    $.ajax({
      url: "../../Controllers/palabras.controller.php?op=insertar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("palabras", "palabras Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }
// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
uno() {
  var id = this.id;
  $.post(
    // "../../ControllersContpalabraslers/palabras.contpalabrasler.php?op=uno",
    "../../Controllers/palabras.controller.php?.op=uno",
    { id: id },
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      $("#id").val(res.id);
      document.getElementById("palabras").value = res.palabras; //asiganr al select el valor
    }
  );
  $("#Modal_palabras").modal("show");
}
// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
  editar() {
    var dato = new FormData();
    dato = this.palabras;
    $.ajax({
      url: "../../Controllers/palabras.controller.php?op=actualizar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("palabras", "palabras Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }
// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
  eliminar() {
    var id = this.id;

    Swal.fire({
      title: "palabras",
      text: "Esta seguro de eliminar el palabras",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/palabras.controller.php?op=eliminar",
          { id: id },
          (res) => {
            console.log(res);
            
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("palabras", "palabras Eliminado", "success");
              todos_contpalabrasador();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });

    this.limpia_Cajas();
  }
// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
  limpia_Cajas() {
    document.getElementById("palabras").value = "";
    $("#id").val("");

    $("#Modal_palabras").modal("hide");
  }
// ************************************************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************************************************
 
}
