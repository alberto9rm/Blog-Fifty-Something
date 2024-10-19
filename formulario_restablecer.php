<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Reset Password </title>
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
			padding: 6px 0;
			text-align: center;
			font-family: Tahoma;
			font-size: 18px;
		}
	</style>
	</style>
</head>
<body>
    <h1>Reset Password </h1>

    <div class="contenido">
    	<form action="mail_restablecer.php" method="post">
    		Email:<input type="email" name="email"><br>
    		<button type="submit" name="enviar">Enter</button>
    	</form>
    	
    </div>
    <div style="display: flex;justify-content: center;">
<?php if(isset($_GET['error'])):?>
    		<p><?php echo htmlentities($_GET['error']) ;?></p>
    	<?php endif;?>
    	</div>

		<footer>
        <p>Copyright &copy; alberto9rm</p>
    </footer>
</body>
</html>