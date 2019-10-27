<?php



$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["correo"];
$mensaje = $_POST["mensaje"];



$error = '';

//VALIDANDO NOMBRE
if (empty($_POST["nombre"])){
    $error = 'Ingresa un nombre </br>';
}else{
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $nombre = trim($nombre);
    if($nombre==''){
        $error .= 'Nombre está vacio</br>';
    }
}

//VALIDANDO TELEFONO
if (empty($_POST["telefono"])){
    $error .= 'Ingresa un Telefono verdadero</br>';
}else{
    $telefono = $_POST["telefono"];
    if(!filter_var($telefono,FILTER_VALIDATE_INT)){
        $error .= 'Ingresa un Telefono verdadero</br>';
    }else{
        $telefono = filter_var($telefono,FILTER_VALIDATE_INT);
    }
}


//VALIDANDO E-MAIL
if (empty($_POST["correo"])){
    $error .= 'Ingresa un E-mail</br>';
}else{
    $email = $_POST["correo"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= 'Ingresa un E-mail verdadero</br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}

//VALIDANDO MENSAJE
if (empty($_POST["mensaje"])){
    $error .= 'Ingresa un mensaje </br>';
}else{
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $mensaje = trim($mensaje);
    if($mensaje==''){
        $error .= 'Mensaje está vacio</br>';
    }
}

//CUERPO DEL MENSAJE
$cuerpo .= "Nombre: ";
$cuerpo .= $nombre;
$cuerpo .= "\n";
 
//CUERPO DEL MENSAJE
$cuerpo .= "Telefono: ";
$cuerpo .= $telefono;
$cuerpo .= "\n";
 

$cuerpo .= "Email: ";
$cuerpo .= $email;
$cuerpo .= "\n";
 
$cuerpo .= "Mensaje: ";
$cuerpo .= $mensaje;


//DIRECCIÓN
$enviarA = 'rainier86@gmail.com'; //REEMPLAZAR CON TU CORREO ELECTRÓNICO
$asunto = 'Nuevo Reporte PQR desde la web';

//ENVIAR CORREO
if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
}

?>