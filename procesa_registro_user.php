<?php
    
    include('controllers/connect.php');
    $user = htmlentities(addslashes($_POST['users']));
    $pass = htmlentities(addslashes($_POST['pass']));
    $email = $_POST['email'];
    $imagen_pre = "1.png";

    //comprobar email
    $sql = "SELECT * FROM login WHERE email = :email OR users = :users";
    $resultado= $base->prepare($sql);

    $resultado->execute(array(":email"=>$email, ":users"=>$user));

    $existe = $resultado->rowCount();

    if($existe>0){
        echo "The User or email already exists ";
        exit();
    }
    
    //procesa imagen
     $nombre_imagen = $_FILES['imagen']['name'];
     $tipo_imagen = $_FILES['imagen']['type'];
     $tamano_imagen = $_FILES['imagen']['size'];

    if($tamano_imagen<10000000){
        if($tipo_imagen=='image/jpeg' || $tipo_imagen=='image/jpg' || $tipo_imagen=='image/png' || $tipo_imagen=='image/gif'){
        //esta es la ruta donde vamos a guardar la imagen
    $destino_imagen = $_SERVER['DOCUMENT_ROOT'] . 'fifty-something/assets/img/';//htdocs
    
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_imagen . $nombre_imagen);
    }else{
        header("Location:registro_user.php?error=" . urlencode("Solo se permiten imagnes de tipo .jpg/.jpeg/.png o gif"));
    }
}else{
        header("Location:registro_user.php?error2=" . urlencode("La imagen es demasiada grande"));
    }
    //fin procesa imagen

    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT);

        if($nombre_imagen){
            $sql= "INSERT INTO login (users, password, email, img_url) VALUES(:users,:pass,:email,:img_url)";

        $resultado= $base->prepare($sql);

        $resultado->execute(array(":users"=>$user,":pass"=>$pass_encriptada,":email"=>$email,":img_url"=>$nombre_imagen));
    
        

        if($resultado==false){
            echo "Error al registrarnos";
            
        }else{
            header("Location:login.php?mensaje=" . urlencode("Puedes Acceder"));
        }
    }else{
        $sql= "INSERT INTO login (users, password, email, img_url) VALUES(:users,:pass,:email,:img_url)";

        $resultado= $base->prepare($sql);

        $resultado->execute(array(":users"=>$user,":pass"=>$pass_encriptada,":email"=>$email,":img_url"=>$imagen_pre));
    
        

        if($resultado==false){
            echo "Error al registrarnos";
            
        }else{
            header("Location:login.php?mensaje=" . urlencode("Puedes Acceder"));
        }
        

    }


?>