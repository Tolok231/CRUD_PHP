<?php

session_start();


$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
    
);

#if (isset($conn)){ Verificar si esta conectada la base de datos
#   echo "DB esta conectada";
#}


?>