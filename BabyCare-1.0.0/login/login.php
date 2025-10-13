<?php
session_start();
include("../include/conexao.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";

if ($mysqli) {
    echo "Conexão OK<br>";
} else {
    echo "Conexão FALHOU<br>";
}

if (isset($_POST['login'])) {
    echo "Botão login detectado<br>";
    echo "Email: " . $_POST['email'] . "<br>";
    echo "Senha: " . $_POST['password'] . "<br>";
}
?>
<form method="POST" action="">
  <input type="email" name="email" placeholder="Email"><br>
  <input type="password" name="password" placeholder="Senha"><br>
  <button type="submit" name="login">Entrar</button>
</form>
