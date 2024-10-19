<section class="mb-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <?php if(!isset($_SESSION['id'])): ?>
                                    To comment you must <a href="login.php"> Login</a>
                                <?php else: ?>
                                <!-- Comment form-->
                                 <?php 
                                  $id_user = $_SESSION['id'];
                                  $sql= "SELECT id,users FROM login WHERE id = '$id_user'  ";
                                  $resutado = $base->prepare($sql);
                                  $resultado->execute();
                                 ?>
                                <form class="mb-4" action="procesa_comentario.php" method="post">
                                            <input type="hidden" name="id_post" value="<?php  echo $id_post ?>">
                                <?php foreach($resultado  as $datos): ?>

                                            <input type="hidden" name="id_users" value="<?php  echo $datos['id'] ?>">
                                            <input type="hidden" name="users" value="<?php  echo $datos['users'] ?>">
                                <?php endforeach; ?>    
                                            <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"
                                                    name="comentario"></textarea></form>
                                            <button class="btn btn-primary mt-2" type="submit" name="enviar">Comments</button>
                                <?php endif; ?>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                       </div>
               </div>
        </section>
        
        <h3 class="mb2"> Comments: </h3><hr>
      <section class="mb5">
        <?php 
                $sql= "SELECT * FROM comentario WHERE id_post ";
                $resultado = $base->prepare($sql);
                $resultado->execute();
                $register = $resultado->rowCount();
                if($register < 1){
                    echo "There are no comments in this Post: <br><br> ";
                     }else {
        ?> 
  
               <?php foreach($resultado as $datos): ?>
                    
                               <div class="fw-bold "><?php echo $datos['date_time'] ?>  <?php echo $datos['users'] ?> said: </div>
                               <?php echo $datos['comentary'] ?> 
                <?php endforeach; }?>
   </section>