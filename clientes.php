<?php require('header.php'); ?>
        <div class="content">
            <div id="dvAlert" class="alert alert-success" style="display:none;" role="alert">
                <center><span id="spSuscesso"></span></center>
            </div>
            
            <div class="container-fluid">   
            <input type="hidden" class="form-control"  id="hddIdCliente" value="0"> 
            <input type="hidden" class="form-control"  id="hddLatCliente" value=""> 
            <input type="hidden" class="form-control"  id="hddLongCliente" value="">       
            <div class="form-group">
                    <label for="exampleFormControlInput1">Nome do Cliente</label>
                    <input type="text" class="form-control"  id="txtNomeCliente" >
                </div>     
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sobrenome do Cliente</label>
                    <input type="text" class="form-control"  id="txtSobrenomeCliente" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">E-mail do Cliente</label>
                    <input type="email" class="form-control"  id="txtEmailCliente" >
                </div>
                         
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Digite a senha</label>
                    <input type="password" style="max-width:300px;" class="form-control" id="txtSenhaCliente"></input>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Confirme a senha</label>
                    <input type="password" style="max-width:300px;" class="form-control" id="txtConfSenhaCliente"></input>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">CEP</label>
                    <input type="tel" style="max-width:300px;" class="form-control"  id="txtCEPCliente" onchange="completarCliente();" autofocus>                                 
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Endereço</label>
                    <input type="text" class="form-control"  id="txtLograCliente">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Bairro</label>
                    <input type="text" class="form-control"  id="txtBairroCliente">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Cidade</label>
                    <input type="text" class="form-control"  id="txtCidadeCliente">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Estado</label>
                    <input type="text" class="form-control"  id="txtEstadoCliente">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">CPF</label>
                    <input type="tel" class="form-control"  id="txtCPFCliente">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto do Cliente</label>
                    <input type="file" name="userImage" class="form-control-file" id="uplCliente">
                </div>
                <div class="form-group">                    
                    <button class="btn btn-primary" id="btnSalvar" onclick="validarCliente();">Salvar</button>
                    <button class="btn btn-danger" id="btnLimpar" onclick="LimparCamposClientes();">Limpar</button>
                </div>               
            </div>
            <br>
            <table id="my-example">
                <thead>
                 <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Duração</th>
                    <th>Status</th>                                   
                    <th></th>          
                 </tr>
                </thead>
            </table>
        </div>  
 <?php require('footer.php'); ?>
<script>
preencherClientes();
$(document).ready(function() {
	$("#txtCEPCliente").mask("99999-999");
});

$(document).ready(function() {
	$("#txtCPFCliente").mask("999.999.999-99");
});
</script>