     <!-- Cabeçalho de conteúdo (cabeçalho da página) -->
     <section class="content-header">
      <h1>
        Clientes
        <small>Controle de Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="#"> Clientes</a></li>
        <li class="active">Adicionar Cliente</li>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" Placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="nomeFantasia">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo">
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" Placeholder="cpf">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cnpj">Data de Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" Placeholder="CNPJ">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" Placeholder="Endereço">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" Placeholder="Complemento">
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" Placeholder="Descrição..."></textarea>
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
    