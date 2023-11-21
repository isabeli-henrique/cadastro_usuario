<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Alteração de Cadastros</title>
</head>

<body>

  <?php
    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE id_usuario = $id";

    $dados = mysqli_query($con, $sql);
    $linha = mysqli_fetch_assoc($dados);

  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Alteração de Cadastros de Usuários</h1>
        <form action="edit_usuario.php" method="POST">
          <div class=" form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $linha['nome']; ?>">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seus dados, com ninguém.</small>
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
          </div>
          <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>">
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" value="<?php echo $linha['senha']; ?>">
          </div>
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $linha['id_usuario']; ?>">
            <input type="submit" class="btn-success" value="Salvar Alterações">
        </form>
        <button class=" btn btn-info"><a href="index.php" style="color: white; text-decoration: none;">Voltar ao Início</a></button /a>
      </div>
    </div>
  </div>


  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>