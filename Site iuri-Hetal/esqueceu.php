<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = "";
    $ficheiro = "dados_pessoais.txt";
    $fp = fopen($ficheiro, "r");

    if (!$fp) {
        echo "Erro ao abrir o ficheiro.";
        exit();
    }

    $encontrado = false;

    while (($linha = fgets($fp)) !== false) {
        $campos = explode("|", $linha);
        $emailArmazenado = trim($campos[1]);
        $passwordArmazenada = trim($campos[2]);

        if ($email === $emailArmazenado) {
            $encontrado = true;
            $password = $passwordArmazenada;
            break;
        }
    }

    fclose($fp);

    if ($encontrado) {
        echo "<script>alert('A senha correspondente é: $password');</script>";
    } else {
        echo "<script>alert('Este email não está cadastrado na nossa base de dados. Por favor, tente novamente.');</script>";
    }
}
?>