<h1>Cadastrar Categoria</h1>
<hr>

<form action="?page=categoria-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="col-md-5">
        <label>Nome da Categoria</label>
        <input type="text" name="nome_categoria" class="form-control">
    </div>
    <br>
    <div class="mb-4">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</form>