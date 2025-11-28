<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $to = "bleedwithdignity1@gmail.com"; // email que vai receber
    $subject = "Novo contato do site";
    $body = "Nome: $nome\nEmail: $email\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<h2>Mensagem enviada com sucesso!</h2>"
        header("Location: contato.php?status=sucesso");
exit;
;
    } else {
        echo "<h2>Erro ao enviar mensagem. Tente novamente.</h2>";
    }
}
?>
