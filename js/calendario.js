function validarFecha() {
    var fechaInput = document.getElementById("fecha").value;
    var fechaSeleccionada = new Date(fechaInput);
    var diaSemana = fechaSeleccionada.getDay();
  
    // Obtener la fecha actual
    var fechaActual = new Date();
    var diaActual = fechaActual.getDate();
    var mesActual = fechaActual.getMonth() + 1; // Los meses van de 0 a 11
    var anioActual = fechaActual.getFullYear();
    var fechaMinima = anioActual + "-" + mesActual.toString().padStart(2, "0") + "-" + diaActual.toString().padStart(2, "0");
  
    // Establecer la fecha mínima en el input date
    document.getElementById("fecha").min = fechaMinima;
  
    // Validar si la fecha seleccionada es sábado (6) o domingo (0)
    if (diaSemana === 6 || diaSemana === 0) {
      document.getElementById("fecha").style.color = "red";
    } else {
      document.getElementById("fecha").style.color = "black";
    }
  }
  