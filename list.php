<?php
include_once "conexao.php";

// $query_usuarios = "SELECT * FROM usuarios LIMIT 10";
$query_usuarios = "SELECT * FROM usuarios ORDER BY id DESC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();


$dados = "<div class = 'table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";

while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    $dados .= "<tr>
                <td>" . $row_usuario["id"] . "</td>
                <td>" . $row_usuario["nome"] . "</td>
                <td>" . $row_usuario["email"] . "</td>
                <td>Ações</td>
            </tr>";
}

$dados .=   "</tbody>
        </table>
    </div>";

echo $dados;
