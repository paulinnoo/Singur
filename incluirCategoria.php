<?php
   error_reporting(0);
    require('../database/config.php');    
    if(is_array($_FILES)) {   
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];    
        $id = $_POST['id'];   
        $nomeImg=$_FILES['file']['name']; 
        if($id==0)
        {
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {          
            $sourcePath = $_FILES['file']['tmp_name'];       
            $targetPath = "../images/index/category/".$_FILES['file']['name'];     
            if(move_uploaded_file($sourcePath,$targetPath)) {
                
                $sql = "insert into categorias (nome,descricao,flag_ativo,foto) value ('$nome','$descricao','S','$nomeImg')";
            $result = $mysqli->query($sql);
                echo "sucesso" ;
            }
            }
        }
        else
        {
            $sql = "update  categorias set nome ='$nome',descricao='$descricao' ";
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {          
                $sourcePath = $_FILES['file']['tmp_name'];       
                $targetPath = "../images/index/category/".$_FILES['file']['name'];     
                if(move_uploaded_file($sourcePath,$targetPath)) {
                    $sql.=" foto = '$nomeImg'";
                }
            }

             $sql.=" where id_categoria = $id";
             $result = $mysqli->query($sql);
             echo "sucesso" ;
            
        }
     }
      

     
    


   
   

?>