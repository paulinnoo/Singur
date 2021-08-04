
 <?php require('header.php'); ?>
        <div class="content">
            <div id="dvAlert" class="alert alert-success" style="display:none;" role="alert">
                <center><span id="spSuscesso"></span></center>
            </div>
            
            <div class="container-fluid">   
            <input type="hidden" class="form-control"  id="hddIdServico" value="0">       
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome do serviço</label>
                    <input type="text" class="form-control"  id="txtNomeServico" placeholder="Informe o nome do Serviço">
                </div>       
                <div class="form-group">
                    <label for="exampleFormControlInput1">Categoria do serviço</label>
                    
                    <select class="form-control" id="slcCategoriaServico">
                        <option value="0" selected>Selecione</option>
                        <?php 
                        $conn = mysqli_connect("149.56.118.230", "root", "tecpplus2021", "prestador");
                        $result = "SELECT * FROM categorias";
                        $resultado = mysqli_query($conn, $result);

                        while($row = mysqli_fetch_assoc($resultado)) {
                        echo '<option value="'.$row['id_categoria'].'"> '.$row['nome'].' </option>';
                         }
                        ?>
                    </select>

                </div>         
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição do serviço</label>
                    <textarea class="form-control" id="txtDescricaoServico" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Duração do serviço</label>
                    <textarea class="form-control" id="txtDuracaoServico" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagem do serviço</label>
                    <input type="file" name="userImage" class="form-control-file" id="uplServico">
                </div>
                <div class="form-group">                    
                    <button class="btn btn-primary" id="btnSalvar" onclick="salvarServico();">Salvar</button>
                    <button class="btn btn-danger" id="btnLimpar" onclick="LimparCamposServico();">Limpar</button>
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
preencherServicos();
</script>