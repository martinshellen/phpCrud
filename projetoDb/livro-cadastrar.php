<h1>Cadastrar Livro</h1>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Cadastro</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->

  <script src="javaScript/cadastroProduto.js"></script>
</head>

<body onload="onLoad();">

      <!-- Container -->
      <div class="form-group row">
        <div class="form-group col-md-5">
          <label for="nome">Título</label>
          <input type="text" class="form-control" id="titulo" placeholder="" />
        </div>

        <div class="col-md-3">
          <label for="codigo">Autor</label>
          <input type="text" class="form-control" id="autor" placeholder="Autor do Livro" maxlength="50" />
        </div>

        <div class="form-group col-md-3">
          <label for="precoCompra">Editora</label>
          <input type="text" class="form-control" id="editora" placeholder="Editora do Livro" />
        </div>
      </div>

      <div class="form-group row">
        <div class="col-xs-5">
          <label for="codigo">Local</label>
          <input type="text" class="form-control" id="local" placeholder="" />
        </div>
      </div>

      <div class="form-group row">
        <div class="col-xs-5">
          <label for="codigo">Ano de Publicação</label>
          <input type="text" class="form-control" id="ano" placeholder="" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-xs-6">
          <label for="obs">Observação:</label>
          <textarea rows="10" type="" class="form-control" id="obs" placeholder="" maxlength="255">
            </textarea>
        </div>
      </div>

      <div class="row col-md-6">
        <div class="form-group">
          <button type="submit" onclick="cadastrarProduto();" class="btn btn-primary">
            Cadastrar
          </button>
          <button type="button" onclick="limparFormulario();" class="btn btn-danger">
            Limpar
          </button>
        </div>
      </div>
    </div>
    <!-- Fim container -->
  </form>

</body>

</html>