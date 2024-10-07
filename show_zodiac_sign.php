<?php include('layouts/header.php'); ?>

<div class="container mt-5">
<h1 class="text-center">Resultado do Signo Zodiacal</h1>

<?php

    if (isset($_POST['birthdate'])) {
   
    $dataNascimento = $_POST['birthdate'];

    $dataFormatada = date("d/m", strtotime($dataNascimento));

    $xml = simplexml_load_file('signos.xml');
    if ($xml === false) {
        die("Erro ao carregar o arquivo XML.");
    }

    $signo = "";

    foreach ($xml->signo as $s) {
        $dataInicio = (string)$s->dataInicio;
        $dataFim = (string)$s->dataFim;

        $inicio = DateTime::createFromFormat('d/m', $dataInicio);
        $fim = DateTime::createFromFormat('d/m', $dataFim);
        $nascimento = DateTime::createFromFormat('d/m', $dataFormatada);

        if ($inicio > $fim) {
            if ($nascimento >= $inicio || $nascimento <= $fim) {
                $signo = (string)$s->signoNome;
                break;
            }
        } else {
            if ($nascimento >= $inicio && $nascimento <= $fim) {
                $signo = (string)$s->signoNome;
                break;
            }
        }
    }

        if (!empty($signo)) {
            echo "<h2>Seu signo é: $signo</h2>";
        } else {
            echo "<h2>Não foi possível determinar seu signo.</h2>";
        }
    } else {
        echo "<h2>Nenhuma data de nascimento fornecida.</h2>";
    }
?>
    <div class="text-center mt-5">
        <a href="index.php" class="btn btn-secondary">Voltar à página inicial</a>
    </div>
</div>
</body>
</html>