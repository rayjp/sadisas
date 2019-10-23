$("#formulario").submit(function(event)
{

	event.preventDefault(); //Almacena los datos sin refrescar el sitio
	enviar();



});

function enviar(){
	console.log("ejecutado");
}