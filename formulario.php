<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nomeCompleto = $_POST['nomeCompleto'];
                    $email = $_POST['email'];
                    $dataNascimento = $_POST['dataNascimento'];
                    $estado = $_POST['estado'];
                    $endereco = $_POST['endereco'];
                    $sexo = $_POST['sexo'];
                    $categorias = $_POST['categorias'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];

                    $hoje = new DateTime();
                    $dataNascimentoObj = DateTime::createFromFormat('Y-m-d', $dataNascimento);
                    $idade = $hoje->diff($dataNascimentoObj)->y;

                    if ($idade < 18) {
                        echo '<div class="alert alert-danger" role="alert">Você precisa ter 18 anos ou mais para preencher este formulário.</div>';
                        exit();
                    }

                    $primeiroNome = explode(" ", $nomeCompleto)[0];
                    $saudacao = ($sexo == 'Masculino') ? 'Olá Sr' : 'Olá Sra';
                    $saudacao .= $primeiroNome;

                    if (strlen($primeiroNome) < 2) {
                        echo '<div class="alert alert-danger" role="alert">Por favor, preencha o nome completo corretamente.</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">' . $saudacao . ', obrigado por preencher o formulário!</div>';
                        echo '<p>Nome completo: ' . $nomeCompleto . '</p>';
                        echo '<p>E-mail: ' . $email . '</p>';
                        echo '<p>Data de nascimento: ' . $dataNascimento . '</p>';
                        echo '<p>Estado: ' . $estado . '</p>';
                        echo '<p>Endereço: ' . $endereco . '</p>';
                        echo '<p>Sexo: ' . $sexo . '</p>';
                        echo '<p>Categorias de interesse: ' . implode(', ', $categorias) . '</p>';
                        echo '<p>Login: ' . $login . '</p>';
                        echo '<p>Senha: ' . $senha . '</p>';
                        echo '<p>Idade: ' . $idade . ' anos</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
