<?php
   error_reporting(0);
    require('../database/config.php');    
    if(is_array($_FILES)) {   
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];  
        $duracao = $_POST['duracao'];   
        $id = $_POST['id']; 
        $categoria_servico = $_POST['categoria_servico'];  
        $nomeImg=$_FILES['file']['name']; 
        if($id==0)
        {
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {          
            $sourcePath = $_FILES['file']['tmp_name'];       
            $targetPath = "../images/index/category/".$_FILES['file']['name'];     
            if(move_uploaded_file($sourcePath,$targetPath)) {
                
                $sql = "insert into servicos (nome,id_categoria,descricao,duracao_servico,foto) value ('$nome','$categoria_servico','$descricao','$duracao','$nomeImg')";
            $result = $mysqli->query($sql);
                echo "sucesso" ;
            }
            }
        }
        else
        {
            $sql = "update  servicos set nome ='$nome',descricao='$descricao',duracao_servico='$duracao',id_categoria='$categoria_servico' ";
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {          
                $sourcePath = $_FILES['file']['tmp_name'];       
                $targetPath = "../images/index/servicos/".$_FILES['file']['name'];     
                if(move_uploaded_file($sourcePath,$targetPath)) {
                    $sql.=" ,foto = '$nomeImg'";
                }
            }

             $sql.=" where id_servico = $id";
             $result = $mysqli->query($sql);
             echo "sucesso" ;
            
        }
     }
      

     
    


   
   

?>