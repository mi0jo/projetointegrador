<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Cadastro - BleedWithDignity</title>
    <meta content="cadastro, criar conta, bleedwithdignity" name="keywords">
    <meta content="Crie sua conta no BleedWithDignity para acessar todos os recursos" name="description">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
   require("../include/referenciashead.php");
   ?>


</head>

<body>
    
   <?php
      require("../include/spinner.php");

   require("../include/navbardeslogado.php");
      require("../include/modalsearch.php");

   ?>
   

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Crie sua conta</h1>
            <p class="text-white">Junte-se à nossa comunidade e acesse todos os recursos</p>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Register Form Start -->
    <div class="container-fluid py-5">
        <div class="container register-container wow fadeIn" data-wow-delay="0.1s">
            <div class="card register-card">
                <div class="card-header register-header">
                    <h3><i class="fas fa-user-plus me-2"></i>Cadastro</h3>
                </div>
                <div class="card-body register-body">
                    <form id="registerForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Seu nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Seu sobrenome" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="seu@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" placeholder="Crie uma senha" required>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="passwordStrengthBar"></div>
                            </div>
                            <small class="form-text text-muted">Mínimo de 8 caracteres, com letras e números</small>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Digite a senha novamente" required>
                        </div>

                        <div class="form-group">
                            <label for="birthDate" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birthDate" required>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                            <label class="form-check-label terms-text" for="acceptTerms">
                                Eu concordo com os <a href="#" class="text-primary">Termos de Serviço</a> e <a href="#" class="text-primary">Política de Privacidade</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-register text-white py-2 mt-3">Criar conta</button>

                        <div class="text-center mt-4">
                            <p>Já tem uma conta? <a href="login.php" class="text-primary">Faça login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form End -->

    <?php
      require("../include/copyright.php");
    require("../include/bibliotecajava.php");
   ?>


    
   
</body>
</html>