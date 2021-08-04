<?php
   error_reporting(0);
    require('../database/config.php');

    if(!isset($_POST["id"]))
    {                
            $sql = " select * from cliente";
            $result = $mysqli->query($sql);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
            }
            $results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];
             echo json_encode($results);
    }
    else
    {
        $sql = " select * from cliente where id_cliente = ".$_POST["id"];
        $result = $mysqli->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $data[] = $row;
        }
        if(isset($data))
        {
            echo json_encode($data);
            return;
        }
        else
        {
        $result="";
        echo($result);
        }
        
    }    
?>