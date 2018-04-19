function mostrar_elecciones(tipo) {
    $("#divEleccionesContainer").html($("#" + tipo).html());
}
//Elecciones para presidentes municipales (Ayuntamientos)
function verEleccionesAyuntamiento(anio) {
	$.ajax({url: "php/obtenerEleccionesAyuntamiento.php", async: false, type: "POST", data: {anio: anio}, success: function(res, statusText, jqXHR) {
        $("#divMapa").html(res);
	}});
}