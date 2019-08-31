     <!-- Cabeçalho de conteúdo (cabeçalho da página) -->
    <section class="content-header">
      <h1>
        Usuários
        <small>Controle de Usuários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="#"> Usuários</a></li>
        <li class="active">Adicionar Usuários</li>
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
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" Placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataNascimento">Data de nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" Placeholder="Data de nascimento">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" id="rg" Placeholder="RG">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" Placeholder="CPF">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" Placeholder="Endereço">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" name="numero" id="numero" Placeholder="Número">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" Placeholder="Bairro">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" Placeholder="Cidade">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado" Placeholder="Estado">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" Placeholder="CEP">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" Placeholder="Complemento">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" Placeholder="Telefone">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" id="celular" Placeholder="Celular">
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Informações de Acesso:</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="email">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" Placeholder="Senha">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Início:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Fim:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
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
    