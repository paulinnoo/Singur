<?php require('header.php'); ?>
        <div class="content">
            <div id="dvAlert" class="alert alert-success" style="display:none;" role="alert">
                <center><span id="spSuscesso"></span></center>
            </div>
            
            <div class="container-fluid">   
            <input type="hidden" class="form-control"  id="hddIdPrestador" value="0"> 
            <input type="hidden" class="form-control"  id="hddLatPrestador" value=""> 
            <input type="hidden" class="form-control"  id="hddLongPrestador" value="">       
            <div class="form-group">
                    <label for="exampleFormControlInput1">Nome do Prestador</label>
                    <input type="text" class="form-control"  id="txtNomePrestador" >
                </div>     
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sobrenome do Prestador</label>
                    <input type="text" class="form-control"  id="txtSobrenomePrestador" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">E-mail do Cliente</label>
                    <input type="email" class="form-control"  id="txtEmailPrestador" >
                </div>
                         
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Digite a senha</label>
                    <input type="password" style="max-width:300px;" class="form-control" id="txtSenhaPrestador"></input>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Confirme a senha</label>
                    <input type="password" style="max-width:300px;" class="form-control" id="txtConfSenhaPrestador" ></input>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">CEP</label>
                    <input type="tel" style="max-width:300px;" class="form-control"  id="txtCEPPrestador" onchange="completarPrestador()">                                 
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Endereço</label>
                    <input type="text" class="form-control"  id="txtLograPrestador">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Bairro</label>
                    <input type="text" class="form-control"  id="txtBairroPrestador">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Cidade</label>
                    <input type="text" class="form-control"  id="txtCidadePrestador">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Estado</label>
                    <input type="text" class="form-control"  id="txtEstadoPrestador">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">CPF</label>
                    <input type="tel" class="form-control"  id="txtCPFPrestador">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto do Prestador</label>
                    <input type="file" name="userImage" class="form-control-file" id="uplPrestador">
                </div>
                <div class="form-group">                    
                    <button class="btn btn-primary" id="btnSalvar" onclick="salvarPrestador();">Salvar</button>
                    <button class="btn btn-danger" id="btnLimpar" onclick="LimparCamposPrestador();">Limpar</button>
                </div>               
            </div>
            <br>
            <table id="tblPrestadores">
                <thead>
                 <tr>
                    <th>Nome</th>
                    <th>cep</th>
                    <th>cpf</th>
                                                      
                    <th></th>          
                 </tr>
                </thead>
            </table>
        </div>  
 <?php require('footer.php'); ?>
<script>
preencherPrestadores();
$(document).ready(function() {
	$("#txtCEPPrestador").mask("99999-999");
});

$(document).ready(function() {
	$("#txtCPFPrestador").mask("999.999.999-99");
});
</script>
