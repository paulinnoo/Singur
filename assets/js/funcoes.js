function editarCategoria(id)
{

    $.ajax({
        url:   'buscarCategorias.php',
        type:  'POST',
        cache: false,
        data: {
          id: id
        },
        error: function() {
              alert('Erro ao tentar ação!');
        },
        success: function(data) { 
          if(data=="")
          {
          }
          else{
            data = JSON.parse(data);
              document.getElementById("hddIdCategoria").value = data[0].id_categoria;
             document.getElementById("txtNomeCategoria").value = data[0].nome;
             document.getElementById("txtDescricao").value = data[0].descricao;

          }
        },
        
        beforeSend: function() {
        }
      });
}
function LimparCampos()
{
    document.getElementById("hddIdCategoria").value = "0";
    document.getElementById("txtNomeCategoria").value = "";
    document.getElementById("txtDescricao").value ="";
    document.getElementById("uplCategoria").value ="";
}

function salvarCategoria()
{
   var id = document.getElementById("hddIdCategoria").value;
   var nome = document.getElementById("txtNomeCategoria").value;
   var descricao = document.getElementById("txtDescricao").value;
   var fd = new FormData();
    fd.append('file',  $('#uplCategoria')[0].files[0]);
    fd.append('nome', nome);
    fd.append('descricao', descricao);
    fd.append('id', id);
    
    $.ajax({
        url: "incluirCategoria.php",
        type: "POST",
        data:  fd,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
        {
            if(data=="sucesso")
            {
                document.getElementById("dvAlert").style.display ="block";
                document.getElementById("spSuscesso").innerHTML = "Categoria adicionada com sucesso.";    
               preencherCategorias();            
            }
            else
                alert("Erro ao cadastrar categoria!");
            
        },
          error: function() 
        {
            alert("erro");
        } 	        
   });
   
}

function preencherCategorias()
{
   // $('#my-example').DataTable().clear().destroy();
    $('#my-example').empty();
    $('#my-example').dataTable({                    
            "bDestroy": true,
            "bProcessing": true,
            "pageLength": 5, 
            "sAjaxSource": "buscarCategorias.php",
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"},
            "aoColumns": [
                { mData: 'nome' } ,
                { mData: 'descricao' },
                { mData: 'flag_ativo' },                                        
                {
                    //"sName": "id_entrevistado",
                        "mData": "id_categoria",
                    "mRender": function ( data, type, full, meta ) {
                        return '<a href="javascript:void(0);" title="Editar" onclick="editarCategoria('+data+');">Editar</a> | <a href="javascript:void(0);" title="Editar" onclick="excluirCategoria('+data+');">Excluir</a>';
                        }
                }
                ]
        });  
 
}

function preencherServicos()
{
   // $('#my-example').DataTable().clear().destroy();
    $('#my-example').empty();
    $('#my-example').dataTable({                    
            "bDestroy": true,
            "bProcessing": true,
            "pageLength": 5, 
            "sAjaxSource": "buscarServicos.php",
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"},
            "aoColumns": [
                { mData: 'nome' } ,
                { mData: 'descricao' },
                { mData: 'duracao_servico' },                                                        
                {
                    //"sName": "id_entrevistado",
                        "mData": "id_servico",
                    "mRender": function ( data, type, full, meta ) {
                        return '<a href="javascript:void(0);" title="Editar" onclick="editarServico('+data+');">Editar</a> | <a href="javascript:void(0);" title="Editar" onclick="excluirServico('+data+');">Excluir</a>';
                        }
                }
                ]
        });  
 
}



function salvarServico()
{
   var id = document.getElementById("hddIdServico").value;
   var nome = document.getElementById("txtNomeServico").value;
   var descricao = document.getElementById("txtDescricaoServico").value;
   var duracao = document.getElementById("txtDuracaoServico").value;
   var select = document.getElementById("slcCategoriaServico");
	 var categoria_servico = select.options[select.selectedIndex].value;
   var fd = new FormData();
    fd.append('file',  $('#uplServico')[0].files[0]);
    fd.append('nome', nome);
    fd.append('descricao', descricao);
    fd.append('duracao', duracao);
    fd.append('categoria_servico', categoria_servico);
    fd.append('id', id);
    
    $.ajax({
        url: "incluirServicos.php",
        type: "POST",
        data:  fd,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
        {
            if(data=="sucesso")
            {
                document.getElementById("dvAlert").style.display ="block";
                document.getElementById("spSuscesso").innerHTML = "Serviço adicionada com sucesso.";    
                preencherServicos();            
            }
            else
                alert("Erro ao cadastrar serviço!");
            
        },
          error: function() 
        {
            alert("erro");
        } 	        
   });
   
}
function editarServico(id)
{

    $.ajax({
        url:   'buscarServicos.php',
        type:  'POST',
        cache: false,
        data: {
          id: id
        },
        error: function() {
              alert('Erro ao tentar ação!');
        },
        success: function(data) { 
          if(data=="")
          {
          }
          else{
            data = JSON.parse(data);
             document.getElementById("hddIdServico").value = data[0].id_servico;
             document.getElementById("txtNomeServico").value = data[0].nome;
             document.getElementById("txtDescricaoServico").value = data[0].descricao;
             document.getElementById("slcCategoriaServico").value = data[0].id_categoria;
             document.getElementById("txtDuracaoServico").value = data[0].duracao_servico;

          }
        },
        
        beforeSend: function() {
        }
      });
}

function LimparCamposServico()
{
    document.getElementById("hddIdServico").value = "0";
    document.getElementById("txtNomeServico").value = "";
    document.getElementById("txtDescricaoServico").value ="";
    document.getElementById("slcCategoriaServico").value ="0";
    document.getElementById("txtDuracaoServico").value ="";
    document.getElementById("uplServico").value ="";
}


function preencherClientes()
{
   // $('#my-example').DataTable().clear().destroy();
    $('#my-example').empty();
    $('#my-example').dataTable({                    
            "bDestroy": true,
            "bProcessing": true,
            "pageLength": 5, 
            "sAjaxSource": "buscarClientes.php",
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"},
            "aoColumns": [
                { mData: 'nome' } ,
                { mData: 'cep' },
                { mData: 'cpf' },                                        
                {
                    //"sName": "id_entrevistado",
                        "mData": "id_cliente",
                    "mRender": function ( data, type, full, meta ) {
                        return '<a href="javascript:void(0);" title="Editar" onclick="editarCliente('+data+');">Editar</a> | <a href="javascript:void(0);" title="Editar" onclick="excluirCliente('+data+');">Excluir</a>';
                        }
                }
                ]
        });  
 
}

function preencherPrestadores()
{
   // $('#my-example').DataTable().clear().destroy();
    $('#tblPrestadores').empty();
    $('#tblPrestadores').dataTable({                    
            "bDestroy": true,
            "bProcessing": true,
            "pageLength": 5, 
            "sAjaxSource": "buscarPrestadores.php",
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"},
            "aoColumns": [
                { mData: 'nome' } ,
                { mData: 'cep' },
                { mData: 'cpf' },                                        
                {
                    //"sName": "id_entrevistado",
                        "mData": "id_prestador",
                    "mRender": function ( data, type, full, meta ) {
                        return '<a href="javascript:void(0);" title="Editar" onclick="editarPrestador('+data+');">Editar</a> | <a href="javascript:void(0);" title="Editar" onclick="excluirPrestador('+data+');">Excluir</a>';
                        }
                }
                ]
        });  
 
}



function salvarCliente()
{
   var id = document.getElementById("hddIdCliente").value;
   var latitude = document.getElementById("hddLatCliente").value;
   var longitude = document.getElementById("hddLongCliente").value;
   var nome = document.getElementById("txtNomeCliente").value;
   var sobrenome = document.getElementById("txtSobrenomeCliente").value;
   var email = document.getElementById("txtEmailCliente").value;
   var cep = document.getElementById("txtCEPCliente").value;
   var logradouro = document.getElementById("txtLograCliente").value;
   var bairro = document.getElementById("txtBairroCliente").value;
   var cidade = document.getElementById("txtCidadeCliente").value;
   var estado = document.getElementById("txtEstadoCliente").value;
   var cpf = document.getElementById("txtCPFCliente").value;
   var senha = document.getElementById("txtSenhaCliente").value;
	 
   var fd = new FormData();
    fd.append('file',  $('#uplCliente')[0].files[0]);
    fd.append('nome', nome);
    fd.append('sobrenome', sobrenome);
    fd.append('cep', cep);
    fd.append('logradouro', logradouro);
    fd.append('id', id);
    fd.append('bairro', bairro);
    fd.append('cidade', cidade);
    fd.append('estado', estado);
    fd.append('cpf', cpf);
    fd.append('latitude', latitude);
    fd.append('longitude', longitude);
    fd.append('email', email);
    fd.append('senha', senha);
    
    $.ajax({
        url: "incluirCliente.php",
        type: "POST",
        data:  fd,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
        {
            if(data=="sucesso")
            {
                document.getElementById("dvAlert").style.display ="block";
                document.getElementById("spSuscesso").innerHTML = "Serviço adicionada com sucesso.";    
                preencherServicos();            
            }
            else
                alert("Erro ao cadastrar serviço!");
            
        },
          error: function() 
        {
            alert("erro");
        } 	        
   });
   
}

function LimparCamposClientes()
{
    document.getElementById("hddIdCliente").value = "0";
    document.getElementById("hddLatCliente").value = "";
    document.getElementById("hddLongCliente").value = "";
    document.getElementById("txtNomeCliente").value = "";
    document.getElementById("txtSobrenomeCliente").value = "";
    document.getElementById("txtEmailCliente").value = "";
    document.getElementById("txtCEPCliente").value = "";
    document.getElementById("txtLograCliente").value = "";
    document.getElementById("txtBairroCliente").value = "";
    document.getElementById("txtCidadeCliente").value = "";
    document.getElementById("txtEstadoCliente").value = "";
    document.getElementById("txtCPFCliente").value = "";
    document.getElementById("txtSenhaCliente").value = "";
    document.getElementById("txtConfSenhaCliente").value = "";
    document.getElementById("uplCliente").value ="";
}

function LimparCamposPrestador()
{
    document.getElementById("hddIdPrestador").value = "0";
    document.getElementById("hddLatPrestador").value = "";
    document.getElementById("hddLongPrestador").value = "";
    document.getElementById("txtNomePrestador").value = "";
    document.getElementById("txtSobrenomePrestador").value = "";
    document.getElementById("txtEmailPrestador").value = "";
    document.getElementById("txtCEPPrestador").value = "";
    document.getElementById("txtLograPrestador").value = "";
    document.getElementById("txtBairroPrestador").value = "";
    document.getElementById("txtCidadePrestador").value = "";
    document.getElementById("txtEstadoPrestador").value = "";
    document.getElementById("txtCPFPrestador").value = "";
    document.getElementById("txtSenhaPrestador").value = "";
    document.getElementById("txtConfSenhaPrestador").value = "";
    document.getElementById("uplPrestador").value ="";
}


function editarCliente(id)
{

    $.ajax({
        url:   'buscarClientes.php',
        type:  'POST',
        cache: false,
        data: {
          id: id
        },
        error: function() {
              alert('Erro ao tentar ação!');
        },
        success: function(data) { 
          if(data=="")
          {
          }
          else{
            data = JSON.parse(data);
            document.getElementById("hddIdCliente").value = data[0].id_cliente;
            document.getElementById("hddLatCliente").value = data[0].latitude;
            document.getElementById("hddLongCliente").value = data[0].longitude;
            document.getElementById("txtNomeCliente").value = data[0].nome;
            document.getElementById("txtSobrenomeCliente").value = data[0].sobrenome;
            document.getElementById("txtEmailCliente").value = data[0].email;
            document.getElementById("txtCEPCliente").value = data[0].cep;
            document.getElementById("txtLograCliente").value = data[0].logradouro;
            document.getElementById("txtBairroCliente").value = data[0].bairro;
            document.getElementById("txtCidadeCliente").value = data[0].cidade;
            document.getElementById("txtEstadoCliente").value = data[0].estado;
            document.getElementById("txtCPFCliente").value = data[0].cpf;
            document.getElementById("txtSenhaCliente").value = data[0].senha;
             

          }
        },
        
        beforeSend: function() {
        }
      });
}



function salvarPrestador()
{
   var id = document.getElementById("hddIdPrestador").value;
   var latitude = document.getElementById("hddLatPrestador").value;
   var longitude = document.getElementById("hddLongPrestador").value;
   var nome = document.getElementById("txtNomePrestador").value;
   var sobrenome = document.getElementById("txtSobrenomePrestador").value;
   var email = document.getElementById("txtEmailPrestador").value;
   var cep = document.getElementById("txtCEPPrestador").value;
   var logradouro = document.getElementById("txtLograPrestador").value;
   var bairro = document.getElementById("txtBairroPrestador").value;
   var cidade = document.getElementById("txtCidadePrestador").value;
   var estado = document.getElementById("txtEstadoPrestador").value;
   var cpf = document.getElementById("txtCPFPrestador").value;
   var senha = document.getElementById("txtSenhaPrestador").value;
	 
   var fd = new FormData();
    fd.append('file',  $('#uplPrestador')[0].files[0]);
    fd.append('nome', nome);
    fd.append('sobrenome', sobrenome);
    fd.append('cep', cep);
    fd.append('logradouro', logradouro);
    fd.append('id', id);
    fd.append('bairro', bairro);
    fd.append('cidade', cidade);
    fd.append('estado', estado);
    fd.append('cpf', cpf);
    fd.append('latitude', latitude);
    fd.append('longitude', longitude);
    fd.append('email', email);
    fd.append('senha', senha);
    
    $.ajax({
        url: "incluirPrestador.php",
        type: "POST",
        data:  fd,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
        {
            console.log(data);
            if(data=="sucesso")
            {
                document.getElementById("dvAlert").style.display ="block";
                document.getElementById("spSuscesso").innerHTML = "Prestador adicionado com sucesso.";    
                preencherPrestadores();            
            }
            else
                alert("Erro ao cadastrar serviço!");
            
        },
          error: function() 
        {
            alert("erro");
        } 	        
   });
   
}

function editarPrestador(id)
{

    $.ajax({
        url:   'buscarPrestadores.php',
        type:  'POST',
        cache: false,
        data: {
          id: id
        },
        error: function() {
              alert('Erro ao tentar ação!');
        },
        success: function(data) { 
          if(data=="")
          {
          }
          else{
            data = JSON.parse(data);
            document.getElementById("hddIdPrestador").value = data[0].id_prestador;
            document.getElementById("hddLatPrestador").value = data[0].latitude;
            document.getElementById("hddLongPrestador").value = data[0].longitude;
            document.getElementById("txtNomePrestador").value = data[0].nome;
            document.getElementById("txtSobrenomePrestador").value = data[0].sobrenome;
            document.getElementById("txtEmailPrestador").value = data[0].email;
            document.getElementById("txtCEPPrestador").value = data[0].cep;
            document.getElementById("txtLograPrestador").value = data[0].logradouro;
            document.getElementById("txtBairroPrestador").value = data[0].bairro;
            document.getElementById("txtCidadePrestador").value = data[0].cidade;
            document.getElementById("txtEstadoPrestador").value = data[0].estado;
            document.getElementById("txtCPFPrestador").value = data[0].cpf;
            document.getElementById("txtSenhaPrestador").value = data[0].senha;
             

          }
        },
        
        beforeSend: function() {
        }
      });
}

function excluirPrestador(id){
       
    $.ajax({
        url:   'excluirPrestador.php',
        type:  'POST',
        cache: false,
        data: {
          id: id
        },
        error: function(data) {
            console.log(data);
        },
        success: function() { 
            confirm('Usuario excluido!');
            document.location.reload(true);
          
        },
        

      });
      

}
function completarPrestador(id){
    var cep = document.getElementById("txtCEPPrestador").value;
	const url = "https://brasilapi.com.br/api/cep/v2/";
        fetch(url+cep)
            .then(resp => resp.json())
            .then(ret => { 
                document.getElementById("txtLograPrestador").value = ret.street;
                document.getElementById("txtBairroPrestador").value = ret.neighborhood;				
                document.getElementById("txtCidadePrestador").value = ret.city; 
                document.getElementById("txtEstadoPrestador").value = ret.state;
                document.getElementById("hddLatPrestador").value = ret.location.coordinates.latitude; 
                document.getElementById("hddLongPrestador").value = ret.location.coordinates.longitude;                
            })

}