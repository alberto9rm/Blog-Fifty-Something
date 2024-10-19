<?php  
        include($_SERVER['DOCUMENT_ROOT'] . '/fifty-something/controllers/connect.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/fifty-something/model/function.php');
        session_start();
        

           $read_more = LEER_MAS;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Fifty Something</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="#" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php" style="font-family: Tahoma; font-size: 43px">Fifty Something</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         <li class="nav-item"><a class="nav-link active" aria-current="page" href="includes/contact.php">Contact</a></li>
                         <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">Blog</a></li>
                         <?php  
                                if(!isset($_SESSION['id'])):
                         ?>
                         <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Sign In</a></li>
                           <?php  else:  ?>
                         <li class="nav-item"><a class="nav-link active" aria-current="page" href="perfil.php?id=<?php echo $_SESSION['id'] ?>">My profile</a></li>
                         <?php
                         $id_user = $_SESSION['id'];
                         $sql ="SELECT img_url FROM login WHERE id= '$id_user' ";
                         $resultado = $base->prepare($sql);
                         $resultado->execute();

                         foreach($resultado as $datos):
                         ?>
                         <img class="rounded-circle" src="assets/img/<?php  echo $datos['img_url'] ?>"   alt="..."  width="38px" height="38px" />
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                </div>
            </div>
        </nav>
        </body>
</html>