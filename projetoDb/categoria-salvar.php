<?php

switch($_REQUEST['acao']) {
    case 'cadastrar':

        //verifica se o campo 'nome_categoria' está em branco
        if (empty($_POST['nome_categoria'])) {
            print "<script>alert('O campo Nome da Categoria não pode ficar em branco.');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        } else {
        $sql = "INSERT INTO categoria (nome_categoria)
        VALUES ('".$_POST['nome_categoria']."')";

        }

        $res = $conn ->query($sql);
        if($res==true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        }else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=categoria-listar';</script>";
        }
        break;
        
        case 'editar':
            $sql = "UPDATE categoria
            SET nome_categoria='".$_POST['nome_categoria']."'
            WHERE id_categoria=".$_POST['id_categoria'];
            $res = $conn->query($sql);
            if($res==true) {
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=categoria-listar';</script>";
            }else {
                print "<script>alert('Não foi possível Editar');</script>";
                print "<script>location.href='?page=categoria-listar';</script>";
            }
            break;
        case 'excluir':
            $sql = "DELETE FROM categoria WHERE id_categoria=".$_REQUEST['id_categoria'];

            $res = $conn->query($sql);
            if($res==true) {
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=categoria-listar';</script>";
            }else {
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=categoria-listar';</script>";
            }
            break;
        }
?>