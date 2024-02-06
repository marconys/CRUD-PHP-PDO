<?php
session_start();
require 'data/Corretor.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/custom.css" />
  <title>Cadastro de Corretor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <main class="main">
    <!-- section mensage start -->
    <section class="mensage">
      <?php
      if (isset($_SESSION['success_message'])) {
        echo '<div class="bg-success text-light text-center rounded">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
      }


      if (isset($_SESSION['error_message'])) {
        echo '<div class="bg-danger text-light text-center rounded">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
      }
      ?>
    </section>
    <!-- section mensage end -->

    <!-- container form start -->
    <section class="container">
      <h1>Cadastro de Corretor</h1>
      <form action="process_form.php" method="post" class="form" onsubmit="return validationForm()">
        <div>
          <input type="text" name="id" id="id_edit" readonly hidden>
          <input class="cpf" id="cpf" type="text" name="cpf" pattern="[0-9]{11}" placeholder="Digite seu CPF" required oninput="setCustomValidity('');" oninvalid="setCustomValidity('CPF deve ter 11 caracteres!');" />
          <input class="creci" id="creci" type="text" name="creci" pattern="[0-9]{2,8}" placeholder="Digite seu Creci" required oninput="setCustomValidity('');" oninvalid="setCustomValidity('Creci deve ter pelo menos 2 caracteres e no máximo 8 caracteres!');" />
        </div>
        <input class="nome" id="nome" type="text" name="nome" minlength="2" placeholder="Digite seu nome" required oninput="setCustomValidity('');" oninvalid="setCustomValidity('Nome deve ter pelo menos 2 caracteres!');" />
        <button class="enviar" id="enviar">Enviar</button>
      </form>
    </section>
    <!-- container form end -->

    <!-- container table start -->
    <section class="container pt-3">
      <h1>Corretores</h1>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>CRECI</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php

          // Instanciar um objeto do tipo Corretor, chamar o método read() e obter todos os corretores.
          $corretor = new Corretor("", "", "");
          $corretores = $corretor->read();

          foreach ($corretores as $corretor) {
            echo "<tr>";
            echo "<td>{$corretor['id']}</td>";
            echo "<td>{$corretor['nome']}</td>";
            echo "<td>{$corretor['cpf']}</td>";
            echo "<td>{$corretor['creci']}</td>";
            echo "<td>
                <a href='#' class='btn btn-primary' onclick=\"fillForm('{$corretor['id']}', '{$corretor['nome']}', '{$corretor['cpf']}', '{$corretor['creci']}')\">Editar</a>
                <a href='#' class='btn btn-danger' onclick=\"confirmDelete('{$corretor['id']}')\">Excluir</a>
              </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </section>
    <!-- container table end -->

  </main>

  <script src="js/validationForm.js"></script>
  <script src="js/fillForm.js"></script>
  <script src="js/confirmDelete.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>