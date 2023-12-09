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
    var self = this;
    
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
          
          self.limpia_Cajas(); 
          self.todos_controlador(); 
        } else {
          Swal.fire("Error", res, "error");
        }
      }
    });
  }
  
  eliminar(televisorId) {
    Swal.fire({
      title: "Eliminar Televisor",
      text: "¿Estás seguro de eliminar este televisor?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `../../Controllers/televisores.controller.php?op=eliminar&televisorId=${televisorId}`,
          type: "POST",
          success: function (res) {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("Eliminado", "El televisor ha sido eliminado", "success");             
              this.todos();
            } else {
              Swal.fire("Error", res, "error");
            }
          }.bind(this)
        });
      }
    });
  }
  
  editar(televisorId) {
    $.post(
      "../../Controllers/televisores.controller.php?op=uno",
      { televisorId: televisorId },
      (res) => {
        res = JSON.parse(res);
  
        // Actualizar los campos del formulario con los datos del televisor
        $("#marca").val(res.marca);
        $("#pulgadas").val(res.pulgadas);
        $("#cantidad").val(res.cantidad);
        $("#tasaRefresco").val(res.tasaRefresco);
        
        // Muestra el modal o formulario de edición de televisor
        $("#Modal_usuario").modal("show");
      }
    );
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
