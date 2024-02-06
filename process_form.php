<?php

session_start();

require 'data/Corretor.php';

if ($_POST) {
    if (isset($_POST["action"]) && $_POST["action"] === "delete") {
        // Deletar corretor
        $id = $_POST["id"];

        $corretor = new Corretor("", "", "");
        $action = $corretor->delete($id);
    } else {
        // Verificar se o id existe tomar a ação de inserir um novo corretor ou atualizar um corretor já existente
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Atualizar corretor
            $id = $_POST["id"];
            $cpf = $_POST["cpf"];
            $creci = $_POST["creci"];
            $nome = $_POST["nome"];

            $corretor = new Corretor($nome, $cpf, $creci);

            $action = $corretor->update($id, $nome, $cpf, $creci);

            if ($action) {
                $_SESSION['success_message'] = "Corretor atualizado com sucesso!";
            } else {
                $_SESSION['error_message'] = "Falha ao atualizar corretor.";
            }
        } else {
            // Inserir um novo corretor
            $cpf = $_POST["cpf"];
            $creci = $_POST["creci"];
            $nome = $_POST["nome"];

            $corretor = new Corretor($nome, $cpf, $creci);

            if ($corretor->checkExistence($cpf, $creci)) {
                $_SESSION['error_message'] = "CPF ou CRECI já está cadastrado!";
            } elseif ($nome == "André Nunes") {
                $_SESSION['error_message'] = "O usuário está na blacklist!";
            } else {
                $action = $corretor->insert();

                if ($action) {
                    $_SESSION['success_message'] = "Corretor cadastrado com sucesso!";
                } else {
                    $_SESSION['error_message'] = "Falha ao cadastrar corretor.";
                }
            }
        }
    }

    header("Location: index.php");
    exit;
}
