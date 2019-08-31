<!-- Cabeçalho de conteúdo (cabeçalho da página) -->
<section class="content-header">
      <h1>
        Cargos
        <small>Controle de Cargos</small>
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
            <a href="<?= BASE_URL; ?>/cargos/adicionar" class="btn btn-success btn-flat"><i class="fa fa-plus"></i>  Adicionar</a>        
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
                <th>Cargos</th>
                <th>Descrição</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($lista_cargos as $cargo){ ?>
                <tr id="linha<?= $cargo['id_cargo'] ?>">
                  <td><?= utf8_encode($cargo['cargo']); ?></td>
                  <td><?= utf8_encode($cargo['descricao']) ?></td>
                  <td>
                    <div class="text-center">                      
                      <button class="btn bg-olive" title="Alterar" data-toggle="modal" data-target="#modal-atualizar" onclick="ModalAtualizar(<?= $cargo['id_cargo']; ?>)">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" title="Deletar" data-toggle="modal" data-target="#modal-deletar" onclick="deletar(<?= $cargo['id_cargo']; ?>)">
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
            <p>Tem certeza que deseja excluir esse cargo?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-outline pull-left" id="btnSim">Sim</button>
          </div>
        </div><!-- /.modal-content -->            
      </div><!-- /.modal-dialog -->          
    </div><!-- /.modal -->

    <!-- Modal alterar cargos -->
    <div class="modal fade" id="modal-atualizar">
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
                    <input type="hidden" id="id_cargo-atualizar">
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
                  <button class="btn btn-primary btn-flat btn-block" onclick="salvarAlteracao()">Salvar</button>
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


<!-- AJAX js -->
<script>

function ModalAtualizar(id_cargo){
        $.ajax({
          url: "http://localhost/projeto/cargos/obterCargo/" + id_cargo,
          type: "GET",
          data: {id_cargo: id_cargo},
          dataType: 'json',
          success: function(data){
            $.each(data, function(idx, obj) {
              $('#id_cargo-atualizar').val(obj.id_cargo);
              $('#cargo-atualizar').val(obj.cargo);
              $('#descricao-atualizar').val(obj.descricao);
            });
          }
        });
      } // modal atualizar

      function salvarAlteracao(){
        var id_cargo = $('#id_cargo-atualizar').val();
        var cargo = $('#cargo-atualizar').val();
        var descricao = $('#descricao-atualizar').val();

        $.ajax({
          url: "http://localhost/projeto/cargos/atualizar/",
          type: "post",
          data: {
            id_cargo: id_cargo.toString(),
            cargo: cargo.toString(),
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

      function deletar(id_cargo) {
        $('#btnSim').click(function () {
          $.ajax({
            url: "http://localhost/projeto/cargos/deletar/",
            type: "post",
            data: {id_cargo: id_cargo},
            success: function(data){
              $('#modal-deletar').modal('hide');
              $('#linha' + id_cargo).fadeOut(1000);
            }, error: function(data){
              alert('erro' + data);
            }
          })
        });
      } // deletar
</script>