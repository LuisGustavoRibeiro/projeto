<!-- Cabeçalho de conteúdo (cabeçalho da página) -->
    <section class="content-header">
      <h1>
        Compras
        <small>Compras</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Compras</li>
      </ol>
    </section>

    <!-- Conteudo -->
    <section class="content">

        <div class="box">
            <div class="box-header with-border">
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fornecedor</label>
                        <select class="form-control select2">
                          <?php foreach($fornecedores as $forn){ ?>
                            <option value="<?= $forn['id_fornecedor'] ?>"><?= $forn['nome_fantasia'] ?></option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control select2">
                            <?php foreach($categorias as $cat){ ?>
                              <option value="<?= $cat['id_categoria_produto'] ?>"><?= $cat['categoria_nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>  
            </div> <!-- row -->

            
            
              <h3 class="box-title">Data Table With Full Features</h3>
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Produto/Serviço</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <style>
                  #td {        
                    width: 240px; height: 34px; 
                    overflow: hidden;
                  }
                </style>
                  <td style="background: url(<?= BASE_URL; ?>/assets/imagens/seta-para-baixo.png) no-repeat right;">
                        <select style="width:100%; border-style:none; background: transparent;">
                              <option>teste</option>
                        </select>
                  </td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>A</td>
                </tr>
              </table>

    </section>


    <script src="<?= BASE_URL; ?>/assets/jquery/dist/jquery.js"></script>

<script>
  $(function() {

    $(".select2").select2({});
    
    //Initialize Select2 Elements
    // $('#select2').select2({
    // placeholder: "Buscar",
    //   minimumInputLength: 2,
    //   delay: 250,
    //   ajax: {
    //       url:"http://localhost/projeto/compras/selectFornecedores",
    //       dataType: "json",
    //       data: function (term) {
    //           return {
    //               search: term, //search term
    //               page_limit: 10, // page size
    //           };
    //       }, // data
    //       processResults: function (data) {
    //         console.log(JSON.stringify(data));
    //               return {
    //                 results: data
    //               }; // return
    //           } // results
    //       }//, // ajax
    //       // cache: true
    // }); // função
}); // function
</script>        