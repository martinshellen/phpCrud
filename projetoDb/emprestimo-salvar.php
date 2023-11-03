<?php
// Verifica a ação solicitada no formulário
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Verifica se os campos obrigatórios estão preenchidos
        if (empty($_POST['livro_id_livro']) || empty($_POST['usuario_id_usuario']) || empty($_POST['funcionario_id_funcionario']) || empty($_POST['data_emprestimo']) || empty($_POST['data_devolucao'])) {
            echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        } else {
            // Monta a consulta SQL para inserir um novo empréstimo no banco de dados
            $livro_id_livro = $_POST['livro_id_livro'];
            $usuario_id_usuario = $_POST['usuario_id_usuario'];
            $funcionario_id_funcionario = $_POST['funcionario_id_funcionario'];
            $data_emprestimo = $_POST['data_emprestimo'];
            $data_devolucao = $_POST['data_devolucao'];

            $sql = "INSERT INTO emprestimo (livro_id_livro, usuario_id_usuario, funcionario_id_funcionario, data_emprestimo, data_devolucao)
                VALUES ('$livro_id_livro', '$usuario_id_usuario', '$funcionario_id_funcionario', '$data_emprestimo', '$data_devolucao')";
        }

        $res = $conn->query($sql);
        if ($res === true) {
            echo "<script>alert('Cadastrou com sucesso!');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        }
        break;

        case 'editar':
            // Recuperando dados do formulário
            $livro_id_livro = $_POST['livro_id_livro'];
            $usuario_id_usuario = $_POST['usuario_id_usuario'];
            $funcionario_id_funcionario = $_POST['funcionario_id_funcionario'];
            $data_emprestimo = $_POST['data_emprestimo'];
            $data_devolucao = $_POST['data_devolucao'];
            $id_emprestimo = $_POST['id_emprestimo'];
    
            // Monta a consulta SQL para editar um empréstimo existente no banco de dados
            $sql = "UPDATE emprestimo
                        SET livro_id_livro = '$livro_id_livro',
                            usuario_id_usuario = '$usuario_id_usuario',
                            funcionario_id_funcionario = '$funcionario_id_funcionario',
                            data_emprestimo = '$data_emprestimo',
                            data_devolucao = '$data_devolucao'
                        WHERE id_emprestimo = $id_emprestimo";
    
            $res = $conn->query($sql);
    
            if ($res === true) {
                // Exibe um alerta de sucesso e redireciona para a página de listagem
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=emprestimo-listar';</script>";
            } else {
                // Exibe um alerta de erro e redireciona para a página de listagem
                print "<script>alert('Não foi possível editar');</script>";
                print "<script>location.href='?page=emprestimo-listar';</script>";
            }
            break;
    
        case 'excluir':
            // Monta a consulta SQL para excluir um empréstimo do banco de dados
            $id_emprestimo = $_REQUEST['id_emprestimo'];
            $sql = "DELETE FROM emprestimo WHERE id_emprestimo=$id_emprestimo";
            $res = $conn->query($sql);
    
            // Verifica se a consulta foi executada com sucesso
            if ($res === true) {
                // Exibe um alerta de sucesso e redireciona para a página de listagem
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=emprestimo-listar';</script>";
            } else {
                // Exibe um alerta de erro e redireciona para a página de listagem
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=emprestimo-listar';</script>";
            }
            break;}
?>


    
