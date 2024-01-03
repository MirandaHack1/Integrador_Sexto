function init() {
  $("#form_categoria").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
});

var todos_controlador = () => {
  var todos = new Categoria_model("", "", "", "","todos");
  todos.todos();
}


var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#form_categoria")[0]);

  var CategoriaID = document.getElementById("CategoriaID").value

  if (CategoriaID > 0) {
    var categoria = new Categoria_model('', '', '',  formData, 'editar');
    categoria.editar();
  } else {
    var categoria = new Categoria_model('', '', '',formData, 'insertar');
    categoria.insertar();
  }
};
var editar = (CategoriaID) => {
  var uno = new Categoria_model(CategoriaID, "", "", "", "uno");
  uno.uno();
};

var eliminar = (CategoriaID) => {
  var eliminar = new Categoria_model(CategoriaID, "", "", "", "eliminar");
  eliminar.eliminar();
}

  ; init();
