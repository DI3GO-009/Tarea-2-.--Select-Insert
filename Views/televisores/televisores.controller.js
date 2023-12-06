function init() {
    $("#form_televisores").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    
    todos_controlador();
});

var todos_controlador = () => {
    var todos = new Clase_Televisores_Model("", "", "", "", "","todos_controlador");
    todos.todos();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    const marca = document.getElementById("marca").value;
    const pulgadas = document.getElementById("pulgadas").value;
    const cantidad = document.getElementById("cantidad").value;
    const tasaRefresco = document.getElementById("tasaRefresco").value;
    var formData = new FormData(e.target);
    formData.append("marca",marca);
    formData.append("pulgadas",pulgadas);
    formData.append("cantidad",cantidad);
    formData.append("tasaRefresco",tasaRefresco);
    var televisores = new Clase_Televisores_Model("", "", "", "", "",formData,'insertar');
    televisores.insertar();
}


;init();
