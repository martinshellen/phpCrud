<h1>Editar Livro</h1>

<?php
$sql = "SELECT * FROM livro WHERE id_livro=" . $_REQUEST['id_livro'];
$resLivro = $conn->query($sql);
$rowLivro = $resLivro->fetch_object();

$sql = "SELECT * FROM categoria";
$res = $conn->query($sql);
$qtd = $res->num_rows;
?>

<form id="formulario" action="?page=livro-salvar" method="POST">
    <!-- Campo oculto para ação de cadastro -->
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_livro" value="<?php print $rowLivro->id_livro; ?>">

    <!-- Container para os campos do formulário -->
    <div class="form-group row">
        <!-- Campo para inserir o título do livro -->
        <div class="form-group col-md-4">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php print $rowLivro->titulo_livro; ?>" maxlength="200" />
        </div>

        <!-- Campo para inserir o autor do livro -->
        <div class="col-md-4">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="<?php print $rowLivro->autor_livro; ?>" placeholder="Autor do Livro" maxlength="45" />
        </div>
    </div>

    <br>

    <div class="form-group row">

        <br>

        <!-- Campo para inserir o autor do livro -->
        <div class="col-md-3">
            <label for="edicao">Edição</label>
            <input type="text" class="form-control" id="edicao" name="edicao" value="<?php print $rowLivro->edicao_livro; ?>" placeholder="Edição" maxlength="3" />
        </div>

        <!-- Campo para inserir a editora do livro -->
        <div class="col-md-3">
            <label for="editora">Editora</label>
            <input type="text" class="form-control" id="editora" name="editora" value="<?php print $rowLivro->editora_livro; ?>" placeholder="Editora do Livro" maxlength="20" />
        </div>
    </div>

    <br>

    <div class="form-group row">
        <!-- Campo para inserir o local do livro -->
        <div class="col-md-3">
            <label for="local">Local</label>
            <input type="text" class="form-control" id="local" name="local" value="<?php print $rowLivro->localidade_livro; ?>" placeholder="" maxlength="20" />
        </div>

        <!-- Campo para inserir o ano de publicação do livro -->
        <div class="col-md-3">
            <label for="ano">Ano de Publicação</label>
            <input type="text" class="form-control" id="ano" name="ano" value="<?php print $rowLivro->ano_livro; ?>" placeholder="Ex: 2023" />
        </div>

        <!-- Dropdown para selecionar a categoria do livro -->
        <div class="col-md-3">
            <label for="categoria">Categoria</label>
            <select name="categoria" class="form-select">
                <option value="">Selecione uma categoria</option>
                <?php
                // Loop para listar as categorias do banco de dados
                while ($categoria = $res->fetch_object()) {
                    if ($categoria->id_categoria == $rowLivro->categoria_id_categoria) {
                        echo "<option selected value='$categoria->id_categoria'>$categoria->nome_categoria</option>";
                    } else {
                        echo "<option value='$categoria->id_categoria'>$categoria->nome_categoria</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>

    <br>
    
    </div>
    <div class="mb=3">
    <button type="submit" class="btn btn-success">Editar</button>
    </div>
</form>