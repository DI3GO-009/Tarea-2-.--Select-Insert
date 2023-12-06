class Clase_Televisores_Model {
  constructor(
      televisorId,
      marca,
      pulgadas,
      cantidad,
      tasaRefresco,
      Ruta
  ) {
      this.televisorId = televisorId;
      this.marca = marca;
      this.pulgadas = pulgadas;
      this.cantidad = cantidad;
      this.tasaRefresco = tasaRefresco;
      this.Ruta = Ruta;
  }

  todos() {
    var html = "";
    $.get("../../Controllers/televisores.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        var fondo;       
        if (valor.marca === "Samsung") fondo = "bg-primary";
        else if (valor.marca === "Sony") fondo = "bg-success";
        else fondo = "bg-warning"; 
  
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.marca}</td>
                <td>${valor.pulgadas}</td>
                <td><div class="d-flex align-items-center gap-2">
                <span class="badge ${fondo} rounded-3 fw-semibold">${
                  valor.tasaRefresco
                }</span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.televisorId
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.televisorId
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.televisorId
            })'>Ver</button>
            </td></tr>`;
      });
      $("#tabla_televisores").html(html); 
    });
  }
  
  insertar() {
    var self = this; // Almacenar una referencia al objeto en 'self'
    
    $.ajax({
      url: "../../Controllers/televisores.controller.php?op=insertar",
      type: "POST",
      data: this.Ruta,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("Televisor", "Televisor Registrado", "success");
          
          self.limpia_Cajas(); // Usar 'self' en lugar de 'this'
          self.todos_controlador(); // Usar 'self' en lugar de 'this'
        } else {
          Swal.fire("Error", res, "error");
        }
      }
    });
  }
  
  
  limpia_Cajas()
  {
    document.getElementById("marca").value = "";
    document.getElementById("pulgadas").value = "";
    document.getElementById("cantidad").value = "";
    document.getElementById("tasaRefresco").value = "";
    document.getElementById("Ruta").value = "";
    $('#Modal_televisores').modal("hide");
  
  }

}
