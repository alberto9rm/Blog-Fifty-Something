<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		/* Elimina márgenes y rellenos por defecto */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		/* Asegura que el body ocupe toda la altura de la ventana */
		html, body {
			height: 100%;
		}
		/* Flexbox en el body para que el contenido se ajuste */
		body {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
		/* Flex container para centrar el contenido del formulario */
		.main-content {
			flex: 1; /* Ocupa el espacio restante entre el header y footer */
			display: flex;
			justify-content: center;
			align-items: center;
		}
		h1 {
			text-align: center;
			color: gray;
		}
		.contenido {
			display: flex;
			flex-direction: column; /* Alinea verticalmente el formulario */
			align-items: center; /* Centra horizontalmente el formulario */
			width: 100%;
		}
		form {
			width: 50%; /* Define el tamaño del formulario */
			padding: 20px;
			background-color: #f8f9fa;
			border-radius: 10px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
		}
		input {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #f1f1f1;
		}
		/* Centra el botón de registro */
		.button-container {
			display: flex;
			justify-content: center;
			margin-top: 10px;
		}
		button {
			padding: 10px 20px;
			background-color: blueviolet;
			color: white;
			border: none;
			border-radius: 5px;
		}
		/* Estilos para el footer */
		footer {
			background-color: black;
			color: white;
			padding: 8px 0;
			text-align: center;
			font-family: Tahoma;
			font-size: 18px;
		}
	</style>
</head>
<body>
	<div class="main-content">
		<div class="contenido">
			<h1>Register</h1>
	    	<form action="procesa_registro_user.php" method="post" enctype="multipart/form-data">
	    		Users:<input type="text" name="users" required><br>
	    		Email:<input type="email" name="email" required><br>
	    		Password:<input type="password" name="pass" required><br>
	    		Image:<input type="file" name="img_url" required><br>
	    		<!-- Contenedor para centrar el botón -->
	    		<div class="button-container">
	    			<button type="submit" name="enviar">Sign Up</button>
	    		</div>
	    	</form>
	    </div>
	</div>
	
	<footer>
        <p>Copyright &copy; alberto9rm</p>
    </footer>
</body>
</html>
