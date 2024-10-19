<?php include('header.php'); ?>


        <title>Fifty_Something -- Create Post</title>
      
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Post</h3></div>
                                    <div class="card-body">
                                        <?php 
                                   
                                        $id_users  = $_GET['id'];
                                        $sql ="SELECT users FROM login WHERE id = '$id_users'  ";
                                        $resultado =$base->prepare($sql);
                                        $resultado->execute();
                                        
                                        ?>
                                        <form action="proceso_crear_post.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_users" value="<?php  echo $id_users ?>"><br>

                                    <?php  foreach($resultado as $datos): ?>

                                            <input type="hidden" name="users" value="<?php  echo $datos['users'] ?>"><br>
                                     <?php endforeach; ?>                   
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="text" placeholder="Title" name="title" />
                                                        <label for="inputFirstName">Title</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" placeholder="Category" name="category" />
                                                        <label for="inputLastName">Category</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-control mb-3">
                                            <label for="inputLastName">Image</label>
                                                <input class="form-control"  type="file" name="img_url" />
                                                                                      
                                            </div>

                                    
                                                    <div class="form-floating mb-5">
                                                        <textarea class="form-control h-25"  rows="4" placeholder="Post" name="post"></textarea>
                                                        <label for="inputPassword">Post</label>
                                                    </div>
                                           
                                               
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" name="enviar" class="btn btn-primary">Create Post
                                                  </button>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
   
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
 
