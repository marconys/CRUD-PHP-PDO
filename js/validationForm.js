const validationForm = () => {
    let nome = document.getElementById("nome").value;
    let cpf = document.getElementById("cpf").value;
    let creci = document.getElementById("creci").value;

    if (nome.length < 2) {
        alert("Nome deve ter pelo menos 2 caracteres!");
        return false;
    }

    if (creci.length < 2) {
        alert("Creci deve ter pelo menos 2 caracteres!");
        return false;
    }

    if (cpf.length !== 11) {
        alert("CPF deve ter 11 caracteres!");
        return false;
    }

    return true;
};

