<?php
require 'banco.php'; 
$id = null; 
if (!empty($_GET['codigo'])) {    
    $id = $_REQUEST['codigo'];
}

if (null == $id) {
    header("Location: index.php"); 
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_alunos where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- latest compiled and minified CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel"stylesheet
    <title>Informações do Contato</title>
</head>

<body   
<div class="container">
  <div class="card">
       <div class="card-header">
      <h3>Informações do Contato</h3>
    </div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" value="<?php echo $data['nome']; ?>" disabled>
        </div>
        <div class="form-group">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" id="endereco" value="<?php echo $data['endereco']; ?>" disabled>
        </div>
      </form>
    </div>
  </div>    
</div>
<div class="form-group">
  <label for="telefone">Telefone:</label>
  <input type="tel" class="form-control" id="telefone" value="<?php echo $data['fone']; ?>" disabled>
</div>

<div class="form-group">
  <label for="email">Email:</label>
  <input type="email" class="form-control" id="email" value="<?php echo $data['email']; ?>" disabled>
</div>

<div class="form-group">
  <label for="idade">Idade:</label>
  <input type="number" class="form-control" id="idade" value="<?php echo $data['idade']; ?>" disabled>
</div>

<div class="form-group">
  <a href="index.php" class="btn btn-primary">Voltar</a>
</div>
</body>

</html>