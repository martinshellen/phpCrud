<?php
// Recuperar os dados do funcionário a ser editado
$sql = "SELECT * FROM funcionario WHERE id_funcionario=" . $_REQUEST['id_funcionario'];
$res = $conn->query($sql);
$row = $res->fetch_object();

// Consultar a lista de funcionários (opcional)
$sql = "SELECT * FROM funcionario";
$res = $conn->query($sql);
$qtd = $res->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
</head>
<body>
    <h1>Editar Funcionário</h1>

    <!-- Formulário de edição de Funcionário -->
    <form id="formulario" action="?page=funcionario-salvar" method="POST">
        <!-- Campo oculto para ação de edição -->
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_funcionario" value="<?php echo $row->id_funcionario; ?>">

        <div class="form-group row">
            <!-- Campo para inserir o nome do Funcionário -->
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row->nome_funcionario; ?>" placeholder="Nome do funcionário" maxlength="45" />
            </div>

            <!-- Campo para inserir o CPF do Funcionário -->
            <div class="col-md-4">
                <label for="cpf">CPF*</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row->cpf_funcionario; ?>" placeholder="Apenas números" maxlength="14" />
            </div>
        </div>

        <br>

        <div class="form-group row">
            <!-- Campo para inserir o email do Funcionário -->
            <div class="col-md-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email_funcionario; ?>" placeholder="Digite o email" maxlength="45" />
            </div>

            <!-- Campo para inserir o telefone do Funcionário -->
            <div class="col-md-3">
                <label for="fone">Fone</label>
                <input type="text" class="form-control" id="fone" name="fone" value="<?php echo $row->fone_funcionario; ?>" placeholder="() xxxxx-xxxx" maxlength="20" />
            </div>
        </div>

        <br>

        <div class="mb=3">
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
    </form>
</body>
</html>
