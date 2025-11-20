<?php
session_start();

// Verificar se já está logado
if (isset($_SESSION['user_id'])) {
    header('Location: ../logado/perfillogado.php');
    exit();
}

// Verificar se há mensagens de erro da tentativa de cadastro
$errors = $_SESSION['cadastro_errors'] ?? [];
$form_data = $_SESSION['form_data'] ?? [];

// Limpar as mensagens da sessão
unset($_SESSION['cadastro_errors']);
unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastro - BleedWithDignity</title>
    <meta content="cadastro, criar conta, bleedwithdignity" name="keywords">
    <meta content="Crie sua conta no BleedWithDignity para acessar todos os recursos" name="description">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php require("../include/referenciashead.php"); ?>
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
                    <!-- Mostrar mensagens de erro -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro no cadastro:</strong>
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form id="registerForm" method="POST" action="../login/cadastrar.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="firstName" name="nome" placeholder="Seu nome" required 
                                           value="<?php echo isset($form_data['nome']) ? htmlspecialchars($form_data['nome']) : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="lastName" name="sobrenome" placeholder="Seu sobrenome" required
                                           value="<?php echo isset($form_data['sobrenome']) ? htmlspecialchars($form_data['sobrenome']) : ''; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required
                                   value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="senha" placeholder="Crie uma senha" required>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="passwordStrengthBar"></div>
                            </div>
                            <small class="form-text text-muted">Mínimo de 8 caracteres, com letras e números</small>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmar_senha" placeholder="Digite a senha novamente" required>
                        </div>

                        <div class="form-group">
                            <label for="birthDate" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birthDate" name="nascimento" required
                                   value="<?php echo isset($form_data['nascimento']) ? htmlspecialchars($form_data['nascimento']) : ''; ?>">
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acceptTerms" name="termos" required>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('registerForm');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const strengthBar = document.getElementById('passwordStrengthBar');
        
        // Validar força da senha
        password.addEventListener('input', function() {
            const strength = checkPasswordStrength(this.value);
            updateStrengthBar(strength);
            validatePasswordMatch();
        });
        
        // Validar confirmação de senha
        confirmPassword.addEventListener('input', validatePasswordMatch);
        
        function validatePasswordMatch() {
            if (confirmPassword.value !== '' && confirmPassword.value !== password.value) {
                confirmPassword.classList.add('is-invalid');
                confirmPassword.classList.remove('is-valid');
            } else if (confirmPassword.value !== '') {
                confirmPassword.classList.remove('is-invalid');
                confirmPassword.classList.add('is-valid');
            } else {
                confirmPassword.classList.remove('is-invalid', 'is-valid');
            }
        }
        
        function checkPasswordStrength(password) {
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            return strength;
        }
        
        function updateStrengthBar(strength) {
            const percent = (strength / 5) * 100;
            strengthBar.style.width = percent + '%';
            
            if (strength <= 2) {
                strengthBar.style.backgroundColor = '#dc3545';
            } else if (strength <= 3) {
                strengthBar.style.backgroundColor = '#ffc107';
            } else {
                strengthBar.style.backgroundColor = '#28a745';
            }
        }

        // Validar idade mínima (13 anos)
        const birthDate = document.getElementById('birthDate');
        birthDate.addEventListener('change', function() {
            const today = new Date();
            const selectedDate = new Date(this.value);
            let age = today.getFullYear() - selectedDate.getFullYear();
            const monthDiff = today.getMonth() - selectedDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < selectedDate.getDate())) {
                age--;
            }
            
            if (age < 13) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });

        // Validação do formulário antes de enviar
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const today = new Date();
            const selectedDate = new Date(birthDate.value);
            let age = today.getFullYear() - selectedDate.getFullYear();
            const monthDiff = today.getMonth() - selectedDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < selectedDate.getDate())) {
                age--;
            }
            
            // Validar idade
            if (age < 13) {
                birthDate.classList.add('is-invalid');
                isValid = false;
            }
            
            // Validar senhas
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add('is-invalid');
                isValid = false;
            }
            
            // Validar força da senha
            if (password.value.length < 8 || !/[A-Za-z]/.test(password.value) || !/[0-9]/.test(password.value)) {
                password.classList.add('is-invalid');
                isValid = false;
            }
            
           
        });
    });
    </script>
</body>
</html>