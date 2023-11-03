<?php
// Verifica a ação solicitada no formulário
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Verifica se o campo 'nome' está em branco
        if (empty($_POST['cpf'])) {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Por favor, preencha todos os campos.');</script>";
            print "<script>location.href='?page=usuario-listar';</script>";
        } else {
            // Monta a consulta SQL para inserir um novo funcionário no banco de dados
            $sql = "INSERT INTO usuario (cpf_usuario, nome_usuario, data_nasc, email_usuario, fone_usuario)
                VALUES ('" . $_POST['cpf'] . "',
                        '" . $_POST['nome'] . "',
                        '" . $_POST['data_nasc'] . "',
                        '" . $_POST['email'] . "',
                        '" . $_POST['fone'] . "')";
        }

        $res = $conn->query($sql);
        if ($res === true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=usuario-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=usuario-listar';</script>";
        }
        break;

    case 'editar':
        // Recuperando dados do formulário
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        $email = $_POST['email'];
        $fone = $_POST['fone'];
        $id_usuario = $_POST['id_usuario'];

        // Monta a consulta SQL para editar um funcionário existente no banco de dados
        $sql = "UPDATE usuario
                    SET cpf_usuario = '$cpf',
                        nome_usuario = '$nome',
                        data_nasc = '$data_nasc',
                        email_usuario = '$email',
                        fone_usuario = '$fone'
                    WHERE id_usuario = $id_usuario";

        $res = $conn->query($sql);

        if ($res === true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=usuario-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=usuario-listar';</script>";
        }
        break;

        case 'excluir':
            // Monta a consulta SQL para excluir um usuário do banco de dados
            $id_usuario = $_REQUEST['id_usuario']; // Corrigir o nome da variável aqui
            $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
            $res = $conn->query($sql);
        
            // Verifica se a consulta foi executada com sucesso
            if ($res === true) {
                // Exibe um alerta de sucesso e redireciona para a página de listagem
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=usuario-listar';</script>";
            } else {
                // Exibe um alerta de erro e redireciona para a página de listagem
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=usuario-listar';</script>";
            }
            break;
}
?>
