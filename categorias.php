
 <?php require('header.php'); ?>
        <div class="content">
            <div id="dvAlert" class="alert alert-success" style="display:none;" role="alert">
                <center><span id="spSuscesso"></span></center>
            </div>
            
            <div class="container-fluid">   
            <input type="hidden" class="form-control"  id="hddIdCategoria" value="0">       
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome da Categoria</label>
                    <input type="text" class="form-control"  id="txtNomeCategoria" placeholder="Informe o nome da Categoria">
                </div>               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição da Catedoria</label>
                    <textarea class="form-control" id="txtDescricao" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagem Categoria</label>
                    <input type="file" name="userImage" class="form-control-file" id="uplCategoria">
                </div>
                <div class="form-group">                    
                    <button class="btn btn-primary" id="btnSalvar" onclick="salvarCategoria();">Salvar</button>
                    <button class="btn btn-danger" id="btnLimpar" onclick="LimparCampos();">Limpar</button>
                </div>               
            </div>
            <br>
            <table id="my-example">
                <thead>
                 <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Status</th>                                   
                    <th></th>          
                 </tr>
                </thead>
            </table>
        </div>  
 <?php require('footer.php'); ?>
 <script>
preencherCategorias();
</script>