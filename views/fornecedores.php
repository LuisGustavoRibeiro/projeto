<!-- Cabeçalho de conteúdo (cabeçalho da página) -->
<section class="content-header">
      <h1>
        Fornecedores
        <small>Gerenciamento</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fornecedores</li>
      </ol>
    </section>

    <!-- Conteudo -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
            <!-- Botão Adicionar novo usuário -->
            <a href="<?= BASE_URL; ?>/fornecedores/adicionar">             
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-plus"></i>  Adicionar</button>
            </a>
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
                <th>Fornecedor</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Cidade</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($lista_fornecedores as $fornecedor){ ?>
                <tr id="linha<?= $fornecedor['id_fornecedor'] ?>">
                  <td><?= utf8_encode($fornecedor['razao_social']); ?></td>
                  <td>vazio</td>
                  <td><?= $fornecedor['email']; ?></td>
                  <td><?= $fornecedor['telefone']; ?></td>
                  <td><?= $fornecedor['cidade']; ?></td>
                  <td>
                    <div class="text-center">
                      <button class="btn btn-info" title="Exibir" data-toggle="modal" data-target="#modal-exibir" onclick="ModalExibir(<?= $fornecedor['id_fornecedor']; ?>)">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn bg-olive" title="Alterar" data-toggle="modal" data-target="#modal-atualizar" onclick="ModalAtualizar(<?= $fornecedor['id_fornecedor']; ?>)">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" title="Deletar" data-toggle="modal" data-target="#modal-deletar" onclick="deletar(<?= $fornecedor['id_fornecedor']; ?>)">
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

    <!-- MODAL exibir os dados do Fornecedores  -->
    <div class="modal fade" id="modal-exibir">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">DADOS COMPLETOS</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_fornecedor-visualizar">
            <div class="row">
              <!-- id do usuário -->
              <div class="col-sm-8">
                <div class="form-group">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="text" class="form-control" name="razaoSocial" id="razaoSocial-visualizar" Placeholder="Razão Social" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="nomeFanstasia">Nome Fantasia</label>
                  <input type="text" class="form-control" name="nomeFanstasia" id="nomeFanstasia-visualizar" Placeholder="Nome Fantasia" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cnpj">CNPJ</label>
                  <input type="text" class="form-control" name="cnpj" id="cnpj-visualizar" Placeholder="CNPJ" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="number" class="form-control" name="email-visualizar" id="email-visualizar" Placeholder="E-mail" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control" name="endereco" id="endereco-visualizar" Placeholder="Endereço" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Número</label>
                  <input type="number" class="form-control" name="numero" id="numero-visualizar" Placeholder="Número" readonly>
                </div>
              </div>
            </div>
            <div class="row">              
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro-visualizar" Placeholder="Bairro" readonly>
                </div>
              </div>
              <div class="col-sm-5">
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
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cep">CEP</label>
                  <input type="number" class="form-control" name="cep" id="cep-visualizar" Placeholder="CEP" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="number" class="form-control" name="telefone" id="telefone-visualizar" Placeholder="Telefone" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input type="number" class="form-control" name="celular" id="celular-visualizar" Placeholder="Celular" readonly>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao-visualizar" id="descricao-visualizar" Placeholder="Descrição..." readonly></textarea>
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

    <!-- MODAL atualizar os dados do Fornecedores  -->
    <div class="modal fade" id="modal-atualizar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">DADOS COMPLETOS</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_fornecedor-atualizar">
            <div class="row">
              <!-- id do usuário -->
              <div class="col-sm-8">
                <div class="form-group">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="text" class="form-control" name="razaoSocial" id="razaoSocial-atualizar" Placeholder="Razão Social">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="nomeFanstasia">Nome Fantasia</label>
                  <input type="text" class="form-control" name="nomeFanstasia" id="nomeFanstasia-atualizar" Placeholder="Nome Fantasia">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cnpj">CNPJ</label>
                  <input type="text" class="form-control" name="cnpj" id="cnpj-atualizar" Placeholder="CNPJ">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="number" class="form-control" name="email-atualizar" id="email-atualizar" Placeholder="E-mail">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control" name="endereco" id="endereco-atualizar" Placeholder="Endereço">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Número</label>
                  <input type="number" class="form-control" name="numero" id="numero-atualizar" Placeholder="Número">
                </div>
              </div>
            </div>
            <div class="row">              
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro-atualizar" Placeholder="Bairro">
                </div>
              </div>
              <div class="col-sm-5">
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
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cep">CEP</label>
                  <input type="number" class="form-control" name="cep" id="cep-atualizar" Placeholder="CEP">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="number" class="form-control" name="telefone" id="telefone-atualizar" Placeholder="Telefone">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input type="number" class="form-control" name="celular" id="celular-atualizar" Placeholder="Celular">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao-atualizar" id="descricao-atualizar" Placeholder="Descrição..."></textarea>
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

    <!-- Modal de confirmação de exclusão de fornecedor -->
    <div class="modal modal-danger fade" id="modal-deletar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ATENÇÃO</h4>
          </div>
          <div class="modal-body">
            <p>Tem certeza que deseja excluir esse fornecedor?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-outline pull-left" id="btnSim">Sim</button>
          </div>
        </div><!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->          
    </div><!-- /.modal -->

<!-- AJAX -->
<script>
      function ModalExibir(id_fornecedor){
        $.ajax({
          url: "http://localhost/projeto/fornecedores/exibir/" + id_fornecedor,
          type: "GET",
          data: {id_fornecedor: id_fornecedor},
          dataType: 'json',
          success: function(data){
            // console.log(data);
            $.each(data, function(idx, obj) {

              $('#id_fornecedor-visualizar').val(obj.id_fornecedor);
              $('#nomeFanstasia-visualizar').val(obj.nome_fantasia);
              $('#razaoSocial-visualizar').val(obj.razao_social);
              $('#cnpj-visualizar').val(obj.cnpj);
              $('#endereco-visualizar').val(obj.endereco);
              $('#numero-visualizar').val(obj.numero);
              $('#bairro-visualizar').val(obj.bairro);              
              $('#cidade-visualizar').val(obj.cidade);
              $('#estado-visualizar').val(obj.estado);
              $('#cep-visualizar').val(obj.cep);
              $('#telefone-visualizar').val(obj.telefone);
              $('#celular-visualizar').val(obj.celular);
              $('#email-visualizar').val(obj.email);
              $('#descricao-visualizar').val(obj.descricao);
            });
          }
        });
      } // modal exibir

      function ModalAtualizar(id_fornecedor){
        $.ajax({
          url: "http://localhost/projeto/fornecedores/exibir/" + id_fornecedor,
          type: "GET",
          data: {id_fornecedor: id_fornecedor},
          dataType: 'json',
          success: function(data){
            // console.log(data);
            $.each(data, function(idx, obj) {

              $('#id_fornecedor-atualizar').val(obj.id_fornecedor);
              $('#nomeFanstasia-atualizar').val(obj.nome_fantasia);
              $('#razaoSocial-atualizar').val(obj.razao_social);
              $('#cnpj-atualizar').val(obj.cnpj);
              $('#endereco-atualizar').val(obj.endereco);
              $('#numero-atualizar').val(obj.numero);
              $('#bairro-atualizar').val(obj.bairro);              
              $('#cidade-atualizar').val(obj.cidade);
              $('#estado-atualizar').val(obj.estado);
              $('#cep-atualizar').val(obj.cep);
              $('#telefone-atualizar').val(obj.telefone);
              $('#celular-atualizar').val(obj.celular);
              $('#email-atualizar').val(obj.email);
              $('#descricao-atualizar').val(obj.descricao);
            });
          }
        });
      } // modal atualizar

      function salvarAlteracao(){
        var id_fornecedor = $('#id_fornecedor-atualizar').val();
        var nomeFanstasia = $('#nomeFanstasia-atualizar').val();
        var razaoSocial = $('#razaoSocial-atualizar').val();
        var cnpj = $('#cnpj-atualizar').val();
        var endereco = $('#endereco-atualizar').val();
        var bairro = $('#bairro-atualizar').val();
        var numero = $('#numero-atualizar').val();
        var bairro = $('#bairro-atualizar').val();
        var cidade = $('#cidade-atualizar').val();
        var estado = $('#estado-atualizar').val();
        var cep = $('#cep-atualizar').val();
        var telefone = $('#telefone-atualizar').val();
        var celular = $('#celular-atualizar').val();
        var email = $('#email-atualizar').val();
        var descricao = $("#descricao-atualizar").val();

        $.ajax({
          url: "http://localhost/projeto/fornecedores/atualizar/",
          type: "post",
          data: {
            id_fornecedor: id_fornecedor.toString(),
            nomeFantasia: nomeFanstasia.toString(),
            razaoSocial: razaoSocial.toString(),
            cnpj: cnpj.toString(),
            endereco: endereco.toString(),
            numero: numero.toString(),
            bairro: bairro.toString(),
            cidade: cidade.toString(),
            estado: estado.toString(),
            cep: cep.toString(),
            telefone: telefone.toString(),
            celular: celular.toString(),
            email: email.toString(),
            descricao: descricao.toString()
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

      function deletar(id_fornecedor) {
        $('#btnSim').click(function () {
          $.ajax({
            url: "http://localhost/projeto/fornecedores/deletar/",
            type: "post",
            data: {id_fornecedor: id_fornecedor},
            success: function(data){
              $('#modal-deletar').modal('hide');
              $('#linha' + id_fornecedor).fadeOut(1000);
            }, error: function(data){
              alert('erro' + data);
            }
          })
        });
      } // deletar

    </script>