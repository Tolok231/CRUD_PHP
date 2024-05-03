<?php include("db.php") ?>
<?php include("includ/header.php") ?>


    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?=  $_SESSION['message']  ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>
        


                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text"  name="title" class="form-control" placeholder="Titulo de la tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripccion de la tarea"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                        <input type="submit" value="Guardar tarea" class="btn btn-success btn-block" name="save_task">
                        </div>
                    </form>
                </div>

            </div>


            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripccion</th>
                            <th>Hora creada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query= "SELECT * FROM tarea";
                        $result_task=mysqli_query($conn,$query);

                        while($row= mysqli_fetch_array($result_task)){ ?>
                            <tr>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['fecha_creado'] ?></td>
                                <td>
                                    <!--BOTON PARA EDITAR LA FILA -->
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.1 6.1 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.1 8.1 0 0 1-3.078.132 4 4 0 0 1-.562-.135 1.4 1.4 0 0 1-.466-.247.7.7 0 0 1-.204-.288.62.62 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896q.19.012.348.048c.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04M4.705 11.912a1.2 1.2 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.4 3.4 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3 3 0 0 0 .126-.75zm1.44.026c.12-.04.277-.1.458-.183a5.1 5.1 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005zm3.582-3.043.002.001h-.002z"/>
                                                    </svg>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"> 
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bucket" viewBox="0 0 16 16">
                                        <path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5m1.005 0a4.5 4.5 0 0 1 8.945 0zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                       <?php } ?>
                    </tbody>


                </table>
            </div>
        </div>

    </div>


<?php include("includ/footer.php") ?>