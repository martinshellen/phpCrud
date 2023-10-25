<?php
// Verifica a ação solicitada no formulário
switch ($_REQUEST['acao']) {
    case 'cadastrar':

        //verifica se o campo 'titulo' está em branco
        if (empty($_POST['titulo'])) {
            print "<script>alert('Por favor, preencha todos os campos.');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        } else {
            // Monta a consulta SQL para inserir um novo livro no banco de dados
            $sql = "INSERT INTO livro (categoria_id_categoria,
                                    titulo_livro,
                                    autor_livro,
                                    editora_livro,
                                    edicao_livro,
                                    localidade_livro,
                                    ano_livro)
                VALUES ('" . $_POST['categoria'] . "',
                                '" . $_POST['titulo'] . "',
                                '" . $_POST['autor'] . "',
                                '" . $_POST['editora'] . "',
                                '" . $_POST['edicao'] . "',
                                '" . $_POST['local'] . "',
                                '" . $_POST['ano'] . "')";
        }

        $res = $conn->query($sql);
        if ($res == true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem

            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem

            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        }
        break;

    case 'editar':
        // Recuperando dados do formulário

        $categoria_id = $_POST['categoria'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $edicao = $_POST['edicao'];
        $localidade = $_POST['local'];
        $ano = $_POST['ano'];
        $id_livro = $_POST['id_livro'];

        // Monta a consulta SQL para editar um livro existente no banco de dados

        $sql = "UPDATE livro
                    SET categoria_id_categoria = '$categoria_id',
                        titulo_livro = '$titulo',
                        autor_livro = '$autor',
                        editora_livro = '$editora',
                        edicao_livro = '$edicao',
                        localidade_livro = '$localidade',
                        ano_livro = '$ano'
                    WHERE id_livro = $id_livro";

        $res = $conn->query($sql);

        if ($res === true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        } else {
            print "<script>alert('Não foi possível Editar');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        }
        break;
    case 'excluir':

        // Monta a consulta SQL para excluir um livro do banco de dados
        $sql = "DELETE FROM livro WHERE id_livro=" . $_REQUEST['id_livro'];
        $res = $conn->query($sql);

        // Verifica se a consulta foi executada com sucesso
        if ($res == true) {
            // Exibe um alerta de sucesso e redireciona para a página de listagem
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        } else {
            // Exibe um alerta de erro e redireciona para a página de listagem
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=livro-listar';</script>";
        }
}
