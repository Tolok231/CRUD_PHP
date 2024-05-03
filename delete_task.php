<?php
    include("db.php");

    if (isset($_GET['id'])){
            $id=$_GET['id'];
            $query= "DELETE FROM tarea WHERE id=$id";
            $resultado=mysqli_query($conn,$query);
            
            if(!$resultado)
            {
                die("Query fallada");
            }
            $_SESSION['message'] = 'Tarea eliminada exitosamente';
            $_SESSION['message_type'] = 'danger';

            header("Location:index.php");
    }

?>