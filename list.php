<?php
include_once "conexao.php";

$query_usuarios = "SELECT * FROM usuarios LIMIT 10";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();


$dados = "";

while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    $dados .= "<tr>
                <td>" . $row_usuario["id"] . "</td>
                <td>" . $row_usuario["nome"] . "</td>
                <td>" . $row_usuario["e-mail"] . "</td>
                <td>Ações</td>
            </tr>";
}

echo $dados;