<?php
$nome = $_POST['person'];
$email = $_POST['mail'];
$password = $_POST['lock-closed'];
$ficheiro = "dados_pessoais.txt";

$fp = fopen($ficheiro, "a+");

if ($fp === false) {

    echo "Erro ao abrir o ficheiro";

} else {
    $exists = false;

    while (!feof($fp)) {
        $valor = fgets($fp);

        $qualquer = explode('|', $valor);

        if (($nome == $qualquer[0]) || ($email == $qualquer[1])) {
            $exists = true;
            break;
        }
    }

    if ($exists) {
        echo "<script>alert('Este utilizador ou email ja estao a ser usados!!!');</script>";
    } else {
        fwrite($fp, $nome . "|" . $email . "|" . $password . "\n"); 
        echo '<br>';
        header('Location: Form.html');
        exit;
    }
    fclose($fp);
}
?>