<?php
// Verifica a ação que está sendo solicitada
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Verifica se o campo 'nome_categoria' está em branco
        if (empty($_POST['nome_categoria'])) {
            // Exibe um alerta e redireciona para a página de listagem
            print "<script>alert('Por favor, preencha todos os campos.');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        } else {
            // Monta a consulta SQL para inserir uma nova categoria
            $sql = "INSERT INTO categoria (nome_categoria)
                    VALUES ('" . $_POST['nome_categoria'] . "')";
        }
        $res = $conn->query($sql);

        // Verifica se a consulta foi executada com sucesso
        if ($res == true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        }
        break;

    case 'editar':
        // Monta a consulta SQL para atualizar uma categoria
        $sql = "UPDATE categoria
                SET nome_categoria='" . $_POST['nome_categoria'] . "'
                WHERE id_categoria=" . $_POST['id_categoria'];
        $res = $conn->query($sql);

        // Verifica se a consulta foi executada com sucesso
        if ($res == true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível Editar');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        }
        break;

    case 'excluir':
        // Monta a consulta SQL para excluir uma categoria
        $sql = "DELETE FROM categoria WHERE id_categoria=" . $_REQUEST['id_categoria'];
        $res = $conn->query($sql);

        // Verifica se a consulta foi executada com sucesso
        if ($res == true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        }
        break;
}
?>