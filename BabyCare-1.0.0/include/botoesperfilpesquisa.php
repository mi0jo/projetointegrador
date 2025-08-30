<div class="d-flex align-items-center">
    <!-- Botão de pesquisa -->
    <button class="btn-search btn btn-primary btn-md-square rounded-circle me-2" 
            data-bs-toggle="modal" 
            data-bs-target="#searchModal">
        <i class="fas fa-search text-white"></i>
    </button>
    
    <!-- Botão de perfil -->
    <a href="../logado/perfillogado.php" 
       class="btn btn-primary btn-md-square rounded-circle p-0 overflow-hidden profile-btn" 
       style="width: 40px; height: 40px;">
        <img src="../img/chuuu.jpg" 
             alt="Foto do perfil" 
             class="w-100 h-100 object-fit-cover"
             onerror="this.onerror=null; this.classList.add('d-none'); this.parentElement.querySelector('.profile-fallback').classList.remove('d-none')">
        <i class="fas fa-user text-white profile-fallback d-none"></i>
    </a>
</div>               

