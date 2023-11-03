<h1>Editar Usuário</h1>
<hr>

<?php
// Recuperar os dados do funcionário a ser editado
$sql = "SELECT * FROM usuario WHERE id_usuario=" . $_REQUEST['id_usuario'];
$res = $conn->query($sql);
$rowUsuario = $res->fetch_object();

// Consultar a lista de funcionários (opcional)
$sql = "SELECT * FROM usuario";
$res = $conn->query($sql);
$qtd = $res->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Incluindo o CSS do Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css" />
</head>

<body>
    <!-- Formulário de cadastro de Funcionário -->
    <form id="formulario" action="?page=usuario-salvar" method="POST">
        <!-- Campo oculto para ação de cadastro -->
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_usuario" value="<?php print $rowUsuario->id_usuario; ?>">

        <div class="form-group row">
            <div class="col-md-4">
                <label for="cpf">CPF*</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php print $rowUsuario->cpf_usuario; ?>" placeholder="Apenas números" maxlength="14" />
            </div>

            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php print $rowUsuario->nome_usuario; ?>" placeholder="Nome do Usuario" value="" maxlength="45" />
            </div>

        </div>

        <br>

        <div class="form-group row">

            <br>

            <!-- Campo para inserir o email do Funcionário -->
            <div class="col-md-3">
                <label for="data_nasc">Data de Nascimento</label>
                <input type="text" class="form-control" id="data_nasc" name="data_nasc" value="<?php print $rowUsuario->data_nasc; ?>" placeholder="Digite sua data de nascimento" />
            </div>

            <!-- Campo para inserir o telefone do Funcionário -->
            <div class="col-md-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php print $rowUsuario->email_usuario; ?>" placeholder="Digite um email válido" maxlength="45" />
            </div>

            <!-- Campo para inserir o telefone do Funcionário -->
            <div class="col-md-3">
                <label for="fone">Fone</label>
                <input type="text" class="form-control" id="fone" name="fone"  value="<?php print $rowUsuario->id_usuario; ?>" placeholder="() xxxxx-xxxx" maxlength="20" />
            </div>
        </div>

        <br>
        <div class="mb=3">
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
    </form>
    </script>
</body>

</html>