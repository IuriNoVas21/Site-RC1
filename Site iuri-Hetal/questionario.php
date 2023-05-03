<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $data_de_nascimento = $_POST['data_nascimento'];
    $abitos_alimentares = $_POST['abitos'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $imc = $peso / ($altura * $altura);  
    $imc1 = number_format($imc, 2);
    $ficheiro = "dados_pessoais.txt";
    $ficheiro1 = "dados_questionario.txt";
    $fp = fopen($ficheiro, "r+");

    if (!$fp) {
        echo "Erro ao abrir o ficheiro.";
        exit();
    }

    $encontrado = false;

    while (($linha = fgets($fp)) !== false) {
        $campos = explode("|", $linha);
        $emailArmazenado = trim($campos[1]);

        if ($email === $emailArmazenado) {
            $encontrado = true;
            break;
        }
    }

    fclose($fp);
    $fp1 = fopen($ficheiro1 , "a+");

    if ($encontrado) {
        echo "<script>alert('O seu IMC é : $imc1');</script>";
        fwrite($fp1, $email . "|" . $genero. "|". $data_de_nascimento ."|".$abitos_alimentares."|". $altura . "|" . $peso . "|" . $imc . "\n");
        
    } else {
        echo "<script>alert('Este email não está cadastrado na nossa base de dados. Por favor, tente novamente.');</script>";
    }


}
?>