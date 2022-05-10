<?php
include_once "conexao.php";

$pagina= filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

    //Calcular o inicio visualização
$qnt_result_pg = 10; //Quant. de registro por pagina
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    // $query_usuarios = "SELECT * FROM usuarios LIMIT 10";
$query_usuarios = "SELECT * FROM usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();

$dados = "<div class = 'table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Sexo</th>
                        <th>Idade</th>       
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";

while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $dados .= "<tr>
            <td>$id </<td>
            <td>$nome </<td>
            <td>$email </<td>   
            <td>$sexo</td>
            <td>$idade</td>
            <td>
            <button id='$id' class='btn btn-primary btn-sm'
            onclick='visUsuario($id)'>Visualizar</button>
            <button id='$id' class='btn btn-warning btn-sm'
            onclick='editUsuarioDados($id)'>Editar</button>
            </td>
            </tr>";
}

$dados .= "</tbody>
        </table>
    </div>";

    //Paginação - Somar a Qauntidade de Usuários
    $query_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
    $result_pg = $conn->prepare($query_pg);
    $result_pg->execute();
    $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $dados.=  '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
    $dados .= '<li class="page-item disabled"><a class="page-link">Previous</a></li>';
    $dados .= '<li class="page-item"><a class="page-link" href="#">1</a></li>';
    $dados .= '<li class="page-item"><a class="page-link" href="#">2</a></li>';
    $dados .= '<li class="page-item"><a class="page-link" href="#">3</a></li>';
    $dados .= '<li class="page-item"><a class="page-link" href="#">Ultima pagina</a></li>';
    $dados .= '</ul></nav>';

echo $dados;
} else{
    echo "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>";
}
