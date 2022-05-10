<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])){
    $retorna = ['erro' => true, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Tente mais tarde!</div>'];
}elseif (empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo nome!</div>'];
}elseif (empty($dados['email'])){
    $retorna = ['erro' => true, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo email!</div>'];
}elseif (empty($dados['sexo'])){
    $retorna = ['erro' => true, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo sexo!</div>'];
}elseif (empty($dados['idade'])){
    $retorna = ['erro' => true, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo idade!</div>'];
}   
else{
    $query_usuario = "UPDATE usuarios SET nome=:nome, email=:email, sexo=:sexo, idade=:idade WHERE id=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':nome', $dados['nome']);
    $edit_usuario->bindParam(':email', $dados['email']);
    $edit_usuario->bindParam(':id', $dados['id']);
    $edit_usuario->bindParam(':sexo', $dados['sexo']);
    $edit_usuario->bindParam(':idade', $dados['idade']);

    if ($edit_usuario->execute()) {
        $retorna = ['erro' => false, 'msg' => '<div class="alert alert-success" role="alert">Usuário editado com sucesso!</div>'];
    } else {
        $retorna = ['erro' => true, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Usuário não editado com sucesso!</div>'];
    }
}

echo json_encode($retorna);
