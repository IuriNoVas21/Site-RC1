<?php
$nome1 = $_POST['person1'];
$password1 = $_POST['lock-closed1'];
$ficheiro = "dados_pessoais.txt";
$fp = fopen($ficheiro, "a+");

if (!$fp) {
    echo "Erro ao abrir o ficheiro.";
    exit();
}


$encontrado = false;
while (($valor = fgets($fp)) !== false) {
    $qualquer = explode('|', $valor);
    $username = trim($qualquer[0]);
    $password = trim($qualquer[2]);

    if ($nome1 === $username && $password1 === $password) {
        $encontrado = true;
        break;
    }
}



if ($encontrado) {
    echo "<script>alert('Bem Vindo');</script>";
    header('Location: Home.html');
} else {

    echo "<script>alert('Não tem ainda conta conosco registe-se.');</script>";
}

fclose($fp);
?>