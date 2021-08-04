<?php
    error_reporting(0);
    require('../database/config.php');  
    $id = $_POST['id'];         
    $sql = "delete from prestador where id_prestador='$id'";    
    $result = $mysqli->query($sql);
    echo $sql ;

    ?>