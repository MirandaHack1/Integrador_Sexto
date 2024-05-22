// ***************************************************************************************************************************************************************************
function init() {
    $("#frm_iva").on("submit", function (e) {
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
    $.get("../../Controllers/iva.controller.php?op=todos", (res) => {
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
                  <td>${valor.porcentaje}</td>
                  <td>
                    <button class='btn btn-success' onclick='editar(${valor.id_iva})' hidden>Editar</button>
                   
                    <button class='btn btn-info' onclick='eliminar(${valor.id_iva})'>Eliminar</button>
                  </td>
                </tr>`;
      });
      $("#tabla_iva").html(html);
    });
  };
  
  
  // ***************************************************************************************************************************************************************************
  // ***************************************************************************************************************************************************************************
  var guardaryeditar = (e) => {
    e.preventDefault();
    var dato = new FormData($("#frm_iva")[0]);
    var ruta = "";
    var id_iva = document.getElementById("id_iva").value;
    
    if (id_iva > 0) {
      ruta = "../../Controllers/iva.controller.php?op=actualizar";
    } else {
      ruta = "../../Controllers/iva.controller.php?op=insertar";
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
  var editar = async (id_iva) => {
    $.post(
      "../../Controllers/iva.controller.php?op=uno",
      { id_iva: id_iva },
      (res) => {
        res = JSON.parse(res);
  
        $("#id_iva").val(res.id_iva);
        $("#porcentaje").val(res.porcentaje);
  
      }
    );
    $("#Modal_iva").modal("show");
  };
  
  // **********************************************************************************************************
  
  
  
  
  
  
  
  // ***************************************************************************************************************************************************************************
  var eliminar = (id_iva) => {
    Swal.fire({
      title: "iva",
      text: "¿Estás seguro de eliminar la iva?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/iva.controller.php?op=eliminar",
          { id_iva: id_iva },
          (res) => {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("iva", "iva Eliminado", "success");
              todos();
            } else {
              Swal.fire("Error al eliminar", "El Iva esta registrado en uno o varios productos", "error"); // Mostrar mensaje de error
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
    $("#id_iva").val(""); // Corregido: Usar jQuery para establecer el valor
    $("#porcentaje").val(""); // Corregido: Usar jQuery para establecer el valor
  
    $("#Modal_iva").modal("hide");
  };
  // ***************************************************************************************************************************************************************************
  
  init();
  