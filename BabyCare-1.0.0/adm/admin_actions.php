<!-- Adicione este botão na seção de Conteúdo -->
<section id="conteudo" class="content-section" style="display:none;">
    <h2 class="mb-4 wow fadeIn" data-wow-delay="0.1s"><i class="fas fa-file-alt me-2"></i>Gerenciar Conteúdo</h2>
    
    <!-- Botão para Nova Matéria -->
    <div class="row mb-4">
        <div class="col-md-12 text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#novaMateriaModal">
                <i class="fas fa-plus me-2"></i>Nova Matéria
            </button>
        </div>
    </div>
    
    <!-- Resto do seu código existente... -->
</section>

<!-- Adicione este Modal antes do fechamento do body -->
<div class="modal fade" id="novaMateriaModal" tabindex="-1" aria-labelledby="novaMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novaMateriaModalLabel">
                    <i class="fas fa-plus me-2"></i>Nova Matéria
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formNovaMateria" method="POST" action="admin_actions.php">
                <div class="modal-body">
                    <?php if (isset($_SESSION['materia_error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['materia_error']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['materia_error']); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="titulo" class="form-label">Título da Matéria *</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required 
                                   placeholder="Digite o título da matéria">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="topico" class="form-label">Tópico *</label>
                            <select class="form-select" id="topico" name="topico" required>
                                <option value="">Selecione um tópico</option>
                                <option value="Dignidade Menstrual">Dignidade Menstrual</option>
                                <option value="Saúde Sexual">Saúde Sexual e Reprodutiva</option>
                                <option value="Produtos Menstruais">Produtos Menstruais</option>
                                <option value="Tipos de Absorventes">Tipos de Absorventes</option>
                                <option value="Ciclo Menstrual">Ciclo Menstrual</option>
                                <option value="Saúde e Higiene">Saúde e Higiene Menstrual</option>
                                <option value="Sintomas">Sintomas e Mudanças Menstruais</option>
                                <option value="Sustentabilidade">Sustentabilidade Ambiental</option>
                                <option value="Pobreza Menstrual">Pobreza Menstrual</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="topico_personalizado" class="form-label">Ou digite um tópico personalizado</label>
                            <input type="text" class="form-control" id="topico_personalizado" name="topico_personalizado" 
                                   placeholder="Digite um tópico personalizado">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="conteudo" class="form-label">Conteúdo da Matéria *</label>
                        <textarea class="form-control" id="conteudo" name="conteudo" rows="12" required 
                                  placeholder="Digite o conteúdo completo da matéria..."></textarea>
                        <div class="d-flex justify-content-between">
                            <div class="form-text">
                                Use este espaço para escrever o conteúdo completo da sua matéria.
                            </div>
                            <div class="form-text" id="contador-caracteres"></div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <small>
                            <i class="fas fa-info-circle me-2"></i>
                            A matéria será publicada imediatamente após o envio.
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </button>
                    <button type="submit" name="nova_materia" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Publicar Matéria
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Adicione este JavaScript -->
<script>
// Script para o modal de nova matéria
$(document).ready(function() {
    // Alternar entre select e input personalizado para tópico
    $('#topico').change(function() {
        if ($(this).val() === 'Outros') {
            $('#topico_personalizado').show().focus();
        } else {
            $('#topico_personalizado').hide().val('');
        }
    });

    // Esconder o campo personalizado inicialmente
    $('#topico_personalizado').hide();

    // Validação do formulário
    $('#formNovaMateria').on('submit', function(e) {
        const titulo = $('#titulo').val().trim();
        const topico = $('#topico').val();
        const conteudo = $('#conteudo').val().trim();

        if (!titulo) {
            e.preventDefault();
            alert('Por favor, digite um título para a matéria.');
            $('#titulo').focus();
            return false;
        }

        if (!topico) {
            e.preventDefault();
            alert('Por favor, selecione ou digite um tópico.');
            $('#topico').focus();
            return false;
        }

        if (topico === 'Outros' && !$('#topico_personalizado').val().trim()) {
            e.preventDefault();
            alert('Por favor, digite um tópico personalizado.');
            $('#topico_personalizado').focus();
            return false;
        }

        if (!conteudo) {
            e.preventDefault();
            alert('Por favor, digite o conteúdo da matéria.');
            $('#conteudo').focus();
            return false;
        }

        // Mostrar loading
        $('button[name="nova_materia"]').html('<i class="fas fa-spinner fa-spin me-2"></i>Publicando...').prop('disabled', true);
    });

    // Fechar modal após sucesso
    <?php if (isset($_SESSION['materia_success'])): ?>
        $(document).ready(function() {
            $('#novaMateriaModal').modal('hide');
            // Limpar formulário
            $('#formNovaMateria')[0].reset();
            $('#topico_personalizado').hide();
        });
        <?php unset($_SESSION['materia_success']); ?>
    <?php endif; ?>

    // Abrir modal se houver erro
    <?php if (isset($_SESSION['materia_error'])): ?>
        $(document).ready(function() {
            $('#novaMateriaModal').modal('show');
        });
    <?php endif; ?>
});

// Função para contar caracteres do conteúdo
function contarCaracteres() {
    const conteudo = $('#conteudo').val();
    const contador = $('#contador-caracteres');
    if (conteudo.length > 0) {
        contador.text('Caracteres: ' + conteudo.length);
    } else {
        contador.text('');
    }
}

// Inicializar contador
$('#conteudo').on('input', contarCaracteres);
</script>