<h1>Listar Funcionário</h1>

<?php
// Consulta SQL para listar os funcionários
$sql = "SELECT * FROM funcionario";
$res = $conn->query($sql);
$qtd = $res->num_rows;

// Início da tabela HTML
print "<table class='table table-bordered table-striped table-hover'>";
// Cabeçalhos das colunas da tabela
print "<tr>";
print "<th>#</th>"; // Coluna para o ID do funcionário
print "<th>Nome</th>"; // Coluna para o nome do funcionário
print "<th>CPF</th>"; // Coluna para o CPF do funcionário
print "<th>Email</th>"; // Coluna para o email do funcionário
print "<th>Fone</th>"; // Coluna para o telefone do funcionário
print "<th>Ações</th>"; // Coluna para as ações (Editar e Excluir)
print "</tr>";

if ($qtd > 0) {
    // Exibe a contagem de categorias encontradas
    print "<p>Encontrou <b>$qtd</b> funcionário(s)</p>";

    // Loop para exibir cada registro
    while ($row = $res->fetch_object()) {
        // Início de uma nova linha na tabela
        print "<tr>";
        print "<td>" . $row->id_funcionario . "</td>"; // Coluna com o ID do funcionário
        print "<td>" . $row->nome_funcionario . "</td>"; // Coluna com o nome do funcionário
        print "<td>" . $row->cpf_funcionario . "</td>"; // Coluna com o CPF do funcionário
        print "<td>" . $row->email_funcionario . "</td>"; // Coluna com o email do funcionário
        print "<td>" . $row->fone_funcionario . "</td>"; // Coluna com o telefone do funcionário

        // Coluna com botões de ação (Editar e Excluir)
        print "<td>
        <button onclick=\"location.href='?page=funcionario-editar&id_funcionario=" . $row->id_funcionario . "';\"
        class='btn btn-success'>Editar</button>

        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=funcionario-salvar&acao=excluir&id_funcionario=" . $row->id_funcionario . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
        </td>";

        // Fim da linha na tabela
        print "</tr>";
    }
    // Fim da tabela HTML
    print "</table>";
} else {
    // Mensagem exibida se não forem encontrados resultados
    print "<p>Não encontrou resultados</p>";
}

?>
