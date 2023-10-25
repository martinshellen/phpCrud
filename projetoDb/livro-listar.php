<h1>Listar Livros</h1>

<?php
// Consulta SQL para listar os livros
$sql = "SELECT * 
FROM biblioteca.livro 
inner join biblioteca.categoria ON livro.categoria_id_categoria = categoria.id_categoria;";
$res = $conn->query($sql);
$qtd = $res->num_rows;
// Verifica se foram encontrados resultados
if ($qtd > 0) {
    // Exibe a quantidade de livros encontrados
    print "<p>Encontrou <b>$qtd</b> Livro(s)</p>";
    // Tabela para exibir os resultados
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    // Cabeçalhos das colunas da tabela
    print "<th>#</th>";
    print "<th>Título</th>";
    print "<th>Autor</th>";
    print "<th>Edição</th>";
    print "<th>Editora</th>";
    print "<th>Local</th>";
    print "<th>Ano de Publicação</th>";
    print "<th>Categoria</th>";
    print "<th>Ações</th>";
    print "</tr>";

    // Loop para exibir cada registro
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_livro . "</td>";
        print "<td>" . $row->titulo_livro . "</td>";
        print "<td>" . $row->autor_livro . "</td>";
        print "<td>" . $row->edicao_livro . "</td>";
        print "<td>" . $row->editora_livro . "</td>";
        print "<td>" . $row->localidade_livro . "</td>";
        print "<td>" . $row->ano_livro . "</td>";
        print "<td>" . $row->nome_categoria . "</td>";

        // Coluna com botões de ação (Editar e Excluir)
        print "<td>
        <button onclick=\"location.href='?page=livro-editar&id_livro=" . $row->id_livro . "';\"
        class='btn btn-success'>Editar</button>

        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=livro-salvar&acao=excluir&id_livro=" . $row->id_livro . "';}else{false;}\" class='btn btn-danger'>Excluir</button>

        </td>";

        print "</tr>";
    }
    print "</table>";
} else {
    // Mensagem exibida se não forem encontrados resultados
    print "<p>Não encontrou resultados</p>";
}

?>