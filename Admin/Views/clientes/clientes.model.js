
class Usuarios_Model {
  constructor(
    UsuarioId,
    Cedula,
    Nombres,
    Apellidos,
    Telefono,
    Correo,
    Contrasenia,
    Rol,
    Ruta
  ) {
    this.UsuarioId = UsuarioId;
    this.Cedula = Cedula;
    this.Nombres = Nombres;
    this.Apellidos = Apellidos;
    this.Telefono = Telefono;
    this.Correo = Correo;
    this.Contrasenia = Contrasenia;
    this.Rol = Rol;
    this.Ruta = Ruta;
  }
  todos() {
    var html = "";
    $.get("../../Controllers/usuario.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        var fondo;
        if(valor.Rol == "Administrador") fondo ="bg-primary"
        else if(valor.Rol == "Vendedor") fondo = "bg-success"
        else if(valor.Rol == "Cliente") fondo = "bg-warning"
        else if(valor.Rol == "Gerente") fondo = "bg-danger"
        else if(valor.Rol == "Cajero") fondo = "bg-info"
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombres}</td>
                <td>${valor.Apellidos}</td>
                <td><div class="d-flex align-items-center gap-2">
                <span class="badge ${fondo} rounded-3 fw-semibold">${
                  valor.Rol
                }</span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.UsuarioId
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.UsuarioId
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.UsuarioId
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_usuarios").html(html);
    });
  }

  insertar() {
    var dato = new FormData();
    dato = this.Rol;
   $.ajax({
    url: "../../Controllers/usuario.controller.php?op=insertar",
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
        res = JSON.parse(res);
        if(res === "ok"){
            Swal.fire("usuarios", "Usuario Registrado", "success");
            todos_controlador();
        }else{
            Swal.fire("Error", res, "error"); 
        }
    }
   });
   this.limpia_Cajas();    
  }

  cedula_repetida(){
    var Cedula = this.Cedula;
    $.post("../../Controllers/usuario.controller.php?op=cedula_repetida", {Cedula: Cedula}, (res) => {
        res = JSON.parse(res);
        if( parseInt(res.cedula_repetida) > 0){
            $('#CedulaRepetida').removeClass('d-none');
            $('#CedulaRepetida').html('La cédua ingresa, ya exite en la base de datos');
            $('button').prop('disabled', true);
        }else{
            $('#CedulaRepetida').addClass('d-none');
            $('button').prop('disabled', false);
        }

    })
  }

  verifica_correo(){
    var Correo = this.Correo;
    $.post("../../Controllers/usuario.controller.php?op=verifica_correo", {Correo: Correo}, (res) => {
        res = JSON.parse(res);
        if( parseInt(res.cedula_repetida) > 0){
            $('#CorreoRepetido').removeClass('d-none');
            $('#CorreoRepetido').html('El correo ingresado, ya exite en la base de datos');
            $('button').prop('disabled', true);
        }else{
            $('#CorreoRepetido').addClass('d-none');
            $('button').prop('disabled', false);
        }
    })
  }

  limpia_Cajas(){
    document.getElementById("Cedula").value = "";
    document.getElementById("Nombres").value = "";  
    document.getElementById("Apellidos").value = "";
    document.getElementById("Telefono").value = "";
    document.getElementById("Correo").value = "";
    document.getElementById("Contrasenia").value = "";
    document.getElementById("Contrasenia2").value = "";
    $("#Modal_usuario").modal("hide");
  }
}
