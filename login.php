<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		/* Flex container para centrar el contenido del login */
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
			justify-content: center;
		}
		input {
			width: 100%;
			padding: 10px;
			border: none;
			background-color: #f1f1f1;
		}
		button {
			padding: 10px 10px;
			border: none;
			background-color: blueviolet;
			color: white;
			margin-top: 5px;
		}
		.button-container {
			display: flex;
			justify-content: center; /* Centra el botón */
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
	    <div>
	        <h1>Welcome</h1>

	        <div class="contenido">
	        	<form action="procesa_login.php" method="post">
	        		Usuario:<input type="text" name="users"><br>
	        		Password:<input type="password" name="pass"><br>
	        		<div class="button-container">
	        		    <button type="submit" name="enviar">Enter</button>
	        	    </div>
	        		<p style="text-align: center;">Don't have an account yet?  &nbsp;&nbsp;<a href="registro_user.php">Sign up</a></p>
	        		<p style="text-align: center;"><a href="formulario_restablecer.php"> Forgot your password?</a></p>
	        	</form>
	        </div>

			<!-- Mensajes de error o éxito -->
			<div style="display: flex;justify-content: center;">
				<?php if(isset($_GET['mensaje'])):?>
					<p><?php echo htmlentities($_GET['mensaje']); ?></p>
				<?php endif;?>
			</div>
			<div style="display: flex;justify-content: center;">
				<?php if(isset($_GET['smserror'])):?>
					<p><?php echo htmlentities($_GET['smserror']); ?></p>
				<?php endif; ?>
			</div>
			<div style="display: flex;justify-content: center;">
				<?php if(isset($_GET['exito'])):?>
					<p><?php echo htmlentities($_GET['exito']); ?></p>
				<?php endif;?>
			</div>

			<!-- Centrar el botón Home -->
			<div class="button-container mt-4"> 
				<a href="index.php"><button class="btn btn-primary">Home</button></a>
			</div>
		</div>
	</div>

    <!-- Footer al final de la página -->
    <footer>
        <p>Copyright &copy; alberto9rm</p>
    </footer>
</body>
</html>
