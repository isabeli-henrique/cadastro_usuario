<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Cadastro Usuários</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php
      include "conexao.php";
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];
        $senha = $_POST['senha'];

        // Verifica se algum campo está vazio
        if (empty($nome) || empty($telefone) || empty($email) || empty($data_nascimento) || empty($senha)) {
          echo "Por favor, preencha todos os campos.";
          } else {
        // Insere os dados no banco de dados
        $sql = "INSERT INTO `pessoas`(`nome`, `telefone`, `email`, `data_nascimento`, `senha`) VALUES ('$nome','$telefone','$email','$data_nascimento','$senha')";

          if (mysqli_query($con, $sql)) {
            echo '<div class="alert alert-success" role="alert">';
            echo "<p>$nome foi cadastrado (a) com sucesso! \u{2705}</p>";
            echo '<a href="index.php" class="btn btn-primary mt-3">Voltar ao Início</a>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">';
            echo "<p>$nome cadastro não realizado!</p>";
            echo '<a href="index.php" class="btn btn-primary mt-3">Voltar ao Início</a>';
            echo '</div>';
          }
        } 
      ?>
    </div>
  </div>


  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>