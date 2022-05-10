<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="m-2 p-2">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-itens-center">
                <h4>Listar Usuários</h4>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">
                    Cadastrar usuário
                </button>
            </div>
            <hr>
            
            <span id="msgAlerta"></span>
            <span class="listar-usuarios"></span>
            
        </div>
        <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="#cadUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadUsuarioModalLabel">Cadastro de usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="cad-usuario-form">
                            <span id="msgAlertaErroCad"></span>
                            <div class="mb-3">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Informe seu nome completo">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Informe o seu endereço de e-mail">
                            </div>
                            <fieldset>
                            <legend>Selecione o gênero que você se identifica:</legend>

                            <div>
                            <input type="radio" id="masculino" name="sexo" value="masculino"
                                    checked>
                            <label for="huey">Masculino</label>
                            </div>

                            <div>
                            <input type="radio" id="feminino" name="sexo" value="feminino">
                            <label for="dewey">Feminino</label>
                            </div>

                            <div>
                            <input type="radio" id="outros" name="sexo" value="outros">
                            <label for="louie">Outros</label>
                            </div>
                            </fieldset>
                            <div class="mb-3">
                                <label for="idade" class="col-form-label">Idade</label>
                                <input type="text" name="idade" class="form-control" id="idade" placeholder="Informe a sua idade">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-success btn-sm" id="cad-usuario-btn" value="Cadastrar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="#cadUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="visUsuarioModalLabel">Detalhes do usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <span id="msgAlertaErroVis"></span>
                            <dl class="row">
                                <dt class="col-sm-3">ID</dt>
                                <dd class="col-sm-9"><span id="idUsuario"></span></dd>
                                <dt class="col-sm-3">Nome</dt>
                                <dd class="col-sm-9"><span id="nomeUsuario"></span></dd>
                                <dt class="col-sm-3">E-mail</dt>
                                <dd class="col-sm-9"><span id="emailUsuario"></span></dd>
                                <dt class="col-sm-3">Sexo</dt>
                                <dd class="col-sm-9"><span id="sexoUsuario"></span></dd>
                                <dt class="col-sm-3">Idade</dt>
                                <dd class="col-sm-9"><span id="idadeUsuario"></span></dd>
                            </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editUsuarioModal" tabindex="-1" aria-labelledby="#editUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUsuarioModalLabel">Editar usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="javascript:limparAlerta()"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-usuario-form">
                            <span id="msgAlertaErroEdit"></span>
                                <input type="hidden" name="id" id="editid">
                            <div class="mb-3">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" name="nome" class="form-control" id="editnome" placeholder="Informe seu nome completo">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="text" name="email" class="form-control" id="editemail" placeholder="Informe o seu endereço de e-mail">
                            </div>
                            <div class="mb-3">
                                <label for="sexo" class="col-form-label">Sexo</label>
                                <input type="text" name="sexo" class="form-control" id="editsexo" placeholder="Informe o seu sexo">
                            </div>
                            <div class="mb-3">
                                <label for="idade" class="col-form-label">Idade</label>
                                <input type="text" name="idade" class="form-control" id="editidade" placeholder="Informe a sua idade">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" onclick="javascript:limparAlerta()">Fechar</button>
                                <input type="submit" class="btn btn-warning btn-sm" id="edit-usuario-btn" value="Salvar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/custom.js"></script>
</body>
</html>
