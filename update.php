<?php

require 'banco.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    
    $errors = [];

    if (empty($nome)) {
        $errors['nome'] = 'Por favor, digite o nome.';
    }

    if (empty($email)) {
        $errors['email'] = 'Por favor, digite o email.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Por favor, digite um email válido.';
    }

   

    if (empty($errors)) {
    
    } else {
     
    }
}


$errors = [];
if (empty($_POST['endereco'])) {
    $errors['endereco'] = 'Por favor, digite o endereço.';
}
if (empty($_POST['telefone'])) {
    $errors['telefone'] = 'Por favor, digite o telefone.';
}
if (empty($_POST['idade'])) {
    $errors['idade'] = 'Por favor, preencha o campo.';
}


if (empty($errors)) {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE tb_alunos SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email, idade = :idade WHERE codigo = :codigo";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $_POST['nome'],
        ':endereco' => $_POST['endereco'],
        ':telefone' => $_POST['telefone'],
        ':email' => $_POST['email'],
        ':idade' => $_POST['idade'],
        ':codigo' => $_POST['codigo']
    ]);

    Banco::desconectar();

    
    header('Location: index.php');
} else {
    try {
        
        $pdo = Banco::conectar();

        
        $stmt = $pdo->prepare("SELECT * FROM tb_alunos WHERE codigo = :codigo");

       
        $stmt->execute([':codigo' => $codigo]);

        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

      
        if ($result) {
            $nome = $result['nome'];
            $endereco = $result['endereco'];
            $telefone = $result['telefone'];
            $email = $result['email'];
        } else {
            // Nenhum registro encontrado
            echo "Nenhum registro encontrado para o código $codigo";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    } finally {
        
        Banco::desconectar();
    }
}
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Contato</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwE0ngsV7Zt27NXFoaoApmYm81iuXoPkF0JwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <main>
            <div class="card">
                <div class="card-header">
                    <h3>Atualizar Contato</h3>
                </div>
                <div class="card-body">
                    </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuN6Dg65VNYUwdL/TAwwA+83T9PP/t/7yH4eUQ+BT8t8jZcGVAx/iA58dhya" crossorigin="anonymous"></script>
</body>
</html>
