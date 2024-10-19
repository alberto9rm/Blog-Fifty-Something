<?php 
include('../controllers/connect.php');

// Recoger datos del formulario
$id_users = $_POST['id_users'];
$users = $_POST['users'];
$title = $_POST['title'];
$category = $_POST['category'];
$post = $_POST['post'];

// Procesar imagen
$nombre_imagen = $_FILES['img_url']['name'];
$tipo_imagen = $_FILES['img_url']['type'];
$tamano_imagen = $_FILES['img_url']['size'];

// Validar tamaño y tipo de imagen
if ($tamano_imagen < 5000000) {
    if ($tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/png' || $tipo_imagen == 'image/gif') {
        // Ruta correcta para almacenar las imágenes dentro del proyecto
        $destino_imagen = $_SERVER['DOCUMENT_ROOT'] . '/fifty-something/assets/img/'; 
        
        // Mover el archivo subido al destino
        if (move_uploaded_file($_FILES['img_url']['tmp_name'], $destino_imagen . $nombre_imagen)) {
            echo "Picture has been uploaded successfully";
        } else {
            echo "Error when moving the image.";
        }
    } else {
        echo "Only image types allowed: .jpg, .jpeg, .png o .gif";
    }
} else {
    echo "Warning: The image is too large. Please resize it for better viewing";
}

// Uso de PDO para prevenir inyecciones y manejar caracteres especiales
$sql = "INSERT INTO post (id_users, users, title, img_url, category, post, date_time)
        VALUES (:id_users, :users, :title, :img_url, :category, :post, NOW())";

$resultado = $base->prepare($sql);

// Pasar parámetros a la consulta
$resultado->bindParam(':id_users', $id_users);
$resultado->bindParam(':users', $users);
$resultado->bindParam(':title', $title);
$resultado->bindParam(':img_url', $nombre_imagen);
$resultado->bindParam(':category', $category);
$resultado->bindParam(':post', $post);

// Ejecutar la consulta
if ($resultado->execute()) {
    header("Location: ../index.php");  // Redirigir si se creó el post
} else {
    echo "Error creating Post";
}

?>