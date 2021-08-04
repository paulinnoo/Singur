<?php
   error_reporting(0);
    require('../database/config.php');    
    if(is_array($_FILES)) {   
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];  
        $cep = $_POST['cep'];   
        $id = $_POST['id']; 
        $logradouro = $_POST['logradouro'];  
        $nomeImg=$_FILES['file']['name']; 
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cpf = $_POST['cpf'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        if($id==0)
        {
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {          
            $sourcePath = $_FILES['file']['tmp_name'];       
            $targetPath = "../images/index/category/".$_FILES['file']['name'];     
            if(move_uploaded_file($sourcePath,$targetPath)) {
                
                $sql = "insert into prestador (nome, sobrenome, email, senha, cep, latitude, longitude, logradouro, bairro, cidade, estado, cpf, flag_juridico, flag_ativo, data_cadastro, logo)
                 value ('$nome','$sobrenome','$email','$senha','$cep','$latitude','$longitude','$logradouro','$bairro','$cidade','$estado','$cpf','N','S',NOW(),'$nomeImg')";
            $result = $mysqli->query($sql);
                echo "sucesso" ;
            }
            }
        }
        else
        {
            $sql = "update  prestador set nome ='$nome', sobrenome='$sobrenome', email='$email', senha='$senha', cep='$cep', latitude='$latitude', longitude='$longitude',
            logradouro='$logradouro', bairro='$bairro', cidade='$cidade', estado='$estado', cpf='$cpf' ";
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {          
                $sourcePath = $_FILES['file']['tmp_name'];       
                $targetPath = "../images/index/prestadores/".$_FILES['file']['name'];     
                if(move_uploaded_file($sourcePath,$targetPath)) {
                    $sql.=" ,logo = '$nomeImg'";
                }
            }

             $sql.=" where id_prestador = $id";
             
             $result = $mysqli->query($sql);
             echo "sucesso" ;
            
        }
     }