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
  <?php
  $pesquisa = $_POST['busca'] ?? '';

  include "conexao.php";

  $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
  $dados = mysqli_query($con, $sql);

  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Consulta de Usuários</h1>
        <nav class="navbar-light bg-light">
          <div class="container-fluid">
            <form class="form-inline" action="pesquisa.php" method="POST">
              <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca">
              <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
          </div>
        </nav>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nome Completo</th>
              <th scope="col">Telefone</th>
              <th scope="col">E-mail</th>
              <th scope="col">Data de Nascimento</th>
              <th scope="col">Senha</th>
              <th scope="col">Funções</th>
            </tr>
          </thead>
          <tbody>

            <?php

            while ($linha = mysqli_fetch_assoc($dados)) {
              $id_usuario = $linha['id_usuario'];
              $nome = $linha['nome'];
              $telefone = $linha['telefone'];
              $email = $linha['email'];
              $data_nascimento = $linha['data_nascimento'];
              $data_nascimento = mostra_data($data_nascimento);
              $senha = $linha['senha'];


              echo "<tr>          
                      <th scope='row'>$nome</th>
                      <td>$telefone</td>
                      <td>$email</td>
                      <td>$data_nascimento</td>
                      <td>$senha</td>
                      <td width-150px>
                        <a href='cadastro_edit.php?id=$id_usuario' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" . '"' . "pegar_dados('$id_usuario', '$nome')" . '"' . ">Excluir</a>
                      </td>
                    
                   </tr>";
            }

            ?>


          </tbody>
        </table>
        <button class="btn btn-info"><a href="index.php" style="color: white; text-decoration: none;">Voltar ao Início</a></button a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de Exclusão</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="excluir_usuario.php" method="POST">
            <p>Deseja realmente excluir <b id="nome_pessoa">Nome da Pessoa</b>?</p>            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <input type="hidden" name="nome" id="nome_usuario" value="">
          <input type="hidden" name="id" id="usuario" value="">
          <input type="submit" class="btn btn-danger" value="Sim">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function pegar_dados(id, nome) {
      document.getElementById('nome_pessoa').innerHTML = nome;
      document.getElementById('nome_usuario').value = nome;
      document.getElementById('usuario').value = id;
    }
  </script>



  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</body>

</html>