<h1>Listar Empréstimos</h1>

<?php
$sql = "SELECT * FROM emprestimo";
$res = $conn->query($sql);
$qtd = $res->num_rows;

print "<table class='table table-bordered table-striped table-hover'>";
print "<tr>";
print "<th>ID do Livro</th>";
print "<th>ID do Usuário</th>";
print "<th>ID do Funcionário</th>";
print "<th>Data de Empréstimo</th>";
print "<th>Data de Devolução</th>";
print "<th>Ações</th>";
print "</tr>";

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> empréstimo(s)</p>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->livro_id_livro . "</td>";
        print "<td>" . $row->usuario_id_usuario . "</td>";
        print "<td>" . $row->funcionario_id_funcionario . "</td>";
        print "<td>" . $row->data_emprestimo . "</td>";
        print "<td>" . $row->data_devolucao . "</td>";  
       

        print "<td>
        <button onclick=\"location.href='?page=emprestimo-editar&id_emprestimo=" . $row->id_emprestimo . "';\"
        class='btn btn-success'>Editar</button>

        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=emprestimo-salvar&acao=excluir&id_emprestimo=" . $row->id_emprestimo . "';}else{false;}\" class='btn btn-danger'>Excluir</button>

        </td>";

        print "</tr>";
    }
    print "</table>";
} else {
    print "<p>Não encontrou resultados</p>";
}

?>