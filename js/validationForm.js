const validationForm = () => {
  let nome = document.getElementById("nome").value;
  let cpf = document.getElementById("cpf").value;
  let creci = document.getElementById("creci").value;

  if (nome.length < 2 || nome.length > 20) {
    alert("Nome deve ter entre 2 e 20 caracteres!");
    return false;
  }

  if (!/^\d+$/.test(creci) || creci.length < 2 || creci.length > 8) {
    alert(
      "Creci deve ter no mínimo 2 e no máximo 8 caracteres e conter apenas números!"
    );
    return false;
  }

  if (cpf.length !== 11) {
    alert("CPF deve ter 11 caracteres!");
    return false;
  }

  return true;
};
