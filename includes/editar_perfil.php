<?php include('header.php'); 
		 include('../controllers/connect.php'); ?>

<?php

if(!isset($_SESSION["users"])){
   	header("Location:index.php");
   }
      $id_url = $_GET['id'];
      $id_usuario = $_SESSION['id'];

      $sql ="SELECT * FROM login WHERE id = '$id_url' ";
      $resultado = $base->prepare($sql);
      $resultado->execute();
      

      $sql_post = "SELECT distinct category FROM post WHERE id_users = '$id_url'";   
      $resultado_post = $base->prepare($sql_post);
      $resultado_post->execute();
?>

<div class="container mt-5 mb-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		 
		<div class="account-settings text-center"> 
			<div class="user-profile">
				<div class="user-avatar">
					<?php foreach($resultado as $datos):?>
					<img src="../assets/img/<?php echo $datos['img_url'];?>" alt="Profile Picture" class="mb-2">
                     </div>	

				<h5 class="user-name">Users :<?php echo $datos['users']?></h5>
				<h6 class="user-email">Email: <?php echo $datos['email']?></h6>
				<?php endforeach; ?>
			</div>
			<div class="about">
				<h5>Post</h5>
				<?php foreach ($resultado_post as $datos):?>
				<!-- Post categories-->
                            <a class="badge bg-primary text-decoration-none link-light"
									href="category.php?id=<?php echo $datos['category'] ?>">
									<?php echo $datos['category'] ?></a>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
	
	<?php 
     
      $resultado = $base->prepare($sql);
      $resultado->execute();

      foreach($resultado as $datos){
     	$user = $datos['users'];
     	$email = $datos['email'];
     	$pass = $datos['password'];
     }

	 ?>
	<form action="" method="post" enctype="multipart/form-data">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				
				<div class="form-group">
					<label for="fullName">Users</label>
					                           	 
					<input type="text" class="form-control" id="users" name="users" value="<?php echo $user ?>">
					 
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Password</label>
					<input type="text" class="form-control" id="pass" name="pass" >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="imagen">Image</label>
					<input type="file" class="form-control" id="imagen" name="imagen">
				</div>
			</div>
		
		</div>
		<div class="row gutters mt-5">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="submit" id="submit" name="enviar" class="btn btn-primary">Save</button>
					<button class="btn btn-success"><a class="text-decoration-none" 
				   href="../perfil.php?id=<?php echo $id_url ?>" style="color:white">Return to My Profile</a></button>
				</div>
			</div>
		</div>
		
	</div>

</div>
   </form>

</div>
</div>
</div>
<?php 
        
     if(isset($_POST['enviar'])){

     	    $user = $_POST['users'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
                 	    
            $nombre_imagen = $_FILES['img_url']['name'];
	        $tipo_imagen = $_FILES['img_url']['type'];
	        $tamano_imagen = $_FILES['img_url']['size'];
            
           if($tamano_imagen>5000000){
           	   echo "The image is too large";
           	   if($tipo_imagen=='image/jpeg' || $tipo_imagen=='image/jpg'
			   			 || $tipo_imagen=='image/png' || $tipo_imagen=='image/gif'){
           	   						echo "Only image types allowed:  .jpg/.jpeg/.png o gif";
           	 			  }
          			 }else{
           	   //esta es la ruta donde vamos a guardar la imagen
    $destino_imagen = $_SERVER['DOCUMENT_ROOT'] . '/fifty-something/assets/img/';//htdocs
    
    move_uploaded_file($_FILES['img_url']['tmp_name'], $destino_imagen . $nombre_imagen);
				         
	                              if($nombre_imagen){     
                              $sql = "UPDATE login SET img_url = '$nombre_imagen' WHERE id = '$id_url'";
				            $resultado = $base->prepare($sql);
				            $resultado->execute();
				            if($resultado== false){
                echo "Update failed with the following error";
				    }else{
					?>
				<meta http-equiv="refresh" content="1" />
				
				<?php }}
				         if($nombre_imagen== ' '){
                           $sql="SELECT img_url FROM login WHERE id= '$id_url' ";
                           $resultado = $base->prepare($sql);
				            $resultado->execute();

				        } 
           }
              if($pass){
            	  	$sql_post= "UPDATE post SET users='$user' WHERE id_users= '$id_url' ";
            	  	$resultado_post= $base->prepare($sql_post);

		            $resultado_post->execute();
		            $sql_com= "UPDATE comentario SET users ='$user' WHERE id_users='$id_url'";
            	  	$resultado_com= $base->prepare($sql_com);

		            $resultado_com->execute();
            	  	$pass_encriptada = password_hash($pass, PASSWORD_DEFAULT);
            	  	  $sql = "UPDATE login SET users ='$user', email='$email', password='$pass_encriptada' WHERE id = '$id_url'";
        
		        $resultado= $base->prepare($sql);

		        $resultado->execute(); 
                if($resultado == false){
                echo "Update failed with the following error";
				    }else{
					?>
				<meta http-equiv="refresh" content="1" />
				<script>alert("Password Updated");</script>
				
				<?php }	
            	  }else{
            	  	$sql_post= "UPDATE post SET users='$user' WHERE id_users='$id_url' ";
            	  	$resultado_post= $base->prepare($sql_post);

		            $resultado_post->execute();
		            $sql_com= "UPDATE comentario SET users='$user' WHERE id_users='$id_url' ";
            	  	$resultado_com= $base->prepare($sql_com);

		            $resultado_com->execute();
            	  	$sql = "UPDATE login SET users='$user', email='$email'  WHERE id = '$id_url' ";
           
		        $resultado= $base->prepare($sql);

		        $resultado->execute(); 
                if($resultado== false){
                echo "Update failed with the following error";
				    }else{
					?>
				<meta http-equiv="refresh" content="1" />
				<?php }	
            	  }

 }         
    
?>
