<?php
$mail2 = $_POST['mail2'];
$ficheiro = "dados_pessoais.txt";
$fp = fopen($ficheiro, "r");

if (!$fp) {
    echo "Erro ao abrir o ficheiro.";
    exit();
}

$encontrado = false;
while (($valor = fgets($fp)) !== false) {
    $qualquer = explode('|', $valor);
    $mail3 = trim($qualquer[0]);
    $password = trim($qualquer[2]);

    if ($mail2 === $mail3) {
        // Get the data you want to show in the alert
        $dados = "Email: $mail3\nGênero: $qualquer[1]\nData de Nascimento: $qualquer[3]\nHábitos Alimentares: $qualquer[4]\nAltura: $qualquer[5]\nPeso: $qualquer[6]\nIMC: $qualquer[7]";
        $encontrado = true;
        break;
    }
}

if ($encontrado) {
    echo "<script>alert('Os seus dados são:\\n$dados');</script>";
} else {
    echo "<script>alert('Não tem ainda conta conosco, registe-se.');</script>";
}

fclose($fp);
?>