     <!-- Cabeçalho de conteúdo (cabeçalho da página) -->
     <section class="content-header">
      <h1>
        Cargos
        <small>Controle de Cargos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="#"> Usuários</a></li>
        <li><a href="#"> Cargos</a></li>
        <li class="active">Adicionar Cargos</li>
      </ol>
    </section>

    <!-- Conteudo -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <!-- Botões MINIMIZAR e FECHAR -->
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">
            <form method="POST" action="#">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" Placeholder="Cargo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="descricao">Descricão</label>
                            <textarea class="form-control" name="descricao" id="descricao" placeholder="Insira a descrição do cargo ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary center-block" style="width:16%; margin-top:5%;">Cadastrar</button>
                    </div>
                </div>
            </form>   
        </div> <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div> <!-- /.box-footer-->
      </div> <!-- /.box --> 
      
    </section> <!-- /.content -->
    