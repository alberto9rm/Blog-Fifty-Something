<?php
    
    $user = htmlentities(addslashes($_POST['users']));
    $pass = htmlentities(addslashes($_POST['pass']));


    $user_existe=0;

    include('controllers/connect.php');

    	$sql= "SELECT * FROM login WHERE users = :users";

    	$resultado= $base->prepare($sql);

    	$resultado->execute(array(":users"=>$user));
    
        while($datos = $resultado->fetch(PDO::FETCH_ASSOC)){
             $id = $datos['id'];
        	if(password_verify($pass, $datos['password'])){
        		$user_existe++;
        	}
        }

        if($user_existe>0){
            session_start();

            $_SESSION["users"] = strtolower($_POST["users"]);
        	$_SESSION["id"] = $id;
            header("Location: index.php");

            
        }else{
        	header("Location:login.php?smserror=" . urlencode("Incorrect Data "));
        }
        
?>