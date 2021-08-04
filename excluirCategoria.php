<?php
    error_reporting(0);
    require('../database/config.php');  
    $id = $_POST['id'];         
    $sql = "delete from categorias where id_categoria='$id'";    
    $result = $mysqli->query($sql);
    echo $sql ;

    ?>