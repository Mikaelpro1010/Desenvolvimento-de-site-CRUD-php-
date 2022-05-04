const tbody = document.querySelector("tbody");
const Form = document.getElementById("cad-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

const listarUsuarios = async() => {
    const dados = await fetch("./list.php");
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);

Form.addEventListener("submit", async (e) => {
    e.preventDefault();
    
    const dadosForm = new FormData(Form);
    dadosForm.append("add", 1);

    document.getElementById("cad-usuario-btn").value = "Salvando...";

    const dados = await fetch("cadastrar.php",{
        method: "POST",
        body: dadosForm,
    })

    const resposta = await dados.json();
    if(resposta['erro']){
        msgAlertaErroCad.innerHTML = resposta['msg'];
    }else{
        msgAlerta.innerHTML = resposta['msg'];
        Form.reset();
        cadModal.hide();
        listarUsuarios(1);
    }
    document.getElementById("cad-usuario-btn").value = "Cadastrar";
});
