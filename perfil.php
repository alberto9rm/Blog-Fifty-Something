<?php
   
   
   include('includes/header.php');
   
   if(!isset($_SESSION["users"])){
   	header("Location: index.php");
   }
      $id_url = $_GET['id'];
      $sql ="SELECT * FROM login WHERE id = '$id_url' ";
      $resultado = $base->prepare($sql);
      $resultado->execute();
      
      
/*
      $sql_post = "SELECT distinct categoria FROM post WHERE id_usuario = '$id_url'";   
      $resultado_post = $base->prepare($sql_post);
      $resultado_post->execute();
      $registro = $resultado_post->rowCount();
      */
   
?>
    <div class="container mt-5 mb-5">
    <div class="main-body">
   
          <!-- Breadcrumb -->
          <!--<nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>-->
          <!-- /Breadcrumb -->
    <br>
          <div class="row gutters-sm">
            <div class="col-md-12 mb-4">
              <div class="card" >
                <div class="card-body">
                  <?php foreach($resultado as $datos):?>

                  <div class="d-flex flex-column align-items-center text-center" >
                      
                    <img src="assets/img/<?php echo $datos['img_url'];?>" alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                      <h4><?php echo $datos['users']?></h4>
                      <p class="text-muted font-size-sm">Email: <?php echo $datos["email"]?><br>
                    <span class="mt-3 mb-3">Post: 
                    <?php 
                        $sql_post = "SELECT DISTINCT category FROM post WHERE  id_users = '$id_url' ";
                        $resultado_post = $base->prepare($sql_post);
                        $resultado_post->execute();

                        foreach ($resultado_post as $datos):
                      ?>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light mb-3" href="includes/category.php?id=<?php echo $datos['category'] ?>"
                                   ><?php echo $datos['category'] ?></a>
                    
                     <?php endforeach; ?>                
                          </span>
                          </p>
                      <?php endforeach; ?>
                       <button class="btn btn-primary"><a class="text-decoration-none link-light"
                               href="includes/editar_perfil.php?&id=<?php echo $_SESSION['id']?>">Edit Profile</a></button>
                       <a class="text-decoration-none btn btn-outline-primary" href="includes/cerrar_sesion.php">Log Out</a>
                    
                    </div>
                  </div>
                </div>
              </div>                           
            </div>
              </div>
           </div>
    </div>
  

     