const fillForm = (id, nome, cpf, creci) => {
  document.getElementById("id_edit").value = id;
  document.getElementById("nome").value = nome;
  document.getElementById("cpf").value = cpf;
  document.getElementById("creci").value = creci;
  document.getElementById("enviar").innerHTML = "Salvar";
};
