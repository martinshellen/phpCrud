<?php
// Verifica a ação solicitada no formulário
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Verifica se o campo 'nome' está em branco
        if (empty($_POST['nome'])) {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Por favor, preencha todos os campos.');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        } else {
            // Monta a consulta SQL para inserir um novo funcionário no banco de dados
            $sql = "INSERT INTO funcionario (nome_funcionario, cpf_funcionario, email_funcionario, fone_funcionario)
                VALUES ('" . $_POST['nome'] . "',
                        '" . $_POST['cpf'] . "',
                        '" . $_POST['email'] . "',
                        '" . $_POST['fone'] . "')";
        }

        $res = $conn->query($sql);
        if ($res === true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        }
        break;

    case 'editar':
        // Recuperando dados do formulário
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $fone = $_POST['fone'];
        $id_funcionario = $_POST['id_funcionario'];

        // Monta a consulta SQL para editar um funcionário existente no banco de dados
        $sql = "UPDATE funcionario
                    SET nome_funcionario = '$nome',
                        cpf_funcionario = '$cpf',
                        email_funcionario = '$email',
                        fone_funcionario = '$fone'
                    WHERE id_funcionario = $id_funcionario";

        $res = $conn->query($sql);

        if ($res === true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        }
        break;

    case 'excluir':
        // Monta a consulta SQL para excluir um funcionário do banco de dados
        $id_funcionario = $_REQUEST['id_funcionario'];
        $sql = "DELETE FROM funcionario WHERE id_funcionario = $id_funcionario";
        $res = $conn->query($sql);

        // Verifica se a consulta foi executada com sucesso
        if ($res === true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        }
        break;
}
?>
