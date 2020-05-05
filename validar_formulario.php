<?php

$errores ="";

//Comprobamos que los campos no están vacíos
if(!isset($_POST['nombre'])){
	$errores=$errores. 'Falta por rellenar el campo "Nombre"<br>';
}	
// Validación de la edad: Comprueba si el dato ha sido introducido, si es un número y si es mayor de edad.
if(!isset($_POST['edad'])){
	$errores=$errores. 'Falta por rellenar el campo "Edad"<br>';
}else{
	if(!is_numeric($_POST['edad'])){
		$errores=$errores. "Escriba correctamente su edad.<br>";
	}
	if($_POST['edad']<18){
		$errores=$errores. "El registro es para mayores de 18 años.<br>";
	}
}	

// Validación del Código Postal (en España son 5 caracteres numéricos): Comprueba si el dato ha sido introducido y si cumple con el patrón indicado.	
if(!isset($_POST['cp'])){
	$errores=$errores. 'Falta por rellenar el campo "Código Postal"<br>';		
}else{
	$patronCP= "/(^([0-9]{5,5})|^)$/";
	if(!preg_match($patronCP,$_POST['cp'])){
		$errores=$errores. "Contenido del código postal no es un código postal válido<br>";
	}			
}

// Validación del DNI (El DNI español son 8 caracteres numéricos y una letra): Comprueba si el dato ha sido introducido y si es la letra correcta.	
if(!isset($_POST['dni'])){
	$errores=$errores. 'Falta por rellenar el campo "DNI"<br>';		
}else{
	//Se separan los números de la letra.Lo ponemos en mayúscula.
	$letraDNI = strtoupper(substr($_POST['dni'],8,9));
	$numDNI = substr($_POST['dni'],0,8);

	//Se calcula la letra correspondiente al número	
	$letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E','T'];
	$letraCorrecta = $letras[$numDNI % 23];		

	if((strlen($_POST['dni'])<9)||(strlen($_POST['dni'])>9)){
		$errores=$errores. "Ha introducido un DNI incorrecto<br>";
	}else if($letraDNI!= $letraCorrecta){
		$errores=$errores. "Ha introducido una letra incorrecta en el DNI<br>";
	}			
}	

// Validación del email: Comprueba si el dato ha sido introducido
if(!isset($_POST['email'])){
	$errores=$errores. 'Falta por rellenar el campo "Email"<br>';  
}else{
	//Comprobamos si el patrón coincide con el Email.
	$patronEmail="/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/";       
	if (!preg_match($patronEmail,$_POST['email'])) {
			$errores=$errores. "No es un correo electrónico válido.<br>";
	}   		
}

// Validación del Sistema Operativo: Comprueba si el dato ha sido introducido
if(!isset($_POST['so'])){
	$errores=$errores. 'Falta por rellenar el campo "Sistema Operativo"<br>';
}	

// Validación del nº de Horas programadas: Comprueba si el dato ha sido introducido
if(!isset($_POST['horas'])){
	$errores=$errores. 'Falta por rellenar el campo "Horas programadas"<br>'; 
}

// Validación del Sistema Operativo: Comprueba si el dato ha sido introducido
if(!isset($_POST['condiciones'])){
	$errores=$errores. "Tiene que aceptar las Condiciones.<br>";  
}else{
	if(!$_POST['condiciones']){
		$errores=$errores. "Tiene que aceptar las Condiciones.<br>";
	}
}	

// Validamos el formulario...
if(strlen($errores)>0){
	echo "Se han detectado los siguientes errores:<br>";
	echo $errores;
}else{
	echo "Formulario validado :)";
}
?>	
