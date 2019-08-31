<!-- Cabeçalho de conteúdo (cabeçalho da página) -->
<section class="content-header">
      <h1>
        Usuários
        <small>Controle de Usuários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuários</li>
      </ol>
    </section>

    <!-- Conteudo -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
            <!-- Botão Adicionar novo usuário -->     
            <a href="<?= BASE_URL; ?>/usuarios/adicionar" class="btn btn-success btn-flat"><i class="fa fa-plus"></i>  Adicionar</a>
            <!-- Botão cargo usuário -->                         
            <a href="<?= BASE_URL; ?>/cargos" class="btn btn-primary btn-flat"><i class="fa fa-cog"></i>  Cargos</a>
          <!-- Botões MINIMIZAR e FECHAR -->
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="tabela" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Cidade</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($lista_usuarios as $usuario){ ?>
                <tr id="linha<?= $usuario['id_usuario'] ?>">
                  <td><?= utf8_encode($usuario['nome']); ?></td>
                  <td>vazio</td>
                  <td><?= $usuario['telefone']; ?></td>
                  <td><?= $usuario['celular']; ?></td>
                  <td><?= $usuario['cidade']; ?></td>
                  <td>
                    <div class="text-center">
                      <button class="btn btn-info" title="Exibir" data-toggle="modal" data-target="#modal-exibir" onclick="ModalExibir(<?= $usuario['id_usuario']; ?>)">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn bg-olive" title="Alterar" data-toggle="modal" data-target="#modal-atualizar" onclick="ModalAtualizar(<?= $usuario['id_usuario']; ?>)">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" title="Deletar" data-toggle="modal" data-target="#modal-deletar" onclick="deletar(<?= $usuario['id_usuario']; ?>)">
                        <i class="fa fa-trash"></i>
                      </button>   
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div><!-- /.box-footer-->
      </div><!-- /.box -->

    </section><!-- /.content -->


    <!-- MODAL exibir os dados do usuários  -->
    <div class="modal fade" id="modal-exibir">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">DADOS COMPLETOS</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" id="id_usuario-visualizar">
            <div class="row">
              <!-- id do usuário -->
              <div class="col-sm-8">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome-visualizar" Placeholder="Nome" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="dataNascimento">Data de Nascimento</label>
                  <input type="date" class="form-control" name="dataNascimento" id="dataNascimento-visualizar" Placeholder="Data de Nascimento" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="rg">RG</label>
                  <input type="number" class="form-control" name="rg" id="rg-visualizar" Placeholder="RG" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cpf">CPF</label>
                  <input type="number" class="form-control" name="cpf" id="cpf-visualizar" Placeholder="CPF" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control" name="endereco" id="endereco-visualizar" Placeholder="Endereço" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Número</label>
                  <input type="number" class="form-control" name="numero" id="numero-visualizar" Placeholder="Número" readonly>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro-visualizar" Placeholder="Bairro" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento-visualizar" Placeholder="Complemento" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade-visualizar" Placeholder="Cidade" readonly>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="estado">Estado</label>
                  <input type="text" class="form-control" name="estado" id="estado-visualizar" Placeholder="Estado" maxlength="2" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cep">CEP</label>
                  <input type="number" class="form-control" name="cep" id="cep-visualizar" Placeholder="CEP" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="number" class="form-control" name="telefone" id="telefone-visualizar" Placeholder="Telefone" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input type="number" class="form-control" name="celular" id="celular-visualizar" Placeholder="Celular" readonly>
                </div>
              </div>
            </div>
            <h3>Dados de Acesso</h3>
            <div class="row">
              <div class="col-sm-6">
                <label for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="email" class="form-control" name="email" id="email-visualizar" placeholder="Email" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" name="senha" id="senha-visualizar" Placeholder="Senha" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>            
          </div>
        </div> <!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->    
    </div><!-- /.modal -->

    <!-- MODAL atualizar os dados do usuários  -->
    <div class="modal fade" id="modal-atualizar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ATUALIZAR DADOS</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-success alert-dismissible" id="alerta-atualizado" style="display: none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-check"></i> Atualizado com Sucesso!</h5>                
            </div>
          <input type="hidden" id="id_usuario-atualizar">
            <div class="row">
              <!-- id do usuário -->
              <div class="col-sm-8">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome-atualizar" Placeholder="Nome">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="dataNascimento">Data de Nascimento</label>
                  <input type="date" class="form-control" name="dataNascimento" id="dataNascimento-atualizar" Placeholder="Data de Nascimento">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="rg">RG</label>
                  <input type="number" class="form-control" name="rg" id="rg-atualizar" Placeholder="RG">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cpf">CPF</label>
                  <input type="number" class="form-control" name="cpf" id="cpf-atualizar" Placeholder="CPF">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control" name="endereco" id="endereco-atualizar" Placeholder="Endereço">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Número</label>
                  <input type="number" class="form-control" name="numero" id="numero-atualizar" Placeholder="Número">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro-atualizar" Placeholder="Bairro">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento-atualizar" Placeholder="Complemento">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade-atualizar" Placeholder="Cidade">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="estado">Estado</label>
                  <input type="text" class="form-control" name="estado" id="estado-atualizar" Placeholder="Estado" maxlength="2">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cep">CEP</label>
                  <input type="number" class="form-control" name="cep" id="cep-atualizar" Placeholder="CEP">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="number" class="form-control" name="telefone" id="telefone-atualizar" Placeholder="Telefone">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input type="number" class="form-control" name="celular" id="celular-atualizar" Placeholder="Celular">
                </div>
              </div>
            </div>
            <h3>Dados de Acesso</h3>
            <div class="row">
              <div class="col-sm-6">
                <label for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="email" class="form-control" name="email" id="email-atualizar" placeholder="Email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" name="senha" id="senha-atualizar" Placeholder="Senha">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="salvarAlteracao()">Salvar</button>              
          </div>
        </div> <!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->    
    </div><!-- /.modal -->

    <!-- Modal de confirmação de exclusão de usuários -->
    <div class="modal modal-danger fade" id="modal-deletar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ATENÇÃO</h4>
          </div>
          <div class="modal-body">
            <p>Tem certeza que deseja excluir esse usuário?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-outline pull-left" id="btnSim">Sim</button>
          </div>
        </div><!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->          
    </div><!-- /.modal -->

    <!-- Modal cargos -->
    <div class="modal fade" id="gerenciar-cargos">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">GERENCIAR CARGOS</h4>
          </div>
          <div class="modal-body">
          <div class="box-body table-responsive no-padding">
            <button class="btn btn-primary" style="margin-bottom:10px;" title="Adicionar" data-toggle="modal" data-target="#adicionar-cargo"><i class="fa fa-plus"></i></button>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Cargos</th>
                    <th>Descrição</th>
                  </tr>
                </thead>
                <tbody id="cargos">
                </tbody>
              </table>
            </div> <!-- /.box-body -->            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-outline pull-left" id="btnSim">Sim</button>
          </div>
        </div><!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->          
    </div><!-- /.modal -->

    <!-- Modal cargos -->
    <div class="modal fade" id="adicionar-cargo">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">NOVO CARGO</h4>
          </div>
          <div class="modal-body">
              <form>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="cargo">Nome:</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" placeholder="Insira o nome do cargo">
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label for="descricao">Descrição:</label>
                      <textarea class="form-control" name="descricao" id="descricao" placeholder="Insira a descrição do cargo ..."></textarea>
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-primary btn-flat btn-block" onClick="adicionarCargo()">Salvar</button>
                </div>
              </div> 
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-outline pull-left" id="btnSim">Sim</button>
          </div>
        </div><!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->          
    </div><!-- /.modal -->

    <!-- Modal alterar cargos -->
    <div class="modal fade" id="alterar-cargo">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ALTERAR CARGO</h4>
          </div>
          <div class="modal-body">
              <form>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="hidden" id="cargo-id_cargo">
                    <label for="cargo">Nome:</label>
                    <input type="text" name="cargo" id="cargo-atualizar" class="form-control" placeholder="Insira o nome do cargo">
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label for="descricao">Descrição:</label>
                      <textarea class="form-control" name="descricao" id="descricao-atualizar" placeholder="Insira a descrição do cargo ..."></textarea>
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-primary btn-flat btn-block">Salvar</button>
                </div>
              </div> 
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-outline pull-left" id="btnSim">Sim</button>
          </div>
        </div><!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->          
    </div><!-- /.modal -->

    <!-- AJAX  -->
    <script>
      function ModalExibir(id_usuario){
        $.ajax({
          url: "http://localhost/projeto/usuarios/exibir/" + id_usuario,
          type: "GET",
          data: {id_usuario: id_usuario},
          dataType: 'json',
          success: function(data){
            // console.log(data);
            $.each(data, function(idx, obj) {

              var opa = new Date(obj.data_nascimento);
              console.log(opa);

              $('#id_usuario-visualizar').val(obj.id_usuario);
              $('#nome-visualizar').val(obj.nome);
              $('#rg-visualizar').val(obj.rg);
              $('#cpf-visualizar').val(obj.cpf);
              $('#dataNascimento-visualizar').val(opa);
              $('#endereco-visualizar').val(obj.endereco);
              $('#numero-visualizar').val(obj.numero);
              $('#bairro-visualizar').val(obj.bairro);
              $('#complemento-visualizar').val(obj.complemento);
              $('#cidade-visualizar').val(obj.cidade);
              $('#estado-visualizar').val(obj.estado);
              $('#cep-visualizar').val(obj.cep);
              $('#telefone-visualizar').val(obj.telefone);
              $('#celular-visualizar').val(obj.celular);
              $('#email-visualizar').val(obj.email);
              $('#senha-visualizar').val(obj.senha);
            });
          }
        });
      } // modal exibir

      function ModalAtualizar(id_usuario){
        $.ajax({
          url: "http://localhost/projeto/usuarios/exibir/" + id_usuario,
          type: "GET",
          data: {id_usuario: id_usuario},
          dataType: 'json',
          success: function(data){
            console.log(data);
            $.each(data, function(idx, obj) {
              $('#id_usuario-atualizar').val(obj.id_usuario);
              $('#nome-atualizar').val(obj.nome);
              $('#rg-atualizar').val(obj.rg);
              $('#cpf-atualizar').val(obj.cpf);
              $('#dataNascimento-atualizar').val(obj.dataNascimento);
              $('#endereco-atualizar').val(obj.endereco);
              $('#numero-atualizar').val(obj.numero);
              $('#bairro-atualizar').val(obj.bairro);
              $('#complemento-atualizar').val(obj.complemento);
              $('#cidade-atualizar').val(obj.cidade);
              $('#estado-atualizar').val(obj.estado);
              $('#cep-atualizar').val(obj.cep);
              $('#telefone-atualizar').val(obj.telefone);
              $('#celular-atualizar').val(obj.celular);
              $('#email-atualizar').val(obj.email);
              $('#senha-atualizar').val(obj.senha);
            });
          }
        });
      } // modal atualizar

      function salvarAlteracao(){
        var id_usuario = $('#id_usuario-atualizar').val();
        var nome = $('#nome-atualizar').val();
        var rg = $('#rg-atualizar').val();
        var cpf = $('#cpf-atualizar').val();
        var dataNascimento = $('#dataNascimento-atualizar').val();
        var endereco = $('#endereco-atualizar').val();
        var numero = $('#numero-atualizar').val();
        var bairro = $('#bairro-atualizar').val();
        var complemento = $('#complemento-atualizar').val();
        var cidade = $('#cidade-atualizar').val();
        var estado = $('#estado-atualizar').val();
        var cep = $('#cep-atualizar').val();
        var telefone = $('#telefone-atualizar').val();
        var celular = $('#celular-atualizar').val();
        var email = $('#email-atualizar').val();
        var senha = $('#senha-atualizar').val();

        $.ajax({
          url: "http://localhost/projeto/usuarios/atualizar/",
          type: "post",
          data: {
            id_usuario: id_usuario.toString(),
            nome: nome.toString(),
            rg: rg.toString(),
            cpf: cpf.toString(),
            dataNascimento: dataNascimento.toString(),
            endereco: endereco.toString(),
            numero: numero.toString(),
            bairro: bairro.toString(),
            complemento: complemento.toString(),
            cidade: cidade.toString(),
            estado: estado.toString(),
            cep: cep.toString(),
            telefone: telefone.toString(),
            celular: celular.toString(),
            email: email.toString(),
            senha: senha.toString()
          },
          dataType: 'json',
          success: function(data) {
            $('#alerta-atualizado').css('display', 'block');
          },
          error: function(data) {
            $('#alerta-atualizado').css('display', 'block');
          }

        });
      } // salvar alteracoes

      function deletar(id_usuario) {
        $('#btnSim').click(function () {
          $.ajax({
            url: "http://localhost/projeto/usuarios/deletar/",
            type: "post",
            data: {id_usuario: id_usuario},
            success: function(data){
              $('#modal-deletar').modal('hide');
              $('#linha' + id_usuario).fadeOut(1000);
            }, error: function(data){
              alert('erro' + data);
            }
          })
        });
      } // deletar

      function exibirCargos(){
        $('#cargos').empty();

        $.ajax({
          url: "http://localhost/projeto/cargos/exibir/",//Definindo o arquivo onde serão buscados os dados
          type:'post',        //Definimos o método HTTP usado
          dataType: 'json',   //Definimos o tipo de retorno
          success: function(dados){
            for(var i=0; dados.length > i; i++){
                //Adicionando registros retornados na tabela
                $('#cargos').append('<tr><td>'+dados[i].cargo+'</td><td>'+dados[i].descricao+'</td> <td><div class="tools"><i class="fa fa-edit" style="cursor:pointer;" data-toggle="modal" data-target="#alterar-cargo" onclick="alterarCargo(dados[i].id_cargo);"></i> <i class="fa fa-trash-o" style="cursor:pointer; color:red;"></i></div></td> </tr>');
            } // for
          }, error: function(dados){
              alert('erro' + dados);
            }
        }); // ajax
      } //exibir cargos

      function adicionarCargo(){
        var cargo =  $('#cargo').val();
        var descricao = $('#descricao').val();

        $.ajax({
          url: "http://localhost/projeto/cargos/adicionar/",//Definindo o arquivo onde serão buscados os dados
          type:'post',        //Definimos o método HTTP usado
          data: {
            cargo: cargo.toString(),
            descricao: descricao.toString()
          },
          success: function(dados){
           //location.reload('index.php?controle=usuarioControle&metodo=usuarios');
           alert('foi');
          } // success
          , error: function(dados){
            alert(dados);
          }
        }); // ajax
      } // adicionar Cargo

      function alterarCargo(id_cargo){
        $.ajax({
          url: "http://localhost/projeto/cargos/buscar/",//Definindo o arquivo onde serão buscados os dados
          type: "post",        //Definimos o método HTTP usado
          data: {
            id_cargo: id_cargo.toString()
          },
          success: function(dados){
           $.each(dados, function(id, obj){
             $("#cargo-id_cargo").val(obj.id_cargo);
             $("#cargo-atualizar").val(obj.cargo);
             $("#descricao-atualizar").val(obj.descricao);
           })
          } // success
          , error: function(dados){
            alert(dados);
          }
        });
      }

    </script>
    

