<?php
include("db.php");

if(isset($_POST['save_task'])){
    $title=$_POST['title'];
    $description=$_POST['description'];

    $query= "INSERT INTO tarea(titulo,descripcion) VALUE ('$title','$description')";
    $result=mysqli_query($conn,$query);
    
    if(!$result){
        die("Query failed");
    }

    $_SESSION['message'] = 'Tarea guardada correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

};

?>