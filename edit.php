<?php
include("db.php");

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $query= "SELECT * FROM tarea WHERE id=$id";
    $resultado=mysqli_query($conn,$query);
    if (mysqli_num_rows($resultado) == 1){
        $row =mysqli_fetch_array($resultado);
        $title=$row['titulo'];
        $description= $row['descripcion'];

    }
}

    if(isset($_POST['update'])){
        $id=$_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

     $query= "UPDATE tarea set titulo='$title', descripcion = '$description' WHERE id=$id";
     mysqli_query($conn,$query);

    $_SESSION['message'] = 'Tarea actualizada exitosamente';
    $_SESSION['message_type'] = 'info';
     header("Location:index.php");

    }


?>


<?php include("includ/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title; ?>" 
                            class= "form-control" placeholder="Actualiza el titulo">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control"
                            placeholder="Edite su descripccion"><?php echo $description?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Editar
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includ/footer.php")?>