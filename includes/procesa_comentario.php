<?php 
    include('../controllers/connect.php'); 

    $id_post = $_POST['id_post'];
    $id_users = $_POST['id_users'];
    $users = $_POST['users'];
    $comentario = $_POST['comentary'];

    if($comentario == ''){
        echo "Must write a comment";

    }else{

        $sql= "INSERT INTO comentario (id_post, id_users, users, comentary, date_time) 
        VALUES ('$id_post' , '$id_users' , '$users', '$comentario', NOW()) ";

        $resutado = $base->prepare($sql);
        $resultado->execute();
        if($resultado== false){
            echo "Error commenting: ";
        }else {
            header("Location: post.php?id" . $id_post);
        }

    }

  

?>