<?php
    error_reporting(0);
    require('../database/config.php');  
    $id = $_POST['id'];         
    $sql = "delete from cliente where id_cliente='$id'";    
    $result = $mysqli->query($sql);
    echo $sql ;

    ?>